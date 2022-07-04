<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <div class="card mb-25">
                <div class="card-header">
                    <h6>TransactionSell Table</h6>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div class="drag-drop-wrap">
                        <div class="table-responsive table-revenue w-100 mb-30">
                            <table class="table mb-0 table-basic" id="transactionBuy_datatable" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Information</th>
                                        <th>Crypto</th>
                                        <th>INR</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="transaction_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title m-0">Transaction Details</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card card-primary">
                <div class="card-body row">
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-number">User Name</span>
                                <span class="" id="user_name"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-number">User Email</span>
                                <span class="" id="user_email"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-number">User Mobile</span>
                                <span class="" id="user_mobile"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-number">USDT</span>
                                <span class="" id="usdt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-number">INR</span>
                                <span class="" id="inr"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-number">Crypto Price</span>
                                <span class="" id="crypto_price"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-number">Wallet</span>
                                <span class="" id="wallet"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-number">Wallet Address</span>
                                <span class="" id="wallet_address"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-number">Status</span>
                                <span class="" id="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
               {{--  <div class="card-footer text-right">
                    <a href="javascript:;" class="btn btn-primary" id="print_bill">Print Details</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
