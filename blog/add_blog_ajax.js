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

	$(document).on('click','.read_about_button',function(){ 
		var read_about_button_id=$(this).attr("id");
		$.ajax({
			url:"read_about.php",
			method:"POST",
			data:{
				read_about_button_id:read_about_button_id
			},
			success:function(data)
			{
				var splitResponse = data.split('|');
        		$('#blog_name_display').html(splitResponse[0]);
        		$('#blog_content_display').html(splitResponse[1]);
			}
		});
	});


	fetch_blog_details();
	function fetch_blog_details(){
	

	var dataTable = $('#fetch_blog_details').DataTable({
       "processing" : true,
       "serverSide" : true,
       "order" : [],
       "ajax" : {
        url:"fetch_blog_details.php",
        type:"POST"
        },
   	"columnDefs":[
         {
          "targets":[0],
          "orderable":false,
         },
        ],	
      });

	}



	$(document).on('click','.blog_delete_button',function(){ 
		var delete_blog_id=$(this).attr("id");
		$.ajax({
			url:"delete_blog.php",
			method:"POST",
			data:{
				delete_blog_id:delete_blog_id
			},
			success:function(data)
			{	
				$('#delete_msg').html(data);
				$('#fetch_blog_details').DataTable().destroy();
				fetch_blog_details();
			}
		});
	});

});