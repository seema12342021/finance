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
        <link href="css/bootstrap4/bootstrap.min.css" rel="stylesheet">

        <!-- Material Pro Style CSS -->
        <link href="css/Material/style.css" rel="stylesheet">
        
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
        <link href="lib/toastr/toastr.min.css" rel="stylesheet">
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
         
          <a class="navbar-brand" href="index.html">
          <!-- Logo icon -->
          <b class="logo-icon">
          <img src="images/noriapay_extracted_logos/logo_home.png" alt="NoriaPay" class="main-logo">
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
                  
                  <button type="button" class="btn homenav-btn btn-border" data-toggle="modal" data-target="#login-modal">LOGIN</button>
                      
                      <button type="button" class="btn homenav-btn btn-border" data-toggle="modal" data-target="#signup-modal">SIGN UP</button>
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

<!-- ***************modal for Sign In********** -->

<div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="padding-right:0px;">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
         <form class="pl-3 pr-3 form-horizontal form-material" method="POST" action="/signin" id="loginform">
                  @CSRF
                    <div id='login_modal' class="text-center mt-2 mb-4">
                         <a class="text-success">
                            <span class="header-text">Login</span>
                        </a>
                      </div>

                <p id="Login_MsgBox">
                    <div class="form-group social-btn clearfix text-center">
						<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=offline&client_id=282146788841-847uk9pfr6gl8m2oikp4h946n5sut4l9.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fnoriapay.com%2Fsignin&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile&approval_prompt=force" class="btn btn-secondary google-btn"><i class="fab fa-google"></i> Login with Gmail</a>
					</div>

                    <div class="or-seperator"><b>or</b></div>
                
                     <div class="row color">
                        <div class="form-group col-lg-12">
                            <label for="email">Username</label>
                            <input class="form-control" type="email" id="form_username" name="username" required="" placeholder="username">
                        </div>
                     </div>
                     <div class="row color">
                        <div class="form-group col-lg-12">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" id="form_lpassword" name="password" required="" placeholder="password">
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
                                <button type="submit" class="btn btn-primary float-right mr-2" id="submit">Login</button>
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
               <div class="modal-dialog">
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
                            <form class="col-lg-12 pl-3 pr-3" action="" id="forget_password">
                                <!-- email -->
                                @CSRF
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input name="email" id="reset_password_email" class="form-control" type="email" required="" placeholder="Email">
                                    </div>
                                     <div class="col-12 mt-3">
                                        <div id="otp_field"></div>
                                    </div>
                                </div>
                                <!-- pwd -->
                                <div class="form-group text-center">
                                    <div class="col-xs-12">
                                       <div class="exChange">
                                        <button type="submit" id="submit_otp" class="btn btn-success">Reset</button>
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


      <div class="page-wrapper">      
        <div class="container-fluid">
        <div class="home-container">
    
  <div class="main-container">
    <div class="row">
      <p id="Login_MsgBox">
      <div class="col-lg-7 col-md-7 mb-3 px-0 px-xs-15">
        <div class="home-card">
            <h1 class="card-title pt-5">Buy & Sell USDT in INR With 
                Local Bank Transfer </h1>
            <br><br><br>
            <p class="text-coin">Coins we support &nbsp <img src="images/icons/tether_img.png"></p>
            <br><br><br>
            <p class="title-space">Payment Methods</p>
            <br>
            <p class="payment-img">Powered by QuickPaisa</p>
        </div>
      </div>
      <div class="col-md-5 col-lg-5 card-margin">
        <div class="card tabs-nav">
            
          <!-- Nav tabs -->
          <ul class="nav nav-tabs customtab buy-sell-tab" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><div class="tabsParent">
                <div class="tabsIcon">
                    <img src="images/noriapay_extracted_logos/sell_new.svg" alt="">
                </div>
                <div class="tabsContent">
                    <h3>Buy</h3>
                    <p>usdt</p>
                </div>
               </div></a> 
            </li>
            <li class="nav-item"> 
               <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><div class="tabsParent">
               <div class="tabsIcon">
                  <img src="images/noriapay_extracted_logos/buy_new.svg" alt="">
               </div>
               <div class="tabsContent">
                 <h3>Sell</h3>
                 <p>usdt</p>
               </div></div></a>
             </li>
          </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home2" role="tabpanel">
                    <div class="p-3">
                        <form class="pl-3 pr-3" action="">
                            <h3>Payment Methods</h3>
                            <div class="form-group form-radio select-payment">                                 <label class="form-group-payment col-lg-3 col-md-6 col-xs-6 col-sm-4 mb-3" for="radio_1">
                                         <input name="group5" type="radio" id="radio_1" class="with-gap radio-col-orange">
                                          <label class="label-small" for="radio_1">UPI</label>
                                  </label>                                  <label class="form-group-payment col-lg-5 col-md-6 col-xs-6 col-sm-4 mb-3" for="radio_3">
                                         <input name="group5" type="radio" id="radio_3" class="with-gap radio-col-orange">
                                          <label class="label-small" for="radio_3">Bank Account</label>
                                  </label>                            </div>
                            <h3 class="price"><span>1 USDT is Roughly</span> 83.71 <i>INR</i></h3>
                            <div class="inputParent">
                            
                              <div class="inputBox">
                                <div class="input_label">
                                    <label for="input1">You Pay</label>
                                    <input class="error" name="form_inr_amount" value="8371" type="text" id="form_inr_amount_buy">
                                </div>
                                <div class="iconBox">
                                    <img src="images/noriapay_extracted_logos/rupee.svg" alt="">
                                    <p>INR</p>
                                </div>
                              </div>
                              <div class="joinedArrow">
                                  <img src="images/noriapay_extracted_logos/converter.svg" alt="">
                              </div>
                              <input name="form_transaction_type" value="BUY" type="hidden">
                              <div class="inputBox">
                                  <div class="input_label">
                                      <label for="input2">You will receive Roughly</label>
                                      <input class="error" name="form_crypto_amount" value="100" type="text" id="form_crypto_amount_buy">
                                  </div>
                                  <div class="iconBox">
                                      <img src="images/noriapay_extracted_logos/usdt.svg" alt="">
                                      <p>USDT</p>
                                  </div>
                              </div>
                             <p class="xs-text py-1 buyError">
                            </div>
                            <div class="exChange">
                                <a href="" data-toggle="modal" data-target="#signup-modal">Exchange</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="profile2" role="tabpanel">
                    <div class="p-3">
                         <form class="pl-3 pr-3" action="">
                            <h3>Payment Methods</h3>
                            <div class="form-group form-radio select-payment">
                                 <label class="form-group-payment col-lg-3 col-md-3 mb-3" for="radio_1">
                                       <input name="group5" type="radio" id="radio_1" class="with-gap radio-col-orange">
                                        <label class="label-small" for="radio_1">UPI</label>
                                </label>
                                
                                <!--<label class="form-group-payment col-lg-5 col-md-5 mb-3" for="radio_2">
                                       <input name="group5" type="radio" id="radio_2" class="with-gap radio-col-orange">
                                        <label class="label-small" for="radio_2">PayTm</label>
                                </label>-->
                                
                                <label class="form-group-payment col-lg-5 col-md-5 mb-3" for="radio_3">
                                       <input name="group5" type="radio" id="radio_3" class="with-gap radio-col-orange">
                                        <label class="label-small" for="radio_3">Bank Account</label>
                                </label>
                            </div>
                            <h3 class="price"><span>1 USDT is Roughly</span> 78.23 <i>INR</i></h3>
                            <div class="inputParent">
                              <div class="inputBox">
                                <div class="input_label">
                                    <label for="input1">You Pay</label>
                                    <input class="error" name="form_crypto_amount" value="100" type="text" id="form_crypto_amount_sell">
                                </div>
                                <div class="iconBox">
                                    <img src="images/noriapay_extracted_logos/usdt.svg" alt="">
                                    <p>USDT</p>
                                </div>
                              </div>
                              <p class="xs-text py-1 sellError">
                               
                              <div class="joinedArrow">
                                  <img src="images/noriapay_extracted_logos/converter.svg" alt="">
                              </div>
                              <input name="form_transaction_type" value="SELL" type="hidden">
                              <div class="inputBox">
                                  <div class="input_label">
                                      <label for="input2">You will receive Roughly</label>
                                      <input class="error" name="form_inr_amount" type="text" value="7823" id="form_inr_amount_sell">
                                  </div>
                                  <div class="iconBox">
                                      <img src="images/noriapay_extracted_logos/rupee.svg" alt="">
                                      <p>INR</p>
                                  </div>
                              </div>
                            </div>
                            <div class="exChange">
                                <a href="" data-toggle="modal" data-target="#signup-modal">Exchange</a>
                            </div>
                        </form>
                    </div>
                  </div> 
                </div>
             </div>
           </div>
        </div>


        <div class="home-bottom-container pt-4">
            <div class="text-center pt-6 pb-3">
                <h1 class="card-title">How To Exchange?</h1>
            </div>
            <div class="step-section row">
                <div class="col-lg-3 col-sm-12 col-xs-12 wow fadeInUp">
                    <div class="text-center steps-box">
                        <img src="images/icons/man.png" alt="image">
                        <h4 class="text-white">Create Account</h4>
                        <p class="step-title-4 text-white">Sign up your account</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 wow fadeInUp">
                    <div class="text-center steps-box">
                        <img src="images/icons/secure.png" alt="image">
                        <h4 class="text-white">Create Account</h4>
                        <p class="step-title-4 text-white">Sign up your account</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 wow fadeInUp">
                    <div class="text-center steps-box">
                        <img src="images/icons/buy.png" alt="image">
                        <h4 class="text-white">Create Account</h4>
                        <p class="step-title-4 text-white">Sign up your account</p>
                    </div>
                </div>                    
                <div class="col-lg-3 col-sm-12 col-xs-12 wow fadeInUp">
                    <div class="text-center steps-box">
                        <img src="images/icons/transfer.png" alt="image">
                        <h4 class="text-white">Create Account</h4>
                        <p class="step-title-4 text-white">Sign up your account</p>
                    </div>
                </div>
            </div>
        </div>



      </div>

      <section id="about" class="about_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInLeft;">
                    <div class="about-img">
                        <img src="images/icons/about-two.png" class="img-fluid" alt="about-image">
                    </div>
                </div>
                <!--- END COL -->
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInRight;">
                    <div class="about-text">
                        <h2>Build the future of finance</h2>
                        <p class="about-bold">We offers users a fully operational long-term rental platform. It plans to leverages blockchain technology to ensure embarrassing hidden seamless.</p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use
                            a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                    </div>
                    <div class="about_btn">
                        <a href="https://www.youtube.com/watch?v=CMPebxJjE8o" class="video-play btn_one">Watch Video</a>
                    </div>
                </div>
                <!--- END COL -->
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </section>

   </div>
</div>




</div> <!-- Container Fluid close -->
 
 <!-- Main Wrapper Close -->
          
          <footer class="footer text-center">
            <span class="footer-title-1">&copy; 2022 Elite, All Rights Reserved</span>
          </footer>
        <!-- Page Wrapper Close -->      



 <!-- ***************modal for Sign up********** -->
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
                <p id="Sign_MsgBox">
                <form class="pl-3 pr-3 form-horizontal form-material" action="" id="signupForm">
                    @CSRF
                    <div class="form-group social-btn clearfix  text-center">
                        <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=offline&client_id=282146788841-847uk9pfr6gl8m2oikp4h946n5sut4l9.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fnoriapay.com%2Fsignin&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile&approval_prompt=force" class="btn btn-secondary google-btn"><i class="fab fa-google"></i> Sign Up with Gmail</a>
                    </div>

                    <div class="or-seperator"><b>or</b></div>
                   <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="firstname">First Name</label>
                        <input class="form-control" type="text" id="form_firstname" name="firstname" required="" placeholder="firstname">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="lastname">Last Name</label>
                        <input class="form-control" type="text" id="form_lastname" name="lastname" required="" placeholder="lastname">
                    </div>
                  </div>
                 <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="emailaddress">Email</label>
                        <input class="form-control" type="email" required="" id="form_email" name="email" placeholder="email">
                    </div>
                 </div>
                 <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="password">Password <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Password should be at least 8 characters long, including 1 digit, 1 uppercase, 1 lowercase and 1 special character."></i></label>
                        <input class="form-control" type="password" required="" id="form_password" name="password" placeholder="password">
                    </div>
                 </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="confirm_password">Confirm Password</label>
                        <input class="form-control" type="password" required="" id="form_confirm_password" name="confirm_password" placeholder="confirm_password">
                    </div>
                 </div>
                     
                <div class="form-group text-center">
                    <div class="col-xs-12">
                       <div class="exChange">
                            <button type="submit" class="btn btn-primary float-right mr-2" id="submit">Sign Up</button>
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


<!-- ***************modal for User Details********** -->

<div id="user-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <div class="text-center mt-2 mb-4">
                     <a href="index.html" class="text-success">
                        <span class="header-text">User Details</span>
                    </a>
                    
                </div>
                
                <form class="pl-3 pr-3" action="">
                
                 <hr>
               <div class="row">
                    <div class="payment-detail col-lg-12 mb-3">
                        <div class="checkout-item mt-2">
                            <div class="checkout-item-1"> Date of transaction</div>
                            <div class="checkout-item-2"> 12-12-2010</div>
                        </div>
                  </div>
                 <div class="payment-detail col-lg-12 mb-3">
                        <div class="checkout-item mt-2">
                            <div class="checkout-item-1"> Transaction ID</div>
                            <div class="checkout-item-2"> T1234</div>
                        </div>
                  </div>
                  
                   <div class="payment-detail col-lg-12 mb-3">
                        <div class="checkout-item mt-2">
                            <div class="checkout-item-1"> Transaction Amount</div>
                            <div class="checkout-item-2"> 132435 INR</div>
                        </div>
                  </div>
                   <div class="payment-detail col-lg-12 mb-3">
                        <div class="checkout-item mt-2">
                            <div class="checkout-item-1"> Tether Amount</div>
                            <div class="checkout-item-2"> 43.5478 </div>
                        </div>
                  </div>
                </div>
                </form>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- ***************modal for User Details end********** -->


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
          baseUrl: '/',        urlArgs: 'a40e5a35',          deps: [    "js/component/SignIn",
    "js/component/SignUp",
    "js/component/PageMsg",
    "js/component/UserProfile",
],
          config: {
              'js/component/Application':{"Level":{"Level":"Live"},"StaticDomain":"http:\/\/static.noriapay.com","Page_MsgErrors":[],"Page_MsgInfo":[],"Page_MsgWarning":[],"Page_MsgSuccess":[]},    'js/component/SignIn':{"exchange_rate_buy":83.71,"exchange_rate_sell":78.23},    'js/component/Dashboard':{"exchange_rate":78.23},
          }
        };          
        </script>
        <script src='js/require.js'></script>
        <script src="{{url('assets/frontend/js/frontend_js/signup.js')}}"></script>
        <script src="{{url('assets/frontend/js/frontend_js/login.js')}}"></script>
         <script src="{{url('assets/frontend/js/frontend_js/forgetpassword.js')}}"></script>
    </body>
</html>