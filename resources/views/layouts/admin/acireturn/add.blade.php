@extends('layouts.admin.menubar') 

@section('content')

@php 
ini_set('max_execution_time', 0);
@endphp
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
            <h1>Add Aci Return  &ensp;  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Aci Return  &ensp;  </li>
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
                <h3 class="card-title">Add Aci Return  </h3> 
                <a href="{{ route('invoice.view')}}" class="btn btn-success btn-sm float-right">
                   <i class="fa fa-list"></i>  Aci Return List</a>

              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-2">
                    <label>Invoice No *</label>

                    <input type="text" class="form-control" name="invoice_no" id="invoice_no" value="{{ $invoice_no }}" />
                    
                  </div>
                  <div class="form-group col-md-2">
                    <label for="product_name">Date *</label>
                    <input class="form-control datepicker" id="date" readonly  />
                  </div>
                 
                
                  <div class="form-group col-md-3">
                    <label for="product_name">Category Name *</label>

                    <select name="cat_id" id="cat_id" class="form-control select2">
                      <option>Select a Category</option>
                      @foreach($categories as $cat)
                      
                      <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                      @endforeach
                    </select>
                    
                  </div>
                  
                  <div class="form-group col-md-3">
                    <label for="phone"> Product *</label>
                    <select name="product_id" id="product_id" class="form-control select2">
                      <option>Select a product</option>

                      
                    </select>
                    
                  </div>
                  
                  <div class="form-group col-md-2">
                    <label for="phone">Current Stock </label>
                     <input type="text" name="current_stock_qty" id="current_stock_qty" class="form-control" readonly style="background-color: #d5eaff;">
                  </div>
                  
                <!-- /.card-body -->

                <div class="form-group col-md-2" style="padding-top: 30px;">
                  <a class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> Add Item</a>
                 
                </div>
              </div>

              <div class="card-body">
                <form action="{{ route('return.aci.store')}}" method="post" id="myForm">
                  @csrf
                  <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="addRow" class="addRow">
                    
                  
                  </tbody>
                  <tbody>
                    <tr style="display: none;">
                      <td colspan="4" class="text-right">Discount</td>
                      <td><input type="text" name="discount_amount" id="discount_amount" class="form-control form-control-sm discount_amount text-right" placeholder="Enter Discount Amount"></td>
                    </tr>
                    <tr>
                      <td colspan="4" class="text-right">Grand Total</td>
                      <td>
                        <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #efebeb;">
                      </td>
                      <td></td>
                    </tr>
                  
                  </tbody>
                  
                  </table>
                  <br>
                  <div class="form-group" style="display: none;">
                    <textarea name="description" class="form-control" id="description" placeholder="Note "></textarea>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label>Paid Status</label>
                      <select name="paid_status" id="paid_status" class="form-control-sm form-control">
                        <option>Select Status</option>
                        <option value="full_paid">Full paid</option>
                        <option style="display: none;" value="full_due">Full Due</option>
                        <option style="display: none;" value="partial_paid">Partial Paid</option>
                      </select>
                      <input type="text" name="paid_amount" class="form-control paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                    </div> 
                    <div class="form-group col-md-7">
                      <label>Customer Name</label>
                      <select name="customer_id" id="customer_id" class="form-control-sm form-control"> <!-- select2 class for search -->
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->phone }} - {{ $customer->address  }}) </option>
                        @endforeach
                        <option value="0">Admin</option>
                      </select>
                      
                    </div> 
                  </div>

                  <div class="form-row new_customer" style="display: none;">
                    <div class="form-group col-md-4">
                      <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="write customer name">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="market_name" id="market_name" class="form-control form-control-sm" placeholder="write customer market name">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="phone" id="phone" class="form-control form-control-sm" placeholder="write customer phone">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="write customer address">
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary" id="storeButton">Invoice Store</button>
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
    $(document).on('change', '#product_id', function(){
      var product_id = $(this).val();
      $.ajax({
        url: "{{route('check-product-stock')}}",
        type: "GET",
        data: {product_id:product_id},
        success:function(data){
          $('#current_stock_qty').val(data);
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
    <input type="hidden" name="date" value="@{{date}}">
    <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
    <td>
      <input type="hidden" name="cat_id[]" value="@{{cat_id}}">@{{cat_name}}
    </td>
    <td>
      <input type="hidden" name="product_id[]" value="@{{product_id}}">@{{product_name}}
    </td>
    <td>
      <input type="number" min="1" class="form-control form-control-sm text-right selling_qty" name="selling_qty[]" value="1">
    </td>
    <td>
      <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
    </td>
    <td>
      <input type="number" class="form-control form-control-sm text-right selling_price" name="selling_price[]" value="0" readonly>
    </td>
    <td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>
  </tr>
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click",".addeventmore", function(){
      var date = $('#date').val();
      var invoice_no = $('#invoice_no').val();
      var cat_id = $('#cat_id').val();
      var cat_name = $('#cat_id').find('option:selected').text();
      var product_id = $('#product_id').val();
      var product_name = $('#product_id').find('option:selected').text();


      if (date == '') {
        $.notify("Date is required", {globalPosition: 'top-right', className: 'error'});
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
              invoice_no:invoice_no,
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

    $(document).on('keyup click','.unit_price,.selling_qty', function(){

      var unit_price = $(this).closest("tr").find("input.unit_price").val();
      var qty = $(this).closest("tr").find("input.selling_qty").val();
      var total = unit_price*qty;
      $(this).closest("tr").find("input.selling_price").val(total);
     $('#discount_amount').trigger('keyup');
    });

    $(document).on('keyup', '#discount_amount', function(){
      totalAmountPrice();
    });

    function totalAmountPrice(){
      var sum=0;
      $(".selling_price").each(function(){
        var value = $(this).val();
        if (!isNaN(value) && value.length != 0) {
          sum += parseFloat(value);
        }
      });

      var discount_amount = parseFloat($('#discount_amount').val());
      if (!isNaN(discount_amount) && discount_amount.length != 0) {
        sum -= parseFloat(discount_amount);
      }

      $('#estimated_amount').val(sum);
    }

  });
</script>

<script type="text/javascript">
      //Paid Status
  $(document).on('change', '#paid_status', function(){

    var paid_status = $(this).val();
    if (paid_status == 'partial_paid') {
      $('.paid_amount').show();
    }else{
      $('.paid_amount').hide();
    }
  });
</script>

<script type="text/javascript">
      //customer
  $(document).on('change', '#customer_id', function(){

    var customer_id = $(this).val();
    if (customer_id == '0') {
      $('.new_customer').show();
    }else{
      $('.new_customer').hide();
    }
  });
</script>
@endsection