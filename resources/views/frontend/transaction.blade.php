  @extends('frontend.template')
    @section('content')
    <div class="page-wrapper">      
     <div class="container-fluid">    <!-- Row -->
<div class="welcome-section">
     <h1>Transactions History</h1>
  </div>
<div class="main-container">

  <p id="Page_MsgBox"></p>
  <div class="card margin-box">
   <div class="row ">
      <div class="nav-tabs table-tab col-md-12 ">
        <ul class="nav profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link {{@$_GET['ttype'] == 1?'active':''}}"  href="?ttype=1" role="tab">Buy</a>
          </li>
          <li class="nav-item"> <a class="nav-link {{@$_GET['ttype'] == 2?'active':''}}" href="?ttype=2" role="tab">Sell</a>
          </li>                      
        </ul>
      </div>       
    </div>
    <div class="card-body pt-0">
      <div class="row">
        <div class="col-lg-12 col-12">
                      
          <div class="form-body">                  
            
          
            <div class="tab-content">

              <div class="tab-pane active" id="all_buy" role="tabpanel">
 
            {{--     <div class="col-lg-12 col-12 px-0">
                  <div class="input-group footable-filtering-search mt-2"><label class="sr-only">Search</label>
                    <form method="GET" action="">
                       <div class="row col-md-12">
                          <input type="hidden" name="ttype" value="BUY">
                           <input type="text" class="form-control input-bg col-md-2 col-12 mt-2" name="form_reference_number" value="" placeholder="Search By Ref No.">
                           <div class="col-md-3 col-12 d-flex  ml-2 mt-2 pm-xs-0">
                             <p class="small-box"> <span>From</span> <input type="date" name="form_start_date" class="form-control " value="" placeholder="Search">
                             </p>
                           </div>
                           <div class="col-md-3 col-12 d-flex ml-4 mt-2 pm-xs-0">
                              <p class="small-box"> <span>To</span> 
                                 <input type="date" name="form_end_date" class="form-control" value="" placeholder="Search">
                              </p>
                           </div> 
                           <div class="col-md-3 col-12 d-flex ml-3 mt-2 pm-xs-0">
                            <button type="submit" class="btn btn-search" value="submit" id="submit">Search </button>              
                            <a class="btn btn-refresh footable-show ml-3" href="?ttype=BUY" type="reset"> <i class="fas fa-sync" aria-hidden="true"></i>
                            </a>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
                <hr class="p-0">                            
                <div class="row">
                  <div class="col-lg-12 col-12">                    <p>Nocxczx transaction to show</p>                  </div>
                  
                </div>
              
              </div>            
          </div>
          </div>
        </div> --}}

        <div class="col-md-12 mt-4">
              <div class="card mb-25">
                    <div class="card-header">
                        <h6>Commision Table</h6>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="drag-drop-wrap">
                            <div class="table-responsive table-revenue w-100 mb-30">
                                <table class="table mb-0 table-basic" id="transaction_datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Date</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Tether</th>
                                            <th>INR</th>
                                            <th>Wallet Address</th>
                                            <th>Mode</th>
                                            <th>Status</th>
                                            <th></th>
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
   <div class="col-md-12"></div>
  </div>
</div>		        </div> <!-- Container Fluid close -->
 </div>
</div> <!-- Main Wrapper Close -->
@endsection