 @extends('frontend.template')
    @section('content')


      <div class="page-wrapper">      
        <div class="container-fluid">
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
          <li class="nav-item"> <a class="nav-link active"  href="{{url('user_kyc')}}" role="tab">KYC</a>
          </li>
          <li class="nav-item"> <a class="nav-link " href="{{url('user_setting')}}" role="tab">Settings</a>
          </li>
          <li class="nav-item"> <a class="nav-link "  href="{{url('change_password')}}" role="tab">Change Password</a>
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
  @endsection