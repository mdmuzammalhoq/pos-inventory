 <!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kopotakkho Ent.</title>
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/daterangepicker/daterangepicker.css">
<!-- sweet alert -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{asset('public/admin')}}/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('public/admin')}}/css/select2-bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/dist/css/adminlte.min.css">
<!-- sweet alert -->

<!-- DataTable --> 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/dist/css/adminlte.min.css">
<!-- DataTable -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/summernote/summernote-bs4.min.css">
  <!-- jQuery -->
<script src="{{asset('public/admin')}}/dist/js/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify.js/2.0.0/notify.min.js"></script>
<style type="text/css">
  .notifyjs-corner{
    z-index: 10000 !important;
  }
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">History</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          
          <div class="dropdown-divider"></div>
          <a href="{{ route('log.out')}}" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       @php
       $prefix = Request::route()->getPrefix();
       $route = Route::current()->getName();
       @endphp   
           <li class="nav-item has-treeview {{($prefix=='/suppliers')? 'menu-open':''}}">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Suppliers
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('suppliers.view') }}" class="nav-link {{($route=='suppliers.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Supplier</p>
                </a>
              </li>
              
            </ul>
          </li>
          
         <li class="nav-item has-treeview {{($prefix=='/customers')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Customers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('customers.view') }}" class="nav-link {{($route=='customers.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customers.credit') }}" class="nav-link {{($route=='customers.credit')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customers.paid') }}" class="nav-link {{($route=='customers.paid')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customers.wise.report') }}" class="nav-link {{($route=='customers.wise.report')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Customer Wise Report</p>
                </a>
              </li>
              
            </ul>
          </li>
          
         <li class="nav-item has-treeview {{($prefix=='/units')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Units
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('units.view') }}" class="nav-link {{($route=='units.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Units</p>
                </a>
              </li>
              
            </ul>
          </li>
          
         <li class="nav-item has-treeview {{($prefix=='/categories')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('categories.view') }}" class="nav-link {{($route=='categories.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
              
            </ul>
          </li>
          
         <li class="nav-item has-treeview {{($prefix=='/products')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('products.view') }}" class="nav-link {{($route=='products.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Products</p>
                </a>
              </li>
              
            </ul>
          </li>
          
         <li class="nav-item has-treeview {{($prefix=='/purchase')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Purchase
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('purchase.view') }}" class="nav-link {{($route=='purchase.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('purchase.pending.list') }}" class="nav-link {{($route=='purchase.pending.list')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('purchase.report.daily') }}" class="nav-link {{($route=='purchase.report.daily')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Purchase Report</p>
                </a>
              </li>
              
            </ul>
          </li>
          
        

          <li class="nav-item has-treeview {{($prefix=='/acireturn')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                  ACI Return
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('return.aci.view') }}" class="nav-link {{($route=='return.aci.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Aci Return</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('return.aci.pending.list') }}" class="nav-link {{($route=='return.aci.pending.list')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Return</p>
                </a>
              </li>
              
            </ul>
          </li>
          
         <li class="nav-item has-treeview {{($prefix=='/invoice')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Invoice / Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('invoice.view') }}" class="nav-link {{($route=='invoice.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Invoice / Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('invoice.pending.list') }}" class="nav-link {{($route=='invoice.pending.list')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Invoice / Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('invoice.print.list') }}" class="nav-link {{($route=='invoice.print.list')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Invoice </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('invoice.report.daily') }}" class="nav-link {{($route=='invoice.report.daily')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Invoice Report</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/stock')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Manage Stock 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('stock.report') }}" class="nav-link {{($route=='stock.report')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Stock Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('stock.report.supplier.product.wise') }}" class="nav-link {{($route=='stock.report.supplier.product.wise')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Supplier/Product Wise Report</p>
                </a>
              </li>
             
              
            </ul>
          </li>
          <li class="nav-item has-treeview {{($prefix=='/returncustomer')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Customer Returns 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('customer.view') }}" class="nav-link {{($route=='customer.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Returns </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customer.return.to.approve.list') }}" class="nav-link {{($route=='customer.return.to.approve.list')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Customer Returns </p>
                </a>
              </li>
              
             
              
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@yield('content')

@if(Session()->has('success'))
  <script type="text/javascript">

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Data Saved '
})

  </script>
@elseif(Session()->has('error'))
  <script type="text/javascript">

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Sorry! Data Error '
})

  </script>

@endif

  <footer class="main-footer">
<!--     <strong>Copyright &copy; 2020 <a href="#">Kopotakkho Enterprise</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Design & Developed By </b> Coders Sign
    </div> -->

    Kopotakkho Enterprise
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('public/admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/admin')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('public/admin')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('public/admin')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('public/admin')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/admin')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('public/admin')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('public/admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/admin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admin')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/admin')}}/dist/js/pages/dashboard.js"></script>


<!-- Bootstrap 4 -->
<script src="{{asset('public/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('public/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admin')}}/dist/js/demo.js"></script>
<script src="{{asset('public/admin')}}/dist/js/handlebars.min.js"></script>
<script src="{{asset('public/admin')}}/dist/js/notify.min.js"></script>
<script src="{{asset('public/admin')}}/dist/js/select2.full.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- delete sweet alert -->
<script type="text/javascript">
  $(function(){
    $(document).on('click', '#delete', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
       Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to delete this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            window.location.href = link;
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
    });
  });
 
</script>

<!-- Approve sweet alert -->
<script type="text/javascript">
  $(function(){
    $(document).on('click', '#approveBtn', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
       Swal.fire({
          title: 'Are you sure?',
          text: " to approve this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
          if (result.value) {
            window.location.href = link;
            Swal.fire(
              'Approved!',
              'success'
            )
          }
        })
    });
  });
 
</script>

<script type="text/javascript">
    $(function () {

    $('.select2').select2();

    })
</script>

</body>
</html>

