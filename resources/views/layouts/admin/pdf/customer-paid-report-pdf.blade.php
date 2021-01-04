<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Generate PDF</title>
</head>
<body>
    <table width="100%">
      <tbody>
        <tr>


          <td width="60%" style="text-align: center; font-size: 25px;"> <strong style="text-align: center;">Kopotakkho Enterprise</strong> </td> <br>
          

          
        </tr>

      </tbody>

    </table>
    <table width="100%">
      <tbody>
        <tr>

          <td width="30%" style="float: left;"> </td>
          <td width="40%" style="text-align: justify;"> 123, Kakrail Road , Moubon Super Market(2nd Floor), Shantinagar, Dhaka - 1217</td>
          <td width="30%" style="float: right;"></td>
          
        </tr>

      </tbody>

    </table>

<h3 style="text-align: center; text-decoration: underline;"> Customer Wise Paid Report</h3>

<br>
        <table border="1" width="100%">
                  <thead>
                  <tr>
                    <th>Customer Name (SR)</th>
                    <th>Invoice No</th>
                    <th>Date</th>
                    <th>Paid Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                  	@php 
                  		$total_paid = '0';
                  	@endphp
                    @foreach($allData as $payment)
                  <tr>
                    <td>
                      {{ $payment['customer']['name']}}-
                      ({{ $payment['customer']['phone']}} - {{ $payment['customer']['address']}})
                    </td>
                    <td>invoice # {{ $payment['invoice']['invoice_no']}}</td>
                    <td>{{ date("d-m-Y", strtotime($payment['invoice']['date'])) }}</td>
                    <td>{{ $payment->paid_amount}} TK</td>

                  </tr>
                  @php 
                	$total_paid += $payment->paid_amount;
                @endphp

                  @endforeach
                  
                </table>
                <br>
				<table border="1" width="100%">
                	<tr>
                		<td colspan="2" style="text-align: right; font-weight: bold;">Grand Total : &ensp;</td>
                		<td colspan="2" style="text-align: left; font-weight: bold;"> &ensp;{{$total_paid}} TK</td>
                	</tr>
                </table>
                @php 
                  $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                @endphp

                <i>Printing time : {{ $date->format('F j, Y, g:i a')}}</i>
<hr>

<br><br>
                <table>
                  <tr>
                    <td width="30%" style="float:left;"></td>
                    <td width="40%"></td>
                    <td width="30%" style="float:right; padding-left: 70px;"><span style="    padding-left: 50px; text-align: center;">Author Signature</span></td>
                  </tr>
                </table>
</body>
</html>