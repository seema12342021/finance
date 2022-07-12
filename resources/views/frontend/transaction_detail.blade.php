  @extends('frontend.template')
    @section('content')
    
      <div class="page-wrapper">      <div class="container-fluid"><div class="welcome-section">
     <h1>Transactions Details</h1>
  </div>
<div class="main-container" >
    <!-- Row -->
    <div class="row">
      <div class="col-12">
        <div class="card margin-box-table">
          <div class="row">           
            <div class="col-lg-6 col-6">
              <h3 class="rounded-title table-heading col-md-12 ">Transaction Reference Number :<span> {{$transaction_detail->transaction_id}}</span></h3>
            </div>
            <div class="col-lg-6 col-6" style="text-align:right;margin-top: 1rem;margin-left:-1rem;">            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 col-12 px-2">
                <div class="form-body">
                  <div class="card-body">
                    <h4 class="title-space"><b>Personal Info </b></h4>
                    <div class="row pb-3 pt-4">
                      <div class="col-md-3 col-12 border-right">
                        <p class="small-text"> User Name</p>
                        <p class="text-muted">{{@$transaction_detail->first_name}}</p>
                      </div>
                      
                      <div class="col-md-3 col-12 border-right">
                        <p class="small-text">Email ID</p>
                        <p class="text-muted">{{@$transaction_detail->email}}</p>
                      </div>
                                                </div>
                    <hr class="pb-3">
                    
                    <h4 class="title-space"><b>Transaction Details </b> </h4>
                    <div class="row pt-4">
                      <div class="col-md-2 col-3 border-right">
                        <p class="pt-2 transaction-type">
                          @if(@$transaction_detail->payment_type == 1)
                            <img src="{{ url('images/icons/oval_buy.png')}}">&nbsp Buy
                          @else
                          <img src="{{ url('images/icons/oval_sell.png')}}">&nbsp Sell
                          @endif
                        </p>
                      </div>
                      <div class="col-md-1 col-12 border-right">
                        <p class="small-text">  Tether</p>
                        <p class="text-muted">{{@$transaction_detail->total_crypto}}</p>
                      </div>
                      
                      <div class="col-md-2 col-12 border-right">
                        <p class="small-text">  INR</p>
                        <p class="text-muted">{{@$transaction_detail->total_inr_price}}</p>
                      </div>
                      
                      <div class="col-md-1 col-12 border-right">
                        <p class="small-text"> Fee</p>
                        <p class="text-muted">{{@$transaction_detail->commission}}</p>
                      </div>
                    
                      <div class="col-md-2 col-12 border-right">
                        <p class="small-text">  Status</p>
                        <p class="text-muted"> <p><span class="blue status_label">{{@$transaction_detail->status}}</span></p></p>
                      </div>
                     
                      <div class="col-md-2 col-12 border-right">
                        <p class="small-text"> INR Exchange Rate</p>
                        <p class="text-muted">{{@$transaction_detail->crypto_price}}</p>
                      </div>
                   
                      <div class="col-md-2 col-12 border-right">
                        <p class="small-text">Total Amount</p>
                        <p class="text-muted">{{@$transaction_detail->total_inr_price}}</p>
                      </div>
                    </div>
                    <hr class="pb-3">
                    


                <h4 class="title-space"><b>Payment Details </b></h4>
                   <div class="row pt-4">
                      <div class="col-md-3 col-12 border-right">
                          <div class="row">
                            <div class="col-md-4 col-3 pt-1"> <img src="{{ url('images/icons/upi.png') }}" width="80%">                            </div>
                            <div class="col-md-7 col-9 p-0">
                                <p class="small-text"> Payment Method</p>
                                <p class="text-muted">{{@$transaction_detail->payment_mode}}</p>
                            </div>
                          </div>
                      </div>                      <div class="col-md-3 col-12 border-right">
                        <p class="small-text"> UPI Wallet Address</p>
                        <p class="text-muted">{{@$transaction_detail->wallet_address}}</p>
                      </div>
                    </div>                    <hr class="pb-3">
                    <h4 class="title-space"><b>Crypto Transfer Details </b></h4>
                                        <div class="row pt-4">
                      <div class="col-md-3 col-12 border-right">
                        <a class="btn btn-border float-left" href="transfer?id=1041">Transfer Tether</a>
                      </div>
                    </div>                  <hr class="mt-4">
                  <div class="row">
                    <div class="col-md-3 col-12 border-right">
                      <p class="small-text">Payment Received Confirmation</p>
                      <p class="text-muted">No</p>
                    </div>
                  </div>                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>		        </div> <!-- Container Fluid close -->
 </div>
</div> <!-- Main Wrapper Close -->
@endsection