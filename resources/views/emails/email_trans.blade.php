<div style='width:100%;height:auto;margin:0 auto;'>
<p style='text-align:justify;'>Dear <strong>{{$title}} {{$fullname}}</strong> </p>

<p style='text-align:justify;margin-top: 25px;'>Thank you for booking with Hoa Binh Group. Here are the details of your order.</p>
<p style='text-align:justify;margin-top: 25px;'><strong>PASSENGER INFORMATION :</strong></p>
<p style='text-align:justify;'>Full name: {{$fullname}}</p>
<p style='text-align:justify;'>Country: {{$country}}</p>
<p style='text-align:justify;'>Mobile No.: {{$tel}}</p>
<p style='text-align:justify;'>Email: {{$email}}</p>

<p style='text-align:justify;margin-top: 25px;'><strong>FLIGHT INFORMATION :</strong></p>
@if($type!='')
<?php
	$strCar=App\Models\Common::fnTransport($type);
	echo $strCar;
?>
@endif

@if($hdtype2!='')
<p style="margin: 0px;padding: 0px;">&nbsp;</p>
<?php
	$strCar2=App\Models\Common::fnTransport($hdtype2);
	echo $strCar2;
?>
@endif

<p style='text-align:justify;margin-top: 25px;'><strong>FEE & PAYMENT:</strong></p>

<p style='text-align:justify;'>Total payment: <b style="color:red;"><?php echo number_format($hdtotalall); ?> VND</b><br/>
Payment status: {{ $res }}
</p>

<p style='text-align:justify;margin-top: 25px;'>
If you require additional assistance, please get in touch with us at:<br/>
Email: vicky@hoabinhtourist.com | WhatsApp No.: +84 913 631 936
</p>

<p style='text-align:justify;margin-top: 25px;'>
Kind regards,
</p>
<p style='text-align:justify;'>
<b>Hoa Binh Group</b>
</p>
 
</div>