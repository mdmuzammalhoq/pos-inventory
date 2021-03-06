<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Supplier wise stock report PDF</title>
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

<h3 style="text-align: center; text-decoration: underline;">Product Wise Stock Report</h3>

<br>


                <table border="1" width="100%" style="margin-bottom: 20px;">
                  <thead>
                  <tr>
                    <th class="text-center" width="15%">Supplier Name</th>
                    <th class="text-center" width="10%">Category</th>
                    <th class="text-center" width="15%">Product Name</th>
                    <th class="text-center" width="10%">In.Qty</th>
                    <th class="text-center" width="10%">Out.Qty</th>
                    <th class="text-center" width="10%">Stock</th>
                    <th class="text-center" width="10%">Unit</th>

                  </tr>
                  </thead>
                  <tbody>
                    @php 
                      $buying_total = App\Purchase::where('cat_id',$product->cat_id)->where('product_id',$product->id)->where('status', '1')->sum('buying_qty');

                      $selling_total = App\InvoiceDetail::where('cat_id',$product->cat_id)->where('product_id',$product->id)->where('status', '1')->sum('selling_qty');
                    @endphp
                  <tr>
                    <td style="text-align: center;">{{ $product['supplier']['name']}}</td>
                    <td style="text-align: center;">{{ $product['category']['cat_name'] }}</td>
                    <td style="text-align: center;">{{ $product['product_name'] }}</td>
                    <td style="text-align: center;">{{$buying_total}}</td>
                    <td style="text-align: center;">{{$selling_total}}</td>
                    <td style="text-align: center;">{{ $product->quantity }}</td>
                    <td style="text-align: center;">{{ $product['unit']['unit_name'] }}</td>
                    @php 
                      $count_supplier = App\Purchase::where('product_id',$product->id)->count();
                    @endphp
                    
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