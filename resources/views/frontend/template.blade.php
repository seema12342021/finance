<!DOCTYPE html>
    <html> 
      <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
             <meta name="_token" content="{{ csrf_token() }}">
        <meta name="description" content="Buy & Sell Crypto Currencies With Your Local Currency" >
        <title>Elite > template</title>
        
        <!-- Bootstrap-4 CSS --> 
        <link href="{{url('css/bootstrap4/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Material Pro Style CSS -->
        <link href="{{url('css/Material/style.css')}}" rel="stylesheet">
        
        <!-- Favicon Icon -->
        <link rel="icon" href="{{url('images/noriapay_extracted_logos/favicon.png')}}" type="image/gif">

    
        <link href="{{url('lib/toastr/toastr.min.css')}}" rel="stylesheet" />
        <!--WIDGET_CSS-->   
        <script type="text/javascript">
              const siteUrl = '{{asset("")}}';
        </script> 
      <style type="text/css">
        .profile-update{
            opacity: 0;
            width: 35%;
            position: absolute;
            top: 10px;
            right: 126px;
        } 
      </style>
      
      </head>
      <body>
        <div class="preloader">
      <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
  </div>
</div>
        <div id="main-wrapper">        
        <header class="topbar">
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
                            <img src="{{url('images/noriapay_extracted_logos/logo_white.png')}}" alt="NoriaPay" class="main-logo"/>
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
                        <!-- Custom width modal -->                     <!--  <button type="button" class="btn nav-btn" onclick="location.href='/dashboard'">Dashboard</button>
                        <button type="button" class="btn nav-btn" onclick="location.href='/transaction/index?ttype=BUY'">Transactions</button> -->
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
                                <span class="oval-inner ">{{substr(Auth::user()->first_name,0,1).substr(Auth::user()->last_name,0,1)}}</span>&nbsp <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">                                    <li class="user-list"><a class="px-3 py-2" href="{{url('user_setting')}}"><i class="ti-user"></i> User Profile</a></li>
                                    <li role="separator" class="dropdown-divider"></li>                                   
                                    <li class="user-list"><a class="px-3 py-2" href="{{url('user_logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>                    </ul>
                </div>

            </nav>

        </header>
       </div>
      @yield('content')
<!-- ***************modal for Sign up********** -->

          <footer class="footer">
          <span class="footer-title-1">&copy; 2022 Elite, All Rights Reserved</span> <span class="footer-title-2"><a target="_blank" href="static/Terms-of-Use-NoriaPay.pdf">Terms of Use </a>  |    <a target="_blank" href="static/Privacy-Policy-NoriaPay.pdf">Privacy Policy </a></span>
          </footer>
        <!-- Page Wrapper Close -->      


            <script type="text/javascript" src="{{url('js/component/Material/jquery.min.js')}}"></script>
            
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{url('js/component/Material/popper.min.js')}}"></script>
        
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{url('js/bootstrap4/bootstrap.min.js')}}"></script>      
        <script src="{{url('js/component/Material/init.js')}}"></script> 
      <script src="{{url('js/component/Material/app.js')}}"></script>
      <script src="{{url('js/component/Material/perfect-scrollbar.jquery.min.js')}}"></script>
      <script src="{{url('js/component/Material/sparkline.js')}}"></script>
      <script src="{{url('js/component/Material/waves.js')}}"></script>
      <script src="{{url('js/component/Material/sidebarmenu.js')}}"></script>
      <script src="{{url('js/component/Material/custom.js')}}"></script>       <!--SELECT2_JS-->
      <!--Chartist_JS-->
      <!--Calendar_JS-->
      <!--Datatable_JS-->
      <script src="{{url('lib/toastr/toastr.min.js')}}"></script>
       <script src="{{url('lib/widget/js/widget-data.js')}}"> </script>
      <script type="text/javascript">
        var require = {
          baseUrl: '/',        urlArgs: 'a40e5a35',          deps: [    "js/component/UserProfile",
    "js/component/PageMsg",
    "js/component/UserProfile",
],
          config: {
              'js/component/Application':{"Level":{"Level":"Live"},"User":{"u_name":"mailtoashusingh1@gmail.com","f_name":"Ashu","u_id":1127},"StaticDomain":"http:\/\/static.noriapay.com","Page_MsgErrors":[],"Page_MsgInfo":[],"Page_MsgWarning":[],"Page_MsgSuccess":[]},    'js/component/UserProfile':{"user_firstname":"Ashu","user_lastname":"Singh","user_email":"mailtoashusingh1@gmail.com","user_mobile_number":"","signup_via":"social","user_mobile_verified":false},
          }
        };  
        /*$(document).ready(function() {
          $('select[class*="browser-default"]').select2({
            placeholder: "Select tether wallet",
            width: '100%'
          });
        });*/
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })        
        </script>

        <!-- <script src="{{url('js/require.js')}}"></script> -->
         <script src="{{url('assets/frontend/js/frontend_js/profile.js')}}"></script>
          <script src="{{url('assets/frontend/js/frontend_js/payment.js')}}"></script>
          <script src="{{url('assets/frontend/js/frontend_js/forgetpassword.js')}}"></script>
    </body>
  </html>