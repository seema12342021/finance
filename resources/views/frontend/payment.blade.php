<!DOCTYPE html>
    <html>
      <head>
        <meta charset="UTF-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    		<meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="_token" content="{{ csrf_token() }}">
        <meta name="description" content="Buy & Sell Crypto Currencies With Your Local Currency" >
        <title>NoriaPay > Payment</title>
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

        <!--SELECT2_CSS-->
        <!--Chartist_CSS-->
        <!--Calendar_CSS-->
        <!--Datatable_CSS-->
        <link href="lib/toastr/toastr.min.css" rel="stylesheet" />
        <!--WIDGET_CSS-->    
      <style type="text/css">
        
.timer {
  display: inline;
  font-size: 13px;
  margin-top: 0px;
  font-weight: 600;
  border-bottom:1px solid #000;
  color: #000;
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
                                <span class="oval-inner">{{@$fname.@$lname}}</span>&nbsp <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">                                     <li class="user-list"><a class="px-3 py-2" href="{{url('user_profile')}}?tab=1"><i class="ti-user"></i> User Profile</a></li>
                                    <li role="separator" class="dropdown-divider"></li>                                   
                                    <li class="user-list"><a class="px-3 py-2" href="{{url('user_logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>                     </ul>
                </div>

            </nav>

        </header>
       </div>
      



      <div class="page-wrapper">      <div class="container-fluid">
        <div class="welcome-section">           <h1>Payment (UPI)</h1>
       </div>
<div class="main-container">
    <div class="row xchange-box">
      <!-- Column -->
      <div class="col-lg-1 col-md-1">
            
      </div>
      <div class="col-lg-10 col-md-12  col-12 px-6 px-xs-15">
        <div class="card px-2">
          <div class="card-body pt-0" id="transaction_details">
            <!-- Tab panes -->
            <div id="buy_transaction_details">

              <div class="row checkout-exchange payment-heading ">
                <div class="col-md-2 col-4 pr-0"><p class="box-icon-buy "><i class="fa fa-arrow-up"></i> Buy</p></div>
                <div class="rounded-title col-md-10 col-12 pt-2">Transaction Reference Number :
                    <span id="ref_num"> {{@$transaction_detail->transaction_id}}</span> &nbsp <a  class="copy" data-placement="right" onclick="copy_data(ref_num)"><img src="images/icons/copy.png"></a>
                </div>
              </div>

              <div class="mt-3"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><path fill="#8A8FC0" fill-rule="nonzero" d="M7.5 1.875a5.6 5.6 0 0 1 3.979 1.648A5.6 5.6 0 0 1 13.126 7.5a5.6 5.6 0 0 1-1.648 3.979A5.6 5.6 0 0 1 7.5 13.128a5.6 5.6 0 0 1-3.979-1.648 5.6 5.6 0 0 1-1.647-3.979 5.6 5.6 0 0 1 1.648-3.979A5.6 5.6 0 0 1 7.5 1.876zm0-.938a6.563 6.563 0 1 0 0 13.126A6.563 6.563 0 0 0 7.5.937zm1.875 7.149H7.192a.586.586 0 0 1-.586-.586V4.219a.586.586 0 1 1 1.172 0v2.695h1.597a.586.586 0 1 1 0 1.172z"></path></svg>
                <span id="transaction_expiry_message"> This transaction window will expire in <p class="timer" id="minutes"></p> <p class="timer" id="seconds"></p></span>
              </div>
              <div class="pt-4">
                <div class="checkout-total col-md-12 col-12">
                    <div class="row">
                      <div class="checkout-price-1 text-left col-lg-6 col-md-6 col-6"> Total Payable </div>
                      <div class="checkout-price-2 text-right col-lg-6 col-md-6 col-6"> {{@$transaction_detail->total_inr_price}} INR</div>
                    </div>
                 </div>
              </div>
            </div>
          </div>
          {{-- <form  enctype="multipart/form-data">    --}}
                   <div class="card-body">
              <h4><strong class="title-space"><span class="text-orange">STEP 1 : </span>Transfer Fund to below bank account </strong></h4>
              
              <article class=" pt-4">
                <div class="row">
                    <div class="form-group col-md-4 col-12 border-right">
                       <div class="row">
                         <div class="col-md-9">
                           <p class="small-text">Bank Name</p>
                           <p class="text-muted" id="noria_bank_name">ICICI BANK</p>
                         </div>
                         <div class="col-md-3 pt-3">
                           <a class="copy" data-placement="right" onclick="copy_data(noria_bank_name)"><img src="images/icons/copy.png"></a>
                         </div>
                       </div>
                    </div> <!-- form-group.// -->
    
                    <div class="form-group col-md-5 col-12 border-right">
                       <div class="row">
                           <div class="col-md-10">
                              <p class="small-text">Account Name</p>
                              <p class="text-muted" id="noria_bank_account_name">WEBNORIA E-COMMERCE PVT LTD</p>
                           </div>
                            <div class="col-md-2 pt-3">
                                <a  class="copy" data-placement="right" onclick="copy_data(noria_bank_account_name)"><img src="images/icons/copy.png"></a>
                            </div>
                       </div>
                      
                    </div> <!-- form-group.// -->
                    
                    <div class="form-group col-md-3 col-12">
                        <div class="row">
                           <div class="col-md-9">
                               <p class="small-text">A/C Number</p>
                               <p class="text-muted" id="noria_bank_account_number">777705057770</p>
                           </div>
                            <div class="col-md-2 pt-3">
                                <a  class="copy" data-placement="right" onclick="copy_data(noria_bank_account_number)"><img src="images/icons/copy.png"></a>
                            </div>
                       </div>
                     
                    </div> <!-- form-group.// -->
                    
                    
                    
                    
                  </div>         
                <hr>

                
                <div class="row">
                  <div class="payment-detail col-lg-6 text-left">
                    <label class="custom-control custom-checkbox mt-1">
                      <input type="checkbox"  name="form_is_payment_acknowledged" class="custom-control-input" >
                      <span class="custom-control-label">I HAVE PAID</span>
                    </label>
                  </div>
                  <div class="col-lg-6 text-right">
        {{-- </form> --}}
                    <button class="btn btn-success " onclick="payment()">Confirm</button>
                  </div>   
                </div> 
              </article>
            </div>          
</div>
        <div class="pb-5">
            <p class="checkout-price-1 pb-3"><b>IMPORTANT NOTES :</b></p>
            <p class="p-text">1. We only accept transfers by IMPS , NEFT & RTGS. CASH DEPOSITS ARE NOT ALLOWED.
            <p class="p-text"> 2. If you transfer a different amount or deposit funds to different account by mistake , we will not be responsible.</p>
            <p class="p-text">3. Adding the Transaction Reference Number in your transfer comments is mandatory.</p>
            <p class="p-text">4. In case of any errors , please write to support@noriapay.com</p>
        </div>      
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2"> </div>
  </div>
</div>		        </div> <!-- Container Fluid close -->
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
      <script src="js/component/Material/custom.js"></script>       <!--SELECT2_JS-->
      <!--Chartist_JS-->
      <!--Calendar_JS-->
      <!--Datatable_JS-->
      <script src="lib/toastr/toastr.min.js"></script>
       <script src="lib/widget/js/widget-data.js"> </script>
       <script src='js/require.js'></script>
       <script type="text/javascript">
           id = '{{@$transaction_detail->id}}';
       </script>
       <script src="{{url('assets/frontend/js/frontend_js/payment.js')}}"></script>
    </body>
  </html>