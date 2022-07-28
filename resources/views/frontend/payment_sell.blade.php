 @extends('frontend.template')
    @section('content')

      <div class="page-wrapper">      <div class="container-fluid">  <div class="welcome-section">
     <h1>Transfer</h1>
  </div>
  <div class="main-container" >
     <div class="row xchange-box">
        <!-- Column -->
        <div class="col-lg-2 col-md-2">
        
        </div>
        <div class="col-lg-8 col-md-8 px-4 px-xs-15">
          <div class="card px-2">
            <div class="card-body  pt-0" id="transaction_details">
               <!-- Tab panes -->

              <div id="sell_transaction_details">
                <div class="row checkout-exchange payment-heading ">
                <div class="col-md-2 col-4 pr-0"><p class="box-icon-{{@$transaction_detail->payment_type == 1?'buy':'sell'}}"><i class="fa fa-arrow-{{@$transaction_detail->payment_type == 1?'up':'down'}}"></i> {{@$transaction_detail->payment_type == 1?'Buy':'Sell'}}</p></div>
                <div class="rounded-title col-md-10 col-12 pt-2">Transaction Reference Number :
                    <span id="ref_num"> {{@$transaction_detail->transaction_id}}</span> &nbsp <a  class="copy" data-placement="right" onclick="copy_data(ref_num)"><img src="{{url('images/icons/copy.png')}}"></a>
                </div>
              </div>

                <div class="pt-4"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><path fill="#8A8FC0" fill-rule="nonzero" d="M7.5 1.875a5.6 5.6 0 0 1 3.979 1.648A5.6 5.6 0 0 1 13.126 7.5a5.6 5.6 0 0 1-1.648 3.979A5.6 5.6 0 0 1 7.5 13.128a5.6 5.6 0 0 1-3.979-1.648 5.6 5.6 0 0 1-1.647-3.979 5.6 5.6 0 0 1 1.648-3.979A5.6 5.6 0 0 1 7.5 1.876zm0-.938a6.563 6.563 0 1 0 0 13.126A6.563 6.563 0 0 0 7.5.937zm1.875 7.149H7.192a.586.586 0 0 1-.586-.586V4.219a.586.586 0 1 1 1.172 0v2.695h1.597a.586.586 0 1 1 0 1.172z"></path></svg>
                  {{-- <span id="transaction_expiry_message"> This transaction window will expire in <p class="timer" id="minutes"></p> <p class="timer" id="seconds"></p></span> --}}
                </div>
                <div class="pt-4">
                  <div class="checkout-total col-md-12 col-12">
                    <div class="row">
                        <div class="checkout-price-1 text-left col-lg-6 col-md-6 col-6"> Total Payable </div>
                        <div class="checkout-price-2 text-right col-lg-6 col-md-6 col-6"> {{@$transaction_detail->total_crypto}} USDT</div>
                     </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="card-body" >
              <form  method="POST" id="form_transfer" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{@$transaction_detail->id}}">
                <h4 ><strong class="title-space"><span class="text-orange">STEP 1 : </span> Transfer To Noria Pay Wallet </strong></h4>
                
                <div class="form-radio pt-3">
                  <div class="row select-payment ">
                    @if(!empty($wallet))
                        @foreach($wallet as $key=>$value)
                            <div class="col-md-4 mb-2">
                              <label class="form-group-payment col-lg-12 col-xs-6  mr-1" for="radio_omni{{@$value->id}}">
                                <input name="wallet" onclick="radio_show({{@$value->id}})" type="radio" id="radio_omni{{@$value->id}}" value="{{@$value->id}}" class="with-gap radio-col-orange" >
                                <label class="label-small" for="radio_omni{{@$value->id}}">{{@$value->name}}</label>
                              </label>
                            </div>
                        @endforeach
                        @endif
                    
                     

                  <div class="col-lg-12 pt-4">

                        @if(!empty($wallet))
                            @foreach($wallet as $key=>$value)
                                <div id="sh{{@$value->id}}" class="sh" style="display:none;">
                                   <div class="row">
                                      <div class="payment-detail mt-1 col-md-10 col-9">  
                                         <p class="small-text">{{@$value->name}}</p>
                                         <p class="text-muted"><span id="crypto_wallet_address_erc20">{{@$value->address}}</span>
                                           &nbsp &nbsp <a class="copy" data-placement="right" onclick="copy_data({{@$value->address}})"><img src="{{url('images/icons/copy.png')}}"></a>
                                         </p>
                                      </div>
                                      <div class="payment-detail col-md-2 col-3 text-right">
                                        <img src="https://s3-ap-south-1.amazonaws.com/static.noriapay.com/MasterData/1011_1615870860_1011_NP-ERC20.png" class="brand-icon">
                                      </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                  
                  </div>
                </div>
              </div>

              <hr>
              <h4 class="pt-3"><strong class="title-space"><span class="text-orange">STEP 2 : </span> Attach Proof of Transfer </strong></h4>
                
                <div class="row pt-3">
                    
                  <div class="payment-detail col-lg-12 col-md-12 col-12">   
                      
                      <div class="upload upload-theme-dragdropbox">
                        <input style="z-index: 999; opacity: 0; width: 100%; height: 100px; position: absolute; right: 0px; left: 0px; top:0px; margin-right: auto; margin-left: auto;cursor:pointer;" name="screenshot" id="filer_input2" type="file" onchange="showTransferDoc(this)">
                        <div class="upload-input-dragDrop ">
                            <div class="upload-input-inner row">
                              <div class="upload-input-icon col-md-3 col-2 pt-3 text-right"><i class="fa fa-paperclip font-fa" aria-hidden="true"></i></div>
            				  <div class="col-md-7 col-10 p-0">
                                 <div class="upload-input-text"><p>Drop/Upload a proof that the money has been transferred.
                                    We accept files in .jpg , .png , .pdf format less than 10mb</p></div>
            				   </div>
            				 </div>

                            </div>
                          </div>
            			 <label class="file-name"></label>
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="payment-detail col-lg-6 col-12 text-left">
                      <label class="custom-control custom-checkbox mt-1">
                        <input name="IhaveTransfer" type="checkbox" value="true" class="custom-control-input" >
                        <span class="custom-control-label">I HAVE TRANSFERRED</span>
                      </label>
                    </div>
                  <div class="col-lg-6 col-12 text-right">
                    <button class="btn btn-success" type="submit">Confirm</button>
                  </div>    
                </div>
              </div>
            </form>
          </div>
          <div class="pb-5">
            <p class="checkout-price-1 pb-3"><b>IMPORTANT NOTES :</b></p>
            <p class="p-text">1. Please transfer exact amount of <span>{{$transaction_detail->crypto}}</span> shown on the screen as total payable.</p>
            <p class="p-text"> 2. Transferring <span>{{$transaction_detail->crypto}}</span> to other wallet address may result in loss of funds & we are not responsible.</p>
            <p class="p-text">3. Please make sure to select the right network type either ERC20, TRC20 or BEP20, sending funds to wrong wallet network will result in loss of funds</p>
            <p class="p-text">4. In case of any errors , please write to support@elitpay.com</p>
          </div>          
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2"></div>
  </div>
</div>
		        </div> <!-- Container Fluid close -->
 </div>
</div> <!-- Main Wrapper Close -->
@endsection