 
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
              <form id="networkform">
                @CSRF 
                  <input type="hidden" name="id" id="id"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampletitle">Fees</label><span>(IN%)</span>
                    <input type="number" class="form-control" id="fees" name="fees" placeholder="Commision Fees">
                  </div>
                  <div class="form-group">
                    <label for="exampletitle">Type</label>
                    <select class="form-control" name="type" id="type">
                      <option value="">Choose Option</option>
                      <option value="1" id="buy">Buy</option>
                       <option value="2">Sell</option>
                      </select>
                  </div>
                   <div class="form-group" id="wallet">
                    <label for="exampletitle">Wallet</label>
                    <select class="form-control" name="wallet">
                      <option value="">Choose Wallet</option>
                      @foreach($Wallet as $key => $value)
                      <option value="{{$value->id}}" id="buy_wallet">{{$value->name}}</option>
                      @endforeach
                      </select>
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
                        <h6>NetworkFees Table</h6>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="drag-drop-wrap">
                            <div class="table-responsive table-revenue w-100 mb-30">
                                <table class="table mb-0 table-basic" id="network_datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Fees</th>
                                            <th>Type</th>
                                            <th>Wallet</th>
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
