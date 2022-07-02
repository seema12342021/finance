 
   <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Approval List</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">             
              <form id="approvalform">
                @csrf
                <input type="hidden" name="id" id="id"> 
                <div class="card-body">
                  <div class="form-group">
                    <select class="form-control" id="approval" name="approval">
                    <option value="" >Select Approval</option>
                      <option value="1">Approve</option>
                      <option value="2">Disapprove</option>
                     </select>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary float-right mr-2" id="submit">Save</button>
            </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


 <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card mb-25">
                    <div class="card-header">
                        <h6>User List</h6>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="drag-drop-wrap">
                            <div class="table-responsive table-revenue w-100 mb-30">
                                <table class="table mb-0 table-basic" id="user_list_datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Kyc Approvel</th>
                                            <th>Proof Type</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
