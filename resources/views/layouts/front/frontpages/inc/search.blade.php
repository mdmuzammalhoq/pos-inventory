@extends('layouts.front.frontpages.inc.link')

@section('content')

<main class="main-container">
<!-- compare content -->
	<!-- Main content starts -->

	<div class="main-block">



		<div class="container">

			<!-- Actual content -->
			<div class="ecommerce pt-40">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<!-- Shopping items content -->
						<div class="shopping-content">
							<!-- Block Title -->

							<!-- Shopping Edit Profile -->
							<div class="shopping-wishlist">
								<!-- Recent Purchase Table -->
								<div class=" table-responsive">
									<table class="table table-bordered">
										<!-- Table Header -->
										<thead>
										<tr>
											<th>#</th>
											<th>Image</th>
											<th>Product Name</th>
											<th>Net Weight</th>
											<th>Total Stock</th>
											<th>Price</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>


		
										

<form action="{{ url('/add-to-cart') }}" method="POST">
       @csrf	
@foreach($product as $row)										
<input type="hidden" name="id" value="{{ $row->id }}">
<input type="hidden" name="name" value="{{ $row->product_name }}">
<input type="hidden" name="cat_name" value="{{ $row['category']['cat_name'] }}">
<input type="hidden" name="qty" value="1">
<input type="hidden" name="price" value="{{ $row['purchase']['unit_price']}}">
<input type="hidden" name="weight" value="{{ $row->weight }}">

<tr>
	<td>{{ $row->serial }}</td>
		
		<td> {{ $row->product_name }}</td>
		<td>{{ $row['category']['cat_name'] }}</td>
		<td>{{ $row->weight }} {{$row['unit']['unit_name']}}</td>
		<td>{{ $row->quantity }}</td>
		
		<td>{{ $row['purchase']['unit_price']}}</td>
		<td>
			<a href="#" class="btn  btn-sm btn-warning active" data-toggle="modal" data-target="#signup-modal">Order</a>
      <a href="#" class="btn  btn-sm btn-outline-danger" data-toggle="modal" data-target="#return-modal">Return</a>
		</td>

			
		</tr>
@endforeach
</form>	

										

										
										</tbody>
									</table>
								</div>
								<!-- Pagination -->
								<div class="shopping-pagination">
									<ul class="pagination pull-right">
										<li class="disabled"><a href="#">&laquo;</a></li>
										<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<!-- Pagination end-->
							</div>
						</div>
					</div>
				</div>
				<br />



			</div>
		</div>
	</div>

	<!-- Main content ends -->
<!-- end compare content -->

<!-- service area -->
	<section class="block gray no-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content-box no-margin go-simple">
						<div class="mini-service-sec">
							<div class="row">
								<div class="col-md-3">
									<div class="mini-service">
										<i  class="fa fa-paper-plane"></i>
										<div class="mini-service-info">
											<h3>Worldwide Delivery</h3>
											<p>unc tincidunt, on cursusau gmetus, lorem Hore</p>
										</div>
									</div><!-- Mini Service -->
								</div>
								<div class="col-md-3">
									<div class="mini-service">
										<i  class="fa  fa-newspaper-o"></i>
										<div class="mini-service-info">
											<h3>Worldwide Delivery</h3>
											<p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
										</div>
									</div><!-- Mini Service -->
								</div>
								<div class="col-md-3">
									<div class="mini-service">
										<i  class="fa fa-medkit"></i>
										<div class="mini-service-info">
											<h3>Friendly Stuff</h3>
											<p>unc tincidunt, on cursusau gmetus, lorem Hore</p>
										</div>
									</div><!-- Mini Service -->
								</div>
								<div class="col-md-3">
									<div class="mini-service">
										<i  class="fa  fa-newspaper-o"></i>
										<div class="mini-service-info">
											<h3>24/h Support</h3>
											<p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
										</div>
									</div><!-- Mini Service -->
								</div>
							</div>
						</div><!-- Mini Service Sec -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="clearfix"></div>
<!-- end service area -->
</main>

@endsection