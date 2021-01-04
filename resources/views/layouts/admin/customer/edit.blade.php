@extends('layouts.admin.menubar')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Customers </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Customers </li>
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
                <h3 class="card-title">update Customers </h3>

                <a href="{{ route('customers.add')}}" class="btn btn-success btn-sm float-right">
                  <i class="fa fa-list"></i>  Customers List</a>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="{{ route('customers.update', $edit->id )}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="name">Name </label>
                    <input type="text" class="form-control" value="{{ $edit->name }}" name="name">
                    
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="{{ $edit->email }}" name="email">
                  </div>
                 
                </div>
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="phone"> Mobile </label>
                    <input type="text" class="form-control" value="{{ $edit->phone }}" name="phone">
                    
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




@endsection