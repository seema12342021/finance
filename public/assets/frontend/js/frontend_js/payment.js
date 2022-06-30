function divide(){
	var usdt = $("#usdt-price").text();
	var price = $("#form_inr_amount_buy").val();
	var total =0;

	total=Number(price)/Number(usdt);
	

	//total=Number(usdt)/Number(price);

	$('#form_crypto_amount_buy').val(total.toFixed(2));
	t_reeceive = $("#tether_receive").val();
	if (t_reeceive!= undefined) {
	 $("#final_crypto").html(total.toFixed(2));
	 $("#tether_receive").html(total.toFixed(2));
	 $("#total_payble").html((Number(total.toFixed(2))+Number(network_fees)+Number(id_fees)).toFixed(2));
	}
}

function multiply(){
	var usdt = $("#usdt-price").text();
	var receive = $("#form_crypto_amount_buy").val();
	var total =0;
	total=Number(usdt)*Number(receive);
	$('#form_inr_amount_buy').val(total);
	if (t_reeceive!= undefined) {
	 $("#final_crypto").html(total.toFixed(2));
	 $("#tether_receive").html(total.toFixed(2));
	 $("#total_payble").html((Number(total.toFixed(2))+Number(network_fees)+Number(id_fees)).toFixed(2));
	}

}

function pageredirect(){ 
	var data = {
             "crypto":$('#form_crypto_amount_buy').val(),"inr":document.getElementById('form_inr_amount_buy').value
                     };
// console.log(JSON.stringify(data));
	window.location = ('/checkout?data=' +JSON.stringify(data));
     
   };

function save_transactions(){
	$.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
	$.ajax({ 
		type:"post",
		url:"saveTransaction",  
		data:{'id_fee':id_fees,'inr':$("#form_inr_amount_buy").val(),'crypto':$("#form_crypto_amount_buy").val(),'w_address':$("#form_wallet_address").val(),'tc':$("#tc").val(),'wallet':1,},
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
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
