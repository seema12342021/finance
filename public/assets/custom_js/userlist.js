$(document).ready(function(){
	show_userlist();
});
  
  function show_userlist(){
	var table = $('#user_list_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"user_list_datatable",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: "name"},
            {data: 'email'},
            { data: "status"},
            { data: "approval"},
            {data: "proof", orderable: false, searchable: false},
        ]
    });
}

function status_user_list(id = "", status = "") {
    $.ajax({
        url: siteUrl + "user_list_status",
        data: { id: id, status: status },
        type: "get",
        dataType: "json",
        success: function (response) {
            if(response.status_code==200){
                console.log(response.message);
                    toastr["success"](response.message);
                    $('#user_list_datatable').DataTable().destroy();
                    show_userlist();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    show_userlist();
                }
        },
    });
}

function view_modal(id){
	$("#id").val(id);
}

$("#approvalform").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "send_approval",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
                $('#user_list_datatable').DataTable().destroy();
                show_userlist();
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
