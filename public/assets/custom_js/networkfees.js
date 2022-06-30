$(document).ready(function(){
	show_network();
});
  

$("#networkform").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "save_network",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
				$('#network_datatable').DataTable().destroy();
				$("#networkform").trigger("reset");
                $("#submit").text("Save");
                show_network();
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

function show_network(){
	var table = $('#network_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"show_network",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'fees', name: 'fees'},
            {data: 'type'},
            { data: "status"},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

function delete_network(id = ''){
    if (confirm("Are you sure!")) {
        $.ajax({
            url:siteUrl+'delete_network',
            type:'GET',
            data:{id:id},
            success:function(response)
            {
               if(response.status_code==200){
                    toastr["success"](response.message);
                    $('#network_datatable').DataTable().destroy();
                    show_network();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    show_network();
                }
            }
        });
     }
} // End Of function


function edit_network(id = '') {
    $.ajax({
        url: siteUrl + "edit_network",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            $("#id").val(res.id); 
            $("#fees").val(res.fees);
            $("#type").val(res.type);
            $("#submit").text("Update");
             $('#network_datatable').DataTable().destroy();
                    show_network();
            

        },
    });
}//end functtion

function status_network(id = "", status = "") {
    $.ajax({
        url: siteUrl + "status_network",
        data: { id: id, status: status },
        type: "get",
        dataType: "json",
        success: function (response) {
            if(response.status_code==200){
                console.log(response.message);
                    toastr["success"](response.message);
                    $('#network_datatable').DataTable().destroy();
                    show_network();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    show_network();
                }
        },
    });
}

