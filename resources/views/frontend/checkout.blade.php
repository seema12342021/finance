                                
<!DOCTYPE html>
    <html>
      <head>
        <meta charset="UTF-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="_token" content="{{ csrf_token() }}">
    		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="Buy & Sell Crypto Currencies With Your Local Currency" >
        <title>NoriaPay > Checkout</title>
        <title>Material Design Bootstrap</title>
        
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

        <link href="lib/select2/dist/css/select2.min.css" rel="stylesheet" />
        <!--Chartist_CSS-->
        <!--Calendar_CSS-->
        <!--Datatable_CSS-->
        <link href="lib/toastr/toastr.min.css" rel="stylesheet" />
        <!--WIDGET_CSS-->    
      <style type="text/css">
        
.disabled {
    pointer-events: auto;
 }
#card-button-skip-buy {
  border: solid 2px #9ba2ad;
  background-color:  #9ba2ad;
}
#card-button-skip-sell {
  border: solid 2px #9ba2ad;
  background-color:  #9ba2ad;
}

      </style>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-6N796RHFE2"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
      
        gtag('config', 'G-6N796RHFE2');
      </script>
      <!-- End Google Analytics pixel code  -->


      <!-- Facebook Pixel Code -->
      <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '184604236524312');
        fbq('track', 'PageView');
      </script>
      <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=184604236524312&ev=PageView&noscript=1"
      /></noscript>
      <!-- End Facebook Pixel Code -->


      <!-- Adroll Remarketing Pixel Code -->
      <script type="text/javascript">
        adroll_adv_id = "ICZ724TBRBCIFLC6ZBTW4K";
        adroll_pix_id = "7MFME5DYJZHTHKFGPC3PDN";
        adroll_version = "2.0";
    
        (function(w, d, e, o, a) {
            w.__adroll_loaded = true;
            w.adroll = w.adroll || [];
            w.adroll.f = [ 'setProperties', 'identify', 'track' ];
            var roundtripUrl = "https://s.adroll.com/j/" + adroll_adv_id
                    + "/roundtrip.js";
            for (a = 0; a < w.adroll.f.length; a++) {
                w.adroll[w.adroll.f[a]] = w.adroll[w.adroll.f[a]] || (function(n) {
                    return function() {
                        w.adroll.push([ n, arguments ])
                    }
                })(w.adroll.f[a])
            }
    
            e = d.createElement('script');
            o = d.getElementsByTagName('script')[0];
            e.async = 1;
            e.src = roundtripUrl;
            o.parentNode.insertBefore(e, o);
        })(window, document);
        adroll.track("pageView");
      </script>
      <!-- End Adroll Remarketing Pixel Code -->
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
                    <a class="navbar-brand" href="">
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
                        <li><a class="btn nav-btn user-url" href="dashboard">Dashboard</a></li>
                        <li><a class="btn nav-btn user-url" href="transaction/index?ttype=BUY">Transactions</a></li>                      </div>
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
                                <span class="oval-inner ">{{@$fname.@$lname}}</span>&nbsp <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">                                    <li class="user-list"><a class="px-3 py-2" href="profile?tab=1"><i class="ti-user"></i> User Profile</a></li>
                                    <li role="separator" class="dropdown-divider"></li>                                   
                                    <li class="user-list"><a class="px-3 py-2" href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
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
     <h1>Checkout</h1>
  </div>
   <div class="main-container">
   
      <div class="row xchange-box">
        <!-- Column -->
        <div class="col-lg-5 col-md-5 px-4 px-xs-15">
           <div class="card tabs-nav">
                <!-- Nav tabs -->
             <ul class="nav nav-tabs customtab buy-sell-tab " role="tablist">
                <li class="nav-item"  id="buy_tab" > <a class="nav-link  active " data-toggle="tab" href="#buy" role="tab" 1>
                  <div class="tabsParent">
                    <div class="tabsIcon">
                        <img src="images/noriapay_extracted_logos/sell_new.svg" alt="">
                    </div>
                    <div class="tabsContent">
                        <h3>Buy</h3>
                        <p>usdt</p>
                    </div>
                  </div></a> 
                </li>
                <li class="nav-item" id="sell_tab" > <a class="nav-link " data-toggle="tab" href="#sell" role="tab" >
                  <div class="tabsParent">
                    <div class="tabsIcon">
                        <img src="images/noriapay_extracted_logos/buy_new.svg" alt="">
                    </div>
                    <div class="tabsContent">
                        <h3>Sell</h3>
                        <p>usdt</p>
                    </div>
                  </div></a>
               </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane  active " id="buy" role="tabpanel">
                    <div class="p-3">
                        <form class="pl-3 pr-3" method="POST" id="form_buy_transaction" action="">
                        
                             <h3 class="price"><span>1 USDT is Roughly</span> <strong id="usdt-price">{{((@$commision_buy->fees / 100) * 83.92)+83.92}} </strong> <i>INR</i></h3>
                             <div class="inputParent">
                             
                                <div class="inputBox">
                                    <div class="input_label">
                                        <p class="xs-text mb-0" for="input1">You Pay</p>
                                        <input class="error" onblur="divide()" name="form_inr_amount" type="text" value="{{@$data->inr}}" id="form_inr_amount_buy">
                                    </div>
                                    <div class="iconBox">
                                        <img src="images/noriapay_extracted_logos/rupee.svg" alt="">
                                        <p>INR</p>
                                    </div>
                                </div>
                                
                                <div class="joinedArrow">
                                    <img src="images/noriapay_extracted_logos/converter.svg" alt="">
                                    <input name="form_transactiusdt-priceon_type" value="BUY" type="hidden" >
                                </div>
                                <div class="inputBox">
                                    <div class="input_label">
                                        <p class="xs-text mb-0" for="input2">You will receive Roughly</p>
                                        <input class="error" type="text" onblur="multiply()" name="form_crypto_amount" value="{{@$data->crypto}}" id="form_crypto_amount_buy">
                                    </div>
                                    <div class="iconBox">
                                        <img src="images/noriapay_extracted_logos/usdt.svg" alt="">
                                        <p>USDT</p>
                                    </div>
                                </div>
                                <p class="xs-text py-1 buyError" style="display:none;"></p>
                            </div>
                            
                            {{-- 
                            <div class="form-group tab-pane pt-4">
                                <h3>Payment Methods</h3>
                            </div>
                            <div class="form-group form-radio select-payment">                                <label class="form-group-payment col-lg-3 col-md-6 col-xs-6 col-sm-4 mb-2" for="radio_b1">
                                       <input name="form_payment_method" type="radio" id="radio_b1" value="UPI" class="with-gap radio-col-orange" checked>
                                        <label class="label-small" for="radio_b1">UPI</label>
                                </label>  
                              <label class="form-group-payment col-lg-5 col-md-6 col-xs-6 col-sm-4 mb-3" for="radio_b3">
                                       <input name="form_payment_method" type="radio" id="radio_b3" value="BANK" class="with-gap radio-col-orange" >
                                        <label class="label-small" for="radio_b3">Bank Account</label>
                                </label>                            
                            </div>  --}}
                          {{-- <div class="form-group select2-selection">
                                <p class="xs-text">Where should we transfer your Tether?</p>
                                <div class="input-box">
                                    <select id="crypto_wallet_select" class="browser-default form-control">
                                    <option value=""></option>
                                    <option value=" ">Other</option>
                                </select>
                              </div>
                            </div> --}} 
                               <div id="checkout_wallet_type" class="form-group">
                                <p class="xs-text mt-2">Select Tether Wallet Type</p>
                                <div class="form-radio">
                                  <div class="row select-payment ">
                                @if(!empty($wallet))
                                @foreach($wallet as $key=>$value)
                                    <div class="col-md-4 mb-2">
                                      <label class="form-group-payment col-lg-12 col-xs-6  mr-1" for="radio_omni">
                                        <input name="form_crypto_wallet_type" type="radio" id="radio_omni{{@$value->id}}" value="{{@$value->id}}" class="with-gap radio-col-orange" >
                                        <label class="label-small" for="radio_omni">{{@$value->name}}</label>
                                      </label>
                                    </div>
                                @endforeach
                                @endif
                                 </div> 
                                </div>
                            </div>

                            <div class="form-group">
                                <p class="xs-text">Tether Wallet Address</p>
                                <div class="input-box">
                                    <input class="form-control" type="text" name="form_wallet_address" value="" required="" id="form_wallet_address" placeholder="">
                                </div>
                            </div>

                            
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" id="tc" name="form_is_wallet_acknowledged" class="custom-control-input" >
                            <span class="custom-control-label small-text">I verify that this wallet address belongs to me. And understand that sending it to someone else's wallet may result in a loss of funds.</span>
                        </label>
                        <br>
                        <article class="card row">
                          <!--<button class="subscribe btn btn-primary btn-block" type="button"> Confirm  </button>-->
                        </article>
                    </form>
                </div>
            </div>
            <div class="tab-pane " id="sell" role="tabpanel">
                <div class="p-3">
                     <form class="pl-3 pr-3"  method="POST" id="form_sell_transaction" action="">
                     
                         <!-- <div class="row">
                             <div class="form-group col-lg-12">
                                <label for="">Payment Method</label>
                             </div>
                            <div class="form-group col-lg-6">
                                <input class="form-control" type="email" required="" id="password" placeholder="">
                            </div>
                             <div class="form-group col-lg-6">
                                <input class="form-control" type="email" required="" id="password" placeholder="">
                            </div>
                         </div> -->
                         
                         <h3 class="price"><span>1 USDT is Roughly</span> 78.45 <i>INR</i></h3>
                         <div class="inputParent">
                         
                            <div class="inputBox">
                                <div class="input_label">
                                    <p class="xs-text mb-0" for="input1">You Pay</p>
                                    <input class="error" type="text" name="form_crypto_amount" value="100"  id="form_crypto_amount_sell">
                                </div>
                                <div class="iconBox">
                                      <img src="images/noriapay_extracted_logos/usdt.svg" alt="">
                                    <p>USDT</p>
                                </div>
                            </div>
                            <p class="xs-text py-1 sellError" style="display:none;"></p>
                            <div class="joinedArrow">
                                <img src="images/noriapay_extracted_logos/converter.svg" alt="">
                                <input name="form_transaction_type" value="SELL" type="hidden" >
                            </div>
                            <div class="inputBox">
                                <div class="input_label">
                                    <p class="xs-text mb-0" for="input2">You will receive Roughly</p>
                                    <input class="error" name="form_inr_amount" type="text" value="7845"  id="form_inr_amount_sell">
                                </div>
                               <div class="iconBox">
                                    <img src="images/noriapay_extracted_logos/rupee.svg" alt="">
                                    <p>INR</p>
                                </div>
                             </div>
                        </div>
                        
                        
                        <div class="form-group tab-pane pt-4">
                            <h3>Payment Methods</h3>
                        </div>
                        <div class="form-group form-radio select-payment" id="radio_sell">
                             <label class="form-group-payment col-lg-3 mb-3" for="radio_s1">
                                   <input name="form_payment_method" type="radio" id="radio_s1" value="UPI" class="with-gap radio-col-orange" checked>
                                    <label class="label-small" for="radio_s1">UPI</label>
                            </label>
                                                               
                                                                                           <label class="form-group-payment col-lg-5 mb-3 disabled custom-tooltip" for="radio_s3" data-placement="right" data-toggle="tooltip" title="To choose this option, Update your bank details in profile section">
                                   <input name="form_payment_method" type="radio" id="radio_s3" class="with-gap radio-col-orange" disabled>
                                    <label class="label-small" for="radio_s3">Bank Account</label>
                            </label>    
                        </div>
                        <div class="form-group" id="payment_details">                            <div class="form-group " id="upi_payment_details">
                                 <p class="title-space">Your UPI Address</p>
                                 <div class="input-box">
                                    <input name="form_upi_address" value = "" class="form-control" type="text" required id="form_upi_address" placeholder="">
                                 </div>
                            </div>      
                        </div>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" name="form_is_payment_details_acknowledged" class="custom-control-input" >
                            <span class="custom-control-label xs-text">I verify that the above payment details belongs to me. And understand that sending it to someone else's payment details may result in a loss of funds.</span>
                        </label>
                        <br>
                        <div class="form-group">
                          <!--<button class="subscribe btn btn-primary btn-block" type="button"> Confirm  </button>-->
                        </div>
                                    
                    </form>
                </div>
              </div>
           </div>
        </div>
    </div>
                                                        
                                                        
    <div class="col-lg-7 col-md-7  px-0 px-xs-15">
     <div class="card">
      <h3 class="card-box-title px-4">Exchange Information</h3>
                                                        
      <p id="Page_MsgBox"></p>
      <div class="card-body px-4" id="transaction_details">
                        <!-- Tab panes -->            <div class="row" id="buy_transaction_details">
            
              <div class="col-lg-8 col-md-8 checkout-exchange">
                <div class="pt-2"><img src="images/icons/oval_buy.png"></div>
                <div class="checkout-item">
                  <div class="checkout-item-1 "><span class="card-icon-buy"> Buy </span></div>
                  <div class="checkout-item-2"><span class="card-tether" id="final_crypto">{{@$data->crypto}} USDT</span> 1 Tether = INR {{((@$commision_buy->fees / 100) * 83.92)+83.92}}</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 mt-3 text-right">
                 <p><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><path fill="#8A8FC0" fill-rule="nonzero" d="M7.5 1.875a5.6 5.6 0 0 1 3.979 1.648A5.6 5.6 0 0 1 13.126 7.5a5.6 5.6 0 0 1-1.648 3.979A5.6 5.6 0 0 1 7.5 13.128a5.6 5.6 0 0 1-3.979-1.648 5.6 5.6 0 0 1-1.647-3.979 5.6 5.6 0 0 1 1.648-3.979A5.6 5.6 0 0 1 7.5 1.876zm0-.938a6.563 6.563 0 1 0 0 13.126A6.563 6.563 0 0 0 7.5.937zm1.875 7.149H7.192a.586.586 0 0 1-.586-.586V4.219a.586.586 0 1 1 1.172 0v2.695h1.597a.586.586 0 1 1 0 1.172z"></path></svg>
                      Processing Time </p>
                  <p class="text-time"> 30 min - 1hr</p>
               </div>
              <div class="col-lg-12 col-md-12">
              <hr>
                <div class="checkout-price row mb-1">
                  <div class="checkout-price-1 text-left col-lg-6 col-md-6 col-6"> Tether to Receive </div>
                  <div class="checkout-price-2 text-right col-lg-6 col-md-6 col-6" id="tether_receive"> {{@$data->crypto}} USDT</div>
                </div>
                <div class="checkout-price row mb-4">
                   <div class="checkout-price-1 text-left col-lg-6 col-md-6 col-6">Network Fee </div>
                   <div class="checkout-price-2 text-right col-lg-6 col-md-6 col-6"> {{@$network_buy->fees}} USDT</div>
                </div>
                 <div class="hr-dotted">  </div>
                <div class="checkout-price row mb-4">
                   <div class="checkout-price-1 text-left col-lg-6 col-md-6 col-6"> Identification Amount </div>
                   <div class="checkout-price-2 text-right col-lg-6 col-md-6 col-6"> 1.73 INR </div>
                </div>
                <div class="checkout-price row mb-4">
                   <div class="checkout-price-2 col-lg-12 col-md-12 col-12">  <p class="small-text">Note : Identification Amount is added to identify the transaction on our end.</p></div>
                </div>
                <div class="checkout-total col-md-12 col-12">
                  <div class="row">
                    <div class="checkout-price-1 text-left col-lg-6 col-md-6 col-6"> Total Payable </div>
                    <div class="checkout-price-2 text-right col-lg-6 col-md-6 col-6" id="total_payble"> {{@$data->inr+@$network_buy->fees+1.73}} INR</div>
                  </div>
                </div>
                <div class="row">                      <div class="form-group col-lg-12 text-center mt-3">
                        <button class="btn btn-success float-right" onclick="save_transactions()">Confirm </button>
                      </div>                </div>
              </div>
            </div>         </div>
       </div>
    </div>
</div>
		        </div> <!-- Container Fluid close -->
 </div>
</div> <!-- Main Wrapper Close -->
          
          <footer class="footer">
          <span class="footer-title-1">&copy; 2022 NoriaPay, All Rights Reserved</span> <span class="footer-title-2"><a target="_blank" href="static/Terms-of-Use-NoriaPay.pdf">Terms of Use </a>  |    <a target="_blank" href="static/Privacy-Policy-NoriaPay.pdf">Privacy Policy </a></span>
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
      <script src="js/component/Material/custom.js"></script>       <script src="lib/select2/dist/js/select2.full.min.js"></script>
				<script src="lib/select2/dist/js/select2.min.js"></script>
      <!--Chartist_JS-->
      <!--Calendar_JS-->
      <!--Datatable_JS-->
      <script src="lib/toastr/toastr.min.js"></script>
       <script src="lib/widget/js/widget-data.js"> </script>
      <script type="text/javascript">
       
        $(document).ready(function() {
          $('select[class*="browser-default"]').select2({
            placeholder: "Select tether wallet",
            width: '100%'
          });
        });
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
        network_fees = "{{@$network_buy->fees}}";
        id_fees = "1.73";

        </script>
        <script src='js/require.js'></script>
        <script src="{{url('assets/frontend/js/frontend_js/payment.js')}}"></script>
    </body>
  </html>