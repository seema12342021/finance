$(document).ready(function(){
	/*$.ajax({ 
		type:"get",
		url:"https://api.bofin.tech/exchange/currencies/ticker?key=c25737715c4ee510ae12ecc965a275fc98e2d169&ids=USDT&convert=INR",  
		success:function(res){
			if(res.length > 0){
				console.log(res[0].price);
			}
		},error:function(e){
			console.log(e+"afjksd");		 
		}
	}); */
	$.get("https://api.bofin.tech/exchange/currencies/ticker?key=c25737715c4ee510ae12ecc965a275fc98e2d169&ids=USDT&convert=INR").done(function(response){
		console.log(response);
	});
});