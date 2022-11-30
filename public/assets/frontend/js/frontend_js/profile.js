$(document).ready(function(){
 if (errornsg != '') {
 		toastr.error(errornsg);
 }
});

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
//update kyc details
$("#form_profile").on("submit",function(e){
	$("#form_profile_btn").hide();
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "update_kyc_details",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
				location.reload();
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

 $('input[name=form_kyc_document_type]').click(function () {
        
      $('#kyc_upload').show('slow');
      $('#kyc_upload').css('display', 'block');
      
      $('#D-labels').remove();
      $('#document_uploads').remove();
      $('#file_format_note').remove();
      
      var documentLabelHtml = ''+
      '<div class="form-group" id="D-labels">'+
        '<div class="row" >'+
          '<div class="col-lg-6 col-md-6">'+
              '<p class="small-text">Upload '+ $(this).val().replace('_', ' ') +' front</p>'+
          '</div>'+
          
          '<div class="col-lg-6 col-md-6">'+
              '<p class="small-text">Upload '+ $(this).val().replace('_', ' ') +' Back</p>'+
          '</div>'+
        '</div>'+
      '</div>';
      
      var documentUploadHTML = ''+
      '<div id="file_format_note">'+
        '<p style="color:red;font-size: 14px;padding-bottom: 10px;">NOTE : Only (JPEG/PNG/PDF) file types are allowed and MAX size : 10mb</p>'+
      '</div>'+
      '<div>'+
      '<div class="form-group" id="document_uploads">'+
        '<input type="hidden" name="kyc_type" value="'+$(this).attr("data-id")+'"><div class="row" >'+
          '<div class="col-lg-6 col-md-6">'+
            '<div class="upload upload-theme-dragdropbox">'+
              '<input style="cursor:pointer;z-index: 9; opacity: 0; width: 100%; height: 90px; position: absolute; right: 0px; left: 0px; top:0px; margin-right: auto; margin-left: auto;" name="front_image" id="filer_input2" type="file" onchange="showFront(this)">'+
              '<div class="upload-input-dragDrop ">'+
                '<div class="upload-input-inner row">'+
                  '<div class="upload-input-icon col-md-3 col-3 pt-3 text-right"><img src="/images/icons/camera.png">'+
                  '</div>'+
				 '<div class="col-md-9 col-8 p-0">'+
                   '<div class="upload-input-text"><p>Drag document here or <a class="upload-input-orange">browse</a> to upload</p> '+
                   '</div>'+
				 '</div>'+
				 // '</div><a class="upload-input-choose-btn blue">Browse Files</a>'+
                '</div>'+
                '</div>'+
              '</div>'+
			  '<label class="file-name-front pb-3"></label>'+
            '</div>'+
        
          '<div class="col-lg-6 col-md-6">'+
            '<div class="upload upload-theme-dragdropbox">'+
              //'<input style="z-index: 999; opacity: 0; width: 320px; height: 200px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;" name="file[]" id="filer_input2" multiple="multiple" type="file">'+
              '<input style="cursor:pointer; z-index: 9; opacity: 0; width: 100%; height: 90px; position: absolute; right: 0px; left: 0px; top:0px; margin-right: auto; margin-left: auto;" name="back_image" id="filer_input2" type="file" onchange="showBack(this)">'+
              '<div class="upload-input-dragDrop ">'+
                '<div class="upload-input-inner row">'+
                  '<div class="upload-input-icon col-md-3 col-3 pt-3 text-right"><img src="/images/icons/camera.png">'+
                 '</div>'+
				'<div class="col-md-9 col-8 p-0">'+
                  '<div class="upload-input-text"><p>Drag document here or <a class="upload-input-orange">browse</a> to upload</p> '+
                  '</div>'+
				'</div>'+
				 // '</div><a class="upload-input-choose-btn blue">Browse Files</a>'+
                '</div>'+
              '</div>'+
            '</div>'+
	        '<label class="file-name-back pb-3"></label>'+
          '</div>'+
        '</div>'+
      '</div>';    
      
      $('#document_labels').append(documentLabelHtml);
      $('#kyc_upload').append(documentUploadHTML);
    });
// code for adding active class in Upload Document boxes start
$(document).ready(function(){
  $('.upload-doc .form-group-payment').click(function(){
    var isDisabled = $('.with-gap').is('[disabled=disabled]');
    if(isDisabled){
        $('.form-group-payment').removeClass("disable-radio");
         $(this).addClass("disable-radio");
      }
     else
      {
         $('.form-group-payment').removeClass("selected-radio");
         $(this).addClass("selected-radio");
      }
   });
});

// code for Document upload to show file name start
function showFront(input) {
    var fileName = input.files[0].name;
    $(".file-name-front").text(fileName + ' is the selected file.');               
}
function showBack(input) {
    var fileName = input.files[0].name;
    $(".file-name-back").text(fileName + ' is the selected file.');               
}
 
$("#bank-modal-form").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "update_account",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
		success:function(res){ 
			if(res.status_code == 200){
				toastr.success(res.message);
				location.reload();
			}else if(res.status_code == 201){
				toastr.error(res.message);
			}else if(res.status_code == 301){
				$.each(res.message,function(key , value){
					toastr.error(value);
				});
			}
		},error:function(e){
			console.log(e);		 
		}
	});
});
$("#upi-modal-form").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "update_upi",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
		success:function(res){ 
			if(res.status_code == 200){
				toastr.success(res.message);
				location.reload();
			}else if(res.status_code == 201){
				toastr.error(res.message);
			}else if(res.status_code == 301){
				$.each(res.message,function(key , value){
					toastr.error(value);
				});
			}
		},error:function(e){
			console.log(e);		 
		}
	});
});

function deleteAccount(type){
	$.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
	$.ajax({ 
		type:"delete",
		url:siteUrl + "delete_accounts",  
		data:{type:type},
		success:function(res){ 
			if(res.status_code == 200){
				toastr.success(res.message);
				location.reload();
			}else if(res.status_code == 201){
				toastr.error(res.message);
			}else if(res.status_code == 301){
				$.each(res.message,function(key , value){
					toastr.error(value);
				});
			}
		},error:function(e){
			console.log(e);		 
		}
	});
}