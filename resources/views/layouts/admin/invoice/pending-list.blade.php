@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Approval Invoice/Order List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Approval Invoice List</li>
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
                <h3 class="card-title">Approval Invoice/Order List </h3>
                  <!-- <a href="" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-plus-circle"></i> Add Invoice</a>  -->

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                  <thead>
                  <tr>
                    <th width="5%">S/N</th>
                    <th width="5%">Date</th>
                    <th width="5%">Customer Name</th>
                    <th width="5%">Invoice No</th>
                    <th width="5%">Description</th>
                    <th width="5%">Amount</th>
                    <th width="5%">Status</th>
                    <th width="5%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($allData as $key => $data)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{  date('d-m-Y', strtotime($data->date)) }}</td>

                    <td>
                    	{{ $data['payment']['customer']['name'] }}-
                    	{{ $data['payment']['customer']['market_name'] }}-
                    	{{ $data['payment']['customer']['phone'] }}-
                    	{{ $data['payment']['customer']['address'] }}
                    </td>
                    <td>Invoice no # {{ $data->invoice_no }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data['payment']['total_amount'] }}</td>
                    
                    <td>
                      @if($data->status == 0)
                      <span class="badge btn-danger">Pending</span>
                      @elseif($data->status == 1)
                      <span class="badge badge-success">Approved</span>
                      @endif
                    </td>
                    <td>
                      @if($data->status == 0)
                      <a title="Approve" href="{{ route('invoice.approve', $data->id)}}"  class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i></a>
                      <a href="{{ route('invoice.delete', $data->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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