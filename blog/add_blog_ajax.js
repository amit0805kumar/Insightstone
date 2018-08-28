$(document).ready(function(){
	
	$(document).on('submit','#add_blog_form',function(event){
		event.preventDefault();
		var blog_name=$('#blog_name').val();
		$("#hidden_input_blog_name").val(blog_name);
		$(".add_more_content").css('display','inline-block');
		$.ajax({
			url:"insert_blog.php",
			method:'POST',
			data:new FormData(this),
			contentType:false,
			processData:false,
			success:function(data)
			{	
				$("#add_blog_form")[0].reset();
				$('#msg_blog').html(data);
				$('#fetch_blog_details').DataTable().destroy();
				fetch_blog_details();
				 
			}
		});
		
		setInterval(function(){
			$('#msg_blog').html('');
		},10000);
		
		
	});


	$(document).one('click','#hidden_button',function(){ 
		var hidden_input_blog_name = $("#hidden_input_blog_name").val();
		$.ajax({
			url:"create_blog_table.php",
			type: 'post',
            data: ({
            	hidden_input_blog_name:hidden_input_blog_name
            }),

			success:function(data)
			{
				$('#msg_blog').html(data);
			}
		});

		
		
	});



	$(document).on('submit','#add_more_blog',function(event){
		event.preventDefault();
		$("input[type=submit]").attr("disabled","disabled");
		$(".add_more_content").removeAttr("disabled");
		$.ajax({
			url:"insert_more_content.php",
			method:'POST',
			data:  new FormData(this),
   			contentType: false,
         	cache: false,
   			processData:false,
			success:function(data)
			{	
				$('.more_blog_msg').html(data);
				 
			}
		});

		$('.heading').remove();
		$('.gallery_images').remove();
		$('.content').remove();
		
		setTimeout(function(){
			$('.more_blog_msg').remove();
		},5000);
		
		
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
				$('#delete_blog_msg').html(data);
				$('#fetch_blog_details').DataTable().destroy();
				fetch_blog_details();
			}
		});

		setInterval(function(){
			$('#delete_blog_msg').html('');
		},5000);

	});


	fetch_college_details();
	function fetch_college_details(){
	

	var dataTable = $('#fetch_college_details').DataTable({
       "processing" : true,
       "serverSide" : true,
       "order" : [],
       "ajax" : {
        url:"../college/fetch_college_details.php",
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


	$(document).on('submit','#add_college_form',function(event){
		event.preventDefault();
		$.ajax({
			url:"../college/insert_college.php",
			method:'POST',
			data:new FormData(this),
			contentType:false,
			processData:false,
			success:function(data)
			{	
				$("#add_college_form")[0].reset();
				$('#msg_college').html(data);
				$('#fetch_college_details').DataTable().destroy();
				fetch_college_details();
				 
			}
		});
		
		setInterval(function(){
			$('#msg_college').html('');
		},10000);
		
		
	});



	$(document).on('click','.college_delete_button',function(){ 
		var delete_college_id=$(this).attr("id");
		$.ajax({
			url:"../college/delete_college.php",
			method:"POST",
			data:{
				delete_college_id:delete_college_id
			},
			success:function(data)
			{	
				$('#delete_college_msg').html(data);
				$('#fetch_college_details').DataTable().destroy();
				fetch_college_details();
			}
		});

		setInterval(function(){
			$('#delete_college_msg').html('');
		},5000);

	});



});