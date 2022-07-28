$("#loginform").on("submit",function(e){
	e.preventDefault();
	var tab = $("ul.nav-tabs li a.active h3").text();
	if(tab == 'Buy'){
	var data = {
			 "pay":$('#form_inr_amount_buy').val(),"receive":$('#form_crypto_amount_buy').val(),'currency_name': $('#crypto_list_buy').find('option:selected').text(),'username':$("#form_username").val(),'password':$("#form_lpassword").val(), 'type':1, 'price':$('#usdt-price').text(),'icon':document.getElementById("buy_currency_icon1").src
        };
     }else{
	    var data = {
		 "pay":$('#form_crypto_amount_sell').val(),"receive":$('#form_inr_amount_sell').val(),'currency_name': $('#crypto_list_sell').find('option:selected').text(),'username':$("#form_username").val(),'password':$("#form_lpassword").val(), 'type':2 ,'price':$('#usdt-price-sell').text(),'icon':document.getElementById("sell_currency_icon1").src
            };
      }
     $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
        showLoader();
	$.ajax({
		type:"post",
		url:siteUrl + "user_login",
		data:data,
		success:function(res){
			hideLoader();
			if(res.status_code == 200){
				 $("#loginform").trigger("reset");
				 $("#login-modal").modal('hide');
				window.location.href = siteUrl+"user-dashboard/"+res.location;			
			}else if(res.status_code == 202){
				$.each(res.error,function(key , value){
					toastr.error(value);
				});
			}else if(res.status_code == 201){
				toastr.error(res.message);
			}
		},error:function(e){
			console.log(e);		
		}
	});
}); 



