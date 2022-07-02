<!DOCTYPE html>
    <html>
      <head>
        <meta charset="UTF-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="Buy & Sell Crypto Currencies With Your Local Currency" >
        <title>Elite > User Profile</title>
        
        <!-- Bootstrap-4 CSS -->
        <link href="css/bootstrap4/bootstrap.min.css?a40e5a35" rel="stylesheet">

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
                                <span class="oval-inner ">{{substr(@$fname,0,1).substr(@$lname,0,1)}}</span>&nbsp <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">                                    <li class="user-list"><a class="px-3 py-2" href="{{url('user_profile')}}"><i class="ti-user"></i> User Profile</a></li>
                                    <li role="separator" class="dropdown-divider"></li>                                   
                                    <li class="user-list"><a class="px-3 py-2" href="{{url('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>                    </ul>
                </div>

            </nav>

        </header>
       </div>
      
<!-- ***************modal for Sign up********** -->

<div class="container-fluid">
 
<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-head">
            </div>
            <div class="modal-body">
                 <button type="button" class="close mb-1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                  
                <div class="text-center mt-2 mb-4">
                     <a class="text-success">
                        <span class="header-text">Sign Up</span>
                    </a>
                </div>
                <p id="Sign_MsgBox"></p>
                <form class="pl-3 pr-3 form-horizontal form-material" action="">
                    <div class="form-group social-btn clearfix  text-center">
						<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=offline&client_id=282146788841-847uk9pfr6gl8m2oikp4h946n5sut4l9.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fnoriapay.com%2Fsignin&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile&approval_prompt=force" class="btn btn-secondary google-btn"><i class="fab fa-google"></i> Sign Up with Gmail</a>
					</div>

                    <div class="or-seperator"><b>or</b></div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="firstname">First Name</label>
                        <input class="form-control" type="text" id="form_firstname" name="form_firstname" required="" placeholder="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="lastname">Last Name</label>
                        <input class="form-control" type="text" id="form_lastname" name="form_lastname" required="" placeholder="">
                    </div>
                  </div>
                 <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="emailaddress">Email</label>
                        <input class="form-control" type="email" required="" id="form_email" name="form_email" placeholder="">
                    </div>
                 </div>
                 <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="password">Password <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Password should be at least 8 characters long, including 1 digit, 1 uppercase, 1 lowercase and 1 special character."></i></label>
                        <input class="form-control" type="password" required="" id="form_password" name="form_password" placeholder="">
                    </div>
                 </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="confirm_password">Confirm Password</label>
                        <input class="form-control" type="password" required="" id="form_confirm_password" name="form_confirm_password" placeholder="">
                    </div>
                 </div>
                    
                <div class="form-group text-center">
                    <div class="col-xs-12">
                       <div class="exChange">
                            <a id="signup" >Sign Up</a>
                        </div>
                        <p class="text-center py-2">By signing up you agree with terms and conditions of the service</p>
                    </div>
                </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- ***************modal for Sign up end********** -->

<!-- ***************modal for Sign In********** -->

<div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="padding-right:0px;">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <form class="pl-3 pr-3 form-horizontal form-material" method="POST" action="/signin" id="loginform">
                    <div id='login_modal' class="text-center mt-2 mb-4">
                         <a class="text-success">
                            <span class="header-text">Login</span>
                        </a>
                      </div>

                <p id="Login_MsgBox"></p>
                    <div class="form-group social-btn clearfix text-center">
						<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=offline&client_id=282146788841-847uk9pfr6gl8m2oikp4h946n5sut4l9.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fnoriapay.com%2Fsignin&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile&approval_prompt=force" class="btn btn-secondary google-btn"><i class="fab fa-google"></i> Login with Gmail</a>
					</div>

                    <div class="or-seperator"><b>or</b></div>
                
                     <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="email">Username</label>
                            <input class="form-control" type="email" id="form_username" name="form_username" required  placeholder="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" id="form_lpassword" name="form_password" required  placeholder="">
                        </div>
                     </div>
                    <div class="form-group">
                        <div class="d-flex">
                            <div class="ml-auto">
                                <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fa fa-lock mr-1"></i> Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                   <div class="form-group text-center">
                        <div class="col-xs-12">
                           <div class="exChange">
                                <a id="signin" >Login</a>
                            </div>
                            <p class="text-center">Don't have an account? <a style="color:#f2711d;font-weight:500;" id="open-signup" data-toggle="modal" data-target="#signup-modal">Sign Up</a></p>
                        </div>
                    </div>
                   
                  </form>
              
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
            
        <div id="recoverform" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog" >
                <div class="modal-content">
            
                   <div class="modal-body">
                     <div class="form-group  pl-3 pr-3 mt-3">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                
                        <div class="logo">
                            <h3 class="font-weight-medium mb-3">Recover Password</h3>
                            <span class="text-muted">Enter your Email and instructions will be sent to you!</span>
                        </div>
                        <div class="row mt-3 form-material">
                            <!-- Form -->
                            <form class="col-lg-12 pl-3 pr-3" action="">
                                <!-- email -->
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input name="form_email" id="reset_password_email" class="form-control" type="email" required="" placeholder="Email">
                                    </div>
                                </div>
                                <!-- pwd -->
                                <div class="form-group text-center">
                                    <div class="col-xs-12">
                                       <div class="exChange">
                                            <a id="reset_password" >Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
      

        </div>
    </div>
 </div>
<!-- ***************modal for Sign In end********** -->


      <div class="page-wrapper">      <div class="container-fluid">
  <div class="welcome-section">
     <h1>User Profile</h1>
  </div>
  
 <div class="main-container">
 
  <div class="row margin-box user-profile">
  
  <!-- Column -->
    <div class="col-lg-4 col-md-4 col-xs-12 px-4 px-xs-15">
      <!-- Column -->
      <div class="card " style="box-shadow: 17px 23px 63px 0 rgba(178, 128, 0, 0.22);">
          <div class="card-body little-profile text-center">
            <div class="pro-img"><img src="{{Auth::user()->img?url(Auth::user()->img):url('images/icons/profile.png')}}" alt="profile image" class=""  height="150px" width="150px">
            </div>
          <h3 class="pb-2 profile-name">{{@$fname}} {{@$lname}}</h3>
          <hr>
            <div class="row">
              <div class="col-md-6 col-sm-12 col-6 border-right"><small><b>Mobile Number: </b></small><br><p style="display: inline-block;"> <span class="pending status_label">{{!empty(Auth::user()->mobile_number)?Auth::user()->mobile_number:'No mobile number'}}</span><p></div>
              <div class="col-md-6 col-sm-12 col-6"><small><b>KYC Status: </b></small><br> <p style="display: inline-block;"><span class="pending status_label">No Document</span></p></div>
            </div>
        </div>
      </div>
    </div>
 <div class="col-lg-8 col-md-8 col-xs-12">
    <p id="Page_MsgBox"></p>
    
      <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link "  href="{{url('user_kyc')}}?tab=1" role="tab">KYC</a>
          </li>
          <li class="nav-item"> <a class="nav-link active" href="{{url('user_profile')}}?tab=2" role="tab">Profile</a>
          </li>
          <li class="nav-item"> <a class="nav-link " href="{{url('user_setting')}}?tab=3" role="tab">Settings</a>
          </li> 
           <li class="nav-item"> <a class="nav-link "  href="{{url('change_password')}}?tab=4" role="tab">Change Password</a>
          </li>
          </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="profile" role="tabpanel">
            <div class="card-body p-4">
              <h4 class="title-space"><span style="color: #343a40">Crypto Wallet Type  </span>                <button class="btn btn-secondary btn-icon float-right" id="button_wallet" type="button" data-toggle="modal"
                  data-target="#wallet-modal">
                <i class="fa fa-plus"></i> Add</button>              </h4>
              <br>
          
              <div class="row pt-2 pb-3" id="crypto_row">                <div class="payment-detail col-md-12 pt-3">
                  <strong>No details to show</strong>
            
                </div>              </div>
          
              <hr>
              <h4 class="title-space pt-3"><span style="color: #343a40">Bank Account Details</span>
                          <button class="btn btn-secondary btn-icon float-right" type="button" id="button_bank" data-toggle="modal" data-target="#bank-modal">
                <i class="fa fa-plus"></i> Add</button>              </h4>
             <br>
          
              <div class="row pt-2 pb-3" id="bank_row">                <div class="payment-detail col-md-12 pt-3">
                  <strong>No details to show</strong>
                </div>      
              </div>
              <hr>
              <h4 class="title-space pt-3"><span style="color: #343a40">UPI Details</span>
                              <button class="btn btn-secondary btn-icon float-right" type="button" data-toggle="modal"
                  data-target="#upi-modal">
                <i class="fa fa-plus"></i> Add</button>              </h4>
              <div class="row pt-4 pb-5" id="upi_row">                <div class="payment-detail pt-3">
                  <strong>No details to show</strong>
                </div>              </div>
                            <!--<h4 class="card-title pt-5">Paytm Details  <button class="btn btn-secondary btn-icon float-right" type="button" data-toggle="modal"
                  data-target="#paytm-modal"><i class="fa fa-plus"></i> Add</button></h4>
              <hr>
              <div class="row" id="paytm_row">
                <div class="payment-detail col-lg-8">
                  <p class="small-text pt-2">Paytm Address</p>
                  <p class="text-muted">abc@paytm.com</p>
                </div>
                <div class="col-md-4 col-xs-6">
                  <div class="form-group text-right mb-3">
                    <button class="btn-icon" type="button" data-toggle="modal"
                      data-target="#paytm-modal"><image src="images/icons/delete.png"></button>
                    <button class="btn-icon red" type="button" ><image src="images/icons/edit.png"></button>
                  </div>
                </div>-->
          
              </div>              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<!-- ***************modal for wallet********** -->
<div id="wallet-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-left col-lg-12 mt-2 mb-4">
          <a href="" class="text-success">
            <span class="header-text ">Add Tether Wallet</span>
          </a>
          <button type="button" class="close text-right" data-dismiss="modal" aria-hidden="true"><img src="images/icons/close.png"></button>
        </div>
        <form id="wallet-modal-form" class="pl-3 pr-3 form-horizontal form-material" method="post" action="">
          <div class="row">
            <div class="form-group form-radio col-md-12 mt-4">
              <label class="title-space">Select Wallet Type </label><br>
              <label class="form-group-radio col-md-3 mb-3 mt-3=2" for="radio_add_omni">
                <input name="form_crypto_wallet_type" value="OMNI" type="radio" id="radio_add_omni" class="with-gap radio-col-orange" >
                <label class="label-small" for="radio_add_omni">BEP20</label>
              </label>
              <input name="form_action_type" type="hidden" value="CRYPTO">
              <label class="form-group-radio col-md-3 mb-3 ml-3 mt-2" for="radio_add_ecr">
                <input name="form_crypto_wallet_type" value="ERC20" type="radio" id="radio_add_ecr" class="with-gap radio-col-orange" >
                <label class="label-small" for="radio_add_ecr">ERC20</label>
              </label>
              <label class="form-group-radio col-md-3 mb-3 ml-3 mt-2" for="radio_add_tcr">
                <input name="form_crypto_wallet_type" value="TRC20" type="radio" id="radio_add_tcr" class="with-gap radio-col-orange" >
                <label class="label-small" for="radio_add_tcr">TRC20</label>
              </label>
              <input type="hidden" name="form_crypto_wallet_id" value="0">
            </div>
            <div class="form-group col-md-12">
              <label class="small-text">Crypto Wallet Name</label>
              <div class="input-box mt-2">
                    <input class="form-control" name="form_crypto_wallet_name" value="" type="text" required="" id="" placeholder="">
                </div>
              </div>
            <div class="form-group col-md-12">
                <label class="small-text">Crypto Wallet Address</label>
                <div class="input-box mt-2">
                    <input class="form-control" name="form_crypto_wallet_address" value="" type="text" required="" id="" placeholder="">
                </div>
            </div>
            <div class="form-group col-md-12 text-right mt-3">
              <button class="btn btn-success" type="submit"> Save  </button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<!-- ***************modal for wallet end********** -->

<!-- ***************modal for bank account********** -->

<div id="bank-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-body">
                <div class="text-left mt-2 mb-4 col-md-12">
                     <a href="" class="text-success">
                        <span class="header-text">Add Bank Account</span>
                    </a>
                    <button type="button" class="close text-right" data-dismiss="modal" aria-hidden="true"><img src="images/icons/close.png"></button>
                </div>
                
                <form class="form-horizontal form-material px-3" method="post" id="bank-modal-form" action="" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group col-md-12">
                        <label class="small-text" for="form_bank_name">Bank Name</label>
                        <div class="input-box mt-2">
                           <input class="form-control" name="form_bank_name" value="" type="text" required="" id="form_bank_name" placeholder="">
                        </div>
                    </div>
                    <input name="form_action_type" type="hidden" value="BANK">
                    <div class="form-group col-md-12">
                       <label class="small-text" for="form_bank_account_name">Bank Account Name</label>
                       <div class="input-box mt-2">
                          <input class="form-control" name="form_bank_account_name" value="" type="text" required="" id="form_bank_account_name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="small-text" for="form_bank_account_number">Bank Account Number</label>
                        <div class="input-box mt-2">
                            <input class="form-control" type="text" value="" name="form_bank_account_number" required="" id="form_bank_account_number" placeholder="">
                        </div>
                    </div>
                     <div class="form-group col-md-12">
                        <label class="small-text" for="form_bank_ifsc_number">IFSC Code</label>
                        <div class="input-box mt-2">
                            <input class="form-control" type="text" value="" name="form_bank_ifsc_number" required="" id="form_bank_ifsc_number" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label class="small-text" for="form_bank_document">Bank Account Proof (Upload statement or cheque)</label>
                        <p style="font-size:0.7rem;color:red;">NOTE : Only (JPEG/PNG/PDF) file types are allowed and MAX size : 10mb</p>
                        <div class="file-box mt-2">
                            <input style="display:none;" type="file" name="form_bank_document[]" value="" class="form_bank_document custom-file-input" id="customFile" onchange="showBankDoc(this)">
                            <label class="file-name file-name-text"><a target="_blank" href="https://s3-ap-south-1.amazonaws.com/static.noriapay.com/"></a></label><label class="file-box-input" for="customFile">Browse file</label>
                         </div>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="hidden" value="" name="form_bank_account_document_path[]" id="form_bank_account_document_path" >
                    </div>
                    <div class="form-group col-md-12 text-right">
                        <button class="btn btn-success " type="submit"> Save  </button>
                    </div>
                  </div>
                </form>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- ***************modal for bank account end********** -->


<!-- ***************modal for UPI ********** -->

<div id="upi-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-body">
                <div class="col-lg-12 text-left mt-2 mb-4">
                     <a href="" class="text-success">
                        <span class="header-text">Add UPI Address</span>
                    </a>
                    <button type="button" class="close text-right" data-dismiss="modal" aria-hidden="true"><img src="images/icons/close.png"></button>
                </div>
                
                <form class="pl-3 pr-3 form-horizontal form-material" method="post" action="" enctype="multipart/form-data">
                <input name="form_action_type" type="hidden" value="UPI">
                 <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="small-text" for="password">UPI Address</label>
                        <div class="input-box mt-2"> 
                             <input class="form-control" type="text" required="" name="form_upiwallet_address" value="" id="form_upiwallet_address" placeholder="">
                        </div>
                    </div>
                    <div class="form-group  col-lg-12 text-right">
                        <button class="btn btn-success " type="submit"> Save  </button>
                    </div>
                    </div>
                </form>
                                 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
                                 
<!-- ***************modal for paytm end********** -->
                                 
<!-- ***************modal for Paytm ********** -->
                                 
<div id="paytm-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                                 
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <div class="text-center mt-2 mb-4">
                     <a href="index.html" class="text-success">
                        <span class="header-text">Add PayTm Address</span>
                    </a>
                                 
                </div>
                                 
                <form class="pl-3 pr-3 form-horizontal form-material" action="" enctype="multipart/form-data">
                                 
                 <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="password">UPI Address</label>
                        <input class="form-control" type="text" required="" id="" placeholder="">
                    </div>
                    <div class="form-group  col-lg-12 text-center">
                        <button class="btn btn-primary" type="submit"> Save  </button>
                    </div>
                    </div>
                </form>
                                 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
                                 
<!-- ***************modal for Paytm end********** -->
                                 
 <!-- ***************************** profile section End******************************* -->
		        </div> <!-- Container Fluid close -->
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
      <script type="text/javascript">
        var require = {
          baseUrl: '/',        urlArgs: 'a40e5a35',          deps: [    "js/component/UserProfile",
    "js/component/PageMsg",
    "js/component/UserProfile",
],
          config: {
              'js/component/Application':{"Level":{"Level":"Live"},"User":{"u_name":"mailtoashusingh1@gmail.com","f_name":"Ashu","u_id":1127},"StaticDomain":"http:\/\/static.noriapay.com","Page_MsgErrors":[],"Page_MsgInfo":[],"Page_MsgWarning":[],"Page_MsgSuccess":[]},    'js/component/UserProfile':{"crypto_wallet_details":{"rval":0,"Success":false,"Message":"No data for this user!"},"crypto_wallet_count":null,"bank_account_name":null,"bank_account_number":null,"bank_ifsc_number":null,"bank_document_link":null,"bank_document_name":null,"bank_name":null,"upi_address":null},
          }
        };          
        </script>
        <script src='js/require.js'></script>
    </body>
  </html>