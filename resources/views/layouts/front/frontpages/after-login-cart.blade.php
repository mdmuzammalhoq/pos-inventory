@extends('layouts.front.frontpages.inc.link')

@section('content')
 
<main class="main-container">
<!-- shopping cart content -->
<section class="shopping-cart-area">
	<!-- Begin cart -->
	<div class="ld-subpage-content">

		<div class="ld-cart">

			<!-- Begin cart section -->
			<section class="ld-cart-section ptb-50">

				<div class="container">

					<div class="row">
<form method="post" action="{{ url('/insert-order') }}">
	@csrf
						<div class="col-md-12">
@php 
	$content = Cart::content();

@endphp
							<!-- Begin table -->
							<table class="table cart-table">
								<thead>
								<tr>

									<th class="table-title">Product Name</th><th class="table-title"> Price</th>
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
<input type="hidden" name="order_date" value="{{ date('d-m-Y') }}">
<input type="hidden" name="order_status" value="Pending">
<input type="hidden" name="product_name" value="{{ $cont->name }}">
<input type="hidden" name="qty" value="{{ Cart::count() }}">
<input type="hidden" name="total" value="{{ Cart::total() }}">	
<input type="hidden" name="order_date" class="form-control" value="{{ date('d-m-Y') }}" >

</tr>
								<!-- End tr -->
@endforeach
								
								</tbody>
							</table>
							<!-- End table -->

							<div class="row">

								<div class="col-md-12">
									<div class="col-md-8 pull-right">
										<div class="mt-30"></div>



									<div class="text-right">
										<!-- <a href="" class="btn btn-custom-6 btn-lger min-width-sm">Order Now</a> -->
										<button type="submit" class="btn btn-custom-6 btn-lger min-width-sm btn-success">Order Now</button>
									</div>

								</div>
								<!-- /.col-md-4 -->
							</div>
							<!-- /.row -->
						</div>
					</div>
	</form>
				</div>

			</section>
			<!-- /.ld-cart-section -->

		</div>
		<!-- /.ld-cart -->
	</div>
	<!-- /.ld-subpage-content -->
	<!-- End Cart -->
</section>
<!-- end shopping cart content -->

</main>

@endsection