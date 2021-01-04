@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice/Order List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice List</li>
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
                <h3 class="card-title">Invoice No # {{ $approve->invoice_no }} 
                	&ensp; ({{ date('d-m-Y', strtotime($approve->date )) }})</h3>
                <a href="{{ route('invoice.pending.list')}}" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-list"></i> Invoice List</a> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	@php 
              		$payment = App\PaymentAci::where('invoice_id', $approve->id)->first();
              		
              	@endphp
              	<table width="100%">
              		<tbody>
              			<tr>
              				<td width="20%">Customer Info</td>
              				<td width="20%"> <strong>Name:</strong> &ensp; {{ $payment['customer']['name'] }}</td>
              				<td width="20%"> <strong>Phone No:</strong> &ensp; {{ $payment['customer']['phone'] }}</td>
              				<td width="20%"> <strong>Market Name:</strong> &ensp; {{ $payment['customer']['market_name'] }}</td>
              				<td width="20%"> <strong>Address:</strong> &ensp; {{ $payment['customer']['address'] }}</td>
              			</tr>
              		</tbody>
              	</table>
<br><br>
              	<form action="{{ route('approval.store.return.aci', $approve->id) }}" method="post">
              		@csrf
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
              			@foreach($approve['return_details'] as $key => $detail)
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

              	<button type="submit" class="btn btn-success btn-sm">Approve Invoice</button>
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


@endsection