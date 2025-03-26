<div style="width:100%;height:100%;position: absolute;z-index: 99999;background-color: #fff;">
	<p style="text-align: center;">
		<img alt="loading..." src="{{ asset('public/frontend/css/images/load.gif') }}" style="width:200px;padding-top: 100px;max-width:100%;" />
	</p>
</div>

<script type="text/javascript">
	window.onload = function()
	{
		document.getElementById("frmForm").submit();
	};
</script>
<form role="form" id="frmForm" name="frmForm" method="post" action="{!! route('payment.onpey.post') !!}" enctype="multipart/form-data">
 {{ csrf_field() }}
 <div class="form-group">
	 <div class="col-md-12 col-sm-12 col-xs-12">
		  <input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="code1" name="code1" value="{!! $data_acc->code1 !!}" placeholder="">
		  <input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="code2" name="code2" value="{!! $data_acc->code2 !!}" placeholder="">
	  </div>
	 <div class="col-md-12 col-sm-12 col-xs-12">
		 <input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="fee" name="fee" value="{!! $data_acc->hdtotalall !!}" placeholder="">
	 </div>
	 <div class="col-md-12 col-sm-12 col-xs-12">
		  <input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="Title" name="Title" value="VPC 3-Party" placeholder="">
	  </div>
	  <div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="virtualPaymentClientURL" name="virtualPaymentClientURL" value="https://onepay.vn/vpcpay/vpcpay.op" placeholder="">
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_ReturnURL" name="vpc_ReturnURL" value="https://nolta2024.websitehoinghi.com/airport-transfer/dr" placeholder="">
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_Version" name="vpc_Version" value="2" placeholder="">
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_Command" name="vpc_Command" value="pay" placeholder="">
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_Locale" name="vpc_Locale" value="en" placeholder="">
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_TicketNo" name="vpc_TicketNo" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" placeholder="">
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_SHIP_Street01" name="vpc_SHIP_Street01" value="39A Ngo Quyen" placeholder="">
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_SHIP_Provice" name="vpc_SHIP_Provice" value="Hoan Kiem" placeholder="">
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_SHIP_City" name="vpc_SHIP_City" value="Ha Noi" placeholder="">
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_SHIP_Country" name="vpc_SHIP_Country" value="Viet Nam" placeholder="">
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_Customer_Phone" name="vpc_Customer_Phone" value="0988542856" placeholder="">
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" style="margin-bottom: 10px;" required="" id="vpc_Customer_Email" name="vpc_Customer_Email" value="webmaster@hoabinhtourist.com" placeholder="">
		</div>
		<button style="background-color:#034693;padding: 10px 40px;" type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary">
			  <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit
		   </button>
 </div>
 
</form>