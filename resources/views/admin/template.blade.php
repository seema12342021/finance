<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{csrf_token()}}">
  <title>CMS | {{@$title}}</title>

  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">

  
    @if(!empty($css_files) && is_array($css_files) && count($css_files) > 0)
      @foreach ($css_files as $key => $value)
        <link rel="stylesheet" href="{{asset($value)}}">
      @endforeach
    @endif
    <script type="text/javascript">
      const siteUrl = '{{asset("")}}';
  </script>
  <style type="text/css">
    .ck.ck-editor__editable_inline>:last-child{
            height: 150px; 
        }

  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
    <!--   <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
  <!--     <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"> 
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('uploads/akestech.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Akestech Info</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('uploads',[Auth::user()->img])}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{url('dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('user_list')}}" class="nav-link {{ Request::is('user_list') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                User
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('commision')||Request::is('network') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('commision')||Request::is('network') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
                <p>
            Fees
              <i class="fas fa-angle-left right"></i>
                </p>
            </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/tables/simple.html" class="nav-link"><a href="{{url('commision')}}" class="nav-link {{ Request::is('commision') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Commision</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('network')}}" class="nav-link {{ Request::is('network') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Network</p>
                    </a>
                  </li>
                  
                </ul>
            </li>


            <li class="nav-item {{ Request::is('transactionSell')||Request::is('transactionBuy') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('transactionSell')||Request::is('transactionBuy') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
                <p>
            Transaction
              <i class="fas fa-angle-left right"></i>
                </p>
            </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/tables/simple.html" class="nav-link"><a href="{{url('transactionBuy')}}" class="nav-link {{ Request::is('transactionBuy') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Buy</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('transactionSell')}}" class="nav-link {{ Request::is('transactionSell') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sell</p>
                    </a>
                  </li>
                  
                </ul>
            </li>

          <li class="nav-item">
            <a href="{{url('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Logout
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1 class="m-0">{{@$title}}</h1>
          </div> --><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{@$title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @php echo @$content; @endphp
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{date("Y")}} <a href="https://akestech.com/">Akestech Infotech Pvt Ltd</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>

 @if(!empty($js_files) && is_array($js_files) && count($js_files) > 0)
    @foreach ($js_files as $key => $value)
      <script type="text/javascript" src="{{asset($value)}}"></script>
    @endforeach
  @endif

<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
 
</body>
</html>
