@extends('layouts.admin.menubar')

@section('content')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Purchase  &ensp;  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Purchase  &ensp;  </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Purchase  </h3> 
                <a href="{{ route('purchase.view')}}" class="btn btn-success btn-sm float-right">
                   <i class="fa fa-list"></i>  Purchase List</a>

              </div>
              <div class="card-body">
                <div class="row">

                  <div class="form-group col-md-4">
                    <label for="product_name">Date *</label>

                    <input class="form-control datepicker" id="date" readonly />
                    
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Purchase No *</label>
                    <input type="text" name="purchase_no" class="form-control " id="purchase_no">
                  </div>
                 
                
                  <div class="form-group col-md-4">
                    <label for="product_name">Supplier Name *</label>

                    <select name="supplier_id" id="supplier_id" class="form-control select2">
                      <option>Select a supplier</option>
                      @foreach($suppliers as $sup)
                      
                      <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                      @endforeach
                    </select>
                    
                  </div>
                  <div class="form-group col-md-4">
                    <label for="phone"> Category *</label>
                    <select name="cat_id" id="cat_id" class="form-control select2">
                      <option>Select a category</option>

                      
                    </select>
                    
                  </div>
                  <div class="form-group col-md-4">
                    <label for="phone"> Product *</label>
                    <select name="product_id" id="product_id" class="form-control select2">
                      <option>Select a product</option>

                      
                    </select>
                    
                  </div>
                  
                <!-- /.card-body -->

                <div class="form-group col-md-2" style="padding-top: 30px;">
                  <a class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> Add Item</a>
                 
                </div>
              </div>

              <div class="card-body">
                <form action="{{ route('purchase.store')}}" method="post" id="myForm">
                  @csrf
                  <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Description</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="addRow" class="addRow">
                    
                  
                  </tbody>
                  <tbody>
                    <tr>
                      <td colspan="5"></td>
                      <td>
                        <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #efebeb;">
                      </td>
                      <td></td>
                    </tr>
                  
                  </tbody>
                  
                  </table>
                  <div class="form-group">
                    <button class="btn btn-primary" id="storeButton">Purchase Store</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card -->
</div>

          </div>
       
    </section>

    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
<script type="text/javascript">
  $(function(){
    $(document).on('change', '#supplier_id', function(){
      var supplier_id = $(this).val();
      $.ajax({
        url: "{{route('get-category')}}",
        type: "GET",
        data: {supplier_id:supplier_id},
        success:function(data){
          var html = '<option value="">Select Category</option>';
          $.each(data,function(key,v){
            html += '<option value="'+v.cat_id+'">'+v.category.cat_name+'</option>'
          });
          $('#cat_id').html(html);
        }
      });
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

<script type="text/x-handlebars-template" id="document-template">
  <tr class="delete_add_more_item" id="delete_add_more_item">
    <input type="hidden" name="date[]" value="@{{date}}">
    <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
    <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
    <td>
      <input type="hidden" name="cat_id[]" value="@{{cat_id}}">@{{cat_name}}
    </td>
    <td>
      <input type="hidden" name="product_id[]" value="@{{product_id}}">@{{product_name}}
    </td>
    <td>
      <input type="text" min="1" class="form-control form-control-sm text-right buying_qty" name="buying_qty[]" value="1">
    </td>
    <td>
      <input type="text" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
    </td>
    <td>
      <input type="text" class="form-control form-control-sm text-right " name="description[]" value="">
    </td>
    <td>
      <input type="text" class="form-control form-control-sm text-right buying_price" name="buying_price[]" value="0" readonly>
    </td>
    <td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>
  </tr>
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click",".addeventmore", function(){
      var date = $('#date').val();
      var purchase_no = $('#purchase_no').val();
      var supplier_id = $('#supplier_id').val();
      var supplier_name = $('#supplier_id').find('option:selected').text();
      var cat_id = $('#cat_id').val();
      var cat_name = $('#cat_id').find('option:selected').text();
      var product_id = $('#product_id').val();
      var product_name = $('#product_id').find('option:selected').text();


      if (date == '') {
        $.notify("Date is required", {globalPosition: 'top-right', className: 'error'});
        return false;
      }
      if (purchase_no == '') {
        $.notify("Purchase no is required", {globalPosition: 'top-right', className: 'error'});
        return false;
      }
      if (supplier_id == '') {
        $.notify("Supplier is required", {globalPosition: 'top-right', className: 'error'});
        return false;
      }
      if (cat_id == '') {
        $.notify("Category is required", {globalPosition: 'top-right', className: 'error'});
        return false;
      }
      if (product_id == '') {
        $.notify("Product is required", {globalPosition: 'top-right', className: 'error'});
        return false;
      }


      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var data = {
              date:date,
              purchase_no:purchase_no,
              supplier_id:supplier_id,
              supplier_name:supplier_name,
              cat_id:cat_id,
              cat_name:cat_name,
              product_id:product_id,
              product_name:product_name
      };

      var html = template(data);
      $("#addRow").append(html);
    });

    $(document).on("click", ".removeeventmore", function(event){
      $(this).closest(".delete_add_more_item").remove();
      totalAmountPrice();
    });

    $(document).on('keyup click','.unit_price,.buying_qty', function(){

      var unit_price = $(this).closest("tr").find("input.unit_price").val();
      var qty = $(this).closest("tr").find("input.buying_qty").val();
      var total = unit_price*qty;
      $(this).closest("tr").find("input.buying_price").val(total);
      totalAmountPrice();
    });

    function totalAmountPrice(){
      var sum=0;
      $(".buying_price").each(function(){
        var value = $(this).val();
        if (!isNaN(value) && value.length != 0) {
          sum += parseFloat(value);
        }
      });
      $('#estimated_amount').val(sum);
    }

  });
</script>
@endsection