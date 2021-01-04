@extends('layouts.front.frontpages.inc.link')

@section('content')



@php 
$content = Cart::content();

@endphp
<form action="{{ route('invoice.with.cart') }}" method="post">
	@csrf
	<input type="text" name="invoice" placeholder="Invoice">
<table class="table cart-table">
	<thead>
	<tr>
			
		<th class="table-title">Product Name</th>	
		<th class="table-title"> Price</th>
		<th class="table-title">Quantity</th>
		<th class="table-title">SubTotal</th>
		<th>

			<span class="close-button disabled"></span></th>
	</tr>
	</thead>


	<tbody>
@foreach($content as $cont)

	<tr>
		

		<td class="product-code">{{ $cont->name}}</td>
		<td class="product-price-col">
			<span class="product-price-special">{{ $cont->price}}</span>
		</td>
		<td>
			<div class="custom-quantity-input">
		     <input type="number" class="custom-quantity-input pull-left" name="qty" style="width: 42px;" value="{{ $cont->qty }}" >
		      	
			</div>
		</td>
		<td class="product-total-col">
			<span class="product-price-special">{{ $cont->total }} </span>
		</td>
		<td>
			<a href="{{ url('/remove-to-cart/'.$cont->rowId) }}" class="close-button"><i class="fa fa-times"></i></a>
		</td>
								
<input type="hidden" name="customer_id" value="{{ Session::get('id') }}">
<input type="hidden" name="product_name" value="{{ $cont->product_name }}">
<input type="hidden" name="selling_qty" value="{{ $cont->quantity }}">
<input type="hidden" name="unit_price" value="{{ $cont->unit_price }}">

<input type="hidden" name="selling_price" value="{{ Cart::total() }}">	
<input type="hidden" name="date" class="form-control" value="{{ date('d-m-Y') }}" >

	<!-- End tr -->
@endforeach
	
	</tbody>
</table>

<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection