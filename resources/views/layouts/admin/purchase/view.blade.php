@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase List</li>
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
                <h3 class="card-title">Purchase List </h3>
                  <a href="{{ route('purchase.add')}}" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-plus-circle"></i> Add Purchase</a> 

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                  <thead>
                  <tr>
                    <th width="5%">S/N</th>
                    <th width="5%">Prch. No</th>
                    <th width="5%">Date</th>
                    <th width="5%">Supplier</th>
                    <th width="5%">Category</th>
                    <th width="5%">Product</th>
                    <th width="5%">Desc.</th>
                    <th width="5%">Qty</th>
                    <th width="5%">Unit Price</th>
                    <th width="5%">Total Price</th>
                    <th width="5%">Status</th>
                    <th width="5%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $purchase)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $purchase->purchase_no }}</td>
                    <td>{{ date('d-m-Y', strtotime($purchase->date)) }}</td>
                    <td>{{ $purchase['supplier']['name'] }}</td>
                    <td>{{ $purchase['category']['cat_name'] }}</td>
                    <td>{{ $purchase['product']['product_name'] }}</td>
                    <td>{{ $purchase->description }}</td>
                    
                    <td>
                      {{ $purchase->buying_qty }}
                      
                    </td>
                    <td>{{ $purchase->unit_price }}</td>
                    <td>{{ $purchase->buying_price }}</td>
                    <td>
                      @if($purchase->status == 0)
                      <span class="badge btn-danger">Pending</span>
                      @elseif($purchase->status == 1)
                      <span class="badge badge-success">Approved</span>
                      @endif
                    </td>
                    <td>
                      @if($purchase->status == 0)
                      <a href="{{ route('purchase.delete', $purchase->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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