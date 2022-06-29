function divide(){
	var usdt = $("#usdt-price").text();
	var price = $("#form_inr_amount_buy").val();
	var total =0;
	total=Number(usdt)/Number(price);
	$('#form_crypto_amount_buy').val(total);
}

function multiply(){
	var usdt = $("#usdt-price").text();
	var receive = $("#form_crypto_amount_buy").val();
	var total =0;
	total=Number(usdt)*Number(receive);
	$('#form_inr_amount_buy').val(total);

}