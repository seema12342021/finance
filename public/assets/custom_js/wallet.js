$(document).ready(function(){
	showWallet();
});
  

$("#walletAddress").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "save_wallet",  
		data:new FormData(this),
		processData: false, 
        contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
				$('#wallet_datatable').DataTable().destroy();
				$("#walletAddress").trigger("reset");
                $("#submit").text("Save");
                showWallet();
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

function showWallet(){
	var table = $('#wallet_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"show_wallet",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'name'},
            {data: 'address'},
            { data: "status"},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

function deleteWallet(id = ''){
    if (confirm("Are you sure!")) {
        $.ajax({
            url:siteUrl+'delete_wallet',
            type:'GET',
            data:{id:id},
            success:function(response)
            {
               if(response.status_code==200){
                    toastr["success"](response.message);
                    $('#wallet_datatable').DataTable().destroy();
                    showWallet();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    showWallet();
                }
            }
        });
     }
} // End Of function


function editWallet(id = '') {
    $.ajax({
        url: siteUrl + "edit_wallet",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            $("#id").val(res.id); 
            $("#wallet_name").val(res.name);
            $("#wallet_address").val(res.address);
            $("#submit").text("Update");
        },
    });
}//end functtion

function statusWallet(id = "", status = "") {
    $.ajax({
        url: siteUrl + "status_wallet",
        data: { id: id, status: status },
        type: "get",
        dataType: "json",
        success: function (response) {
            if(response.status_code==200){
                console.log(response.message);
                    toastr["success"](response.message);
                    $('#wallet_datatable').DataTable().destroy();
                    showWallet();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    showWallet();
                }
        },
    });
}

