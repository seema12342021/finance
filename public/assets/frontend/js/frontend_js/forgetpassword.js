$("#forget_password").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "reset_password",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				$('#reset_password_email').attr('disabled');
		    var bind = '<div><input type="text" id="form_otp" class="form-control" placeholder="Enter otp"></div>';
				$("#otp_field").html(bind);
				toastr.success(res.message); 
				$(".loginexChange").html('<button type="button" id="verify_otp" class="btn btn-success">Validate OTP</button>');
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
});
 
$(document).on('click','#verify_otp',function(){
	var email = $('#reset_password_email').val();
	var otp = $('#form_otp').val();
	$.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    })
	$.ajax({ 
		type:"post",
		url:siteUrl + "check_otp",  
		data: {'email':email,'otp':otp},
		success:function(res){
			if(res.status_code == 200){
				window.location.href = siteUrl+"reset_password/"+res.hash;
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
})

$("#updateform").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "user_reset_password",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message); 
				window.location.href = siteUrl;
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
});
 

