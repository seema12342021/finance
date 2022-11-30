$("#accountform").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "save_account",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
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
});