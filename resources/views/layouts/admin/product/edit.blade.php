@extends('layouts.admin.menubar')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Product  &ensp;  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Product  &ensp;  </li>
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
                <h3 class="card-title">Update Product  &ensp; <a href="{{ route('products.add')}}" class="btn btn-success btn-sm pull-right">
                     Product List</a>
</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="{{ route('products.update', $editData->id )}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-body col-md-12">
                  <div class="row "> 
                    <div class="form-group col-md-2">
                    <label for="product_name">Serial Category</label>

                    <select name="serial_cat" class="form-control">
                      <option>Select a Category</option>

                      
                      
                      <option value="value="{{ $editData->id }}" <?php echo "selected"; ?>
                    
               >{{ $editData->serial_cat }}</option>
                     

                    </select>
                    <span style="color: red;">{{($errors->has('serial_cat'))?($errors->first('serial_cat')):''}}</span>
                  </div>
                    
                    <div class="form-group col-md-2">
                    <label for="product_name">Product Serial *</label>

                    <input type="text" name="serial" value="{{ $editData->serial }}" class="form-control">
                    <span style="color: red;">{{($errors->has('supplier_id'))?($errors->first('supplier_id')):''}}</span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="product_name">Supplier Name *</label>

                    <select name="supplier_id" class="form-control">
                      <option>Select a supplier</option>
                      @foreach($suppliers as $sup)
                      
                      <option value="{{ $sup->id }}" {{($editData->supplier_id == $sup->id) ? "selected":""}} > {{ $sup->name }} </option>
                      @endforeach
                    </select>
                    <span style="color: red;">{{($errors->has('supplier_id'))?($errors->first('supplier_id')):''}}</span>
                  </div>
                 
                

                  <div class="form-group col-md-4">
                    <label for="phone"> Category *</label>
                    <select name="cat_id" class="form-control">
                      <option>Select a unit</option>

                      @foreach($categories as $cat)
                      <option value="{{ $cat->id }}" {{($editData->cat_id == $cat->id) ? "selected" : ""}} > {{ $cat->cat_name }}</option>
                      @endforeach
                    </select>
                    <span style="color: red;">{{($errors->has('cat_id'))?($errors->first('cat_id')):''}}</span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Weight *</label>
                    <input type="text" name="weight" value="{{ $editData->weight }}" class="form-control">
                  </div>

                  <div class="form-group col-md-2">
                    <label for="email">Units</label>
                    <select name="unit_id" class="form-control">
                      <option>Select a unit</option>

                      @foreach($units as $unit)
                      <option value="{{ $unit->id }}" {{($editData->unit_id == $unit->id) ? "selected":""}} >  {{ $unit->unit_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" value="{{ $editData->product_name }}" name="product_name">
                  </div>
                  </div>
                <!-- /.card-body -->
              </div>
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