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

<h3 style="text-align: center; text-decoration: underline;">Customer Invoice Detail</h3>

    <table width="100%">
      <tbody>
        <tr>
          <td width="80%">Invoice No # {{ $payment['invoice']['invoice_no'] }}</td>
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
      @php 
      $total_sum = 0;
        $invoice_details = App\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
      @endphp
      @foreach($invoice_details as $key => $detail)
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
        <input type="hidden" name="new_paid_amount" value="{{ $payment->due_amount }}">
        <td class="text-center">{{ $payment->due_amount }}</td>
      </tr>
      <tr>
        <td colspan="5" class="text-right"> <strong>Grand total</strong> &ensp;</td>
        <td class="text-center">{{ $payment->total_amount }}</td>
      </tr>

      <tr>
        <td style="text-align:center; font-weight: bold;" colspan="6">Paid Summury</td>
      </tr>
      <tr>
        <td style="text-align:center; font-weight: bold;" colspan="3">Date</td>
        <td style="text-align:center; font-weight: bold;" colspan="3">Amount</td>
      </tr>
      @php 
        $payment_detail = App\PaymentDetail::where('invoice_id', $payment->invoice_id)->get();
      @endphp

      @foreach($payment_detail as $p_detail)
      <tr>
        <td style="text-align:center; " colspan="3">{{$p_detail->date}}</td>
        <td style="text-align:center; " colspan="3">{{$p_detail->current_paid_amount}}</td>
      </tr>
      @endforeach

      
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