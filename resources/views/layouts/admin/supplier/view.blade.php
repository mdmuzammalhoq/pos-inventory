@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supplier List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Supplier List</li>
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
                <h3 class="card-title">Supplier List </h3>
                  <a href="{{ route('suppliers.add')}}" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-plus-circle"></i> Add Supplier</a> 

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Supplier Name</th>
                    <th>Mobile no</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $supplier)
                  <tr>
                    <td>{{ $supplier->name}}</td>
                    <td>{{ $supplier->mobile_no}}</td>
                    <td>{{ $supplier->email}}</td>
                    <td>{{ $supplier->address}}</td>
                    @php 
                      $count_supplier = App\Product::where('supplier_id',$supplier->id)->count();
                    @endphp
                    <td>
                      <a href="{{ route('suppliers.edit', $supplier->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> 
                      @if($count_supplier<1)
                      <a href="{{ route('suppliers.delete', $supplier->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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