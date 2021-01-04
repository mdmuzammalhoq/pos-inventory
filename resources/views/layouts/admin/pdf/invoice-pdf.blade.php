<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Generate PDF</title>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500&family=Hind+Siliguri:wght@300&display=swap" rel="stylesheet">

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

<h3 style="text-align: center; text-decoration: underline;">Customer Invoice</h3>
  @php 
      $payment = App\Payment::where('invoice_id', $invoice->id)->first();
      
    @endphp
    <table width="100%">
      <tbody>
        <tr>
          <td width="80%">Invoice No # 1</td>
          <td width="20%" style="float: right;"> {{ $payment['customer']['name'] }} <br>{{ $payment['customer']['phone'] }}, <br> {{ $payment['customer']['market_name'] }}, <br> {{ $payment['customer']['address'] }}</td>
         
          
        </tr>

      </tbody>

    </table>
<br>
    <table border="1" width="100%" style="margin-bottom: 20px;">
                  <thead>
                    <tr>
                      <th class="text-center">S/L</th>
                      <th class="text-center">Category</th>
                      <th class="text-center">Product Name</th>

                      <th class="text-center">Quantity</th>
                      <th class="text-center">Unit Price</th>
                      <th class="text-center">Total Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($invoice['invoice_details'] as $key => $detail)
                    <tr>
                      <input type="hidden" name="cat_id[]" value="{{ $detail->cat_id }}">
                      <input type="hidden" name="product_id[]" value="{{ $detail->product_id }}">
                      <input type="hidden" name="selling_qty[{{$detail->id}}]" value="{{ $detail->selling_qty }}">
                      <td class="text-center">{{ $key+1 }}</td>
                      <td class="text-center">{{ $detail['category']['cat_name'] }}</td>
                      <td class="text-center">{{ $detail['product']['product_name'] }}</td>
                      <td class="text-center">{{ $detail->selling_qty }}</td>
                      <td class="text-center">{{ $detail->unit_price }}</td>
                      <td class="text-center">{{ $detail->selling_price }}</td>
                      
                      
                    </tr>

                    @php 
                      $total_sum = 0;
                      $total_sum += $detail->selling_price;
                    @endphp


                    @endforeach

                    
                    <tr>
                      <td colspan="5" class="text-right"> <strong>Sub total</strong> &ensp;</td>
                      <td class="text-center">{{ $total_sum }}</td>
                    </tr>
                    <tr>
                      <td colspan="5" class="text-right">(Description) Discount &ensp;</td>
                      <td class="text-center">{{ $payment->discount_amount }}</td>
                    </tr>
                    <tr>
                      <td colspan="5" class="text-right">Paid Amount &ensp;</td>
                      <td class="text-center">{{ $payment->paid_amount }}</td>
                    </tr>
                    <tr>
                      <td colspan="5" class="text-right">Due Amount &ensp;</td>
                      <td class="text-center">{{ $payment->due_amount }}</td>
                    </tr>
                    <tr>
                      <td colspan="5" class="text-right"> <strong>Grand total</strong> &ensp;</td>
                      <td class="text-center">{{ $payment->total_amount }}</td>
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