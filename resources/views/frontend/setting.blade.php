
    @extends('frontend.template')
    @section('content')


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
            <form id="profileimgForm">
            <div class="pro-img">
                @csrf   
                <img src="{{Auth::user()->img?url(Auth::user()->img):url('images/icons/profile.png')}}" onclick="$('#profile_img').click()" alt="profile image" id="set-img" height="150px" width="150px">
                <input type="file" id="profile_img" class="profile-update" onchange="loadFile(event)" name="profile_img">
            </div>
        </form>
          <h3 class="pb-2 profile-name">{{@$fname}} {{@$lname}}</h3>
          <hr>
            <div class="row">
              <div class="col-md-6 col-sm-12 col-6 border-right"><small><b>Mobile Number:</b></small><br><p style="display: inline-block;"> <span class="pending status_label" id="mobileNumber">{{!empty(Auth::user()->mobile_number)?Auth::user()->mobile_number:'No mobile number'}}</span><p></div>
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
          <li class="nav-item"> <a class="nav-link active" href="{{url('user_setting')}}?tab=3" role="tab">Settings</a>
          </li> 
          <li class="nav-item"> <a class="nav-link "  href="{{url('change_password')}}?tab=4" role="tab">Change Password</a>
          </li>      
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">    <!--Third Section-->
 <!-- ***************************** settings section End******************************* -->
 
                <div class="tab-pane active" id="settings" role="tabpanel">
                    <div class="card-body">
                        <form class="form-horizontal form-material" id="profile_update_form" method="" action="">
                            @CSRF
                           <div class="form-group">
                                <p class="col-md-12 small-text">First name</p>
                                <div class="col-md-6">
                                     <div class="input-box">
                                        <input type="text" name="form_first_name" placeholder="" value="{{$setting->first_name}}" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="col-md-12 small-text">Last name</p>
                                <div class="col-md-6">
                                     <div class="input-box">
                                       <input type="text" name="form_last_name"  placeholder="" value="{{$setting->last_name}}" class="form-control form-control-line">
                                    </div>
                                </div> 
                            </div>                            <div class="form-group">
                                <p class="col-md-12 small-text">Email</p>
                                <div class="col-md-6" id="form_email_ids">
                                    <div class="input-box">
                                        <input placeholder="" id="form_email_id" class="form-control form-control-line" value="{{$setting->email}}" disabled>
                                    </div>
                                </div>
                             </div>                            <div class="form-group">
                                <p class="col-md-12 small-text">Phone No</p>
                                <div class="col-md-6">
                                    <div class="input-box">
                                        <select id="user-country-code" name="phone_number" class="phone_country">
                                          <option value="+91" selected>IND</option>
                                        </select>
                                        <p id="user-country-code-value"></p>
                                        <input type="hidden" name="form_user_county_code" value="+91">
                                        <input type="text" name="form_mobile_number" value="{{$setting->mobile_number}}" id="form_mobile_number" placeholder="" class="form-control form-control-line">
                                    </div>
                                </div>
                             </div>
                            <div class="form-group col-md-12 pt-3">
                                 <button type="submit" class="btn btn-success">Save Details</button>
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

