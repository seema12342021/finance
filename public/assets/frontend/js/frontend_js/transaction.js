$(document).ready(function(){
	show_transaction();
});


function show_transaction(){
    const params = new URLSearchParams(window.location.search);
    type = '';
    if (params.has('ttype')) {
        type = params.get('ttype');
    }
	var table = $('#transaction_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': "show_transaction",
            data: function(data) {
                data.type = type;
            }
        },
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'date'},
            {data: 'first_name', name: 'first_name'},
            {data: 'email', name: 'email'},
            {data: 'total_crypto', name: 'total_crypto'},
            {data: 'total_inr_price', name: 'total_inr_price'},
            {data: 'wallet_address', name: 'wallet_address'},
            { data: "pay_mode"},
            {data: 'status'},
            {data: 'redirect'},
        ]
    });
}