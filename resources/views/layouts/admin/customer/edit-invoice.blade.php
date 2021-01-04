@extends('layouts.admin.menubar')

@section('content')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Credit Customer List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Credit Customer List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Invoice (Invoice No # {{$payment['invoice']['invoice_no']}})</h3>
                  <a href="{{route('customers.credit')}}" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-list"></i> credit customer list</a> 

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                        <table width="100%">
      <tbody>
        <tr>
          <td width="20%">Customer (SR) Name : {{ $payment['customer']['name'] }}</td>
          <td width="20%">Customer (SR) Phone : {{ $payment['customer']['phone'] }},</td>
          <td width="20%">Market Name : {{ $payment['customer']['market_name'] }},</td>
          <td width="20%">Address : {{ $payment['customer']['address'] }},</td>
        
         
          
        </tr>

      </tbody>

    </table>
<br>

<form action="{{route('customer.invoice.update', $payment->invoice_id)}}" method="post" id="myForm">
            @csrf
            <table border="1" width="100%" style="margin-bottom: 20px;">
    <thead>
      <tr>
        <th class="text-center">S/L</th>
        <th class="text-center">Category</th>
        <th class="text-center">Product Name</th>
        <th class="text-center" style="background-color: #ddd;">Current Stock</th>
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
        <td class="text-center" style="background-color: #ddd;">{{ $detail['product']['quantity'] }}</td>
        <td class="text-center">{{ $detail->selling_qty }}</td>
        <td class="text-center">{{ $detail->unit_price }}</td>
        <td class="text-center">{{ $detail->selling_price }}</td>
        
        
      </tr>

      @php 
        
        $total_sum += $detail->selling_price;
      @endphp


      @endforeach

      
      <tr>
        <td colspan="6" class="text-right"> <strong>Sub total</strong> &ensp;</td>
        <td class="text-center">{{ $total_sum }}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-right">(Description) Discount &ensp;</td>
        <td class="text-center">{{ $payment->discount_amount }}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-right">Paid Amount &ensp;</td>
        <td class="text-center">{{ $payment->paid_amount }}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-right">Due Amount &ensp;</td>
        <input type="hidden" name="new_paid_amount" value="{{ $payment->due_amount }}">
        <td class="text-center">{{ $payment->due_amount }}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-right"> <strong>Grand total</strong> &ensp;</td>
        <td class="text-center">{{ $payment->total_amount }}</td>
      </tr>
      
    </tbody>
  </table>
  <div class="form-row">
    <div class="form-group col-md-3">
        <label>Paid Status</label>
        <select name="paid_status" id="paid_status" class="form-control-sm form-control">
          <option>Select Status</option>
          <option value="full_paid">Full paid</option>
          <option value="partial_paid">Partial Paid</option>
        </select>
        <input type="text" name="paid_amount" class="form-control paid_amount" placeholder="Enter Paid Amount" style="display: none;">
      </div>

  <div class="form-group col-md-3">
      <label>Date *</label>
      <input class="form-control datepicker form-control-sm" id="date" readonly />
    </div>

    <div class="form-group" style="padding-top: 31px;">
      <button type="submit" class="form-control-sm btn-sm btn-success form-control">Invoice Update</button>
    </div>
  </div>
          </form>
</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript">
      //Paid Status
  $(document).on('change', '#paid_status', function(){

    var paid_status = $(this).val();
    if (paid_status == 'partial_paid') {
      $('.paid_amount').show();
    }else{
      $('.paid_amount').hide();
    }
  });
</script>
<script>
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

<script type="text/javascript">
$(document).ready(function () {
  $('#myForm').validate({

    rules: {
      paid_status: {
        required: true,
      },
      date: {
        required: true,
      }
    },
    messages: {
      
    },
  });
});
</script>
@endsection