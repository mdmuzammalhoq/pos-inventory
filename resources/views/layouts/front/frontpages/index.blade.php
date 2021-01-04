@extends('layouts.front.frontpages.inc.link')

@section('content')

<!-- end header -->

<!-- start main content -->
<main class="main-container">

	<section class="block gray no-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content-box no-margin go-simple">
						<div class="mini-service-sec">
							<div class="row">
								<div class="col-md-4 col-xs-12 col-sm-8 col-lg-4">
									<div class="mini-service">
										<i  class="fa fa-paper-plane"></i>
										<div class="mini-service-info">
											<h3> ACI PRODUCTS</h3>
											<p>unc tincidunt, on cursusau gmetus, lorem Hore unc tincidunt, on cursusa ugmetus, lorem Hore</p> <br> <br>
											<a href="{{ URL::to('/gp-products') }}"><button type="submit" class="btn btn-warning active">GP</button></a>

											
											
											<a href="{{ URL::to('/sp-products') }}"><button type="button" class="btn btn-danger active" style="background-color: #e2141;">SP</button></a>
											<a href="{{ URL::to('/hp-products') }}"><button type="button" class="btn btn-primary">HP</button></a>
										</div>
									</div><!-- Mini Service -->
								</div>
								<div class="col-md-4">
									<div class="mini-service">
										<i  class="fa  fa-newspaper-o"></i>
										<div class="mini-service-info">
											<h3>TIBET PRODUCTS</h3>
											<p>Comming soon... </p> <br> &ensp;<br>
											<button type="button" class="btn btn-warning active">SP</button>
											<button type="button" class="btn btn-danger active">SP</button>
											<button type="button" class="btn btn-primary">HP</button>
										</div>
									</div><!-- Mini Service -->
								</div>
								<div class="col-md-4">
									<div class="mini-service">
										<i  class="fa fa-medkit"></i>
										<div class="mini-service-info">
											<h3>DEVELOPERS</h3>
											<p>Please wait... <br> Be with us for this ...</p> <br>
											<button type="button" class="btn btn-warning active">GP</button>
											<button type="button" class="btn btn-danger active">SP</button>
											<button type="button" class="btn btn-primary">HP</button>
										</div>
									</div><!-- Mini Service -->
								</div><!-- 
								<div class="col-md-3">
									<div class="mini-service">
										<i  class="fa  fa-newspaper-o"></i>
										<div class="mini-service-info">
											<h3>24/h Support</h3>
											<p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
										</div>
									</div> Mini Service -->
								</div>
							</div>
						</div><!-- Mini Service Sec -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Start Our Clients -->

	

	<!-- End Our Clients  -->






</main>
<!-- end main content -->



<div class="container">

</div>



<!-- start footer area -->


@endsection