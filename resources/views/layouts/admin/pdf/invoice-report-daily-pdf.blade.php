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
    <h3 style="text-align: center; text-decoration: underline;">Daily Invoice Report ({{ date('d-m-Y', strtotime($start_date)) }} - {{ date('d-m-Y', strtotime($end_date)) }})</h3>

    <table width="100%">
      <tbody>


      </tbody>

    </table>
<br>
<table border="1" width="100%" style="margin-bottom: 20px;">
      <thead>
        <tr>
          <th class="text-center">S/L</th>
          <th class="text-center">Date</th>
          <th class="text-center">Customer Name</th>
          
          <th class="text-center">Invoice No</th>
          <th class="text-center">Description</th>
          <th class="text-center">Total Amount</th>
        </tr>
      </thead>
      <tbody>

        @php 
          $total_sum = 0;
        @endphp
         @foreach($allData as $key => $data)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{  date('d-m-Y', strtotime($data->date)) }}</td>

          <td>
            {{ $data['payment']['customer']['name'] }}-
            {{ $data['payment']['customer']['market_name'] }}-
            {{ $data['payment']['customer']['phone'] }}-
            {{ $data['payment']['customer']['address'] }}
          </td>
          <td>Invoice no # {{ $data->invoice_no }}</td>
          <td>{{ $data->description }}</td>
          <td>{{ $data['payment']['total_amount'] }}</td>
          @php
            $total_sum += $data['payment']['total_amount'];
          @endphp
          
        </tr>
        
        @endforeach
        <tr>
          <td colspan="5" style="text-align:right;"> Grand Total &ensp; </td>
          <td>{{ $total_sum }}</td>
        </tr>
        </tbody>

    </table>

                @php 
                  $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                @endphp

                <i>Printing time : {{ $date->format('F j, Y, g:i a')}}</i>
<hr>
<br><br>
                <table>
                  <tr>
                    <td width="30%" style="float:left;">Customer Signature</td>
                    <td width="40%"></td>
                    <td width="30%" style="float:right; padding-left: 70px;"><span style="    padding-left: 50px; text-align: center;">Author Signature</span></td>
                  </tr>
                </table>
</body>
</html>