<!DOCTYPE html>
    <html>
      <head>
        <meta charset="UTF-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="Buy & Sell Crypto Currencies With Your Local Currency" >
        <title>Elite > Transactions</title>
       
        <!-- Bootstrap-4 CSS -->
        <link href="css/bootstrap4/bootstrap.min.css?a40e5a35" rel="stylesheet">
        <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

        <!-- Material Pro Style CSS -->
        <link href="css/Material/style.css?a40e5a35" rel="stylesheet">
        
        <!-- Favicon Icon -->
        <link rel="icon" href="images/noriapay_extracted_logos/favicon.png" type="image/gif">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--SELECT2_CSS-->
        <!--Chartist_CSS-->
        <!--Calendar_CSS-->
        <!--Datatable_CSS-->
        <link href="lib/toastr/toastr.min.css" rel="stylesheet" />
        <!--WIDGET_CSS-->    
      <style type="text/css">
        
      </style>
      
      </head>
      <body>
        <div class="preloader">
  <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
  </div>
</div>
        <div id="main-wrapper">        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{url('/')}}">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="images/noriapay_extracted_logos/logo_white.png" alt="NoriaPay" class="main-logo" />
                            <!-- Light Logo icon -->
                            <!--<img src="images/noriapay_extracted_logos/SVG/logo_blue_bg.svg" alt="NoriaPay" class="light-logo" />-->
                        </b>
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Mega Menu -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- End Mega Menu -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                    <div class="btn-list">
                        <li><a class="btn nav-btn user-url" href="{{url('user-dashboard')}}">Dashboard</a></li>
                        <li><a class="btn nav-btn user-url" href="{{url('transaction')}}">Transactions</a></li>                      </div>
                        <li class="nav-item dropdown"> 
                         
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                         
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->    
                       <li class="nav-item ">
                            <a class="nav-link dropdown dropdown-toggle waves-effect waves-dark oval" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="oval-inner">{{@$fname.@$lname}}</span>&nbsp <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">                                     <li class="user-list"><a class="px-3 py-2" href="{{url('user_setting')}}?tab=1"><i class="ti-user"></i> User Profile</a></li>
                                    <li role="separator" class="dropdown-divider"></li>                                   
                                    <li class="user-list"><a class="px-3 py-2" href="{{url('user_logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>                     </ul>
                </div>

            </nav>

        </header>
       </div>
      



      <div class="page-wrapper">      <div class="container-fluid">    <!-- Row -->
<div class="welcome-section">
     <h1>Transactions History</h1>
  </div>
<div class="main-container">

  <p id="Page_MsgBox"></p>
  <div class="card margin-box">
   <div class="row ">
      <div class="nav-tabs table-tab col-md-12 ">
        <ul class="nav profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link {{@$_GET['ttype'] == 1?'active':''}}"  href="?ttype=1" role="tab">Buy</a>
          </li>
          <li class="nav-item"> <a class="nav-link {{@$_GET['ttype'] == 2?'active':''}}" href="?ttype=2" role="tab">Sell</a>
          </li>                      
        </ul>
      </div>       
    </div>
    <div class="card-body pt-0">
      <div class="row">
        <div class="col-lg-12 col-12">
                      
          <div class="form-body">                  
            
          
            <div class="tab-content">

              <div class="tab-pane active" id="all_buy" role="tabpanel">
 
            {{--     <div class="col-lg-12 col-12 px-0">
                  <div class="input-group footable-filtering-search mt-2"><label class="sr-only">Search</label>
                    <form method="GET" action="">
                       <div class="row col-md-12">
                          <input type="hidden" name="ttype" value="BUY">
                           <input type="text" class="form-control input-bg col-md-2 col-12 mt-2" name="form_reference_number" value="" placeholder="Search By Ref No.">
                           <div class="col-md-3 col-12 d-flex  ml-2 mt-2 pm-xs-0">
                             <p class="small-box"> <span>From</span> <input type="date" name="form_start_date" class="form-control " value="" placeholder="Search">
                             </p>
                           </div>
                           <div class="col-md-3 col-12 d-flex ml-4 mt-2 pm-xs-0">
                              <p class="small-box"> <span>To</span> 
                                 <input type="date" name="form_end_date" class="form-control" value="" placeholder="Search">
                              </p>
                           </div> 
                           <div class="col-md-3 col-12 d-flex ml-3 mt-2 pm-xs-0">
                            <button type="submit" class="btn btn-search" value="submit" id="submit">Search </button>              
                            <a class="btn btn-refresh footable-show ml-3" href="?ttype=BUY" type="reset"> <i class="fas fa-sync" aria-hidden="true"></i>
                            </a>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
                <hr class="p-0">                            
                <div class="row">
                  <div class="col-lg-12 col-12">                    <p>Nocxczx transaction to show</p>                  </div>
                  
                </div>
              
              </div>            
          </div>
          </div>
        </div> --}}

        <div class="col-md-12 mt-4">
              <div class="card mb-25">
                    <div class="card-header">
                        <h6>Commision Table</h6>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="drag-drop-wrap">
                            <div class="table-responsive table-revenue w-100 mb-30">
                                <table class="table mb-0 table-basic" id="transaction_datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Date</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Tether</th>
                                            <th>INR</th>
                                            <th>Wallet Address</th>
                                            <th>Mode</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      </div>
     
    </div>
   <div class="col-md-12"></div>
  </div>
</div>		        </div> <!-- Container Fluid close -->
 </div>
</div> <!-- Main Wrapper Close -->
          
          <footer class="footer">
          <span class="footer-title-1">&copy; 2022 Elite, All Rights Reserved</span> <span class="footer-title-2"><a target="_blank" href="static/Terms-of-Use-NoriaPay.pdf">Terms of Use </a>  |    <a target="_blank" href="static/Privacy-Policy-NoriaPay.pdf">Privacy Policy </a></span>
          </footer>
        <!-- Page Wrapper Close -->      


			<script type="text/javascript" src="js/component/Material/jquery.min.js"></script>
			
	    <!-- Bootstrap tooltips -->
	    <script type="text/javascript" src="js/component/Material/popper.min.js"></script>
	    
	    <!-- Bootstrap core JavaScript -->
	    <script type="text/javascript" src="js/bootstrap4/bootstrap.min.js"></script>      <script src="js/component/Material/init.js"></script> 
      <script src="js/component/Material/app.js"></script>
      <script src="js/component/Material/perfect-scrollbar.jquery.min.js"></script>
      <script src="js/component/Material/sparkline.js"></script>
      <script src="js/component/Material/waves.js"></script>
      <script src="js/component/Material/sidebarmenu.js"></script>
      <script src="js/component/Material/custom.js"></script>       <!--SELECT2_JS-->
      <!--Chartist_JS-->
      <!--Calendar_JS-->
      <!--Datatable_JS-->
      <script src="lib/toastr/toastr.min.js"></script>
       <script src="lib/widget/js/widget-data.js"> </script>
       <script type="text/javascript" src="/assets\plugins/datatables/jquery.dataTables.min.js"></script>
          <script type="text/javascript" src="/assets\plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
          <script type="text/javascript" src="/assets\plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
          <script type="text/javascript" src="/assets\plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      
        <script src='js/require.js'></script>
        <script src="{{url('assets/frontend/js/frontend_js/transaction.js')}}"></script>
    </body>
  </html>