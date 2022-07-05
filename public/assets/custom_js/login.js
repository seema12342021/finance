$("#adminLogin").on("submit",function(e){
	e.preventDefault();
	$.ajax({
		type:"post",
		url:siteUrl + "admin_login",
		data:new FormData(this),
		processData: false,
    	contentType: false,
		success:function(res){
			if(res.status_code == 200){
				window.location.href = siteUrl+"transactionBuy";			
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
})