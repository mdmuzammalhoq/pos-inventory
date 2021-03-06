@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice List</li>
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
                <h3 class="card-title">Invoice List </h3>
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
                    <td>{{ $data -> description}}</td>
                    <td>{{ $data['payment']['total_amount'] }}</td>

                    <td>
                    	<a target="_blank" class="btn btn-success btn-sm" href="{{route('invoice.print', $data->id)}}">
                    		<i class="fa fa-print"></i>
                    	</a>
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