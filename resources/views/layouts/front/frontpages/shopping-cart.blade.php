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

						<div class="col-md-12">
@php 
	$content = Cart::content();

@endphp
							<!-- Begin table -->
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
											<form action="{{ url('/update_front_cart/'.$cont->rowId) }}" method="POST">
									      		@csrf
									      	<input type="number" class="custom-quantity-input pull-left" name="qty" style="width: 42px;" value="{{ $cont->qty }}" >
									      	<button class="pull-right" style="width: 25px;" type="submit"><i class="fa fa-check"></i></button>
									      	</form>
										</div>
									</td>
									<td class="product-total-col">
										<span class="product-price-special">{{ $cont->total }} </span>
									</td>
									<td>
										<a href="{{ url('/remove-to-cart/'.$cont->rowId) }}" class="close-button"><i class="fa fa-times"></i></a>
									</td>
								</tr>
								<!-- End tr -->
@endforeach
								
								</tbody>
							</table>
							<!-- End table -->

							<div class="mt-30"></div>

							<div class="row">

								<div class="col-md-12">

									<!-- Begin tab container -->
									

								<div class="mt-30 visible-sm visible-xs clearfix pull-right"></div>

								<div class="col-md-8 pull-right">

									 
									<!-- End table -->

									<div class="mt-30"></div>
									<?php  
										$customer_id = Session::get('id');
									?>

									@if($customer_id != NULL)
										<div class="text-right"><a href="{{ URL::to('/login-check') }}" class="btn btn-custom-6 btn-lger min-width-sm">Checkout</a>
										</div>
									@else
										<div class="text-right"><a href="{{ URL::to('/check-out') }}" class="btn btn-custom-6 btn-lger min-width-sm">Checkout</a>
										</div>
									@endif

								</div>
								<!-- /.col-md-4 -->
							</div>
							<!-- /.row -->
						</div>
					</div>
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