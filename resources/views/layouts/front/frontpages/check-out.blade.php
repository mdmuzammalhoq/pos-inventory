@extends('layouts.front.frontpages.inc.link')

@section('content')


<main class="main-container">
<!--Checkout Area Start-->
<section class="checkout-area area-padding ptb-40">
<!-- Begin checkout -->
<div class="ld-subpage-content">

<div class="checkout-content">

<!-- Begin checkout section -->
<section class="checkout">



<section class="checkout-section">

<div class="ld-checkout-inner">

<div class="xs-margin"></div>

<div class="accordion" id="collapse">

<div class="accordion-group panel">

<div class="container">
<h2 class="accordion-title">

<span>1. Informations
</span> <a class="accordion-btn open" data-toggle="collapse" href="#collapse-one"></a>
</h2>

<div class="accordion-body collapse in collapse-one" id="collapse-one">

<div class="row accordion-body-wrapper">

<div class="col-sm-6 padding-right-md">
<h3 class="subtitle">new customer ?</h3>

<p>Regiter with us for future convenience:</p>

<form action="" method="POST">





<div class="xs-margin">
</div>

<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track syour orders in your account and more.</p>

<div class="xs-margin">
</div>
<!-- <input type="submit" class="btn btn-lg btn-custom min-width-sm" value="Sign up"> -->
<a href="#" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#signup-modal">Sign Up</a>
</form>
</div>

<div class="md-margin visible-xs clearfix">
</div>

<div class="col-sm-6 padding-left-md">
<h3 class="subtitle">Registered customer</h3>

<p>If you have an account with us, please log in.</p>

<div class="xss-margin">
</div>

<form action="{{ URL::to('customer-login') }}" method="post">
@csrf

<div class="form-group">
<label for="email" class="form-label">Enter your e-mail

<span class="required">*</span>
</label>
<input type="email" name="email" class="form-control input-lg" required>
</div>

<div class="form-group">
<label for="password" class="form-label">Enter your password

<span class="required">*</span>
</label>
<input type="password" name="password" id="password" class="form-control input-lg" required>
</div>

<div class="top-5px">
</div>

<div class="form-group custom-checkbox-wrapper">

<span class="custom-checkbox-container">
    <input type="checkbox" name="remember" value="remember">

    <span class="custom-checkbox-icon"></span>
</span>

<span>Remember Password</span>
</div>

<div class="xss-margin">
</div>
<input type="submit" class="btn btn-sm btn-warning" value="login">
</form>
</div>
</div>

<div class="lg-margin2x">
</div>
</div>
</div>
</div>

<div class="accordion-group panel darkerbg">

<div class="container">
<h2 class="accordion-title">

<span>

</section>


</section>
<!-- End checkout section -->


</div>
<!-- /.checkout-content -->
</div>
<!-- /.ld-subpage-content -->
<!-- End checkout -->
</section>
<!--End of Checkout Area-->


</main>


<!-- Modal -->
<div class="modal fade bs-modal-sm" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Register Now for <span class="text-success">FREE</span></h4>
          </div>
          <div class="modal-body">
          	<div class="well">
          		<form method="POST" action="{{ route('customer.signup') }}" >
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
                                  <input type="text" class="form-control" name="name" placeholder="Your Name">
                                  <span class="help-block"></span>
                              </div>
                               <div class="form-group">
                                  <label class="control-label">Your Email</label>
                                  <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                          
                      </div>
                  
                  <div class="col-xs-6">

                       <div class="form-group">
                          <label for="username" class="control-label">Phone No</label>
                          <input type="text" class="form-control" name="phone" placeholder="Phone No">
                          <span class="help-block"></span>
                      </div>
                       <div class="form-group">
                          <label class="control-label">Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Address">
                          <span class="help-block"></span>
                      </div>
                  	
                        
                       <button type="submit" class="btn btn-success btn-block">Register</button>
                       </div>
                  </div>
              </form>
              </div>
          </div>
      </div>
  </div>
 </div>

   

<!-- /Modals -->
@endsection