   @extends('frontend.template')
    @section('content')
      
 <div class="page-wrapper">      
    <div class="container-fluid">
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
                <li class="nav-item"  id="buy_tab" > <a class="nav-link  {{!empty(@$data->type)?'':'active'}} " data-toggle="tab" href="#buy" role="tab" 1>
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
                <li class="nav-item" id="sell_tab" > <a class="nav-link {{!empty(@$data->type)?'active':''}}" data-toggle="tab" href="#sell" role="tab" >
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
                <div class="tab-pane  {{!empty(@$data->type)?'':'active'}} " id="buy" role="tabpanel">
                    <div class="p-3">
                        <form class="pl-3 pr-3" method="POST" id="form_buy_transaction" action="">
                            <input type="hidden" class="payment_type" name="payment_type" value="1">
                        
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
                      
                               <div id="checkout_wallet_type" class="form-group">
                                <p class="xs-text mt-2">Select Tether Wallet Type</p>
                                <div class="form-radio">
                                  <div class="row select-payment ">
                                @if(!empty($wallet))
                                @foreach($wallet as $key=>$value)
                                    <div class="col-md-4 mb-2">
                                      <label class="form-group-payment col-lg-12 col-xs-6  mr-1" for="radio_omni{{@$value->id}}">
                                        <input name="wallet" type="radio" id="radio_omni{{@$value->id}}" value="{{@$value->id}}" class="with-gap radio-col-orange" >
                                        <label class="label-small" for="radio_omni{{@$value->id}}">{{@$value->name}}</label>
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
            <div class="tab-pane {{!empty(@$data->type)?'active':''}}" id="sell" role="tabpanel">
                <div class="p-3">
                     <form class="pl-3 pr-3"  method="POST" id="form_sell_transaction" action="">
                        <input type="hidden" class="payment_type" name="payment_type" value="2">
                     
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
                         
                         <h3 class="price"><span>1 USDT is Roughly</span> <strong id="usdt-price-sell">{{83.92-((@$commision_sell->fees / 100) * 83.92)}}</strong> <i>INR</i></h3>
                         <div class="inputParent">
                         
                            <div class="inputBox">
                                <div class="input_label">
                                    <p class="xs-text mb-0" for="input1">You Pay</p>
                                    <input class="error" type="text" onblur="multiply_sell()" name="crypto" value="{{@$data->crypto}}"  id="form_crypto_amount_sell">
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
                                    <input class="error" name="form_inr_amount" onblur="divide_sell()" type="text" value="{{@$data->inr}}"  id="form_inr_amount_sell">
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
                                    <input name="w_address" value = "" class="form-control" type="text" required id="form_upi_address" placeholder="">
                                 </div>
                            </div>      
                        </div>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" id="tc_sell" name="form_is_payment_details_acknowledged" class="custom-control-input" >
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
                <div class="pt-2"><img src="{{!empty(@$data->type)?'images/icons/oval_sell.png':'images/icons/oval_buy.png'}}"></div>
                <div class="checkout-item">
                  <div class="checkout-item-1 "><span class="card-icon-buy"> {{!empty(@$data->type)?'Sell':'Buy'}} </span></div>
                  <div class="checkout-item-2"><span class="card-tether" id="final_crypto">{{@$data->crypto}} </span><span class="card-tether">USDT</span> 1 Tether = INR {{((@$commision_buy->fees / 100) * 83.92)+83.92}}</div>
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
                  <div class="checkout-price-1 text-left col-lg-6 col-md-6 col-6"> Tether to {{!empty(@$data->type)?'Sell':'Buy'}} </div>
                  <div class="checkout-price-2 text-right col-lg-6 col-md-6 col-6" id="tether_receive"> {{@$data->crypto}} USDT</div>
                </div>
                <div class="checkout-price row mb-4">
                   <div class="checkout-price-1 text-left col-lg-6 col-md-6 col-6">Network Fee </div>
                   <div class="checkout-price-2 text-right col-lg-6 col-md-6 col-6"> {{!empty(@$data->type)?@$network_sell->fees:@$network_buy->fees}} INR</div>
                </div>
                 <div class="hr-dotted">  </div>
                {{-- <div class="checkout-price row mb-4">
                   <div class="checkout-price-1 text-left col-lg-6 col-md-6 col-6"> Identification Amount </div>
                   <div class="checkout-price-2 text-right col-lg-6 col-md-6 col-6"> 1.73 INR </div>
                </div> --}}
                {{-- <div class="checkout-price row mb-4">
                   <div class="checkout-price-2 col-lg-12 col-md-12 col-12">  <p class="small-text">Note : Identification Amount is added to identify the transaction on our end.</p></div>
                </div> --}}
                <div class="checkout-total col-md-12 col-12">
                  <div class="row">
                    <div class="checkout-price-1 text-left col-lg-6 col-md-6 col-6"> Total Payable </div>
                    <div class="checkout-price-2 text-right col-lg-6 col-md-6 col-6" id="total_payble"> {{!empty(@$data->type)?@$data->inr-(@$network_sell->fees):@$data->inr+@$network_buy->fees}} INR</div>
                  </div>
                </div>
                <div class="row">                      <div class="form-group col-lg-12 text-center mt-3">
                        <button class="btn btn-success float-right" onclick="save_transactions({{!empty(@$data->type)?'2':'1'}})">Confirm </button>
                      </div>                </div>
              </div>
            </div>         </div>
       </div>
    </div>
</div>
		        </div> <!-- Container Fluid close -->
 </div>
</div> <!-- Main Wrapper Close -->
<script type="text/javascript">
       
        
        network_fees = "{{!empty(@$data->type)?@$network_sell->fees:@$network_buy->fees}}";
        id_fees = "0";

        </script>
          
@endsection