<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">DESCRIPTION</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="show_desc">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



 <div class="container-fluid">
        <div class="row">
   <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">PROJECT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="projectform">
                @CSRF
                  <input type="hidden" name="id" id="id"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampletitle">CATEGORY</label>
                    <input type="text" class="form-control" id="category" name="category" id="category" placeholder="Type Category">
                  </div>
                  <div class="form-group">
                    <label for="exampletitle">TITLE</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputdescription">DESCRIPTION</label>
                    <textarea class="form-control" id="description" name="description" placeholder="write description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputContent">PROJECT URL</label>
                    <input type="text" class="form-control" id="projecturl" name="projecturl" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File UPLOAD</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">IMAGE</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div> 
                    </div>
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
                        <h6>Project Table</h6>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="drag-drop-wrap">
                            <div class="table-responsive table-revenue w-100 mb-30">
                                <table class="table mb-0 table-basic" id="project_datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Project Url</th>
                                            <th>Image</th>
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
