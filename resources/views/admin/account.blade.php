 <div class="container-fluid">
  <div class="row">
     <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Commision</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="accountform">
          @CSRF
            <input type="hidden" name="id" id="id" value="{{ @$account?$account->id:'' }}"> 
          <div class="card-body row">
            <div class="form-group col-sm-6">
              <label for="exampletitle">Account Holder Name</label>
              <input type="text" class="form-control" value="{{ @$account?$account->holder_name:'' }}" name="holder_name" placeholder="Account Holder Name">
            </div>
            <div class="form-group col-sm-6">
              <label for="exampletitle">Account Number</label>
              <input type="text" class="form-control" name="account_number" value="{{ @$account?$account->account_number:'' }}" placeholder="Account Number">
            </div>
            <div class="form-group col-sm-6">
              <label for="exampletitle">Bank  Name</label>
              <input type="text" class="form-control" name="bank_name" value="{{ @$account?$account->bank_name:'' }}" placeholder="Bank  Name">
            </div>
            <div class="form-group col-sm-6">
              <label for="exampletitle">IFSC Code</label>
              <input type="text" class="form-control" name="ifsc_code" value="{{ @$account?$account->ifsc_code:'' }}" placeholder="IFSC Code">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right mr-2" id="submit">Save</button>
          </div>
        </form>
      </div>
      <!-- /.card -->

    </div>
      
  </div>
