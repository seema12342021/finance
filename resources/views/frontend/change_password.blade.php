    @extends('frontend.template')
    @section('content')

      
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
              <div class="col-md-6 col-sm-12 col-6"><small><b>KYC Status: </b></small><br> <p style="display: inline-block;"><span class="pending status_label">
                @if($docs)
                  @if($docs->is_approved == 1)
                    @if($docs->proof_type == 1)
                      Driving License
                    @elseif($docs->proof_type == 2)
                      Passport
                    @elseif($docs->proof_type == 3)
                     Aadhaar Card
                    @endif
                  @else
                    Pending
                  @endif
                @else
                No Document
                @endif
              </span></p></div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-8 col-xs-12">
    <p id="Page_MsgBox"></p>
    
      <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link "  href="{{url('user_kyc')}}" role="tab">KYC</a>
          </li>
          <!-- <li class="nav-item"> <a class="nav-link " href="{{url('user_profile')}}" role="tab">Profile</a>
          </li> -->
          <li class="nav-item"> <a class="nav-link " href="{{url('user_setting')}}" role="tab">Settings</a>
          </li>
           <li class="nav-item"> <a class="nav-link active"  href="{{url('change_password')}}" role="tab">Change Password</a>
          </li>     </ul>
        <!-- Tab panes -->
        <div class="tab-content">    <!--Third Section-->
 <!-- ***************************** settings section End******************************* -->
 
                <div class="tab-pane active" id="settings" role="tabpanel">
                    <div class="card-body">
                        <form class="form-horizontal form-material" id="password_update_form" method="" action="">
                            @CSRF
                           <div class="form-group">
                                <p class="col-md-12 small-text">Old Password</p>
                                <div class="col-md-6">
                                     <div class="input-box">
                                        <input type="password" name="form_old_password" placeholder="" value="" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="col-md-12 small-text">New Password</p>
                                <div class="col-md-6">
                                     <div class="input-box">
                                       <input type="password" name="form_new_password"  placeholder="" value="" class="form-control form-control-line">
                                    </div>
                                </div> 
                            </div>                            <div class="form-group">
                                <p class="col-md-12 small-text">Confirm Password</p>
                                <div class="col-md-6">
                                    <div class="input-box">
                                       <input type="password" name="form_confirm_password"  placeholder="" value="" class="form-control form-control-line">
                                    </div>
                                </div>
                             </div>
                            <div class="form-group col-md-12 pt-3">
                                 <button type="submit" class="btn btn-success">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                                            
<!-- ***************************** settings section End******************************* -->
          </div>
        </div>
    </div>
</div>
		        </div> <!-- Container Fluid close -->
 </div>
</div> <!-- Main Wrapper Close -->
          
@endsection