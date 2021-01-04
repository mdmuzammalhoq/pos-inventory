@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Return List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer Return List</li>
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
                <h3 class="card-title">Customer Return List </h3>
                  <a href="{{ route('customer.return.add')}}" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-plus-circle"></i> Return Invoice</a> 

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                  <thead>
                  <tr>
                    <th width="5%">S/N</th>
                    <th width="5%">Date</th>
                    <th width="5%"> Name</th>
                    <th width="5%">Phone</th>
                    <th width="5%">Address</th>
                    <th width="5%">Product</th>
                    <th width="5%">Category</th>
                    <th width="5%"> Status</th>
                    <th width="5%"> Quantity</th>
                    <th width="5%"> Price</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($allData as $key => $data)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{  date('d-m-Y', strtotime($data->return_date)) }}</td>

                    <td>
                    	{{ $data->customer_name }} 
                    </td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->product_name }}</td>
                    <td>{{ $data->cat_name }}</td>
                    <td>{{ $data->return_status }}</td>
                    <td>{{ $data->qty }}</td>
                    <td>{{ $data->price }}</td>

                    
                  </tr>
                  @endforeach
                  </tbody>
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