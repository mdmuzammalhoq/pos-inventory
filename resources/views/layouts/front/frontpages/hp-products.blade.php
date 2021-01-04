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
											<th>Product Name</th>
											<th>Category</th>
											<th>Net Weight</th>
											<th>Total Stock</th>
											<th>Price</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>


		
 @foreach($allData as $key => $row)										

<form action="{{ url('/add-to-cart') }}" method="POST">
@csrf											
<input type="hidden" name="id" value="{{ $row->id }}">
<input type="hidden" name="name" value="{{ $row->product_name }}">
<input type="hidden" name="qty" value="1">
<input type="hidden" name="price" value="{{ $row->selling_price }}">
<input type="hidden" name="weight" value="{{ $row->net_weight }}">
<input type="hidden" name="image" value="{{ $row->product_image }}">
<tr>
	<td>{{ $row->serial }}</td>
		
		<td> {{ $row->product_name }}</td>
		<td>{{ $row['category']['cat_name'] }}</td>
		<td>{{ $row->weight }} {{$row['unit']['unit_name']}}</td>
		<td>{{ $row->quantity }}</td>
		
		<td>{{ $row['purchase']['unit_price']}}</td>
		<td>
			<a href="#" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#signup-modal">Order</a>
      <a href="#" class="btn  btn-sm btn-outline-danger" data-toggle="modal" data-target="#return-modal">Return</a>
		</td>
		</tr>
</form>	

										
@endforeach
										
										</tbody>
									</table>
								</div>
								<div style="height: 100px;"></div>
							</div>
						</div>
					</div>
				</div>
				<br />



			</div>
		</div>
	</div>


	<div class="clearfix"></div>
<!-- end service area -->
</main>

<!-- Modal -->
<div class="modal fade bs-modal-sm" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Order Now for <span class="text-success"></span></h4>
          </div>
          <div class="modal-body">
          	<div class="well">
          		<form method="POST" action="{{ route('order.product') }}" >
          			@csrf
              <div class="row">
                  <div class="col-xs-6">
                       @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                          
                              <div class="form-group">
                                  <label class="control-label">Your Name</label>
                                  <input type="text" class="form-control" name="customer_name" placeholder="Your Name">
                                  <span class="help-block"></span>
                              </div>
                               <div class="form-group">
                                  <label class="control-label">Phone</label>
                                  <input type="text" class="form-control" name="phone" placeholder="Phone">
                                  <span class="help-block"></span>
                              </div>
                               <div class="form-group">
                                  <label class="control-label">Market Name</label>
                                  <input type="text" class="form-control" name="market_name" placeholder="Market Name">
                                  <span class="help-block"></span>
                              </div>
                               <div class="form-group">
                                  <label class="control-label">Address </label>
                                  <input type="text" class="form-control" name="address" placeholder="Address">
                                  <span class="help-block"></span>
                              </div>
                     
                              
                          
                      </div>
                  
                  <div class="col-xs-6">

                       <div class="form-group">
                          <label for="username" class="control-label">Product Name</label>
                          <select name="product_name" class="form-control select2">
	                      	<option>Select a product</option>
	                      	@php 
	                      		$product = App\Product::all();
	                      	@endphp

	                      	@foreach($product as $pro)
	                      		<option>{{ $pro->product_name }}</option>
	                      	@endforeach
	                      
	                    </select>
                      </div>
                       <div class="form-group">
                          <label class="control-label">Category</label>

                          <input type="text" name="cat_name" value="HP Products" class="form-control">
                          
                      </div>
                       <div class="form-group">
                          <label class="control-label">Quantity</label>
                          <input type="text" class="form-control" name="qty" placeholder="Quantity">
                          <span class="help-block"></span>
                      </div>
                       <div class="form-group">
                          <label class="control-label">Price</label>
                          <input type="text" class="form-control" name="price" placeholder="Price">
                          <span class="help-block"></span>
                      </div>
                  	<input type="hidden" name="order_status" value="Pending">
                  	<input type="hidden" name="order_date" value="{{ date('Y-m-d') }}">
                        
                       <button type="submit" class="btn btn-success btn-block">Order</button>
                       </div>
                  </div>
              </form>
              </div>
          </div>
      </div>
  </div>
 </div>

 <!-- Return Modal -->
<div class="modal fade bs-modal-sm" id="return-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Return Product <span class="text-success"></span></h4>
          </div>
          <div class="modal-body">
            <div class="well">
              <form method="POST" action="{{ route('return.product') }}" >
                @csrf
              <div class="row">
                  <div class="col-xs-6">
                       @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
@php 
  $date = date('Y-m-d');
@endphp                 
                              <div class="form-group">
                                  <label class="control-label">Your Name</label>
                                  <input type="text" class="form-control" name="customer_name" placeholder="Your Name">
                                  <span class="help-block"></span>
                              </div>
                               <div class="form-group">
                                  <label class="control-label">Phone</label>
                                  <input type="text" class="form-control" name="phone" placeholder="Phone">
                                  <span class="help-block"></span>
                              </div>
                               <div class="form-group">
                                  <label class="control-label">Market Name</label>
                                  <input type="text" class="form-control" name="market_name" placeholder="Market Name">
                                  <span class="help-block"></span>
                              </div>
                               <div class="form-group">
                                  <label class="control-label">Address </label>
                                  <input type="text" class="form-control" name="address" placeholder="Address">
                                  <span class="help-block"></span>
                              </div>
                     
                              
                          
                      </div>
                  
                  <div class="col-xs-6">

                       <div class="form-group">
                          <label for="username" class="control-label">Product Name</label>
                          <select name="product_name" class="form-control select2">
                          <option>Select a product</option>
                          @php 
                            $product = App\Product::all();
                          @endphp

                          @foreach($product as $pro)
                            <option>{{ $pro->product_name }}</option>
                          @endforeach
                        
                      </select>
                      </div>
                       <div class="form-group">
                          <label class="control-label">Category</label>

                          <input type="text" name="cat_name" value="HP Products" class="form-control">
                          
                      </div>
                       <div class="form-group">
                          <label class="control-label">Quantity</label>
                          <input type="text" class="form-control" name="qty" placeholder="Quantity">
                          <span class="help-block"></span>
                      </div>
                       <div class="form-group">
                          <label class="control-label">Price</label>
                          <input type="text" class="form-control" name="price" placeholder="Price">
                          <span class="help-block"></span>
                      </div>
                    <input type="hidden" name="return_status" value="Pending">
                    <input type="hidden" name="return_date" value="{{ $date }}">
                        
                       <button type="submit" class="btn btn-success btn-block">Return</button>
                       </div>
                  </div>
              </form>
              </div>
          </div>
      </div>
  </div>
 </div>
@endsection