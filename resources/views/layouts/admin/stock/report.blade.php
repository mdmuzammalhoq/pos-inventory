@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stock Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stock Report</li>
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
                <h3 class="card-title">Stock Report</h3>
                  <a target="_blank" href="{{ route('stock.report.pdf')}}" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-download"></i> Download PDF</a> 

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>In.Qty</th>
                    <th>Sell.Qty</th>
                    <th>Stock</th>
                    <th>Unit</th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $product)
                    @php 
                      $buying_total = App\Purchase::where('cat_id',$product->cat_id)->where('product_id',$product->id)->where('status', '1')->sum('buying_qty');

                      $selling_total = App\InvoiceDetail::where('cat_id',$product->cat_id)->where('product_id',$product->id)->where('status', '1')->sum('selling_qty');
                    @endphp

                  <tr>
                    <td>{{ $product->product_name}}</td>
                    <td>{{ $product['category']['cat_name'] }}</td>
                    <td>{{ $product['supplier']['name'] }}</td>
                    <td>{{$buying_total}}</td>
                    <td>{{$selling_total}}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product['unit']['unit_name'] }}</td>
                    @php 
                      $count_supplier = App\Purchase::where('product_id',$product->id)->count();
                    @endphp
                    
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