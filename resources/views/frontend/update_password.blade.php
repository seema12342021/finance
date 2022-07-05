<!DOCTYPE html>
    <html>
        <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="Buy & Sell Crypto Currencies With Your Local Currency">
        <meta name="_token" content="{{ csrf_token() }}">
        <title>ElitPay</title>
        
        <!-- Bootstrap-4 CSS -->
        <link href="{{url('css/bootstrap4/bootstrap.min.css" rel="stylesheet')}}')}}">

        <!-- Material Pro Style CSS -->
        <link href="{{url('css/Material/style.css')}}" rel="stylesheet">
        
        <!-- Favicon Icon -->
        <link rel="icon" href="{{url('images/noriapay_extracted_logos/favicon.png')}}" type="image/gif">

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
        <link href="{{url('lib/toastr/toastr.min.css')}}" rel="stylesheet">
        <!--WIDGET_CSS-->    
        <script type="text/javascript">
      const siteUrl = '{{asset("")}}';
  </script>
      <style type="text/css">
        
    body {
        /*background-image: url(images/icons/homepage_bg.svg);*/
        color: #ffff;
        background-repeat: no-repeat;
        background-position: top right;
        background: linear-gradient( 315deg, rgb(6 198 216), #0e5d6d);
    }
    .modal-open {
      background-position: top right 17px; }

    .page-wrapper {
        position: relative;
        background: none;
    }

    

  @media only screen and (max-width:1024px){
    body {
        background-size: 60%;
    }
  }

@media only screen and (max-width:768px){
    body {
        background-size: contain;
    }
    
    #main-wrapper .home-nav .topbar {
        background: none !important;
    }

    .text-center-xs{
        text-align:center;
    }
    .step-title-3 span{
        display:none;  
    }
    .padding-text{
        padding-left:0px;
    }
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
        <div id="main-wrapper">                  <div class="home-nav">
          <header class="topbar">
          <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header">
          <!-- This is for the sidebar toggle which is visible on mobile only -->
         
          <a class="navbar-brand" href="{{url('/')}}">
          <!-- Logo icon -->
          <b class="logo-icon">
          <img src="{{url('images/noriapay_extracted_logos/logo_home.png')}}" alt="NoriaPay" class="main-logo">
          </b>
          <!--End Logo icon -->
          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-menu ti-close"></i></a>
                  </div>
                  <!-- ============================================================== -->
                  <!-- End Logo -->
                  <!-- ============================================================== -->
                  <div class="navbar-collapse collapse" id="navbarSupportedContent">
                  
                  <ul class="navbar-nav mr-auto">
                  </ul>
                  <!-- ============================================================== -->
                  <!-- Right side toggle and nav items -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav">
                  <!-- ============================================================== -->
                  <!-- Comment -->
                  <!-- ============================================================== -->
                  <div class="btn-list">
                  <!-- Custom width modal -->
                  
                  {{-- <button type="button" class="btn homenav-btn btn-border" data-toggle="modal" data-target="#login-modal">LOGIN</button>
                      
                      <button type="button" class="btn homenav-btn btn-border" data-toggle="modal" data-target="#signup-modal">SIGN UP</button> --}}
                          <!-- Full width modal -->
                          
                          </div>
                          <li class="nav-item dropdown">
                          </li>
                          
                          <li class="nav-item dropdown">
                          </li>
                      </ul>
                  </div>
              </nav>
          </header>
      </div>                    
    </div>

            

        
       
      


<div class="container-fluid">
      
<div class="page-wrapper">     
    <div class="container-fluid">     
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url() no-repeat center center; background-size: cover;">
    <div class="auth-box p-4 bg-white rounded">
        <div id="loginform">
            <div class="logo">
                <h3 class="box-title mb-3">Change password</h3>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal mt-3 form-material" id="updateform">
                        @CSRF
                        <input type="hidden" name="remember_token" value="{{$hash}}">
                        <div class="form-group mb-3">
                            <div class="">
                                <input class="form-control" type="password" name="form_newPassword" value="" required="" placeholder="New Password" id="newpassword"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="">
                                <input class="form-control" type="password" name="form_confirmPassword" value="" required="" placeholder="Confirm Password" id="confirmpassword"> </div>
                        </div>
                      
                       <div class="form-group text-center">
                            <div class="col-xs-12">
                               <div class="exChange">
                                   <button class="btn btn-success" type="submit">Update Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
		        </div> <!-- Container Fluid close -->
 </div>
</div> <!-- Main Wrapper Close -->

<footer class="footer text-center">
<span class="footer-title-1">&copy; 2022 Elite, All Rights Reserved</span>
</footer>
        <!-- Page Wrapper Close -->      





<!-- ***************modal for User Details end********** -->


            <script type="text/javascript" src="{{url('js/component/Material/jquery.min.js')}}"></script>
            
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{url('js/component/Material/popper.min.js')}}"></script>
        
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{url('js/bootstrap4/bootstrap.min.js')}}"></script>      <script src="js/component/Material/init.js')}}"></script> 
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
          baseUrl: '/',        urlArgs: 'a40e5a35',          deps: [    "{{url('js/component/SignIn')}}",
    "{{url('js/component/SignUp')}}",
    "{{url('js/component/PageMsg')}}",
    "{{url('js/component/UserProfile')}}",
],
          config: {
              'js/component/Application':{"Level":{"Level":"Live"},"StaticDomain":"http:\/\/static.noriapay.com","Page_MsgErrors":[],"Page_MsgInfo":[],"Page_MsgWarning":[],"Page_MsgSuccess":[]},    'js/component/SignIn':{"exchange_rate_buy":83.71,"exchange_rate_sell":78.23},    'js/component/Dashboard':{"exchange_rate":78.23},
          }
        };          
        </script>
        <!-- <script src='js/require.js'></script> -->
        <script src="{{url('assets/frontend/js/frontend_js/signup.js')}}"></script>
        <script src="{{url('assets/frontend/js/frontend_js/login.js')}}"></script>
         <script src="{{url('assets/frontend/js/frontend_js/forgetpassword.js')}}"></script>
         <script src="{{url('assets/frontend/js/frontend_js/payment.js')}}"></script>
    </body>
</html>
          