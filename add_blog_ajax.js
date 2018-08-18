$(document).ready(function(){

	$(document).on('submit','#add_blog_form',function(event){
		event.preventDefault();
		$.ajax({
			url:"insert_blog.php",
			method:'POST',
			data:new FormData(this),
			contentType:false,
			processData:false,
			success:function(data)
			{	
				$('#msg').html(data);
				
				 
			}
		});
		
		
	});

});