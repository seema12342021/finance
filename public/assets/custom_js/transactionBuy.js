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
            if (response.response_data) {
                r_data = JSON.parse(response.response_data);
                $("#t_id").text(r_data.txn_id);
                $("#o_id").text(r_data.midorderid);
            }

            $("#user_name").text(capitalize(response.first_name+' '+response.last_name));
            $("#user_email").text(response.email);
            $("#user_mobile").text(response.mobile_number);
            $("#usdt").text(response.total_crypto);
            $("#inr").text(response.total_inr_price);
            $("#crypto_price").text(response.crypto_price);
            $("#wallet_address").text(response.wallet_address);
            $("#wallet").text(response.wallet);
            $("#status").text(response.status);
            $("#status2").val(response.admin_status);
            $("#m_id").val(response.id);
            $("#amnt_paid").val(response.amnt_paid);
            $("#transaction_details").modal("show");
        }else{
            toastr.error("No data found !");
        }
    })
}

function capitalize(str='') { strVal = ''; str = str.split(' '); for (var chr = 0; chr < str.length; chr++) { strVal += str[chr].substring(0, 1).toUpperCase() + str[chr].substring(1, str[chr].length) + ' ' } return strVal }


function change_status(types){
        datas = {'id':$("#m_id").val(),'status2':$("#status2").val()};

        console.log(datas);
    $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
    $.ajax({ 
        type:"post",
        url:siteUrl+"update_status_sell", 
        data:datas,
        success:function(res){
            if(res.status_code == 200){
                toastr.success(res.message);
                $('#transactionBuy_datatable').DataTable().destroy();
                $("#transaction_details").modal("hide");
                transactionBuy();
            }else if(res.status_code == 301){
                $.each(res.message,function(key , value){
                    toastr.error(value);
                });
            }else if(res.status_code == 201){
                toastr.error(res.message);
            }
        },error:function(e){
            console.log(e);      
        }
    });

}