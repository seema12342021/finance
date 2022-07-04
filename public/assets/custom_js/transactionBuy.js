$(document).ready(function(){
	transactionBuy();
});
  

function transactionBuy(){
	var table = $('#transactionBuy_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"show_transactionBuy",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'user'},
            {data: 'total_crypto'},
            {data: 'total_inr_price'},
            {data: "status"},
            {data: 'action', orderable: false, searchable: false},
        ]
    });
}

function show(id){
    $.get(siteUrl+'get_transaction_details/'+id).done(function(response){
        if(response){
            $("#user_name").text(capitalize(response.first_name+' '+response.last_name));
            $("#user_email").text(response.email);
            $("#user_mobile").text(response.mobile_number);
            $("#usdt").text(response.total_crypto);
            $("#inr").text(response.total_inr_price);
            $("#crypto_price").text(response.crypto_price);
            $("#wallet_address").text(response.wallet_address);
            $("#wallet").text(response.wallet);
            $("#status").text(response.status);
            $("#transaction_details").modal("show");
        }else{
            toastr.error("No data found !");
        }
    })
}

function capitalize(str='') { strVal = ''; str = str.split(' '); for (var chr = 0; chr < str.length; chr++) { strVal += str[chr].substring(0, 1).toUpperCase() + str[chr].substring(1, str[chr].length) + ' ' } return strVal }