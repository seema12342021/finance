$(document).ready(function(){
	transactionBuy();
});
  

// $("#commisionform").on("submit",function(e){
//   e.preventDefault(); 
// 	$.ajax({ 
// 		type:"post",
// 		url:siteUrl + "save_commision",  
// 		data:new FormData(this),
// 		processData: false, 
//     contentType: false, 
// 		success:function(res){
// 			if(res.status_code == 200){
// 				toastr.success(res.message);
// 				$('#commision_datatable').DataTable().destroy();
// 				$("#commisionform").trigger("reset");
//                 $("#submit").text("Save");
//                 show_commision();
// 			}else if(res.status_code == 301){
// 				$.each(res.message,function(key , value){
// 					toastr.error(value);
// 				});
// 			}else if(res.status_code == 201){
// 				toastr.error(res.message);
// 			}
// 		},error:function(e){
// 			console.log(e);		 
// 		}
// 	});
// });

function transactionBuy(){
	var table = $('#transactionBuy_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"show_transactionBuy",
        columns: [ 
            {data: 'DT_RowIndex'},
            // {data: 'fees', name: 'fees'},
            // {data: 'type'},
            { data: "status"},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

// function delete_commision(id = ''){
//     if (confirm("Are you sure!")) {
//         $.ajax({
//             url:siteUrl+'delete_commision',
//             type:'GET',
//             data:{id:id},
//             success:function(response)
//             {
//                if(response.status_code==200){
//                     toastr["success"](response.message);
//                     $('#commision_datatable').DataTable().destroy();
//                     show_commision();
//                 }else if(response.status==201){
//                     toastr["error"](response.message);
//                     show_commision();
//                 }
//             }
//         });
//      }
// } // End Of function


// function edit_commision(id = '') {
//     $.ajax({
//         url: siteUrl + "edit_commision",
//         data: { id: id },
//         type: 'GET',
//         dataType: "json",
//         success: function (res) {
//             $("#id").val(res.id); 
//             $("#fees").val(res.fees);
//             $("#type").val(res.type);
//             $("#submit").text("Update");
//              $('#commision_datatable').DataTable().destroy();
//                     show_commision();
            

//         },
//     });
// }//end functtion

// function status_commision(id = "", status = "") {
//     $.ajax({
//         url: siteUrl + "status_commision",
//         data: { id: id, status: status },
//         type: "get",
//         dataType: "json",
//         success: function (response) {
//             if(response.status_code==200){
//                 console.log(response.message);
//                     toastr["success"](response.message);
//                     $('#commision_datatable').DataTable().destroy();
//                     show_commision();
//                 }else if(response.status==201){
//                     toastr["error"](response.message);
//                     show_commision();
//                 }
//         },
//     });
// }

