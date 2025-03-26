<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
use Request;

class Common extends Model
{
	public static function fnTransport($val)
	{
		$str = '';
		if ($val == '1_1,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
			  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Schedule</strong>
			  </td>
			  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Type of car</strong>
			  </td>
			  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Rate</strong>
			  </td>
			  </tr>
			<tr>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <strong>PRIVATE CAR<br/>Noi Bai Airport to Ha Long City</strong>
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  4 seat Car<br>
			  (Maximum 2 passengers)
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <b>2.500.000++</b><br>VND/car/way
			  </td>
			  </tr>
			</tbody></table>';
		} elseif ($val == '1_2,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
			  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Schedule</strong>
			  </td>
			  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Type of car</strong>
			  </td>
			  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Rate</strong>
			  </td>
			  </tr>
			<tr>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <strong>PRIVATE CAR<br/>Noi Bai Airport to Ha Long City</strong>
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  7 seat Car<br>
			  (Maximum 4 passengers)
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <b>3.000.000++</b><br>VND/car/way
			  </td>
			  </tr>
			</tbody></table>';
		} elseif ($val == '1_3,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
			  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Schedule</strong>
			  </td>
			  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Type of car</strong>
			  </td>
			  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Rate</strong>
			  </td>
			  </tr>
			<tr>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <strong>PRIVATE CAR<br/>Noi Bai Airport to Ha Long City</strong>
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  16 seat Car<br>
			  (Maximum 9 passengers)
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <b>3.500.000++</b><br>VND/car/way
			  </td>
			  </tr>
			</tbody></table>';
		} elseif ($val == '1_4,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
				  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
				  <td style="padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Schedule</strong>
				  </td>
				  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Type of car</strong>
				  </td>
				  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Rate</strong>
				  </td>
				  </tr>
			<tr>
				  <td style="text-align: justify;padding:5px;">
					<p style="text-align: center;"><strong>SHUTTLE BUS<br>Noi Bai Airport to Saigon Halong Hotel</strong></p>
						<span style="font-size: 13px;"><i><span style="color:red;">*</span> Important Notes: <br>
						Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br>
						&gt;&gt;    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br>
						&gt;&gt;    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br>
						Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br>
						Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
					</i></span>
				  </td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;">December 01, 2024<br>
				  <b>Departure time: 16:00</b><br>
						Estimated arrival time: 19:00
					</td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;"><b>450.000++</b><br>VND/car/way</td>
				</tr>
				</tbody></table>';
		} elseif ($val == '114,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
				  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
				  <td style="padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Schedule</strong>
				  </td>
				  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Type of car</strong>
				  </td>
				  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Rate</strong>
				  </td>
				  </tr>
			<tr>
				  <td style="text-align: justify;padding:5px;">
					<p style="text-align: center;"><strong>SHUTTLE BUS<br>Noi Bai Airport to Saigon Halong Hotel</strong></p>
						<span style="font-size: 13px;"><i><span style="color:red;">*</span> Important Notes: <br>
						Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br>
						&gt;&gt;    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br>
						&gt;&gt;    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br>
						Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br>
						Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
					</i></span>
				  </td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;">December 01, 2024<br>
				  <b>Departure time: 24:00</b><br>
						Estimated arrival time: 03:00, Dec. 02
					</td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;"><b>450.000++</b><br>VND/car/way</td>
				</tr>
				</tbody></table>';
		} elseif ($val == '1_5,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
				  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
				  <td style="padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Schedule</strong>
				  </td>
				  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Type of car</strong>
				  </td>
				  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Rate</strong>
				  </td>
				  </tr>
			<tr>
				  <td style="text-align: justify;padding:5px;">
					<p style="text-align: center;"><strong>SHUTTLE BUS<br>Noi Bai Airport to Saigon Halong Hotel</strong></p>
						<span style="font-size: 13px;"><i><span style="color:red;">*</span> Important Notes: <br>
						Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br>
						&gt;&gt;    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br>
						&gt;&gt;    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br>
						Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br>
						Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
					</i></span>
				  </td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;">December 02, 2024<br>
				  <b>Departure time: 01:30</b><br>
					Estimated arrival time: 04:30
					</td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;"><b>450.000++</b><br>VND/car/way</td>
				</tr>
				</tbody></table>';
		} elseif ($val == '1_7,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
				  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
				  <td style="padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Schedule</strong>
				  </td>
				  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Type of car</strong>
				  </td>
				  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Rate</strong>
				  </td>
				  </tr>
			<tr>
				  <td style="text-align: justify;padding:5px;">
					<p style="text-align: center;"><strong>SHUTTLE BUS<br>Noi Bai Airport to Saigon Halong Hotel</strong></p>
						<span style="font-size: 13px;"><i><span style="color:red;">*</span> Important Notes: <br>
						Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br>
						&gt;&gt;    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br>
						&gt;&gt;    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br>
						Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br>
						Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
					</i></span>
				  </td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;">December 02, 2024<br>
				  <b>Departure time: 16:00</b><br>
					Estimated arrival time: 19:00
					</td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;"><b>450.000++</b><br>VND/car/way</td>
				</tr>
				</tbody></table>';
		} elseif ($val == '1_6,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
				  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
				  <td style="padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Schedule</strong>
				  </td>
				  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Type of car</strong>
				  </td>
				  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Rate</strong>
				  </td>
				  </tr>
			<tr>
				  <td style="text-align: justify;padding:5px;">
					<p style="text-align: center;"><strong>SHUTTLE BUS<br>Noi Bai Airport to Saigon Halong Hotel</strong></p>
						<span style="font-size: 13px;"><i><span style="color:red;">*</span> Important Notes: <br>
						Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br>
						&gt;&gt;    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br>
						&gt;&gt;    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br>
						Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br>
						Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
					</i></span>
				  </td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;">December 02, 2024<br>
					<b>Departure time: 24:00</b><br>Estimated arrival time: 03:00, Dec. 03
					</td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;"><b>450.000++</b><br>VND/car/way</td>
				</tr>
				</tbody></table>';
		} elseif ($val == '117,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
				  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
				  <td style="padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Schedule</strong>
				  </td>
				  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Type of car</strong>
				  </td>
				  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
				  <strong>Rate</strong>
				  </td>
				  </tr>
			<tr>
				  <td style="text-align: justify;padding:5px;">
					<p style="text-align: center;"><strong>SHUTTLE BUS<br>Noi Bai Airport to Saigon Halong Hotel</strong></p>
						<span style="font-size: 13px;"><i><span style="color:red;">*</span> Important Notes: <br>
						Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br>
						&gt;&gt;    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br>
						&gt;&gt;    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br>
						Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br>
						Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
					</i></span>
				  </td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;">December 03, 2024<br>
					<b>Departure time: 01:30</b><br>Estimated arrival time: 04:30
					</td>
				  <td style="padding:5px;text-align: center;vertical-align: middle;"><b>450.000++</b><br>VND/car/way</td>
				</tr>
				</tbody></table>';
		} elseif ($val == '2_1,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
			<tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			<strong>Schedule</strong>
			</td>
			<td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
			<strong>Type of car</strong>
			</td>
			<td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
			<strong>Rate</strong>
			</td>
			</tr>
		  <tr>
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			<strong>PRIVATE CAR<br/>Ha Long City to Noi Bai Airport</strong>
			</td>
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			4 seat Car<br>
			(Maximum 2 passengers)
			</td>
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			<b>2.500.000++</b><br>VND/car/way
			</td>
			</tr>
		  </tbody></table>';
		} elseif ($val == '2_2,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
			<tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			<strong>Schedule</strong>
			</td>
			<td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
			<strong>Type of car</strong>
			</td>
			<td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
			<strong>Rate</strong>
			</td>
			</tr>
		  <tr>
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			<strong>PRIVATE CAR<br/>Ha Long City to Noi Bai Airport</strong>
			</td>
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			7 seat Car<br>
			(Maximum 4 passengers)
			</td>
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			<b>3.000.000++</b><br>VND/car/way
			</td>
			</tr>
		  </tbody></table>';
		} elseif ($val == '2_3,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
			<tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			<strong>Schedule</strong>
			</td>
			<td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
			<strong>Type of car</strong>
			</td>
			<td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
			<strong>Rate</strong>
			</td>
			</tr>
		  <tr>
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			<strong>PRIVATE CAR<br/>Ha Long City to Noi Bai Airport</strong>
			</td>
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			16 seat Car<br>
			(Maximum 9 passengers)
			</td>
			<td style="padding:5px;text-align: center;vertical-align: middle;">
			<b>3.500.000++</b><br>VND/car/way
			</td>
			</tr>
		  </tbody></table>';
		} elseif ($val == '2_4,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
			  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Schedule</strong>
			  </td>
			  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Type of car</strong>
			  </td>
			  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Rate</strong>
			  </td>
			  </tr>
		  <tr>
			  <td style="text-align: justify;padding:5px;">
			  <p style="text-align: center;"><strong>SHUTTLE BUS<br>Saigon Halong Hotel to Noi Bai Airport</strong></p>
				  <span style="font-size: 13px;"><i><span style="color:red;">*</span>
				  Important Notes: <br>
				  Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br>
				  &gt;&gt;    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br>
				  &gt;&gt;    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br>
				  Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br>
				  
				  Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
			  
			  </i></span>
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">December 06, 2024<br>
				<b>Departure time: 14:00</b><br>Estimated arrival time: 17:00
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;"><b>450.000++ VND/seat/way</b></td>
			</tr>
			</tbody></table>';
		} elseif ($val == '2_5,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
			  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Schedule</strong>
			  </td>
			  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Type of car</strong>
			  </td>
			  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Rate</strong>
			  </td>
			  </tr>
		  <tr>
			  <td style="text-align: justify;padding:5px;">
			  <p style="text-align: center;"><strong>SHUTTLE BUS<br>Saigon Halong Hotel to Noi Bai Airport</strong></p>
				  <span style="font-size: 13px;"><i><span style="color:red;">*</span>
				  Important Notes: <br>
				  Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br>
				  &gt;&gt;    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br>
				  &gt;&gt;    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br>
				  Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br>
				  
				  Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
			  
			  </i></span>
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">December 06, 2024<br>
				<b>Departure time: 18:00</b><br>Estimated arrival time: 21:00
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;"><b>450.000++</b><br>VND/seat/way</td>
			</tr>
			</tbody></table>';
		} elseif ($val == '2_6,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
			  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Schedule</strong>
			  </td>
			  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Type of car</strong>
			  </td>
			  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Rate</strong>
			  </td>
			  </tr>
		  <tr>
			  <td style="text-align: justify;padding:5px;">
			  <p style="text-align: center;"><strong>SHUTTLE BUS<br>Saigon Halong Hotel to Noi Bai Airport</strong></p>
				  <span style="font-size: 13px;"><i><span style="color:red;">*</span>
				  Important Notes: <br>
				  Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br>
				  &gt;&gt;    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br>
				  &gt;&gt;    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br>
				  Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br>
				  
				  Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
			  
			  </i></span>
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">December 07, 2024<br>
				<b>Departure time: 14:00</b><br>Estimated arrival time: 17:00
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;"><b>450.000++</b><br>VND/seat/way</td>
			</tr>
			</tbody></table>';
		} elseif ($val == '2_7,') {
			$str = '<table style="width: 100%;border-collapse: collapse;" border="1">
			  <tbody><tr style="background: #04245d;color:#fff;font-weight: bold;">
			  <td style="padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Schedule</strong>
			  </td>
			  <td style="width:24%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Type of car</strong>
			  </td>
			  <td style="width:15%;padding:5px;text-align: center;vertical-align: middle;">
			  <strong>Rate</strong>
			  </td>
			  </tr>
		  <tr>
			  <td style="text-align: justify;padding:5px;">
			  <p style="text-align: center;"><strong>SHUTTLE BUS<br>Saigon Halong Hotel to Noi Bai Airport</strong></p>
				  <span style="font-size: 13px;"><i><span style="color:red;">*</span>
				  Important Notes: <br>
				  Bus operation is canceled <b>5 DAYS</b> before departure date if less than 09 people/bus. The bus operator will contact you via email for other arrangements.<br>
				  &gt;&gt;    If the number of passengers is slightly reduced, with 6-9 registered, the bus operator will arrange for a smaller vehicle that fits the number of passengers within the budget, and passengers will not incur any additional costs.<br>
				  &gt;&gt;    If there are only 1-5 passengers registered, the bus operator will arrange a smaller vehicle appropriate for the number of passengers. However, additional costs may apply. If delegates do not agree to pay the extra fees, they will need to wait for the next scheduled shuttle.<br>
				  Transportation from Saigon Halong Hotel to your booked hotel should be self-arranged<br>
				  
				  Depending upon the number of passengers, the vehicle may be van, minibus or mid-size bus
			  
			  </i></span>
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;">December 07, 2024<br>
				December 07, 2024<br>
				  <b>Departure time: 18:00</b><br>Estimated arrival time: 21:00
			  </td>
			  <td style="padding:5px;text-align: center;vertical-align: middle;"><b>450.000++</b><br>VND/seat/way</td>
			</tr>
			</tbody></table>';
		}
		return $str;
	}

	public static function render_city($country_id, $city_id)
	{
		$strcity = '';
		$data = DB::table('default_city')->where('country_id', $country_id)->orderBy('city_id', 'asc')->get();
		if (!empty($data)) {
			foreach ($data as $k => $v) {
				if ($v->city_id == $city_id) {
					$strcity .= '<option selected value="' . $v->city_id . '">' . $v->title . '</option>';
				} else {
					$strcity .= '<option value="' . $v->city_id . '">' . $v->title . '</option>';
				}
			}
		}
		return $strcity;
	}

	public static function fnAdmissionItemExcel($arr)
	{
		$str = '';
		$str = str_replace(
			array('1_1', '2_1', '3_1', '4_1', '5_1', '6_1'),
			array('Full registration (IEEE, SICE Member) 763 USD', 'Full registration (non member) 887 USD', 'Student (IEEE, SICE member) 412 USD', 'Student (non member) 495 USD', 'Full registration without paper (IEEE, SICE Member) 701 USD', 'Full registration without paper (Non Member) 825 USD'),
			$arr
		);
		return $str;
	}

	public static function fnAdmissionItem($v)
	{
		$str = '';
		if ($v == '1_1') {
			$str = 'Full registration (IEEE, SICE Member) <span style="float:right;color:red;">763 USD</span>';
		} elseif ($v == '2_1') {
			$str = 'Full registration (non member) <span style="float:right;color:red;">887 USD</span>';
		} elseif ($v == '3_1') {
			$str = 'Student (IEEE, SICE member) <span style="float:right;color:red;">412 USD</span>';
		} elseif ($v == '4_1') {
			$str = 'Student (non member) <span style="float:right;color:red;">495 USD</span>';
		} elseif ($v == '5_1') {
			$str = 'Full registration without paper (IEEE, SICE Member) <span style="float:right;color:red;">701 USD</span>';
		} elseif ($v == '6_1') {
			$str = 'Full registration without paper (Non Member) <span style="float:right;color:red;">825 USD</span>';
		} else {
			$str = '';
		}
		return $str;
	}

	public static function fnAdmissionItemInvoice($v)
	{
		$str = '';
		if ($v == '1_1') {
			$str = '<tr><td>Full registration (IEEE, SICE Member)</td><td align="right">763USD</td><td align="right">1</td><td style="width:10%;text-align: right;">763USD</td></tr>';
		} elseif ($v == '2_1') {
			$str = '<tr><td>Full registration (non member)</td><td align="right">887USD</td><td align="right">1</td><td style="width:10%;text-align: right;">887USD</td></tr>';
		} elseif ($v == '3_1') {
			$str = '<tr><td>Student (IEEE, SICE member)</td><td align="right">412USD</td><td align="right">1</td><td style="width:10%;text-align: right;">412USD</td></tr>';
		} elseif ($v == '4_1') {
			$str = '<tr><td>Student (non member)</td><td align="right">495USD</td><td align="right">1</td><td style="width:10%;text-align: right;">495USD</td></tr>';
		} elseif ($v == '5_1') {
			$str = '<tr><td>Full registration without paper (IEEE, SICE Member)</td><td align="right">701USD</td><td align="right">1</td><td style="width:10%;text-align: right;">701USD</td></tr>';
		} elseif ($v == '6_1') {
			$str = '<tr><td>Full registration without paper (Non Member)</td><td align="right">825USD</td><td align="right">1</td><td style="width:10%;text-align: right;">825USD</td></tr>';
		} else {
			$str = '';
		}
		return $str;
	}

	public static function fnCity($cityId)
	{
		$data = DB::table('default_city')->where('city_id', $cityId)->first();
		if (!empty($data)) {
			return $data->title;
		}
		return "";
	}

	public static function fnNameHotel($id)
	{
		$data = DB::table('default_hotel')->where('hotel_id', $id)->first();
		if (!empty($data)) {
			return $data->title;
		}
		return "";
	}
	public static function fnNameTrans($id)
	{
		$trans = DB::table('default_transport')->where('transport_id', $id)->first();
		if (!empty($trans)) {
			return $trans->title;
		}
		return "";
	}
	public static function fnNameTour($id)
	{
		$tour = DB::table('default_tour')->where('tour_id', $id)->first();
		if (!empty($tour)) {
			return $tour->title;
		}
		return "";
	}
	public static function fnNameFlight($id)
	{
		$tour = DB::table('default_air')->where('air_id', $id)->first();
		if (!empty($tour)) {
			return $tour->title;
		}
		return "";
	}

	public static function fnTongsoKS()
	{
		$data = DB::table('default_hotel')->count();
		echo $data;
	}

	public static function fnSophong($hotelId)
	{
		$data = DB::table('default_accommodation')->where('hotel_id', $hotelId)->count();
		echo $data;
	}
	public static function null2unknown($data)
	{
		if ($data == "") {
			return "No Value Returned";
		} else {
			return $data;
		}
	}
	public static function getResponseDescription($responseCode)
	{
		switch ($responseCode) {
			case "0":
				$result = "Transaction Successful";
				break;
			case "?":
				$result = "Transaction status is unknown";
				break;
			case "-1":
				$result = "Unpaid";
				break;
			case "1":
				$result = "Bank system reject";
				break;
			case "2":
				$result = "Bank Declined Transaction";
				break;
			case "3":
				$result = "No Reply from Bank";
				break;
			case "4":
				$result = "Expired Card";
				break;
			case "5":
				$result = "Insufficient funds";
				break;
			case "6":
				$result = "Error Communicating with Bank";
				break;
			case "7":
				$result = "Payment Server System Error";
				break;
			case "8":
				$result = "Transaction Type Not Supported";
				break;
			case "9":
				$result = "Bank declined transaction (Do not contact Bank)";
				break;
			case "A":
				$result = "Transaction Aborted";
				break;
			case "C":
				$result = "Transaction Cancelled";
				break;
			case "D":
				$result = "Deferred transaction has been received and is awaiting processing";
				break;
			case "F":
				$result = "3D Secure Authentication failed";
				break;
			case "I":
				$result = "Card Security Code verification failed";
				break;
			case "L":
				$result = "Shopping Transaction Locked (Please try the transaction again later)";
				break;
			case "N":
				$result = "Cardholder is not enrolled in Authentication scheme";
				break;
			case "P":
				$result = "Transaction has been received by the Payment Adaptor and is being processed";
				break;
			case "R":
				$result = "Transaction was not processed - Reached limit of retry attempts allowed";
				break;
			case "S":
				$result = "Duplicate SessionID (OrderInfo)";
				break;
			case "T":
				$result = "Address Verification Failed";
				break;
			case "U":
				$result = "Card Security Code Failed";
				break;
			case "V":
				$result = "Address Verification and Card Security Code Failed";
				break;
			case "99":
				$result = "User Cancel";
				break;
			default:
				$result = "Unable to be determined";
		}
		return $result;
	}
}
