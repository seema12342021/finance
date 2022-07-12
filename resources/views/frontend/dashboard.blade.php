      @extends('frontend.template')
      @section('content')
     <div class="page-wrapper">
         <div class="container-fluid">
            <div class="welcome-section-dashboard">
               <p ><span class="day-message"></span>, {{ucwords(@$name)}}</p>
            </div>
            <div class="main-container"> 
               <div class="row">
                @if($kyc or count($transaction) < 1)
                    <div class="col-lg-7 col-md-7 mb-3">
                        @if($kyc and @$kyc->is_approved==0)                              
                        <div class="card message-card">
                            <div class="card-body">
                              <div class=" no-block">
                                 <h3 class="card-title">Your KYC approval is pending</h3>
                                 <h5 class="card-paragraph">You will be notified once the approval is completed</h5>
                              </div>
                            </div>
                        </div>
                        
                        @endif
                        @if(count($transaction) < 1)                              
                        <div class="card message-card">
                            <div class="card-body">
                              <div class="no-block">
                                 <div class="row">
                                     <div class="col-md-9 col-12">
                                        <h4 class="card-paragraph">There are no transactions at the moment. Make your first exchange!</h4>
                                     </div>
                                     <div class="col-md-3 col-6 pt-xs-3 text-right">
                                         <a onclick="pageredirect(1)" class="card-button" id="FirstExchange">Exchange</a>
                                     </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                        @else
                        <div class="slimScrollDiv" >
                            <div class="d-md-flex no-block">
                                <h4 class="card-title Recent-Transactions">Recent Transactions</h4>
                             </div>
                              <div class="month-table dashboard-table" >
                                 <div class="table-responsive " style="">
                                    <div class="table-responsive">
                                       <table class="table table-hover table-striped table-bordered" id="dashboard">
                                          <thead class="">
                                             <tr>
                                                <th>TYPE</th>
                                                <th>DATE</th>
                                                <th>RATE</th>
                                                <th>INR</th>
                                                <th>TETHER</th>
                                                <th>STATUS</th>
                                                <th> </th>
                                             </tr>
                                          </thead>
                                          <tbody >
                                             @if(!empty($transaction))   
                                             @foreach($transaction as $Key=>$value)     
                                             <tr>
                                                <td class="text-left"><img src="{{$value->payment_type == 2?'images/icons/oval_sell.png':'images/icons/oval_buy.png'}}" /> &nbsp<b>{{$value->payment_type == 2?'Sell':'Buy'}}</b></td>
                                                <td class="text-left">{{date('d/m/Y',strtotime($value->created_at))}}</td>
                                                <td class="text-left">{{$value->crypto_price}}</td>
                                                <td class="text-left">{{$value->total_inr_price}}</td>
                                                <td class="text-left">{{$value->crypto_price}}</td>
                                                <td class="text-left"><span class="grey status_label">{{$value->status}}</span></td>
                                                <td class="text-right"><a data-toggle="tooltip"  class="custom-tooltip" href="{{route('show_detail_transaction',[encrypt($value->id,env('APP_NAME'))])}}" data-placement="bottom" data-id="" data-original-title="Details"><i class="fa fa-angle-right" aria-hidden="true"></i></a></td>
                                             </tr>
                                             @endforeach
                                             @endif        
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 411.209px;"></div>
                              <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                              </div>
                        </div>
                        @endif                                   
                    </div>
                @else
                  <div class="col-lg-7 col-md-7 mb-3">
                     <div class="card message-card">
                        <div class="card-body">
                           <div class="no-block">
                              <h3 class="card-title">Please verify your account</h3>
                              <div class="row">
                                 <div class="col-md-6 col-12">
                                    <h6 class="card-paragraph">In order to execute transactions we need to verify your identity. The procedure is simple and will take less than 5 minutes.</h6>
                                 </div>
                                 <div class="col-md-3 col-6 pt-xs-3 text-right">
                                    <a class="card-button" href="{{ url('user_kyc') }}">Verify Account</a>
                                 </div>
                                 <div class="col-md-3 col-6 pt-xs-3 text-right">
                                    <a class="card-button" id="card-button-skip" >Verify Later</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     {{-- <div class="d-md-flex no-block">
                        <h4 class="card-title Recent-Transactions">Recent Transactions</h4>
                     </div>
                     <div class="card">
                        <div class="card-body">
                           <div class="col-lg-7 pt-3 pb-3 px-0">
                              <div class="input-group footable-filtering-search mt-2"><label class="sr-only">Search</label>
                                  <div class="input-group">
                                         <input type="text" class="form-control" value="" placeholder="Search By Reference No.">
                                         <div class="input-group-append">
                                            <button type="button" class="btn btn-primary" value="submit" name="get" id="submit"><span class="fas fa-search"></span></button>
                                         </div>
                                           <a class="btn btn-primary footable-show ml-3" href="#" type="reset"> <i class="fa fa-undo"></i>
                                           </a>

                                    </div>
                                </div>
                              </div>
                          
                        </div>
                     </div> --}}
                  </div>
                @endif
                  <div class="col-md-5 col-lg-5  xchange-box">
                     <div class="card tabs-nav">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab buy-sell-tab" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">
                                 <div class="tabsParent">
                                    <div class="tabsIcon">
                                       <img src="images/noriapay_extracted_logos/sell_new.svg" alt="">
                                    </div>
                                    <div c8lass="tabsContent">
                                       <h3>Buy</h3>
                                       <p>USDT</p>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">
                                 <div class="tabsParent">
                                    <div class="tabsIcon">
                                       <img src="images/noriapay_extracted_logos/buy_new.svg" alt="">
                                    </div>
                                    <div class="tabsContent">
                                       <h3>Sell</h3>
                                       <p>USDT</p>
                                    </div>
                                  </div></a>
                                 </li>
                               </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home2" role="tabpanel">
                                    <div class="p-3">

                                        <form class="pl-3 pr-3" id="buySubmit">

                                                @php
                                                $price_buy = number_format(((@$commision_buy->fees / 100) * $crypto_price)+$crypto_price,2);
                                                $price_sell = number_format($crypto_price-((@$commision_sell->fees / 100) * $crypto_price),2);
                                                @endphp

                                                <h3 class="price"><span>1 USDT is Roughly</span><b id="usdt-price">{{$price_buy}}</b> <i>INR</i></h3>
                                                <div class="inputParent">
                                                    <div class="inputBox">
                                                        <div class="input_label">
                                                            <p class="xs-text mb-0" for="input1">You Pay</p>
                                                            <input onblur="divide()" class="error" name="form_inr_amount" value="{{ $price_buy*100 }}" type="text" id="form_inr_amount_buy">
                                                        </div>
                                                        <div class="iconBox">
                                                            <img src="images/noriapay_extracted_logos/rupee.svg" alt="">
                                                            <p>INR</p>
                                                        </div>
                                                    </div>
                                                    <div class="joinedArrow">
                                                        <img src="images/noriapay_extracted_logos/converter.svg" alt="">
                                                    </div>
                                                    <input name="form_transaction_type" value="BUY" type="hidden" >
                                                    <div class="inputBox">
                                                        <div class="input_label">
                                                            <p class="xs-text mb-0" for="input2">You will receive Roughly</p>
                                                            <input onblur="multiply()" class="error" name="form_crypto_amount" value="100" type="text" id="form_crypto_amount_buy">
                                                                                               
                                                        </div>
                                                        <div class="iconBox">
                                                            <img src="images/noriapay_extracted_logos/usdt.svg" alt="">
                                                            <p>USDT</p>
                                                        </div>
                                                    </div>
                                                    <p class="xs-text py-1 buyError" style="display:none;"></p>
                                                </div>
                                                <div class="exChange mb-3">
                                                    <!-- <button type="submit"  id="BuyExchange">Exchange</button> -->
                                                    <button type="button" onclick="pageredirect(1)">Exchange</button>

                                                    {{-- <button type="submit" onblur="divide()" id="BuyExchange">Exchange</button> --}}
                                                    <!--<a href="checkout">Exchange</a>-->

                                                </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile2" role="tabpanel">
                                       <div class="p-3">
                                            <form class="pl-3 pr-3" method="POST">
                                                <h3>Payment Methods</h3>
                                                   <div class="form-radio select-payment">                                                      <label class="form-group-payment col-lg-3 col-md-6 col-xs-6 col-sm-4 mb-3" for="radio_s1">
                                                              <input name="form_payment_method" type="radio" id="radio_s1" value="UPI" class="with-gap radio-col-orange" >
                                                              <label class="label-small" for="radio_s1">UPI</label>
                                                         </label>          
                                                         <label class="form-group-payment col-lg-5 col-md-6 col-xs-6 col-sm-4 mb-3" for="radio_s3">
                                                              <input name="form_payment_method" type="radio" id="radio_s3"value="BANK" class="with-gap radio-col-orange" >
                                                              <label class="label-small" for="radio_s3">Bank Account</label>
                                                         </label>                                                </div>
                                                   <h3 class="price"><span>1 USDT is Roughly</span> <strong id="usdt-price-sell">{{$price_sell}}</strong> <i>INR</i></h3>
                                                   <div class="inputParent">
           
                                                       <div class="inputBox">
                                                           <div class="input_label">
                                                               <p class="xs-text mb-0" for="input1">You Pay</p>
                                                               <input class="error" onblur="multiply_sell()" name="form_crypto_amount" value="100" type="text" id="form_crypto_amount_sell">
                                                           </div>
                                                           <div class="iconBox">
                                                               <img src="images/noriapay_extracted_logos/usdt.svg" alt="">
                                                               <p>USDT</p>
                                                           </div>
                                                       </div>
                                                       <p class="xs-text py-1 sellError" style="display:none;"></p>
                                                       <div class="joinedArrow">
                                                           <img src="images/noriapay_extracted_logos/converter.svg" alt="">
                                                       </div>
                                                       <input name="form_transaction_type" value="SELL" type="hidden" >
                                                       <div class="inputBox">
                                                           <div class="input_label">
                                                               <p class="xs-text mb-0" for="input2">You will receive Roughly</p>
                                                               <input class="error" onblur="divide_sell()" name="form_inr_amount" type="text" value="{{ $price_sell*100 }}" id="form_inr_amount_sell">
                                                           </div>
                                                           <div class="iconBox">
                                                               <img src="images/noriapay_extracted_logos/rupee.svg" alt="">
                                                               <p>INR</p>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="exChange mb-3">
                                                       <button type="button" onclick="pageredirect(2)" id="exChange-button">Exchange</button>
                                                       <!--<a href="checkout">Exchange</a>-->
                                                   </div>
                                           </form>
                                       </div>
                              </a>
                           </li>
                        </ul>
                        <!-- Tab panes -->
                        {{-- <div class="tab-content">
                           <div class="tab-pane active" id="home2" role="tabpanel">
                              <div class="p-3">
                                 <form class="pl-3 pr-3" id="buySubmit">
                                    <h3>Payment Methods</h3>
                                    <div class="form-radio select-payment">                                                      <label class="form-group-payment col-lg-3 col-md-6 col-xs-6 col-sm-4 mb-3" for="radio_s1">
                                       <input name="form_payment_method" type="radio" id="radio_s1" value="UPI" class="with-gap radio-col-orange" >
                                       <label class="label-small" for="radio_s1">UPI</label>
                                       </label>          
                                       <label class="form-group-payment col-lg-5 col-md-6 col-xs-6 col-sm-4 mb-3" for="radio_s3">
                                       <input name="form_payment_method" type="radio" id="radio_s3"value="BANK" class="with-gap radio-col-orange" >
                                       <label class="label-small" for="radio_s3">Bank Account</label>
                                       </label>                                                
                                    </div>
                                    <h3 class="price"><span>1 USDT is Roughly</span><b id="usdt-price">{{((@$commision_buy->fees / 100) * $crypto_price)+$crypto_price}}</b> <i>INR</i></h3>
                                    <div class="inputParent">
                                       <div class="inputBox">
                                          <div class="input_label">
                                             <p class="xs-text mb-0" for="input1">You Pay</p>
                                             <input onblur="divide()" class="error" name="form_inr_amount" value="8392" type="text" id="form_inr_amount_buy">
                                          </div>
                                          <div class="iconBox">
                                             <img src="images/noriapay_extracted_logos/rupee.svg" alt="">
                                             <p>INR</p>
                                          </div>
                                       </div>
                                       <div class="joinedArrow">
                                          <img src="images/noriapay_extracted_logos/converter.svg" alt="">
                                       </div>
                                       <input name="form_transaction_type" value="BUY" type="hidden" >
                                       <div class="inputBox">
                                          <div class="input_label">
                                             <p class="xs-text mb-0" for="input2">You will receive Roughly</p>
                                             <input onblur="multiply()" class="error" name="form_crypto_amount" value="100" type="text" id="form_crypto_amount_buy">
                                          </div>
                                          <div class="iconBox">
                                             <img src="images/noriapay_extracted_logos/usdt.svg" alt="">
                                             <p>USDT</p>
                                          </div>
                                       </div>
                                       <p class="xs-text py-1 buyError" style="display:none;"></p>
                                    </div>
                                    <div class="exChange mb-3">
                                       <!-- <button type="submit"  id="BuyExchange">Exchange</button> -->
                                       <button type="button" onclick="pageredirect()">Exchange</button>
                                      <!--<button type="submit" onblur="divide()" id="BuyExchange">Exchange</button> -->
                                       <!--<a href="checkout">Exchange</a>-->
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="tab-pane" id="profile2" role="tabpanel">
                              <div class="p-3">
                                 <form class="pl-3 pr-3" method="POST">
                                    <h3>Payment Methods</h3>
                                    <h3 class="price"><span>1 USDT is Roughly</span> 78.43 <i>INR</i></h3>
                                    <div class="inputParent">
                                       <div class="inputBox">
                                          <div class="input_label">
                                             <p class="xs-text mb-0" for="input1">You Pay</p>
                                             <input class="error" name="form_crypto_amount" value="100" type="text" id="form_crypto_amount_sell">
                                          </div>
                                          <div class="iconBox">
                                             <img src="images/noriapay_extracted_logos/usdt.svg" alt="">
                                             <p>USDT</p>
                                          </div>
                                       </div>
                                       <p class="xs-text py-1 sellError" style="display:none;"></p>
                                       <div class="joinedArrow">
                                          <img src="images/noriapay_extracted_logos/converter.svg" alt="">
                                       </div>
                                       <input name="form_transaction_type" value="SELL" type="hidden" >
                                       <div class="inputBox">
                                          <div class="input_label">
                                             <p class="xs-text mb-0" for="input2">You will receive Roughly</p>
                                             <input class="error" name="form_inr_amount" type="text" value="7843" id="form_inr_amount_sell">
                                          </div>
                                          <div class="iconBox">
                                             <img src="images/noriapay_extracted_logos/rupee.svg" alt="">
                                             <p>INR</p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="exChange mb-3">
                                       <button type="submit">Exchange</button>
                                       <!--<a href="checkout">Exchange</a>-->
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div> --}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- ***************modal for User Details********** -->
         {{-- <div id="user-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-body">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                     <div class="text-center mt-2 mb-4">
                        <a href="index.html" class="text-success">
                        <span class="header-text">User Details</span>
                        </a>
                     </div>
                     <form class="pl-3 pr-3" action="#">
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
               </div>
               <!-- /.modal-content -->
            </div>
         </div> --}}
         <!-- ***************modal for User Details end********** -->
      </div>
      <!-- Container Fluid close -->
      </div>
      </div> <!-- Main Wrapper Close -->
   </body>
</html>
@endsection
