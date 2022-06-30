function divide(){
	var usdt = $("#usdt-price").text();
	var price = $("#form_inr_amount_buy").val();
	var total =0;
<<<<<<< HEAD
	total=Number(price)/Number(usdt);
=======
	total=Number(usdt)/Number(price);
>>>>>>> origin/harsh
	$('#form_crypto_amount_buy').val(total);
}

function multiply(){
	var usdt = $("#usdt-price").text();
	var receive = $("#form_crypto_amount_buy").val();
	var total =0;
	total=Number(usdt)*Number(receive);
	$('#form_inr_amount_buy').val(total);

}