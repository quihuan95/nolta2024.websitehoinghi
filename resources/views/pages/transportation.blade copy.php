
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <link rel="icon" type="image/x-icon" href="https://hoabinh-group.com/wp-content/uploads/2023/12/logo-xanh.png">
   <title>Airport Transfer</title>
   <!-- jQuery -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- Bootstrap JS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

   <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}" />
   <style type="text/css">
	   .wapper .container{ padding: 10px 40px; }
	   .wapper td{ padding: 10px;height: 75px; }
	   .wapper h1{ margin: 0px;padding: 0px;text-align: center;font-size: 1.7rem!important; }
	   .wapper input{ margin-bottom: 15px; }
	   .red{ color: red; }
	   .headtext{ background: #fff;margin: 0 auto;width: 490px;text-align: center;position: relative;z-index: 999999;bottom: -54px;display: block;padding: 10px;max-width: 100%; }
	   .dplay_none{ display: none!important; }
	   .dplay_block{ display: block!important; }
   .box_table td{ padding: 10px;text-align: center; }
	  .priceBook{ color: red;font-size: 20px; }
	  #checkoutinvoice { display: block;background: #0695ff;padding: 5px 10px;border: 1px solid #fbf7f6;border-radius: 8px;color: #fff;text-decoration: none;font-weight: bold;width: 80px;margin: 0 auto; }
	  .fixedtop a{  }
	  .boxprice{ display: flex; }
	  .boxprice div:nth-child(1){ width: 15%; }
	  .boxprice div:nth-child(2){ width: 20%; }
	  .boxprice div:nth-child(3){ width: 20%; }
	  .boxprice5{ display: flex; }
	  .boxprice5 div:nth-child(1){ width: 15%; }
		.boxprice5 div:nth-child(2){ width: 20%; }
		.boxprice5 div:nth-child(3){ width: 20%; }
	  .boxprice5 div:nth-child(4){ width: 10%; }
	  p{ margin: 0px;padding: 0px; }
	  td{ text-align: center;vertical-align: middle; }
	  td a{ background-color: blue;padding: 8px;color: #fff;border-radius: 3px; }
	  td a:hover{ text-decoration: none;color: #fff; }
	  .center{ text-align: center; }
	  .boxvietnamvisa{ background: dodgerblue;color: #fff;font-size: 60px;font-weight: bold;margin-top: 15px;margin-bottom: 15px;text-transform: uppercase; }
	  @media  only screen and (min-width:320px) and (max-width:736px){
		  .box_table td{ padding: 10px!important; }
	  }
	   </style>
   <script type="text/javascript" src="{{ asset('public/frontend/js/jquery-1.6.1.min.js') }}"></script>
	 <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
   <script type="text/javascript">
	   //init_reload();
	   $(document).ready(function (e) {
		   $("#btnSubmit").click(function(){
			  if(!fnValid()){
					return;
				}
				$("#spSubmit").html('Please Wait...');
			  var _token = $('input[name="_token"]').val();
			  
			  $.ajax({
				  url:"{!! route('save.trans') !!}",
				  method:"POST",
				  data:{
					  hd_title_selected:$('#hd_title_selected').val(),
					  titleother:$('#titleother').val(),
					  firstname:$("#firstname").val(),
					  lastname:$("#lastname").val(),
					  country:$("#country").val(),
					  tel:$("#tel").val(),
					  email:$('#email').val(),
					  bookat:$('#bookat').val(),
					  arrival_date1:$('#arrival_date1').val(),
					  flight_number:$('#flight_number').val(),
					  arrival_time1:$('#arrival_time1').val(),
					  departure_date1:$('#departure_date1').val(),
					  flight_number2:$('#flight_number2').val(),
					  departure_time1:$('#departure_time1').val(),
					  type1:$('#hdtype1').val(),
					  type2:$('#hdtype2').val(),
					  hdtotalall:$('#hdtotalall').val(),
					  time:'0',
					  _token:_token
				  },
				  success:function(data){
					   var parts = data.split("$");
					   //window.location.href="/trans-confirm/"+parts[0]+"/"+parts[1];
					   window.location.href="/onepay/"+parts[0]+"/"+parts[1];
				  }
			  });
				  
			});
			
		 });
		 
	   function fnSaveTrans(type) {
		   
		   if(!fnValid()){
				  return;
			  }
			 var _token = $('input[name="_token"]').val();
				$.ajax({
					url:"{!! route('save.trans') !!}",
					method:"POST",
					data:{
						hd_title_selected:$('#hd_title_selected').val(),
						titleother:$('#titleother').val(),
						firstname:$("#firstname").val(),
						lastname:$("#lastname").val(),
						country:$("#country").val(),
						tel:$("#tel").val(),
						email:$('#email').val(),
						bookat:$('#bookat').val(),
						arrival_date1:$('#arrival_date1').val(),
						flight_number:$('#flight_number').val(),
						arrival_time1:$('#arrival_time1').val(),
						departure_date1:$('#departure_date1').val(),
						flight_number2:$('#flight_number2').val(),
						departure_time1:$('#departure_time1').val(),
						type:type,
						_token:_token
					},
					success:function(data){
						 var parts = data.split("$");
						 ///onepay/{code1}/{code2}
						 window.location.href="/onepay/"+parts[0]+"/"+parts[1];
					}
				});
	   }
	   
	   function fnTitleSelected(v) {
		   $('#hd_title_selected').val(v.value);
	   }
	   
	   function fnHocham(){
		   var v=$('#hd_title_other').val();
		   if(v==0){
			   $('#txtOther').prop({"disabled": false});
			   $('input[name="vhocham"]').prop({"disabled": true,"checked": ""});
			   $('#hd_title_other').val(1);
			   $('#hdhocham').val('');
			   $('#txtOther').val('');
			   //$('input[name="vhocham"]').prop('required', "");
		   }else{
			   $('#txtOther').prop({"disabled": true});
			   $('input[name="vhocham"]').prop({"disabled": false, "required": "required","checked": ""});
			   $('#hdhocham').val('');
			   $('#txtOther').val('');
			   $('#hd_title_other').val(0);
			   //$('input[name="vhocham"]').prop('required', "required");
		   }
	   }
	   
	   function fnAddnew(){
		   var num=$('#addnew').val();
		   num++;
		   $('#addnew').val(num);
	   }
	   
	   function checkEmail(val) {
			  var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
			  if (pattern.test(val)) {
				  return true;
			  } else {
				  return false;
			  }
		  };
		
		function fnValid(){
			if($('#hd_title_selected').val()==''){
				alert('Please enter your title');
				$('#mr').focus();
				return false;
			}
			
			if($('#firstname').val()==''){
				alert('Please enter your first name');
				$('#firstname').focus();
				return false;
			}
			if($('#lastname').val()==''){
				alert('Please enter your last name');
				$('#lastname').focus();
				return false;
			}
			if($('#country').val()==''){
				alert('Please enter your country');
				$('#country').focus();
				return false;
			}
			if($('#tel').val()==''){
				alert('Please enter your phone');
				$('#tel').focus();
				return false;
			}
			if($('#email').val()==''){
				alert('Please enter your email');
				$('#email').focus();
				return false;
			}
			if (!checkEmail($('#email').val())) {
				  alert('Email format is incorrect');
				  $('#email').focus();
				  return false;
			}
			/*if($('#bookat').val()==''){
				alert('Please enter "Your hotel in Ha Long".');
				$('#bookat').focus();
				return false;
			}*/
			if($('#arrival_date1').val()==''){
				alert('Please select arrival date');
				$('#arrival_date1').focus();
				return false;
			}
			if($('#flight_number').val()==''){
				alert('Please enter flight number');
				$('#flight_number').focus();
				return false;
			}
			if($('#arrival_time1').val()==''){
				alert('Please select arrival time');
				$('#arrival_time1').focus();
				return false;
			}
			
			
			if($('#departure_date1').val()==''){
				alert('Please select arrival date');
				$('#departure_date1').focus();
				return false;
			}
			if($('#flight_number2').val()==''){
				alert('Please enter flight number');
				$('#flight_number2').focus();
				return false;
			}
			if($('#departure_time1').val()==''){
				alert('Please select arrival time');
				$('#departure_time1').focus();
				return false;
			}
			
			if($('#hdtotalall').val()=='0'){
				alert('Please select the transportation');
				$('#private_car_1').focus();
				return false;
			}
			
			/*if($('#departure_date1').val()==''){
				alert('Please select departure date');
				$('#departure_date1').focus();
				return;
			}
			if($('#flight_number2').val()==''){
				alert('Please enter flight number');
				$('#flight_number2').focus();
				return false;
			}
			*/
			return true;			
		}
		
		function fnTotal() {
			var sum = 0;var strv1 = '';var strv2 = 0;
			
			var str_flag1='';var str_flag2='';
			for (var i = 0; i < document.aspnetForm.private_car.length; i++) {
				   if (document.aspnetForm.private_car[i].checked == true) {
					   strvalue = document.aspnetForm.private_car[i].value;
					   str_flag1=strvalue.substr(0, 3);
					   strv1 = strvalue.substr(0, 3) + ",";
					   strv2 += Number(strvalue.substr(4, 7));
				   }
			 }
			
			var sum_2 = 0;var strv1_2_2 = '';var strv2_2 = 0;
			   
			 for (var j = 0; j < document.aspnetForm.private_car_2.length; j++) {
					  if (document.aspnetForm.private_car_2[j].checked == true) {
						  strvalue = document.aspnetForm.private_car_2[j].value;
						  str_flag2=strvalue.substr(0, 3);
						  strv1_2_2 += strvalue.substr(0, 3) + ",";
						  strv2_2 += Number(strvalue.substr(4, 7));
					  }
			}
			   
			   var service_charge=0;
			   var vat_1=0;
			   var transaction_fee=0;
			   var total_amount_payable=0;
			   sum=Number(strv2)+Number(strv2_2);    
			   service_charge=sum * 5 / 100;
			   vat_1=(sum + (sum * 5) / 100) * 10 / 100;
			   transaction_fee=(sum+service_charge+vat_1)*6/100;
			   total_amount_payable=sum+service_charge+vat_1+transaction_fee;
			   
			   
				 //const formattedAmount = 'US$'+sum+'.00';
				 // Định dạng số tiền với ký hiệu tiền tệ mặc định
				 let formattedAmount = (Number(sum).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })).replace('₫', '')+' VND';
				 
				 let formattedService = (Number(service_charge).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })).replace('₫', '')+' VND';
				 
				 let formattedVAT = (Number(vat_1).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })).replace('₫', '')+' VND';
				 
				 let formattedTrans = (Number(transaction_fee).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })).replace('₫', '')+' VND';
				 
				 let formattedTotalAmount = (Number(total_amount_payable).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })).replace('₫', '')+' VND';
				 
				 // Thay thế ký hiệu ₫ bằng VND và đặt nó trước số tiền
				 //formattedAmount = formattedAmount.replace('₫', '');
				 //formattedAmount = formattedAmount.trim()+' VND';
				 
				 $('#hdtype1').val(strv1);
				 $('#hdtype2').val(strv1_2_2);
				 $('#hdtotalall').val(total_amount_payable);
				 $('#sptotal').html(formattedAmount);
				 $('#service_charge').html(formattedService);
				 $('#vat_1').html(formattedVAT);
				 $('#transaction_fee').html(formattedTrans);
				 $('#total_amount_payable').html(formattedTotalAmount);
		}
		
		function formatCurrency(number, locale, currency) {
			 return new Intl.NumberFormat(locale, {
			   style: 'currency',
			   currency: currency,
			 }).format(number);
		   }
		
		   
		   function init_reload(){
			   setInterval( function() {
						  fnReservedLoad();
				 },300);
		   }
		   
		   function fnReservedLoad() {
					var _token = $('input[name="_token"]').val();
					   $.ajax({
						   url:"{!! route('reserve.load') !!}",
						   method:"POST",
						   data:{
							   id:1,
							   _token:_token
						   },
						   success:function(data){
								var parts = data.split("$");
								$('#sp_1').html(parts[0]);
								$('#sp_2').html(parts[1]);
								$('#sp_3').html(parts[2]);
								$('#sp_4').html(parts[3]);
								$('#sp_5').html(parts[4]);
								$('#sp_6').html(parts[5]);
								$('#sp_7').html(parts[6]);
								$('#sp_8').html(parts[7]);
								$('#sp_9').html(parts[8]);
								$('#sp_10').html(parts[9]);
								$('#sp_11').html(parts[10]);
								$('#sp_12').html(parts[11]);
								$('#sp_13').html(parts[12]);
								$('#sp_14').html(parts[13]);
								$('#sp_15').html(parts[14]);
								$('#sp_16').html(parts[15]);
								$('#sp_17').html(parts[16]);
								$('#sp_18').html(parts[17]);
						   }
					   });
			  }
   </script>
</head>
<body>
	<form id="aspnetForm" name="aspnetForm" action="/" method="post" >
	{{ csrf_field() }}
	<!--<div class="fixedtop" style="width:100%;min-height: 40px;position: fixed;z-index: 9999999;bottom: 0px;background: turquoise;line-height: 40px;">
			<p style="text-align: center;"><b>Email:</b> <a href="mailto:info@hoabinh-group.com">info@hoabinh-group.com</a> | <b>Whatsapp/Viber/Zalo:</b> +84 98 98 98 198 / +84 913 311 911</p>
		</div>-->
	<div class="wapper">
	<div class="container" style="background: url(https://nolta2024.websitehoinghi.com/img/bg-opacity.png) repeat top left;">
		<p style="text-align: center;margin:0px;padding: 0px;">&nbsp;</p>
		<h1 style="text-align: center;margin-bottom: 5px;"><b>NOLTA2024</b></h1>
		<p style="text-align: center;margin-bottom: 5px;"><i>Dec. 3-6, 2024 at Ha long Bay, Vietnam</i></p>
		<div class="boxvietnamvisa center">
			transportation
		</div>
		<p style="text-align: center;font-size: 18px;">Services are provided by Hoa Binh Event company<br/>
		<img style="max-width:100%;width:300px;" alt="logo HBG" src="https://nolta2024.websitehoinghi.com/img/logo-xanh.png">
		</p>
	</div>
	<div class="container" style="background: url(https://nolta2024.websitehoinghi.com/img/bg-opacity.png) repeat top left;">
		<!--<div>
				<div class="headtext"><div style="font-size: 2.5rem;text-transform: uppercase;">Airport Transfer</div></div>
				<div style="width:100%;border-bottom: solid 1px #ccc;height: 1px;"></div>
				<div style="width:100%;height:40px;clear: both;margin-bottom: 10px;"></div>
			</div>-->
		<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div><b>PASSENGER INFORMATION</b> <i>(Please fill in blanks below)</i></div>
			<p style="margin: 0px;padding: 0px;">&nbsp;</p>
		</div>
		</div>
		<div class="box_passenger">
			
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<label for="mr" style="margin-right: 20px;">Title <span class="red">*</span>: </label>
					<label style="margin-right: 10px;"><input onclick="fnTitleSelected(this)" type="radio" name="title" id="mr" value="Mr." /> Mr.</label>
					<label style="margin-right: 10px;"><input onclick="fnTitleSelected(this)" type="radio" name="title" id="ms" value="Ms." /> Ms.</label>
					<!--<label style="margin-right: 10px;"><input onclick="fnTitleSelected(this)" type="radio" name="title" id="mrs" value="Mrs." /> Mrs.</label>
						<label style="margin-right: 10px;"><input onclick="fnTitleSelected(this)" type="radio" name="title" id="dr" value="Dr." /> Dr.</label>
						<label style="margin-right: 10px;"><input onclick="fnTitleSelected(this)" type="radio" name="title" id="prof" value="Prof." /> Prof.</label>
						<label><input type="radio" name="title" onclick="fnTitleSelected(this)" id="other" value="Other." /> Other.</label>
						<label><input style="width:80px" type="text" class="form-control" name="titleother" id="titleother" value="" /></label>-->
				</div>
				<input type="hidden" name="hd_title_selected" id="hd_title_selected" value="" />
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<label for="firstname">First name <span class="red">*</span>:</label>
						<input type="text" class="form-control" name="firstname" id="firstname" value="" />
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<label for="lastname">Last name <span class="red">*</span>:</label>
						<input type="text" class="form-control" name="lastname" id="lastname" value="" />
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<label for="country">Country <span class="red">*</span>:</label>
						<input type="text" class="form-control" name="country" id="country" value="" />
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<label for="tel">Mobile No. <span class="red">*</span>:</label>
						<input type="text" class="form-control" name="tel" id="tel" value="" />
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<label for="email">Email <span class="red">*</span>:</label>
						<input type="text" class="form-control" name="email" id="email" value="" />
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<label for="bookat">Your hotel in Ha Long:</label>
						<input type="text" class="form-control" name="bookat" id="bookat" value="" />
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<label for="arrival_date1"><b>FLIGHT INFORMATION</b> :</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<label for="arrival_date1">Arrival date <span class="red">*</span>:</label>
						<input type="date" class="form-control" name="arrival_date1" id="arrival_date1" value="" />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<label for="flight_number">Flight number <span class="red">*</span>:</label><input type="text" class="form-control" name="flight_number" id="flight_number" value="" />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<label for="arrival_time1">Arrival time <span class="red">*</span>:</label>
						<input type="time" class="form-control" name="arrival_time1" id="arrival_time1" value="" />
					</div>
				</div>
				<!--<input type="hidden" class="form-control" name="departure_date1" id="departure_date1" value="NO" />
					<input type="hidden" class="form-control" name="flight_number2" id="flight_number2" value="NO" />
					<input type="hidden" class="form-control" name="departure_time1" id="departure_time1" value="NO" />-->
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<label for="departure_date1">Departure date <span class="red">*</span>:</label>
						<input type="date" class="form-control" name="departure_date1" id="departure_date1" value="" />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<label for="flight_number2">Flight number <span class="red">*</span>:</label><input type="text" class="form-control" name="flight_number2" id="flight_number2" value="" />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<label for="departure_time1">Departure time <span class="red">*</span>:</label>
						<input type="time" class="form-control" name="departure_time1" id="departure_time1" value="" />
					</div>
				</div>
		</div>
		<!--<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<p><a onclick="fnAddnew()" href="javascript:void(0);">Add New</a></p>
				<input type="hidden" name="addnew" id="addnew" value="1" />
				<p><i>Note: If registering for multiple people, you must fill in the complete information just like when registering for one person.</i></p>
			</div>
			</div>-->
		<p>&nbsp;</p>
		<p><b style="text-transform: uppercase;font-size: 20px;">AIRPORT TRANSFER SERVICE</b></p>
		<!--<p><b style="color:#212529;">I.  Private Car for airport pick-up.</b></p>-->
		<div style="overflow-x:auto;">
		<table style="width: 100%;" border="1">
		  <tr style="background: #04245d;color:#fff;font-weight: bold;">
		  <td>
		  <strong>Schedule</strong>
		  </td>
		  <td style="width:24%;">
		  <strong>Type of car</strong>
		  </td>
		  <td style="width:15%;">
		  <strong>Price</strong>
		  </td>
		  <td style="width:12%;">
			  <strong>Reserved</strong>
		  </td>
		  <td style="width:12%;">
		  <strong>Selection</strong>
		  </td>
		  </tr>
		<tr>
			<td rowspan="3">
			<strong>PRIVATE CAR<br/>Noi Bai Airport to Ha Long City</strong>
			</td>
			<td>
			4 seat Car<br/>
			(Maximum 2 passengers)
			</td>
			<td>
			<b>2.500.000++</b><br/>VND/car/way
			</td>
			<td>
			<b class="red"><span id="sp_1">0</span></b>
			</td>
			<td>
			<input type="radio" name="private_car" id="private_car_1" value="1_1,2500000" onclick="fnTotal()" />
			</td>
			</tr>
			<tr>
			<td>
			7 seat Car<br/>
			(Maximum 4 passengers)
			</td>
			<td>
			<b>3.000.000++</b><br/>VND/car/way
			</td>
			<td>
			<b class="red"><span id="sp_2">0</span></b>
			</td>
			<td>
			<input type="radio" name="private_car" id="private_car_22" value="1_2,3000000" onclick="fnTotal()" />
			</td>
			</tr>
			<tr>
			<td>
			16 seat Car<br/>
			(Maximum 9 passengers)
			</td>
			<td>
			<b>3.500.000++</b><br/>VND/car/way
			</td>
			<td>
			<b class="red"><span id="sp_3">0</span></b>
			</td>
			<td>
			<input type="radio" name="private_car" id="private_car_3" value="1_3,3500000" onclick="fnTotal()" />
			</td>
			</tr>
		<tr>
			<td rowspan="6" style="text-align: justify;">
				<p style="text-align: center;"><strong>SHUTTLE BUS<br/>Noi Bai Airport to Saigon Halong Hotel</strong></p>
					<span style="font-size: 13px;"><i><span style="color:red;">*</span> Important Notes: <br/>
					Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br/>
					>>    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br/>
					>>    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br/>
					Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br/>
					Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
				</i></span>
			</td>
			<td>
				December 01, 2024<br/>
				<b>Departure time: 02:30</b><br/>
				Estimated arrival time: <br/>05:30
			  </td>
			<td><b>450.000++</b><br/>VND/car/way</td>
			<td><b class="red"><span id="sp_4">0</span></b> </td>
			<td>
				<input type="radio" name="private_car" id="private_car_4" value="1_4,0450000" onclick="fnTotal()" />
			</td>
		</tr>
		<tr>
			<td>December 01, 2024<br/>
				<b>Departure time: 17:00</b><br/>
				  Estimated arrival time: <br/>20:00
			  </td>
				  <td><b>450.000++</b><br/>VND/car/way</td>
			<td><b class="red"><span id="sp_5">0</span></b> </td>
			<td>
				<input type="radio" name="private_car" id="private_car114" value="114,0450000" onclick="fnTotal()" />
			</td>
		</tr>
		<tr>
			<td>December 01, 2024<br/>
				<b>Departure time: 23:00</b><br/>
				  Estimated arrival time: <br/>02:00 - December 02, 2024
			  </td>
				  <td><b>450.000++</b><br/>VND/car/way</td>
			<td><b class="red"><span id="sp_5">0</span></b> </td>
			<td>
				<input type="radio" name="private_car" id="private_car_5" value="1_5,0450000" onclick="fnTotal()" />
			</td>
		</tr>
		<tr>
			<td>December 02, 2024<br/>
				  <b>Departure time: 02:30</b><br/>Estimated arrival time:<br/>05:30</td>
			<td><b>450.000++</b><br/>VND/car/way</td>
			<td><b class="red"><span id="sp_7">0</span></b> </td>
			<td>
				<input type="radio" name="private_car" id="private_car_7" value="1_7,0450000" onclick="fnTotal()" />
			</td>
		</tr>
		<tr>
			<td>December 02, 2024<br/>
				  <b>Departure time: 17:00</b><br/>Estimated arrival time:<br/>20:00</td>
				  <td><b>450.000++</b><br/>VND/car/way</td>
			<td><b class="red"><span id="sp_6">0</span></b> </td>
			<td>
				<input type="radio" name="private_car" id="private_car_6" value="1_6,0450000" onclick="fnTotal()" />
			</td>
		</tr>
		
		<tr>
			<td>December 02, 2024<br/>
				  <b>Departure time: 23:00</b><br/>Estimated arrival time:<br/>02:00 - December 03, 2024</td>
			<td><b>450.000++</b><br/>VND/car/way</td>
			<td><b class="red"><span id="sp_7">0</span></b> </td>
			<td>
				<input type="radio" name="private_car" id="private_car17" value="117,0450000" onclick="fnTotal()" />
			</td>
		</tr>
		</table>
		</div>
		<p>&nbsp;</p>
		<div style="overflow-x:auto;">
		<table style="width: 100%;" border="1">
		  <tr style="background: #04245d;color:#fff;font-weight: bold;">
			<td>
			<strong>Schedule</strong>
			</td>
			<td style="width:24%;">
			<strong>Type of car</strong>
			</td>
			<td style="width:15%;">
			<strong>Rate</strong>
			</td>
			<td style="width:12%;">
				<strong>Reserved</strong>
			</td>
			<td style="width:12%;">
			<strong>Selection</strong>
			</td>
			</tr>
		<tr>
			<td rowspan="3">
			<strong>PRIVATE CAR<br/>Ha Long City to Noi Bai Airport</strong>
			</td>
			<td>
			4 seat Car<br/>
			(Maximum 2 passengers)
			</td>
			<td>
			<b>2.500.000++</b><br/>VND/car/way
			</td>
			<td>
			<b class="red"><span id="sp_10">0</span></b>
			</td>
			<td>
			<input type="radio" name="private_car_2" id="private_car_2_1" value="2_1,2500000" onclick="fnTotal()"  />
			</td>
			</tr>
			<tr>
			<td>
			7 seat Car<br/>
			(Maximum 4 passengers)
			</td>
			<td>
			<b>3.000.000++</b><br/>VND/car/way
			</td>
			<td>
			<b class="red"><span id="sp_11">0</span></b>
			</td>
			<td>
			<input type="radio" name="private_car_2" id="private_car_2_2" value="2_2,3000000" onclick="fnTotal()" />
			</td>
			</tr>
			<tr>
			<td>
			16 seat Car<br/>
			(Maximum 9 passengers)
			</td>
			<td>
			<b>3.500.000++</b><br/>VND/car/way
			</td>
			<td>
			<b class="red"><span id="sp_12">0</span></b>
			</td>
			<td>
			<input type="radio" name="private_car_2" id="private_car_2_3" value="2_3,3500000" onclick="fnTotal()" />
			</td>
			</tr>
		<tr>
			<td rowspan="4" style="text-align: justify;">
				<p style="text-align: center;"><strong>SHUTTLE BUS<br/>Saigon Halong Hotel to Noi Bai Airport</strong></p>
					<span style="font-size: 13px;"><i><span style="color:red;">*</span>
					Important Notes: <br/>
					Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br/>
					>>    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br/>
					>>    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br/>
					Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br/>
					
					Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus

				</i></span>
			</td>
			<td>December 06, 2024<br/>
				  <b>Departure time: 13:00</b><br/>Estimated arrival time: <br/>16:30</td>
			<td><b>450.000++</b><br/> VND/seat/way</td>
			<td><b class="red"><span id="sp_13">0</span></b> </td>
			<td>
				<input type="radio" name="private_car_2" id="private_car_2_4" value="2_4,0450000" onclick="fnTotal()" />
			</td>
		</tr>
		<tr>
			<td>December 06, 2024<br/>
				  <b>Departure time: 18:00</b><br/>Estimated arrival time: <br/>21:30</td>
				  <td><b>450.000++</b><br/>VND/seat/way</td>
			<td><b class="red"><span id="sp_14">0</span></b> </td>
			<td>
				<input type="radio" name="private_car_2" id="private_car_2_5" value="2_5,0450000" onclick="fnTotal()" />
			</td>
		</tr>
		<tr>
			<td>December 07, 2024<br/>
				  <b>Departure time: 13:00</b><br/>Estimated arrival time: <br/>16:30</td>
				  <td><b>450.000++</b><br/>VND/seat/way</td>
			<td><b class="red"><span id="sp_15">0</span></b> </td>
			<td>
				<input type="radio" name="private_car_2" id="private_car_2_6" value="2_6,0450000" onclick="fnTotal()" />
			</td>
		</tr>
		<tr>
			<td>December 07, 2024<br/>
				  <b>Departure time: 18:00</b><br/>Estimated arrival time: <br/>21:30</td>
			<td><b>450.000++</b><br/>VND/seat/way</td>
			<td><b class="red"><span id="sp_16">0</span></b> </td>
			<td>
				<input type="radio" name="private_car_2" id="private_car_2_7" value="2_7,0450000" onclick="fnTotal()" />
			</td>
		</tr>
		<tr>
			<td colspan="5" style="vertical-align: top;text-align: left;padding: 0px!important;">
				<style type="text/css">
					.totalmain td{ height: auto!important;background-color: #04245d;color: #fff; }
					.totalmain td:nth-child(1){ text-align: right;padding-right: 15px; }
					.totalmain td:nth-child(2){ text-align: left;width: 24%; }
				</style>
				<div class="totalmain">
					<table width="100%" border="1">
					<tbody>
					<tr>
					<td>
					<strong>Sub-Total</strong>
					</td>
					<td>
					<strong><span style="font-weight: bold;color:red;" id="sptotal">0 VND</span></strong>
					</td>
					</tr>
					<tr>
					<td>
					<strong>5% Service charge</strong>
					</td>
					<td>
					<strong id="service_charge">0 VND</strong>
					</td>
					</tr>
					<tr>
					<td>
					<strong>10% VAT</strong>
					</td>
					<td>
					<strong id="vat_1">0 VND</strong>
					</td>
					</tr>
					<tr>
					<td>
					<strong>6% of the transaction fee</strong>
					</td>
					<td>
					<strong id="transaction_fee">0 VND</strong>
					</td>
					</tr>
					<tr>
					<td>
					<strong>TOTAL AMOUNT PAYABLE </strong>
					</td>
					<td>
					<strong id="total_amount_payable">0 VND</strong>
					</td>
					</tr>
					</tbody>
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: right;">
					<!--<b>TOTAL COST: </b>
						<span style="font-weight: bold;color:red;" id="sptotal">0 VND</span>-->
					<input type="hidden" id="hdtype1" name="hdtype1" value="" />
					<input type="hidden" id="hdtype2" name="hdtype2" value="" />
					<input type="hidden" id="hdtotal1" name="hdtotal1" value="0" />
					<input type="hidden" id="hdtotal2" name="hdtotal2" value="0" />
					<input type="hidden" id="hdtotalall" name="hdtotalall" value="0" />
			</td>
			<td colspan="2" style="text-align: center;vertical-align: middle;">
			<span id="spSubmit">
				<input style="margin: 0px;" type="button" id="btnSubmit" name="btnSubmit" value="BOOK NOW" class="btn btn-primary" />
			</span>
			</td>
		</tr>
		
		</table>
		</div>
		<p>&nbsp;</p>
<p>&nbsp;</p>

<div style="background-color: #04245d;color:#fff;text-align: left;padding-left: 25px;border-radius: 10px;padding-right: 15px;">
	<p>&nbsp;</p>
	<p><b style="text-transform: uppercase;">Useful Information:</b></p>
	<p style="text-align: justify;">- Distance from Noi Bai Airport to Ha Long City (or vice versa): 175km. Travel time: approximately 3 hours.</p>
	<p style="text-align: justify;">- All rates above include 01 bottle of mineral water/person/way, and exclude 5% service charge and 10% VAT.</p>
	<p style="text-align: justify;">- For passenger book shuttle bus:</p>
	<p style="text-align: justify;">•	Pick up: The staff holding the card bearing "NOLTA 2024" will wait at column number 15, outside arrival hall A2. Please come at least 20 minutes before your bus departure time.</p>
	<p style="text-align: justify;">•	Drop off: The staff holding the card bearing "NOLTA 2024" will wait at Saigon Halong Hotel’s Lobby. Please come at least 20 minutes before your bus departure time.</p>
	<p style="text-align: justify;">- For urgent help with booking issues or additional directions, please feel free to contact Ms. Vicky at:</p>
	<p style="text-align: justify;">Mobile/WhatsApp: +84 913 631 936 | Email: vicky@hoabinhtourist.com</p>
	<p>&nbsp;</p>
</div>

		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</div>
</div>
	</form>
</body>
</html>
