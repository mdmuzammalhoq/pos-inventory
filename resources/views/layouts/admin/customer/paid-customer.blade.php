@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Paid Customer List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Paid Customer List</li>
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
                <h3 class="card-title">Paid Customer List </h3>
                  <a target="_blank" href="{{ route('customers.paid.pdf')}}" class="btn btn-success btn-sm float-right">
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
                    <th>Paid Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  	@php 
                  		$total_paid = '0';
                  	@endphp
                    @foreach($allData as $payment)
                  <tr>
                    <td>
                      {{ $payment['customer']['name']}}-
                      ({{ $payment['customer']['phone']}} - {{ $payment['customer']['address']}})
                    </td>
                    <td>invoice # {{ $payment['invoice']['invoice_no']}}</td>
                    <td>{{ date("d-m-Y", strtotime($payment['invoice']['date'])) }}</td>
                    <td>{{ $payment->paid_amount}} TK</td>

                    <td>
                     
                      <a href="{{ route('customer.invoice.detail.pdf', $payment->invoice_id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
                  </tr>
                  @php 
                	$total_paid += $payment->paid_amount;
                @endphp

                  @endforeach
                  
                </table>
                

                <table id="example1" class="table table-bordered table-striped">
                	<tr>
                		<td colspan="2" style="text-align: right; font-weight: bold;">Grand Total : </td>
                		<td colspan="2" style="text-align: left; font-weight: bold;">{{$total_paid}} TK</td>
                	</tr>
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