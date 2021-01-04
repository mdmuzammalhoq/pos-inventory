@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supplier/Product Wise Stock Report</h1>
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
                <h3 class="card-title">Select Criteria</h3>
                   

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-sm-12 text-center" >
                  <strong>Supplier wise report</strong>
                  <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value"> &ensp; &ensp;
                  <strong>Product wise report</strong>
                  <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value"> &ensp; &ensp;
                </div>
                <div class="show_supplier" style="display: none;">
                  <form action="{{route('stock.report.supplier.wise.pdf')}}" method="GET" id="SupplierWiseForm" target="_blank">
                    <div class="form-row">
                      <div class="col-sm-8">
                        <label>Select Supplier</label>
                        <select name="supplier_id" class="form-control form-control-sm">
                          <option value="">Select Supplier</option>
                          @foreach($suppliers as $supp)
                             <option value="{{ $supp->id}}">{{ $supp->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-sm-4" style="padding-top: 31px;">
                        <button type="submit" class="btn btn-success btn-sm" >Search</button>
                      </div>

                    </div>
                  </form>
                </div>
                <div class="show_product" style="display: none;">
                  <form action="{{route('stock.report.product.wise.pdf')}}" method="GET" id="ProductWiseForm" target="_blank">
                    <div class="form-row">
                      <div class="col-md-3">
                    <label for="product_name">Category Name *</label>

                    <select name="cat_id" id="cat_id" class="form-control select2 form-control-sm">
                      <option>Select a Category</option>
                      @foreach($categories as $cat)
                      
                      <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                      @endforeach
                    </select>
                    
                  </div>
                  
                  <div class="col-md-6">
                    <label for="phone"> Product *</label>
                    <select name="product_id" id="product_id" class="form-control select2 form-control-sm">
                      <option>Select a product</option>

                      
                    </select>
                    
                  </div>
                      <div class="col-sm-3" style="padding-top: 31px;">
                        <button type="submit" class="btn btn-success btn-sm" >Search</button>
                      </div>

                    </div>
                  </form>
                </div>
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

<script type="text/javascript">
  $(document).on('change', '.search_value', function(){
    var search_value = $(this).val();
    if (search_value == 'supplier_wise') {
      $('.show_supplier').show();
    }else{
      $('.show_supplier').hide();
    }
    if (search_value == 'product_wise') {
      $('.show_product').show();
    }else{
      $('.show_product').hide();
    }
  });
</script>

<script type="text/javascript">
$(document).ready(function () {

  $('#SupplierWiseForm').validate({
    ignore:[],
    errorPlacement: function(error, element){
      if (element.attr("name") == "supplier_id") {error.insertAfter(
          element.next());
    }else{
      error.insertAfter(element);
    }
    },
    errorClass: 'text-danger',
    validClass: 'text-success',
    rules: {
      supplier_id: {
        required: true,
      }
    },
    messages: {
      
    },
  });
});
</script>

<script type="text/javascript">
$(document).ready(function () {

  $('#ProductWiseForm').validate({
    ignore:[],
    errorPlacement: function(error, element){
      if (element.attr("name") == "cat_id") {error.insertAfter(element.next());
      else if (element.attr("name") == "product_id") {error.insertAfter(element.next());
    }else{
      error.insertAfter(element);
    }
    },
    errorClass: 'text-danger',
    validClass: 'text-success',
    rules: {
      cat_id: {
        required: true,
      },
      product_id: {
        required: true,
      }
    },
    messages: {
      
    },
  });
});
</script>

<script type="text/javascript">
  $(function(){
    $(document).on('change', '#cat_id', function(){
      var cat_id = $(this).val();
      $.ajax({
        url: "{{route('get-product')}}",
        type: "GET",
        data: {cat_id:cat_id},
        success:function(data){
          var html = '<option value="">Select Product</option>';
          $.each(data,function(key,v){
            html += '<option value="'+v.id+'">'+v.product_name+'</option>'
          });
          $('#product_id').html(html);
        }
      });
    });
  });
</script>

@endsection