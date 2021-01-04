@extends('layouts.admin.menubar')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product  &ensp;  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Product  &ensp;  </li>
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
                <h3 class="card-title">Add Product  </h3> 
                <a href="{{ route('products.view')}}" class="btn btn-success btn-sm float-right">
                   <i class="fa fa-list"></i>  Product List</a>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="{{ route('products.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                
                <div class="card-body col-md-12">
                  <div class="row ">
                  <div class="form-group col-md-2">
                    <label for="product_name">Serial Category</label>

                    <select name="serial_cat" class="form-control">
                      <option>Select a Category</option>
                      <option value="SP">SP</option>
                      <option value="GP">GP</option>
                      <option value="HP">HP</option>
                     
                    </select>
                    <span style="color: red;">{{($errors->has('supplier_id'))?($errors->first('supplier_id')):''}}</span>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="product_name">Product Serial *</label>

                    <input type="text" name="serial" placeholder="product Serial" class="form-control">
                    <span style="color: red;">{{($errors->has('supplier_id'))?($errors->first('supplier_id')):''}}</span>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="product_name">Supplier Name *</label>

                    <select name="supplier_id" class="form-control">
                      <option>Select a supplier</option>
                      @foreach($suppliers as $sup)
                      
                      <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                      @endforeach
                    </select>
                    <span style="color: red;">{{($errors->has('supplier_id'))?($errors->first('supplier_id')):''}}</span>
                  </div>
                  
                 
                
                
                  <div class="form-group col-md-4">
                    <label for="phone"> Category *</label>
                    <select name="cat_id" class="form-control">
                      <option>Select a unit</option>

                      @foreach($categories as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                      @endforeach
                    </select>
                    <span style="color: red;">{{($errors->has('cat_id'))?($errors->first('cat_id')):''}}</span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Weight *</label>
                    <input type="text" name="weight" placeholder="product weight" class="form-control">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="email">Units *</label>
                    <select name="unit_id" class="form-control">
                      <option>Select a unit</option>

                      @foreach($units as $unit)
                      <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="product_name">Product Name *</label>
                    <input type="text" class="form-control" placeholder="product name" name="product_name">
                  </div>
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