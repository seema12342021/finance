$("#profile_update_form").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "update_profile",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
		success:function(res){ 
			if(res.status_code == 200){
				toastr.success(res.message);
			var mobile =	$('#form_mobile_number').val();
			$('#mobileNumber').text(mobile);
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
//change password
$("#password_update_form").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "update_password",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
				$("#password_update_form").trigger("reset");
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

function loadFile(event) {
  var output = document.getElementById('set-img');
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
  }
 form = document.getElementById("profileimgForm");
  $.ajax({ 
		type:"post",
		url:siteUrl + "update_profile_img",  
		data:new FormData(form),
		processData: false, 
    contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
				$("#profileimgForm").trigger("reset");
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


//Update Profile
 
	