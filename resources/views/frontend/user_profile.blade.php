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
          <li class="nav-item"> <a class="nav-link active" href="{{url('bank_details')}}" role="tab">Bank Details</a>
          </li>
          <li class="nav-item"> <a class="nav-link " href="{{url('user_setting')}}?tab=3" role="tab">Profile</a>
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
@endsection