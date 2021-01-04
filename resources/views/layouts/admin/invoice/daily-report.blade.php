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
            <h1>Manage Invoice Report   </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Invoice Report   </li>
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
                <h3 class="card-title">Select Report Criteria  </h3> 
                

              </div>
              <div class="card-body">
                <form action="{{route('invoice.report.daily.pdf')}}" method="GET" target="_blank" id="myForm">
                	<div class="row">
                  
                  <div class="form-group col-md-4">
                    <label for="product_name">Start Date </label>
                    <input class="form-control datepicker" id="date" readonly  name="start_date" />
                  </div>
                  <div class="form-group col-md-4">
                    <label for="product_name">End Date </label>
                    <input class="form-control datepicker1" id="date" readonly  name="end_date" />
                  </div>

                  
                <!-- /.card-body -->

                <div class="form-group col-md-2" style="padding-top: 30px;">
                  <button type="submit" class="btn btn-success">Search</button>
                 
                </div>
              </div>
                </form>


            </div>
            <!-- /.card -->
</div>

          </div>
       
    </section>

    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
        $('.datepicker1').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script type="text/javascript">
$(document).ready(function () {

  $('#myForm').validate({
    rules: {
      start_date: {
        required: true,
      },
      end_date: {
        required: true,
      }
    },
    messages: {
      
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

@endsection