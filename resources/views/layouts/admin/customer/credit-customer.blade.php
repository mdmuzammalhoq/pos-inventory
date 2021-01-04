@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Credit Customer List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Credit Customer List</li>
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
                <h3 class="card-title">Credit Customer List </h3>
                  <a target="_blank" href="{{ route('customers.credit.pdf')}}" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-download"></i> Download Pdf</a> 

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Customer Name (SR)</th>
                    <th>Invoice No</th>
                    <th>Date</th>
                    <th>Due Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $payment)
                  <tr>
                    <td>
                      {{ $payment['customer']['name']}}-
                      ({{ $payment['customer']['phone']}} - {{ $payment['customer']['address']}})
                    </td>
                    <td>invoice # {{ $payment['invoice']['invoice_no']}}</td>
                    <td>{{ date("d-m-Y", strtotime($payment['invoice']['date'])) }}</td>
                    <td>{{ $payment->due_amount}}</td>

                    <td>
                      <a href="{{route('edit.customer.invoice', $payment->invoice_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> 
                      <a href="{{ route('customer.invoice.detail.pdf', $payment->invoice_id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
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