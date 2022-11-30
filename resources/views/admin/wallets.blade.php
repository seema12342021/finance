 <div class="container-fluid">
        <div class="row">
   <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Network</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="walletAddress">
                @CSRF
                  <input type="hidden" name="id" id="id"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampletitle">Wallet Name</label>
                    <input type="text" class="form-control" id="wallet_name" name="wallet_name" placeholder="Enter Wallet Name">
                  </div>
                  <div class="form-group">
                    <label for="exampletitle">Wallet Address</label>
                    <input type="text" class="form-control" id="wallet_address" name="wallet_address" placeholder="Enter Wallet Address">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="reset" class="btn btn-danger float-right mr-2" id="resset_section4">Reset</button>
                  <button type="submit" class="btn btn-primary float-right mr-2" id="submit">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
            <div class="col-md-8">
              <div class="card mb-25">
                    <div class="card-header">
                        <h6>Wallets Table</h6>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="drag-drop-wrap">
                            <div class="table-responsive table-revenue w-100 mb-30">
                                <table class="table mb-0 table-basic" id="wallet_datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Wallet Name</th>
                                            <th>Wallet Address</th>
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
