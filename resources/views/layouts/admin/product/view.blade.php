@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product List </h3>
                  <a href="{{ route('products.add')}}" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-plus-circle"></i> Add Product</a> 

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Product Serial</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Weight</th>
                    <th>Unit</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $product)
                  <tr>
                    <td>{{ $product->product_name}}</td>
                    <td>{{ $product->serial_cat}}{{ $product->serial}}</td>
                    <td>{{ $product['category']['cat_name'] }}</td>
                    <td>{{ $product['supplier']['name'] }}</td>
                    <td>{{ $product->weight }}</td>
                    <td>{{ $product['unit']['unit_name'] }}</td>
                    @php 
                      $count_supplier = App\Purchase::where('product_id',$product->id)->count();
                    @endphp
                    <td>
                      <a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> 
                      @if($count_supplier<1)
                      <a href="{{ route('products.delete', $product->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection