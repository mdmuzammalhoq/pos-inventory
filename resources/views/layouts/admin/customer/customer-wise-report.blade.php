@extends('layouts.admin.menubar')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Wise Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer Wise Report</li>
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
                  <strong>Customer Wise Credit Report</strong>
                  <input type="radio" name="customer_wise_report" value="credit_report" class="search_value"> &ensp; &ensp;
                  <strong>Customer Wise Paid Report</strong>
                  <input type="radio" name="customer_wise_report" value="paid_report" class="search_value"> &ensp; &ensp;
                </div>
                <div class="show_credit" style="display: none;">
                  <form action="{{route('customers.wise.credit.report')}}" method="GET" id="CustomerCreditForm" target="_blank">
                    <div class="form-row">
                      <div class="col-sm-8">
                        <label> Customer Name (for credit)</label>
                        <select name="customer_id" class="form-control form-control-sm select2">
                          <option value="">Select Customer</option>
                         @foreach($customrs as $customer)
                          <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->phone}} - {{$customer->address}})</option>
                         @endforeach
                        </select>
                      </div>
                      <div class="col-sm-4" style="padding-top: 31px;">
                        <button type="submit" class="btn btn-success btn-sm" >Search</button>
                      </div>

                    </div>
                  </form>
                </div>
                <div class="show_paid" style="display: none;">
                  <form action="{{route('customers.wise.paid.report')}}" method="GET" id="CustomerPaidForm" target="_blank">
                    <div class="form-row">
                      <div class="col-sm-8">
                        <label> Customer Name (for paid)</label>
                        <select name="customer_id" class="form-control form-control-sm select2">
                          <option value="">Select Customer</option>
                        @foreach($customrs as $customer)
                          <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->phone}} - {{$customer->address}})</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="col-sm-4" style="padding-top: 31px;">
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
    if (search_value == 'credit_report') {
      $('.show_credit').show();
    }else{
      $('.show_credit').hide();
    }
    if (search_value == 'paid_report') {
      $('.show_paid').show();
    }else{
      $('.show_paid').hide();
    }
  });
</script>

<script type="text/javascript">
$(document).ready(function () {

  $('#CustomerCreditForm').validate({
    ignore:[],
    errorPlacement: function(error, element){
      if (element.attr("name") == "customer_id") {error.insertAfter(
          element.next());
    }else{
      error.insertAfter(element);
    }
    },
    errorClass: 'text-danger',
    validClass: 'text-success',
    rules: {
      customer_id: {
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

  $('#CustomerPaidForm').validate({
    ignore:[],
    errorPlacement: function(error, element){
   if (element.attr("name") == "customer_id") {error.insertAfter(element.next());
    }else{
      error.insertAfter(element);
    }
    },
    errorClass: 'text-danger',
    validClass: 'text-success',
    rules: {

      customer_id: {
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