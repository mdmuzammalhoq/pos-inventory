@extends('layouts.admin.menubar')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Supplier </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Supplier </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">update Supplier<a href="{{ route('suppliers.add')}}" class="btn btn-success btn-sm pull-right">
                     Supplier List</a>
</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="{{ route('suppliers.update', $edit->id )}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" value="{{ $edit->name }}" name="name">
                    <span style="color: red;">{{($errors->has('name'))?($errors->first('name')):''}}</span>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="{{ $edit->email }}" name="email">
                  </div>
                 
                </div>
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="phone"> Mobile *</label>
                    <input type="text" class="form-control" value="{{ $edit->mobile_no }}" name="phone">
                    <span style="color: red;">{{($errors->has('phone'))?($errors->first('phone')):''}}</span>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" value="{{ $edit->address }}" name="address">
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
</div>

          </div>
       
    </section>

<script type="text/javascript">
$(document).ready(function () {

  $('#myForm').validate({
    rules: {
      name: {
        required: true,
      },
      phone: {
        required: true,
      }
    },
    messages: {
      
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


@endsection