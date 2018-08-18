$(document).ready(function(){

	$(document).on('submit','#admin_login_form',function(event){
		event.preventDefault();
		var user_id=$('#user_id').val();
		var password=$('#password').val();
		if (user_id!=''&& password!='') {
		$.ajax({
			url:"add_blog.php",
			method:'POST',
			data:{
				user_id:user_id,
				password:password
			},
			success:function(data)
			{	
				if (data) {
				 window.location.href = "add_blog.php";
				 }
				 
			}
		});
		}
		
	});

});