<title>Just Passing Main paramList to KP Gateway Log</title><body>
<center><h1>Please do not refresh and close this page/window...</h1></center>
<form id="paymentform" method="post" action="https://pispp.kwikpaisa.com/CheckOut/TxnProcess" 
name="{{ ($status || $CustomerAPIStatus == 'success') ?'f1':''}}">
    <input type="hidden" name="KPMID" value="midKey_18977426e35958a"/>
    <input type="hidden" name="CUST_KP_ID" value="<?php echo $customerIdvalue ?>"/>
    <input type="hidden" name="KP_Txn_OrderID" value="<?php echo $KP_Txn_OrderID ?>"/>
    <input type="hidden" name="KP_Txn_Signature" value="<?php echo $KP_Txn_Signature ?>"/>
    <input type="hidden" name="KP_Txn_Token" value="<?php echo $KP_Txn_Token ?>"/>
    <input type="hidden" name="KP_Return_URL" value="{{url('api/redirect_page')}}"/>
    <script type="text/javascript">document.f1.submit();</script>
  </form>