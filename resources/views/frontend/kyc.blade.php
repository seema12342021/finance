<!DOCTYPE html>
    <html>
      <head>
        <meta charset="UTF-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="Buy & Sell Crypto Currencies With Your Local Currency" >
        <title>Elite > Kyc</title>
        
        <!-- Bootstrap-4 CSS --> 
        <link href="css/bootstrap4/bootstrap.min.css?a40e5a35" rel="stylesheet">

        <!-- Material Pro Style CSS -->
        <link href="css/Material/style.css?a40e5a35" rel="stylesheet">
        
        <!-- Favicon Icon -->
        <link rel="icon" href="images/noriapay_extracted_logos/favicon.png" type="image/gif">

        
        <link href="lib/toastr/toastr.min.css" rel="stylesheet" />
        <!--WIDGET_CSS-->    
      <script type="text/javascript">
          siteUrl = '{{ asset('') }}'
      </script>
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
          <li class="nav-item"> <a class="nav-link active"  href="{{url('user_kyc')}}?tab=1" role="tab">KYC</a>
          </li>
          <li class="nav-item"> <a class="nav-link " href="{{url('user_setting')}}?tab=3" role="tab">Settings</a>
          </li>
          <li class="nav-item"> <a class="nav-link "  href="{{url('change_password')}}?tab=4" role="tab">Change Password</a>
          </li>       
      </ul>
        <!-- Tab panes -->
        <div class="tab-content">        <!-- ***************************** KYC section ******************************* -->
          <div class="tab-pane active" id="kyc" role="tabpanel">
            <div class="card-body">
              <form class="form-horizontal form-material"  id="form_profile">
                @csrf
                <div class="form-group">
                  <label class="col-md-12"><span class="title-space">Upload ID Proof</span></label>
                  
                  <p class="col-md-12 small-text pt-2">Please upload any one of the document from the list below</p>
                  <div class="col-md-12 mt-3" id = "kycdetails">
                    <div class="form-group form-radio upload-doc">
                      <label class="form-group-payment  col-lg-4 col-md-4 mb-3 {{ (@$docs->proof_type == 1) ? 'selected-radio':'disable-radio' }}" for="radio_k1">
                        <input name="form_kyc_document_type" type="radio" id="radio_k1" value="DRIVING_LICENSE" class="with-gap radio-col-orange" data-id="1">
                        <label class="label-small pt-1" for="radio_k1"><img src="images/icons/contact_2.png" alt="Driving License" class="main-logo" /> Driving License</label>
                      </label>
                      
                      <label class="form-group-payment col-lg-3 col-md-3 mb-3 {{ (@$docs->proof_type == 2) ? 'selected-radio':'disable-radio' }}" for="radio_k2">
                        <input name="form_kyc_document_type" type="radio" id="radio_k2" value="PASSPORT" class="with-gap radio-col-orange" data-id="2">
                        <label class="label-small" for="radio_k2"><img src="images/icons/contact_1.png" alt="Passport " class="main-logo" /> Passport</label>
                      </label>
                      
                      <label class="form-group-payment col-lg-4 col-md-4 mb-3 {{ (@$docs->proof_type == 3) ? 'selected-radio':'disable-radio' }}" for="radio_k3">
                        <input name="form_kyc_document_type"  type="radio" id="radio_k3" value="AADHAAR_CARD" class="with-gap radio-col-orange" data-id="3">
                        <label class="label-small" for="radio_k3"><img src="images/icons/contact.png" alt="AADHAAR_CARD" class="main-logo" /> Aadhaar Card</label>
                      </label>
                    </div>
                    @if($docs)
                    <div id='document_labels'>
                          <div class="form-group" id="D-labels">
                            <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <p class="small-text mb-2">Your KYC document-1 : <br><a target="_blank" href="{{ url('uploads/kyc',[@$docs->front_img]) }}">{{ @$docs->front_img }}</a> </p>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <p class="small-text mb-2">Your KYC document-2 : <br><a target="_blank" href="{{ url('uploads/kyc',[@$docs->back_img]) }}">{{ @$docs->back_img }}</a> </p>
                            </div>
                          </div>
                      </div>
                  </div>
                    @else                
                    <div id="kyc_upload" style='display:none'>
                      <div id="file_format_note">
                        <p style="color:red;font-size: 14px;padding-bottom: 10px;">NOTE : Only (JPEG/PNG/PDF) file types are allowed and MAX size : 10mb</p>
                      </div>
                      <div id='document_labels'>
                          <div class="form-group" id="D-labels">
                              <div class="row" >
                                  <div class="col-md-6">
                                      <p class="small-text">Upload  front</p>
                                  </div>
                                  
                                  <div class="col-md-6">
                                     <p class="small-text">Upload  Back</p>
                                  </div>
                              </div>
                          </div>
                      </div>

                       <div class="form-group" id='document_uploads'>
                          <div class="row" >
                            <div class="col-lg-6 col-md-6">
                              <input style="z-index: 9; opacity: 0; width: 100%; height: 90px; position: absolute; right: 0px; left: 0px; top:0px; margin-right: auto; margin-left: auto;" name="front_image" id="filer_input2" type="file" onchange="showFront(this)">
                              <div class="upload-input-dragDrop ">
                                <div class="upload-input-inner row">
                                  <div class="upload-input-icon col-md-3 col-3 pt-3 text-right"><img src="images/icons/camera.png">
                                  </div>
                				  <div class="col-md-9 col-8 p-0">
                                    <div class="upload-input-text"><p>Drag document here or <a class="upload-input-orange">browse</a> to upload</p>
                                    </div>
                			      </div>        
                                </div>
                              </div>
                		      <label class="file-name-front pb-3"></label>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <input style="z-index: 9; opacity: 0; width: 100%; height: 90px; position: absolute; right: 0px; left: 0px; top:0px; margin-right: auto; margin-left: auto;" name="back_image" id="filer_input2" type="file" onchange="showBack(this)">
                              <div class="upload-input-dragDrop ">
                                <div class="upload-input-inner row">
                                  <div class="upload-input-icon col-md-3 col-3 pt-3 text-right"><img src="images/icons/camera.png">
                                  </div>
                				  <div class="col-md-9 col-8 p-0">
                                    <div class="upload-input-text"><p>Drag document here or <a class="upload-input-orange">browse</a> to upload</p>
                                    </div>
                				  </div>
                                </div>
                              </div>
                			  <label class="file-name-back pb-3"></label>
                            </div>
                          </div>
                       </div>

                                               
                    </div>
                    @endif
                  </div>
                
                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="row">
                        
            
                        
                <div class="form-group col-lg-12 pt-4">
                  <button type="submit" class="btn btn-success float-right">Send Details</button>
                </div>
            </form>
            </div>
          </div>
        </div>
    <!-- ***************************** KYC section End******************************* -->
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
 </div>
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
      
         <script src="{{url('assets/frontend/js/frontend_js/profile.js')}}"></script>
        <script src='js/require.js'></script>
    </body>
  </html>