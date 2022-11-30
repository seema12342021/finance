
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
          <li class="nav-item"> <a class="nav-link active" href="{{url('bank_details')}}" role="tab">Bank Info</a>
          </li>
          <li class="nav-item"> <a class="nav-link" href="{{url('user_setting')}}" role="tab">Profile</a>
          </li> 
          <li class="nav-item"> <a class="nav-link "  href="{{url('change_password')}}" role="tab">Change Password</a>
          </li>      
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">          <div class="tab-pane active" id="profile" role="tabpanel">
            <div class="card-body p-4">
              @if(!$acc_detail->json_data)
                <h4 class="title-space pt-3"><span>Bank Account Details</span>
                    <button class="btn btn-secondary btn-icon float-right" type="button" id="button_bank" data-toggle="modal" data-target="#bank-modal">
                    <i class="fa fa-plus"></i> Add</button> 
                </h4>
             <br>
              <div class="row pt-2 pb-3" id="bank_row">                <div class="payment-detail col-md-12 pt-3">
                  <strong>No details to show</strong>
                </div>      
              </div>
              <hr>
            @else

              <h4 class="title-space pt-3"><span>Bank Account Details</span>
                <button class="btn-icon red float-right bank_delete" type="button" onclick="deleteAccount(2)"><image src="{{url('/images/icons/delete.png')}}"></button>
                <button class="btn-icon float-right" id="bank_edit" type="button" data-toggle="modal" data-target="#bank-modal"><image src="{{url('/images/icons/edit.png')}}"></button>
                          </h4>
             <br>
                @php
                    $acc_data = json_decode($acc_detail->json_data);
                @endphp
              <div class="row pt-2 pb-3" id="bank_row">                
                <div class="col-md-2 col-xs-6 border-right">
                  <p class="small-text pt-2"> Holder Name</p>
                  <p class="text-muted">{{ $acc_data->account_holder_name }}</p>
                </div>
                <div class="col-md-3 col-xs-6 border-right">
                  <p class="small-text pt-2">Bank Name</p>
                  <p class="text-muted">{{ $acc_data->bank_name }}</p>
                </div>
                <div class="col-md-3 col-xs-6 border-right">
                  <p class="small-text pt-2">A/C Number</p>
                  <p class="text-muted">{{ $acc_data->bank_account_number }}</p>
                </div>
                <div class="col-md-3 col-xs-6">
                  <p class="small-text pt-2">IFSC Code</p>
                  <p class="text-muted">{{ $acc_data->ifsc_code }}</p>
                </div>
              </div>

              <hr>
              @endif
              @if(!$upi_detail->json_data)
              <h4 class="title-space pt-3"><span>UPI Details</span>
                              <button class="btn btn-secondary btn-icon float-right" type="button" data-toggle="modal" data-target="#upi-modal">
                <i class="fa fa-plus"></i> Add</button>              </h4>
              <div class="row pt-4 pb-5" id="upi_row">                <div class="payment-detail pt-3">
                  <strong>No details to show</strong>
                </div>              </div>

                <hr>
                @else
                @php
                    $upi_data = json_decode($upi_detail->json_data);
                @endphp
              <h4 class="title-space pt-3"><span>UPI Details</span>
                <button class="btn-icon red float-right upi_delete" data-upiwallet_address="{{ $upi_data->upi_address }}" type="button" onclick="deleteAccount(1)"><image src="{{url('/images/icons/delete.png')}}"></button>
                <button class="btn-icon float-right" type="button" data-toggle="modal"
                  data-target="#upi-modal"><image src="{{url('/images/icons/edit.png')}}"></button>
                </h4>
              <div class="row pt-4 pb-5" id="upi_row">                
                <div class="payment-detail col-md-8 p-0">
                  <p class="small-text pt-2">UPI Address</p>
                  <p class="text-muted">{{ $upi_data->upi_address }}</p>
                </div>
                <div class="col-md-4 col-xs-6">
                  <div class="form-group text-right mb-3">
                  </div>
                </div>              </div>
                          
                @endif
              </div>              </div>
            </div>
        <!-- Tab panes -->

        </div>
    </div>
</div>
		        </div> <!-- Container Fluid close -->
 </div>
</div> <!-- Main Wrapper Close -->

<div id="upi-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-body">
                <div class="col-lg-12 text-left mt-2 mb-4">
                     <a href="" class="text-success">
                        <span class="header-text">Add UPI Address</span>
                    </a>
                    <button type="button" class="close text-right" data-dismiss="modal" aria-hidden="true"><img src="{{ url('/images/icons/close.png')}}"></button>
                </div>
                
                <form class="pl-3 pr-3 form-horizontal form-material" id="upi-modal-form">
                @csrf
                 <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="small-text" for="password">UPI Address</label>
                        <div class="input-box mt-2"> 
                             <input class="form-control" type="text" required="" name="upi_wallet_address" value="{{ @$upi_data->upi_address }}" id="form_upiwallet_address" placeholder="">
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



<div id="bank-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-body">
                <div class="text-left mt-2 mb-4 col-md-12">
                     <a href="" class="text-success">
                        <span class="header-text">Add Bank Account</span>
                    </a>
                    <button type="button" class="close text-right" data-dismiss="modal" aria-hidden="true"><img src="{{url('/images/icons/close.png')}}"></button>
                </div>
                
                <form class="form-horizontal form-material px-3" id="bank-modal-form">
                    @csrf
                  <div class="row">
                    <div class="form-group col-md-12">
                        <label class="small-text" for="form_bank_name">Bank Name</label>
                        <div class="input-box mt-2">
                           <input class="form-control" name="bank_name" value="{{ @$acc_data->bank_name }}" type="text" required="" id="form_bank_name" placeholder="">
                        </div>
                    </div>
                    <input name="form_action_type" type="hidden" value="BANK">
                    <div class="form-group col-md-12">
                       <label class="small-text" for="form_bank_account_name">Bank Holder Name</label>
                       <div class="input-box mt-2">
                          <input class="form-control" name="account_holder_name" value="{{ @$acc_data->account_holder_name }}" type="text" required="" id="form_bank_account_name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="small-text" for="form_bank_account_number">Bank Account Number</label>
                        <div class="input-box mt-2">
                            <input class="form-control" type="text" value="{{ @$acc_data->bank_account_number }}" name="bank_account_number" required="" id="form_bank_account_number" placeholder="">
                        </div>
                    </div>
                     <div class="form-group col-md-12">
                        <label class="small-text" for="form_bank_ifsc_number">IFSC Code</label>
                        <div class="input-box mt-2">
                            <input class="form-control" type="text" value="{{ @$acc_data->ifsc_code }}" name="ifsc_code" required="" id="form_bank_ifsc_number" placeholder="">
                        </div>
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
@endsection

