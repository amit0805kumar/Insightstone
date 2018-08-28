$(document).ready(function(){

	$(document).on('submit','#join_us_form',function(event){
		event.preventDefault();
		$.ajax({
			url:"register.php",
			method:'POST',
			data:new FormData(this),
			contentType:false,
    		processData:false,
			success:function(data)
			{	
				$("#join_us_form")[0].reset();
				$('#success_msg').html(data);
				 
			}
		});
		setInterval(function(){
			$('#success_msg').html('');
		},5000);
		
	});

});