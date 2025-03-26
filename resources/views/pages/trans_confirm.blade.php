<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/x-icon" href="{{ asset('public/frontend/images/icon.ico') }}">
   <title>NOLTA 2024</title>
   <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}" />
	  <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}" />
   <style type="text/css">
	   .wapper h1{ margin: 0px;padding: 0px;text-align: center; }
	   .wapper input{ margin-bottom: 15px; }
	   .red{ color: red; }
	   .headtext{ background: #fff;margin: 0 auto;width: 490px;text-align: center;position: relative;z-index: 999999;bottom: -54px;display: block;padding: 10px;max-width: 100%; }
	   
   </style>
   <script type="text/javascript" src="{{ asset('public/frontend/js/jquery-1.6.1.min.js') }}"></script>
	  <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
   <style type="text/css">
	   .boxvietnamvisa{
		   background: dodgerblue;
		   color: #fff;
		   font-size: 60px;
		   font-weight: bold;
		   margin-top: 15px;
		   margin-bottom: 15px;
		   text-transform: uppercase;
	   }
	   .center {
		   text-align: center;
	   }
   </style>
</head>
<body>
	<?php
	$firstname="";
	$lastname="";
	$registration_type="";
	$email="";
	$sspage1=Session::get('sspage1');
	if(isset($sspage1)){
		$str=explode("$", $sspage1);
		$firstname=$str[0];
		$lastname=$str[1];
		$registration_type=$str[2];
		$email=$str[3];
	}
	?>
<div class="wapper">
	<div class="container" style="background: url(https://nolta2024.websitehoinghi.com/img/bg-opacity.png) repeat top left;">
		<p style="text-align: center;margin:0px;padding: 0px;">&nbsp;</p>
		<h1 style="text-align: center;margin-bottom: 5px;"><b>NOLTA2024</b></h1>
		<p style="text-align: center;margin-bottom: 5px;"><i>Dec. 3-6, 2024 at Ha long Bay, Vietnam</i></p>
		<div class="boxvietnamvisa center">
			transportation
		</div>
		<p style="text-align: center;font-size: 18px;">Services are provided by Hoa Binh Event company<br>
		<img style="max-width:100%;width:300px;" alt="logo HBG" src="https://nolta2024.websitehoinghi.com/img/logo-xanh.png">
		</p>
	</div>
	<div class="container" style="background: url(https://nolta2024.websitehoinghi.com/img/bg-opacity.png) repeat top left;">
			@if($booking->tnx=='')
			<p style="text-align: center;"><b>Thank you, your request is received well.</b></p>
			<p style="text-align: center;">You will be receiving an email shortly for confirmation.</p>
			<p style="text-align: center;">Please check your Spam/Junk folder and whitelist our email to ensure you receive our confirmation.</p>
			<p style="text-align: center;">If you require additional assistance, please contact us at <a href="mailto:vicky@hoabinhtourist.com">vicky@hoabinhtourist.com </a></p>
			@else
				@if($booking->tnx=='99')
				<p style="text-align: center;"><b>YOUR PAYMENT HAS BEEN CANCELLED</b></p>
				<p style="text-align: center;">Your request has been forwarded to Hoa Binh Group for further processing.<br/>If you encounter any issues during the payment process or require assistance, please do not hesitate to contact us at:<br/>
				Email: <a href="mailto:vicky@hoabinhtourist.com">vicky@hoabinhtourist.com</a> | WhatsApp No.: +84 913 631 936<br/>
				We are here to help and ensure a smooth experience for you.</p>
				@elseif($booking->tnx=='0')
				<p style="text-align: center;"><b>THANK YOU, YOUR TRANSACTION HAS BEEN SUCCESSFULLY PROCESSED.</b><br/>
				You will receive a confirmation email shortly with the details of your booking.<br/>
				If you require additional assistance, please get in touch with us at:<br/>
				Email: <a href="mailto:vicky@hoabinhtourist.com">vicky@hoabinhtourist.com</a> | WhatsApp No.: +84 913 631 936<br/>
				We are here to help and ensure a smooth experience for you.</p>
				@else
				<p style="text-align: center;"><b>UNFORTUNATELY, YOUR PAYMENT HAS FAILED.</b><br/>
				Your request has been forwarded to Hoa Binh Group for further processing.<br/>
				If you encounter any issues during the payment process or require assistance, please do not hesitate to contact us at:<br/>
				Email: <a href="mailto:vicky@hoabinhtourist.com ">vicky@hoabinhtourist.com</a> | WhatsApp No.: +84 913 631 936<br/>
				We are here to help and ensure a smooth experience for you.</p>
				@endif
			@endif
		
		
		
		
		
		
		
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
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

</body>
</html>