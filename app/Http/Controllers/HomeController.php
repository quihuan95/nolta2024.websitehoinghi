<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Http\Response;
use App\Models\Common;

class HomeController extends Controller
{
	 public function index(){
		 return view("pages.vietnam_visa");   
	 }
	 public function vietnam_visa(){
		  return view("pages.vietnam_visa");   
	  }
	public function transportation(){
		  return view("pages.transportation");   
	  }
	  public function accommodation(){
			return view("pages.accommodation");   
		}
	public function tour(){
		return view("pages.tour");   
	}
	public function save_trans(Request $request){
		$data=array();
		$str_code1="NOLTA2024-".rand();
		$str_code2=rand();
		$data['code1']=$str_code1;
		$data['code2']=$str_code2;
		$data['title']= $request->hd_title_selected;
		$data['first_name']=$request->firstname;
		$data['last_name']=$request->lastname;
		$data['country']=$request->country;
		$data['tel']=$request->tel;
		$data['email']=$request->email;
		$data['i_would_like']=$request->bookat;
		$data['arrival_date1']=$request->arrival_date1;
		$data['flight_number']=$request->flight_number;
		$data['arrival_time1']=$request->arrival_time1;
		$data['departure_date1']=$request->departure_date1;
		$data['flight_number2']=$request->flight_number2;
		$data['departure_time1']=$request->departure_time1;
		$data['information_others']='';
		$data['type']=$request->type1;
		$data['hdtype2']=$request->type2;
		$data['hdtotalall']=$request->hdtotalall;
		$data['time']=$request->time;
		$data['created_at']=Carbon::now();
		$data['updated_at']=Carbon::now();
		$data['status']='A';
		$data['tnx']='';
		$data['res']='Pending';
		DB::table('nolta2024_trans')->insert($data);
		
		$fullnamesend=$request->hd_title_selected.' '.$request->firstname.' '.$request->lastname;
		$data['fullname']= $fullnamesend;
		$data['orderinfo']=$str_code1;
		
		$to_name = "NOLTA2024 Transport";
		$to_email=trim($request->email);
		Mail::send('emails.email_trans',$data,function($message) use ($to_name,$to_email,$fullnamesend){
			$message->to($to_email)
			->cc(['event4@hoabinh-group.com','vicky@hoabinhtourist.com'])
			->subject("NOLTA2024 - Airport Transfer Confirmation ".$fullnamesend);
			$message->from($to_email,$to_name);
		});
		echo $str_code1."$".$str_code2;
	}
	
	public function payment_form_onepay(Request $request){
		$data_acc=DB::table('nolta2024_trans')->where('code1',$request->code1)->where('code2',$request->code2)->first();
		$_POST['vpc_OrderInfo']=$data_acc->code1.'_'.$data_acc->code2;
		
		$strSecure_secret='2A15C553DC9DBC44284A2020DD489C42';//-->Thật
		
		$_POST['Title']="VPC 3-Party";
		$_POST['virtualPaymentClientURL']="https://onepay.vn/vpcpay/vpcpay.op"; //--> Thật
		
		$_POST['vpc_Merchant']="HBTOUR2";
		$_POST['vpc_AccessCode']="37A07C2E";
		
		$_POST['vpc_MerchTxnRef']=rand();
		$_POST['vpc_ReturnURL']="https://nolta2024.websitehoinghi.com/airport-transfer/dr";
		$_POST['vpc_Version']="2";
		$_POST['vpc_Command']="pay";
		$_POST['vpc_Locale']="en";
		$_POST['vpc_TicketNo']=$_SERVER['REMOTE_ADDR'];
		$_POST['vpc_SHIP_Street01']="39A Ngo Quyen";
		$_POST['vpc_SHIP_Provice']="Hoan Kiem";
		$_POST['vpc_SHIP_City']="Ha Noi";
		$_POST['vpc_SHIP_Country']="Viet Nam";
		$_POST['vpc_Customer_Phone']="0988542856";
		$_POST['vpc_Customer_Email']="webmaster@hoabinhtourist.com";
		$_POST['vpc_Customer_Id']="thanhls";
		
		$fee=$data_acc->hdtotalall;
		//$_POST['vpc_Amount'] = round($fee*100);
		$_POST['vpc_Amount'] = round($fee*100);//round(($fee+($fee*6)/100)*100);
		
		$_POST['_token']="";
		$_POST['code']="";
		$_POST['fee']="";
		$_POST['code1']="";
		$_POST['code2']="";
		$_POST['fee']="";
		
		$_POST['btnSubmit']="";
		
		
		// $SECURE_SECRET = "secure-hash-secret";
		$SECURE_SECRET = $strSecure_secret;//"2A15C553DC9DBC44284A2020DD489C42";
		
		// add the start of the vpcURL querystring parameters
		$vpcURL = $_POST["virtualPaymentClientURL"] . "?";
		// do not want to send these fields to the Virtual Payment Client.
		unset($_POST["virtualPaymentClientURL"]);
		// Get and URL Encode the AgainLink. Add the AgainLink to the array
		// Shows how a user field (such as application SessionIDs) could be added
		
		//dd($request->server('HTTP_REFERER'));
		$_POST['AgainLink']=urlencode($_SERVER['HTTP_REFERER']);
		
		//dd($_POST);
		//$md5HashData = $SECURE_SECRET; Khởi tạo chuỗi dữ liệu mã hóa trống
		$md5HashData = "";
		ksort($_POST);
		// set a parameter to show the first pair in the URL
		$appendAmp = 0;
		foreach($_POST as $key => $value) {
			// create the md5 input and URL leaving out any fields that have no value
			if (strlen($value) > 0) {
				// this ensures the first paramter of the URL is preceded by the '?' char
				if ($appendAmp == 0) {
					$vpcURL .= urlencode($key) . '=' . urlencode($value);
					$appendAmp = 1;
				} else {
					$vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
				}
				//$md5HashData .= $value; sử dụng cả tên và giá trị tham số để mã hóa
				if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
					$md5HashData .= $key . "=" . $value . "&";
				}
			}
		}
		//xóa ký tự & ở thừa ở cuối chuỗi dữ liệu mã hóa
		$md5HashData = rtrim($md5HashData, "&");
		// Create the secure hash and append it to the Virtual Payment Client Data if
		// the merchant secret has been provided.
		if (strlen($SECURE_SECRET) > 0) {
			//$vpcURL .= "&vpc_SecureHash=" . strtoupper(md5($md5HashData));
			// Thay hàm mã hóa dữ liệu
			$vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$SECURE_SECRET)));
		}
		
		// FINISH TRANSACTION - Redirect the customers using the Digital Order
		// ===================================================================
		//header("Location: ".$vpcURL);
		
		//dd($vpcURL);
		
		return Redirect::to($vpcURL);
	}
	
	function airport_transfer_dr(Request $request){
		/*$path = url()->previous();
		echo '<pre>';
		print_r($path);
		echo '</pre>';
		die();
		*/
		
		$SECURE_SECRET = "2A15C553DC9DBC44284A2020DD489C42";//--> Thật
		//$SECURE_SECRET = "6D0870CDE5F24F34F3915FB0045120D6";
		// get and remove the vpc_TxnResponseCode code from the response fields as we
			// do not want to include this field in the hash calculation
			$vpc_Txn_Secure_Hash = $request->vpc_SecureHash;
			$vpc_MerchTxnRef = $request->vpc_MerchTxnRef;
			$vpc_AcqResponseCode = $request->vpc_AcqResponseCode;
			unset($request->vpc_SecureHash);
			// set a flag to indicate if hash has been validated
			$errorExists = false;
			if (strlen($SECURE_SECRET) > 0 && $request->vpc_TxnResponseCode != "7" && $request->vpc_TxnResponseCode != "No Value Returned") {
			ksort($_GET);
			//$md5HashData = $SECURE_SECRET;
			//khởi tạo chuỗi mã hóa rỗng
			$md5HashData = "";
			// sort all the incoming vpc response fields and leave out any with no value
			foreach ($_GET as $key => $value) {
		//        if ($key != "vpc_SecureHash" or strlen($value) > 0) {
		//            $md5HashData .= $value;
		//        }
		//      chỉ lấy các tham số bắt đầu bằng "vpc_" hoặc "user_" và khác trống và không phải chuỗi hash code trả về
				if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
					$md5HashData .= $key . "=" . $value . "&";
				}
			}
		//  Xóa dấu & thừa cuối chuỗi dữ liệu
			$md5HashData = rtrim($md5HashData, "&");
		
		//    if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper ( md5 ( $md5HashData ) )) {
		//    Thay hàm tạo chuỗi mã hóa
			if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$SECURE_SECRET)))) {
				// Secure Hash validation succeeded, add a data field to be displayed
				// later.
				$hashValidated = "CORRECT";
			} else {
				// Secure Hash validation failed, add a data field to be displayed
				// later.
				$hashValidated = "INVALID HASH";
			}
		} else {
			// Secure Hash was not validated, add a data field to be displayed later.
			$hashValidated = "INVALID HASH";
		}
		
			// Define Variables
			// ----------------
			// Extract the available receipt fields from the VPC Response
			// If not present then let the value be equal to 'No Value Returned'
		
			// Standard Receipt Data
		
		
		
			$vpc_Amount_1=isset($_GET["vpc_Amount"])==true?$_GET["vpc_Amount"]:'';
			$vpc_Locale_1=isset($_GET["vpc_Locale"])==true?$_GET["vpc_Locale"]:'';
			$vpc_BatchNo_1=isset($_GET["vpc_BatchNo"])==true?$_GET["vpc_BatchNo"]:'';
			$vpc_Command_1=isset($_GET["vpc_Command"])==true?$_GET["vpc_Command"]:'';
			$vpc_Message_1=isset($_GET["vpc_Message"])==true?$_GET["vpc_Message"]:'';
			$vpc_Version_1=isset($_GET["vpc_Version"])==true?$_GET["vpc_Version"]:'';
			$vpc_Card_1=isset($_GET["vpc_Card"])==true?$_GET["vpc_Card"]:'';
			$vpc_OrderInfo_1=isset($_GET["vpc_OrderInfo"])==true?$_GET["vpc_OrderInfo"]:'';
			$vpc_ReceiptNo_1=isset($_GET["vpc_ReceiptNo"])==true?$_GET["vpc_ReceiptNo"]:'';
			$vpc_Merchant_1=isset($_GET["vpc_Merchant"])==true?$_GET["vpc_Merchant"]:'';
			$vpc_MerchTxnRef_1=isset($_GET["vpc_MerchTxnRef"])==true?$_GET["vpc_MerchTxnRef"]:'';
			$vpc_TransactionNo_1=isset($_GET["vpc_TransactionNo"])==true?$_GET["vpc_TransactionNo"]:'';
			$vpc_AcqResponseCode_1=isset($_GET["vpc_AcqResponseCode"])==true?$_GET["vpc_AcqResponseCode"]:'';
			$vpc_TxnResponseCode_1=isset($_GET["vpc_TxnResponseCode"])==true?$_GET["vpc_TxnResponseCode"]:'';
		
			$amount = Common::null2unknown($vpc_Amount_1);
			$locale = Common::null2unknown($vpc_Locale_1);
			$batchNo = Common::null2unknown($vpc_BatchNo_1);
			$command = Common::null2unknown($vpc_Command_1);
			$message = Common::null2unknown($vpc_Message_1);
			$version = Common::null2unknown($vpc_Version_1);
			$cardType = Common::null2unknown($vpc_Card_1);
			$orderInfo = Common::null2unknown($vpc_OrderInfo_1);
			$receiptNo = Common::null2unknown($vpc_ReceiptNo_1);
			$merchantID = Common::null2unknown($vpc_Merchant_1);
			//$authorizeID = null2unknown($_GET["vpc_AuthorizeId"]);
			$merchTxnRef = Common::null2unknown($vpc_MerchTxnRef_1);
			$transactionNo = Common::null2unknown($vpc_TransactionNo_1);
			$acqResponseCode = Common::null2unknown($vpc_AcqResponseCode_1);
			$txnResponseCode = Common::null2unknown($vpc_TxnResponseCode_1);
			// 3-D Secure Data
			$verType = array_key_exists("vpc_VerType", $_GET) ? $_GET["vpc_VerType"] : "No Value Returned";
			$verStatus = array_key_exists("vpc_VerStatus", $_GET) ? $_GET["vpc_VerStatus"] : "No Value Returned";
			$token = array_key_exists("vpc_VerToken", $_GET) ? $_GET["vpc_VerToken"] : "No Value Returned";
			$verSecurLevel = array_key_exists("vpc_VerSecurityLevel", $_GET) ? $_GET["vpc_VerSecurityLevel"] : "No Value Returned";
			$enrolled = array_key_exists("vpc_3DSenrolled", $_GET) ? $_GET["vpc_3DSenrolled"] : "No Value Returned";
			$xid = array_key_exists("vpc_3DSXID", $_GET) ? $_GET["vpc_3DSXID"] : "No Value Returned";
			$acqECI = array_key_exists("vpc_3DSECI", $_GET) ? $_GET["vpc_3DSECI"] : "No Value Returned";
			$authStatus = array_key_exists("vpc_3DSstatus", $_GET) ? $_GET["vpc_3DSstatus"] : "No Value Returned";
		
			// *******************
			// END OF MAIN PROGRAM
			// *******************
		
			// FINISH TRANSACTION - Process the VPC Response Data
			// =====================================================
			// For the purposes of demonstration, we simply display the Result fields on a
			// web page.
		
			// Show 'Error' in title if an error condition
			$errorTxt = "";
		
			// Show this page as an error page if vpc_TxnResponseCode equals '7'
			if ($txnResponseCode == "7" || $txnResponseCode == "No Value Returned" || $errorExists) {
				$errorTxt = "Error ";
			}
		
			// This is the display title for 'Receipt' page
			$title = "NOLTA Trans";//$_GET["Title"];
		
			// The URL link for the receipt to do another transaction.
			// Note: This is ONLY used for this example and is not required for
			// production code. You would hard code your own URL into your application
			// to allow customers to try another transaction.
			//TK//$againLink = URLDecode($_GET["AgainLink"]);
		
		
			$transStatus = "";
			if($hashValidated=="CORRECT" && $txnResponseCode=="0"){
				$transStatus = "Payment Success!";
			}elseif ($hashValidated=="INVALID HASH" && $txnResponseCode=="0"){
				$transStatus = "Pendding";
			}else {
				$transStatus = "Payment Failed";
			}
			
			$arr_code=explode('_',$request->vpc_OrderInfo);
		
		DB::table('nolta2024_trans')->where('code1',$arr_code[0])->where('code2',$arr_code[1])->update(['tnx' => $txnResponseCode,'res' => $txnResponseCode]);
		
		$data1=DB::table('nolta2024_trans')->where('code1',$arr_code[0])->where('code2',$arr_code[1])->take(1)->get();
		//dd($data->email);
		//----
		//$str_code1=$data['code1'];
		$aa = $data1->toArray()[0];
		$str_code1=$aa->code1;
		$data=(array) $aa;
		$str_fullname=$aa->title.' '.$aa->first_name.' '.$aa->last_name;
		$data['fullname']=$str_fullname;
		$data['orderinfo']=$aa->code1;
		$data['fullname']=$str_fullname;
		$data['country']=$aa->country;
		$data['i_would_like']=$aa->i_would_like;
		$data['arrival_date1']=$aa->arrival_date1;
		$data['flight_number']=$aa->flight_number;
		$data['arrival_time1']=$aa->arrival_time1;
		$data['departure_date1']=$aa->departure_date1;
		$data['flight_number2']=$aa->flight_number2;
		$data['departure_time1']=$aa->departure_time1;
		
		
		
		//dd($str_code1);
		$data['payment_status']=Common::getResponseDescription($aa->tnx);
		$to_name = "NOLTA2024 Transport";
		$to_email = trim($aa->email);
		if($aa->tnx=='0'){	
			Mail::send('emails.email_trans_pay',$data,function($message) use ($to_name,$to_email,$str_fullname){
				$message->to($to_email)
				->cc('vicky@hoabinhtourist.com')
				->cc('event4@hoabinh-group.com')
				//->cc($to_email2)
				->subject("NOLTA2024 - AIRPORT TRANSFER CONFIRMATION - ".$str_fullname);
				$message->from($to_email,$to_name);//send from this mail
			});	
		}else{
			Mail::send('emails.email_trans_pay',$data,function($message) use ($to_name,$to_email,$str_fullname){
				$message->to($to_email)
				->cc('vicky@hoabinhtourist.com')
				->cc('event4@hoabinh-group.com')
				//->cc($to_email2)
				->subject("NOLTA2024 - AIRPORT TRANSFER CONFIRMATION - ".$str_fullname);
				$message->from($to_email,$to_name);//send from this mail
			});
		}
		//----
		//confirm.payment
		return Redirect::to(route('trans.confirm',array($arr_code[0],$arr_code[1])));
	}
	
	public function paymenthotelform($code1,$code2){
		$data_acc=DB::table('nolta2024_trans')->where('code1',$code1)->where('code2',$code2)->first();
		if(empty($data_acc)){
			return Redirect::to(route('transportation'));
		}
		/*if(($data_acc->type=='1_4,') || ($data_acc->type=='1_5,') || ($data_acc->type=='1_6,') || ($data_acc->type=='1_7,') || ($data_acc->type=='1_8,') || ($data_acc->type=='1_9,') || ($data_acc->type=='2_5,')){
			return Redirect::to("https://nolta2024.websitehoinghi.com/trans-close");
		}*/
		
		return view('pages.pay',compact('data_acc'));
	}
	
	public function trans_confirm($code1,$code2){
		$booking=DB::table('nolta2024_trans')->where('code1',$code1)->where('code2',$code2)->first();
		return view("pages.trans_confirm",compact('booking'));
	}
	
	public function airport_transfer(){
		return view("pages.trans");
		//return view("pages.airport_transfer");
	}
	
	public function reserve_load(Request $request){
		
	}
	
	public function transportationTest()
	{
		die();
		$nolta = DB::table('nolta2024_trans')
					->limit(3)
					->orderByDesc('id')
					->get();
					
		foreach($nolta as $item):
			
			$to_name = "NOLTA2024 Transport";
			$to_email = trim($item->email);
			//$to_email = trim('louis.standbyme@gmail.com');
			$str_fullname = $item->first_name .' ' . $item->last_name; 
			
			$data = [
				'title' => $item->title,
				'fullname' => $str_fullname,
				'country' => $item->country,
				'tel' => $item->tel,
				'email' => $item->email,
				'type' => $item->type,
				'hdtype2' => $item->hdtype2,
				'hdtotalall' => $item->hdtotalall,
				'res' => 'Successful'
			];
			// return view('emails.email_trans', $data);
			// //die();
			// die();
			
			Mail::send('emails.email_trans',$data,function($message) use ($to_name,$to_email,$str_fullname){
				$message->to($to_email)
				->cc('vicky@hoabinhtourist.com')
				->cc('event4@hoabinh-group.com')
				//->cc($to_email2)
				->subject("NOLTA2024 - AIRPORT TRANSFER CONFIRMATION - ".$str_fullname);
				$message->from($to_email,$to_name);//send from this mail
			});	
			
		
		endforeach;
			
			echo '1';
	}
}
