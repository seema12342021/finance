  @extends('frontend.template')
    @section('content')
      
      <div class="page-wrapper">     
    <div class="container-fluid">     
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url() no-repeat center center; background-size: cover;">
    <div class="auth-box p-4 bg-white rounded">
        <div id="loginform">
            <div class="logo">
                <h3 class="box-title mb-3">Change password</h3>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal mt-3 form-material" id="updateform">
                        @CSRF
                        <input type="hidden" name="remember_token" value="{{$hash}}">
                        <div class="form-group mb-3">
                            <div class="">
                                <input class="form-control" type="password" name="form_newPassword" value="" required="" placeholder="New Password" id="newpassword"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="">
                                <input class="form-control" type="password" name="form_confirmPassword" value="" required="" placeholder="Confirm Password" id="confirmpassword"> </div>
                        </div>
                      
                       <div class="form-group text-center">
                            <div class="col-xs-12">
                               <div class="exChange">
                                   <button class="btn btn-success" type="submit">Update Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
		        </div> <!-- Container Fluid close -->
 </div>
</div> <!-- Main Wrapper Close -->
@endsection
          