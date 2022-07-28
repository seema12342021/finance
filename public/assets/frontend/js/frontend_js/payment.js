function divide(){
	var usdt = $("#usdt-price").text();
	var price = $("#form_inr_amount_buy").val();
	var total =0;
 
	total=Number(price)/Number(usdt);
	//total=Number(usdt)/Number(price);

	$('#form_crypto_amount_buy').val(total.toFixed(2));
	t_reeceive = $("#tether_receive").val();
	if (t_reeceive!= undefined) {
	 $("#final_crypto").html($("#form_crypto_amount_buy").val());
	 $("#tether_receive").html(total.toFixed(2));
	 $("#total_payble").html((Number($("#form_inr_amount_buy").val())+Number(network_fees)+Number(id_fees)).toFixed(2));
	}

	// $('#form_crypto_amount_buy').val(total);
}

function multiply(){
	var usdt = $("#usdt-price").text();
	var receive = $("#form_crypto_amount_buy").val();
	var total =0;
	total = Number(usdt)*Number(receive);
	$('#form_inr_amount_buy').val(total.toFixed(2));
	t_reeceive = $("#tether_receive").val();
	if (t_reeceive!= undefined) {
	 $("#final_crypto").html($("#form_crypto_amount_buy").val());
	 $("#tether_receive").html(total.toFixed(2));
	 $("#total_payble").html((Number($("#form_inr_amount_buy").val())-(Number(network_fees)+Number(id_fees)).toFixed(2)));
	}

}

function multiply_sell(){
	var usdt = $("#usdt-price-sell").text();
	var receive = $("#form_crypto_amount_sell").val();
	var total =0;
	total=Number(usdt)*Number(receive);
	$('#form_inr_amount_sell').val(total.toFixed(2));
	t_reeceive = $("#tether_receive").val();
	if (t_reeceive!= undefined) {
	 $("#final_crypto").html($("#form_crypto_amount_sell").val());
	 $("#tether_receive").html($("#form_crypto_amount_sell").val());
	 $("#total_payble").html((Number($("#form_inr_amount_sell").val())-(Number(network_fees)+Number(id_fees)).toFixed(2)));
	}

}

function divide_sell(){
	var usdt = $("#usdt-price-sell").text();
	var price = $("#form_inr_amount_sell").val();
	var total =0;

	total=Number(price)/Number(usdt);
	//total=Number(usdt)/Number(price);

	$('#form_crypto_amount_sell').val(total.toFixed(2));
	t_reeceive = $("#tether_receive").val();
	if (t_reeceive!= undefined) {
	 $("#final_crypto").html($("#form_crypto_amount_sell").val());
	 $("#tether_receive").html($("#form_crypto_amount_sell").val());
	 $("#total_payble").html((Number($("#form_inr_amount_sell").val())-Number(network_fees)+Number(id_fees)).toFixed(2));
	}

	// $('#form_crypto_amount_buy').val(total);
}


function pageredirect(type){
	$("#exChange-button").remove();
	if (type == 1) {
    var data = {
       	"crypto":$('#form_crypto_amount_buy').val(),"inr":document.getElementById('form_inr_amount_buy').value,"currency":document.getElementById('currency').value,'currency_name': $('#currency').find('option:selected').text(),'buy_currency':$('#usdt-price').text(),'icon':document.getElementById("buy_currency_icon").src

          };
     }else{
     	var data = {
          "crypto":$('#form_crypto_amount_sell').val(),"inr":document.getElementById('form_inr_amount_sell').value,"type":$('input:radio[name="form_payment_method"]').val(),"currency":document.getElementById('sell_crypto_currency2').value,'currency_name': $('#sell_crypto_currency2').find('option:selected').text(),'buy_currency':$('#usdt-price-sell').text(),'icon':document.getElementById("sell_currency_icon").src
          };
      }
      showLoader();
   $.ajax({ 
		type:"get",
		url:siteUrl+"go_checkout",  
		data:{'data':data},
		success:function(res){
			if(res.status_code == 200){
					hideLoader();
				window.location = res.location;
			}
		},error:function(e){
			console.log(e);		 
		}
	});

     
};

function save_transactions(types){
	$("#btn_btn").hide();
	if (types == 1) {
		datas = {'id_fee':id_fees,'inr':$("#form_inr_amount_buy").val(),'crypto':$("#form_crypto_amount_buy").val(),'w_address':$("#form_wallet_address").val(),'form_is_wallet_acknowledged':$(".tc").val(),'wallet':$('input:radio[name="wallet"]').val(),'payment_mode':$('input:radio[name="form_payment_method"]').val(),'payment_type':types,'currency_value':$('#currency').val()};					
	}else{
		datas = {'id_fee':id_fees,'inr':$("#form_inr_amount_sell").val(),'crypto':$("#form_crypto_amount_sell").val(),'w_address':$("#form_upi_address").val(),'form_is_wallet_acknowledged':$(".tc").val(),'wallet':$('input:radio[name="wallet"]').val(),'payment_mode':$('input:radio[name="form_payment_method"]').val(),'payment_type':types,'currency_value':$('#currency').val()};
	}
	$.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
	showLoader();
	$.ajax({ 
		type:"post",
		url:siteUrl+"saveTransaction",  
		data:datas,
		success:function(res){
				hideLoader();
			if(res.status_code == 200){
				toastr.success(res.message);
				window.location.href = siteUrl+"payment_page/"+res.id;
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

function payment(){
	$.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
	$.ajax({ 
		type:"post",
		url:siteUrl+"payment_gateway",  
		data:{'id':id},
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

function payment_sell(){
	$.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
	$.ajax({ 
		type:"post",
		url:siteUrl+"payment_gateway",  
		data:{'id':id},
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

function radio_show(id){
	$('.sh').hide();
	$('#sh'+id).show();
}

$('#form_transfer').on('submit',function(e){ 
      e.preventDefault();  
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl+'payment_sell',      
         type:'post',      
         data:new FormData(this),      
         dataType:'json', 
         contentType:false,
         processData: false,     
         success:function(response){ 
            if(response.status == 1){
               toastr["success"]("data inserted");
               window.location.href = siteUrl+'user-dashboard';
            }else if(response.status==2){
               var dd = response.error ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }else if(response.status == 3){
               toastr["error"]("Couldn't insert right now");
            }             
         },
      })
   });


function button_on(){

	tv_value = $('.tc').val();
	if (tv_value == 1) {
		$('#btn_btn').attr("disabled",true);
		$('#btn_btn').css("cursor","no-drop");
		$('.tc').val(0);
	}else{
		$('#btn_btn').removeAttr("disabled");
		$('#btn_btn').css("cursor","pointer");
		$('.tc').val(1);
	}
}

function getfees(id=''){
	$.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
	 $.ajax({
        url: siteUrl + 'get_wallet',
        data: {'wallet_id': id },
        type: 'post',
        success: function(response) {
        	console.log(response);
            if (response.status_code == 200) {
            	$("#wallet_fees").text(response.data.fees);
            	var trx_value = $("#form_inr_amount_buy").val();
  					setfee(response.data.fees,trx_value);
            }
           
        }
    })
}


function setfee(fees,trxn_val){
	var sum_val = Number(fees)+Number(trxn_val);
   $("#total_payble").text(sum_val);

}


$('.currency').on('change',function(e){
		var type = $(this).attr('data-type');
	  var currency_name = $(this).find('option:selected').text();
	  showLoader();
	  $.ajax({
        url: siteUrl + 'get_crypto',
        type: 'get',
        data:{'currency_name':currency_name,'type':type},
        success: function(response) {
        		hideLoader();
        		if (response.status_code == 200) {
            	if(type == 1) {
               	$("#currency_name").text(currency_name);
            	   $("#buy_currency").text(currency_name);
            		$("#usdt-price").text(response.current_price.toFixed(2));
            		$("#buy_currency_icon").attr("src",siteUrl+"images/noriapay_extracted_logos/"+response.icon);
            		multiply();
        			}
            	else {
            		$("#usdt-price-sell").text(response.current_price.toFixed(2));
               	$("#sell_usdt_name").text(currency_name);
               	$("#sell_crypto_currency").text(currency_name);
               	$("#sell_currency_icon").attr("src",siteUrl+"images/noriapay_extracted_logos/"+response.icon);
            		multiply_sell();
            	}
            }
           
        }
    })

})



$('.crypto_list').on('change',function(e){
		var type = $(this).attr('data-type');
	  var currency_name = $(this).find('option:selected').text();
	     showLoader();
	  $.ajax({
        url: siteUrl + 'get_home_crypto',
        type: 'get',
        data:{'currency_name':currency_name,'type':type},
        success: function(response) {
        if (response.status_code == 200) {
        	hideLoader();
        			if(type == 1) {
		        	  $("#usdt_buy_currency").text(currency_name);
		         	$("#buy_currency_name").text(currency_name);
            		$("#usdt-price").text(Number(response.current_price.toFixed(2)));
            		$("#buy_currency_icon1").attr("src",siteUrl+"images/noriapay_extracted_logos/"+response.icon);
            		multiply();
        			}
            	else {
            		$("#usdt-price-sell").text(Number(response.current_price.toFixed(2)));
            			$("#usdt_sell_currency").text(currency_name);
            			$("#sell_currency").text(currency_name);
            			$("#sell_currency_icon1").attr("src",siteUrl+"images/noriapay_extracted_logos/"+response.icon);
            		multiply_sell();
            	}
            }
           
        }
    })

})




// $('#sell_crypto_currency').on('change',function(e){
// 	  var currency_name = $(this).find('option:selected').text()
// 	  $.ajax({
//         url: siteUrl + 'get_sell_crypto',
//         type: 'get',
//         data:{'currency_name':currency_name},
//         success: function(response) {
//         		console.log(response.current_price);
//         if (response.status_code == 200) {
//             	$("#usdt-price-sell").text(response.current_price);
//             	$("#sell_usdt_name").text(currency_name);
//             	$("#sell_currency").text(currency_name);
//             }
           
//         }
//     })

// })