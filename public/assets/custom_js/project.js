$(document).ready(function(){
	show_project();
});
  

$("#projectform").on("submit",function(e){
  e.preventDefault(); 
	$.ajax({ 
		type:"post",
		url:siteUrl + "save_project",  
		data:new FormData(this),
		processData: false, 
    contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
				$('#project_datatable').DataTable().destroy();
				$("#projectform").trigger("reset");
                $("#submit").text("Save");
                show_project();
                $(".custom-file label").text('IMAGE');
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

function show_project(){
	var table = $('#project_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"show_project",
        columns: [ 
            {data: 'id', name: 'id'},
            {data: 'category', name: 'category'},
            {data: 'title', name: 'title'},
            {data: 'project_url', name: 'projecturl'},
            {data: 'img', name: 'img'},
             { data: "status"},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

function delete_project(id = ''){
    if (confirm("Are you sure!")) {
        $.ajax({
            url:siteUrl+'delete_project',
            type:'GET',
            data:{id:id},
            success:function(response)
            {
               if(response.status_code==200){
                    toastr["success"](response.message);
                    $('#project_datatable').DataTable().destroy();
                    show_project();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    show_project();
                }
            }
        });
     }
} // End Of function


function edit_project(id = '') {
    $.ajax({
        url: siteUrl + "edit_project",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            $("#id").val(res.id); 
            $("#category").val(res.category);
            $("#description").val(res.description);
            $("#title").val(res.title);
            $("#projecturl").val(res.project_url);
             $(" .custom-file label").text(res.image);
            $("#submit").text("Update");
             $('#project_datatable').DataTable().destroy();
                    show_project();
            

        },
    });
}//end functtion

function status_project(id = "", status = "") {
    $.ajax({
        url: siteUrl + "status_project",
        data: { id: id, status: status },
        type: "get",
        dataType: "json",
        success: function (response) {
            if(response.status_code==200){
                console.log(response.message);
                    toastr["success"](response.message);
                    $('#project_datatable').DataTable().destroy();
                    show_project();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    show_project();
                }
        },
    });
}

function view(id = '') {
     $.ajax({
        url: siteUrl + "view_modal",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            $("#show_desc").html(res.description); 
            $("#show_title").html(res.title); 
            
            

        },
    });
}//end functtion