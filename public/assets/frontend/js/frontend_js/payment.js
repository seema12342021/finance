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
          "crypto":$('#form_crypto_amount_buy').val(),"inr":document.getElementById('form_inr_amount_buy').value
          };
     }else{
     	var data = {
          "crypto":$('#form_crypto_amount_sell').val(),"inr":document.getElementById('form_inr_amount_sell').value,"type":$('input:radio[name="form_payment_method"]').val()
          };
      }
   $.ajax({ 
		type:"get",
		url:siteUrl+"go_checkout",  
		data:{'data':data},
		success:function(res){
			if(res.status_code == 200){
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
		datas = {'id_fee':id_fees,'inr':$("#form_inr_amount_buy").val(),'crypto':$("#form_crypto_amount_buy").val(),'w_address':$("#form_wallet_address").val(),'form_is_wallet_acknowledged':$(".tc").val(),'wallet':$('input:radio[name="wallet"]').val(),'payment_mode':$('.p_mode:checked').val(),'payment_type':types};						
	}else{
		datas = {'id_fee':id_fees,'inr':$("#form_inr_amount_sell").val(),'crypto':$("#form_crypto_amount_sell").val(),'w_address':$("#form_upi_address").val(),'form_is_wallet_acknowledged':$(".tc").val(),'wallet':$('input:radio[name="wallet"]').val(),'payment_mode':$('.p_mode:checked').val(),'payment_type':types};
	}
	$.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
	$.ajax({ 
		type:"post",
		url:siteUrl+"saveTransaction",  
		data:datas,
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
				window.location.href = siteUrl+"payment_page/"+res.id;
			}else if(res.status_code == 301){
				$("#btn_btn").show();
				$.each(res.message,function(key , value){
					toastr.error(value);
				});
			}else if(res.status_code == 201){
				$("#btn_btn").show();
				toastr.error(res.message);
			}
		},error:function(e){
			console.log(e);		 
		}
	});

}

function payment(){
	if(!$("#form_is_payment_acknowledged").is(":checked")){
		toastr.error("Please check I Have paid Box !");
		return false;
	}
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
	$("#form_transfer_btn").hide();
      e.preventDefault();  
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl+'/payment_sell',      
         type:'post',      
         data:new FormData(this),      
         dataType:'json', 
         contentType:false,
         processData: false,     
         success:function(response){ 
            if(response.status == 1){
               toastr["success"]("data inserted");
               window.location.href = "user-dashboard";
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

function showTransferDoc(input) {
    var fileName = input.files[0].name;
    $(".file-name").text(fileName + ' is the selected file.');               
}

$('#buyform').on('submit',function(e){ 
	$(".final_payment_btn").hide();
      e.preventDefault();  
		if(!$("#form_is_payment_acknowledged").is(":checked")){
			toastr.error("Please check I Have paid Box !");
			return false;
		}
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl+'payment_buy',      
         type:'post',      
         data:new FormData(this),      
         dataType:'json', 
         contentType:false,
         processData: false,     
         success:function(response){ 
            if(response.status == 1){
               toastr["success"]("Success");
               window.location.href = siteUrl+"user-dashboard";
            }else if(response.status==2){
            	$(".final_payment_btn").show();
               var dd = response.error ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }else if(response.status == 3){
            	$(".final_payment_btn").show();
               toastr["error"]("Couldn't insert right now");
            }             
         },
      })
});