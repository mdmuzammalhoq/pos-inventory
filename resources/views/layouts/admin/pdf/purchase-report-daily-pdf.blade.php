<!DOCTYPE html>
<html  lang="en" lang="bn"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Daily Purchase Reprt pdf</title>
<style>
body {
    font-family: 'SolaimanLipi';
}
</style>
 
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
    <h3 style="text-align: center; text-decoration: underline;">Daily Purchase Report ({{ date('d-m-Y', strtotime($start_date)) }} - {{ date('d-m-Y', strtotime($end_date)) }})</h3>

    <table width="100%">
      <tbody>


      </tbody>

    </table>
<br>
                <table width="100%" border="1">
                  <thead>
                  <tr>
                    <th width="5%">S/N</th>
                    <th width="10%">Prch. No</th>
                    <th width="10%">Date</th>
                    <th width="5%">Category</th>
                    <th width="10%">Product</th>
                    <th width="10%">Qty</th>
                    <th width="15%">Unit Price</th>
                    <th width="15%">Total Price</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php 
                      $sum_total = '0';
                    @endphp
                    @foreach($allData as $key => $purchase)
                  <tr>
                    <td style="text-align:center;">{{ $key+1 }}</td>
                    <td style="text-align:center;">{{ $purchase->purchase_no }}</td>
                    <td style="text-align:center;">{{ date('d-m-Y', strtotime($purchase->date)) }}</td>
                    <td style="text-align:center;">{{ $purchase['category']['cat_name'] }}</td>
                    <td style="text-align:center;">{{ $purchase['product']['product_name'] }}</td>               
                    <td style="text-align:center;">
                      {{ $purchase->buying_qty }}
                      {{ $purchase['product']['unit']['unit_name'] }}
                    </td>
                    <td style="text-align:center;">{{ $purchase->unit_price }}</td>
                    <td style="text-align:center;">{{ $purchase->buying_price }}</td>
                    @php 
                    $sum_total += $purchase->buying_price;
                  @endphp
                  </tr>


                  @endforeach
                  <tr>
                    <td colspan="7" style="text-align:right;"> Grand Total &ensp;</td>
                    <td style="text-align:center;">{{$sum_total}}</td>
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
                    <td width="30%" style="float:left;">Customer Signature</td>
                    <td width="40%"></td>
                    <td width="30%" style="float:right; padding-left: 70px;"><span style="    padding-left: 50px; text-align: center;">Author Signature</span></td>
                  </tr>
                </table>
</body>
</html>