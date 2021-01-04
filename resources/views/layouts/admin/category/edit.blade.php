@extends('layouts.admin.menubar')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Category </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Category </li>
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
                <h3 class="card-title">Edit Category  <a href="{{ route('categories.view')}}" class="btn btn-success btn-sm pull-right">Category List</a>
</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="{{ route('categories.update', $edit->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="name">Category Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ $edit->cat_name }}" name="cat_name">
                    <span style="color: red;">{{($errors->has('cat_name'))?($errors->first('cat_name')):''}}</span>
                  </div>
                </div>
               
                <div class="card-body col-md-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mt-4">Update</button>
                </div>
              </div>
              </form>
            </div>
            <!-- /.card -->
</div>

          </div>
       
    </section>




@endsection