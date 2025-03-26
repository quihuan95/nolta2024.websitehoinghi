<div style='width:100%;height:auto;margin:0 auto;'>
<p style='text-align:justify;'>Dear <strong>{{ $fullname }}</strong> </p>

<p style='text-align:justify;margin-top: 25px;'>Thank you for booking with Hoa Binh Group. Here are the details of your order.<br/><strong>1. PASSENGER INFORMATION</strong><br/>
Fullname: {{ $fullname }}<br/>
Country: {{$country}}<br/>
Mobile No: {{$tel}}<br/>
Email: {{$email}}<br/>
Your hotel in Ha Long: {{$i_would_like}}
</p>

<p style='text-align:justify;margin-top: 25px;margin-bottom: 0px;'><strong>2. FLIGHT INFORMATION :</strong></p>
<table style="width: 100%;border-collapse: collapse;" border="1">
	<tr>
		<td style="background: #04245d;color:#fff;font-weight: bold;padding: 5px;">Arrival date:</td>
		<td style="padding: 5px;color:#000;">{{$arrival_date1}}</td>
		<td style="background: #04245d;color:#fff;font-weight: bold;padding: 5px;">Flight number:</td>
		<td style="padding: 5px;color:#000;">{{$flight_number}}</td>
		<td style="background: #04245d;color:#fff;font-weight: bold;padding: 5px;">Arrival time:</td>
		<td style="padding: 5px;color:#000;">{{$arrival_time1}}</td>
	</tr>
	<tr>
		<td style="background: #04245d;color:#fff;font-weight: bold;padding: 5px;">Departure date:</td>
		<td style="padding: 5px;color:#000;">{{$departure_date1}}</td>
		<td style="background: #04245d;color:#fff;font-weight: bold;padding: 5px;">Flight number:</td>
		<td style="padding: 5px;color:#000;">{{$flight_number2}}</td>
		<td style="background: #04245d;color:#fff;font-weight: bold;padding: 5px;">Departure time:</td>
		<td style="padding: 5px;color:#000;">{{$departure_time1}}</td>
	</tr>
</table>

<p style='text-align:justify;margin-top: 25px;margin-bottom: 0px;'><strong>3. AIRPORT TRANSFER SERVICE:</strong></p>
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
<p style='text-align:justify;margin-top: 25px;'><strong>4. FEE & PAYMENT:</strong><br/>
Total payment: <b style="color:red;"><?php echo number_format($hdtotalall); ?> VND</b><br/>
Payment status: <b style="color:red;">{{ $payment_status }}</b></p>

<p style='text-align:justify;margin-top: 25px;'>
If you require additional assistance, please get in touch with us at:<br/>
Email: vicky@hoabinhtourist.com | WhatsApp No.: +84 913 631 936
</p>

<p style='text-align:justify;margin-top: 25px;'>
Kind regards,<br/>
<b>Hoa Binh Group</b>
</p>
 
</div>