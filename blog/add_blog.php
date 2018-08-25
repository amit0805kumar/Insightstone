<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta charset="utf-8">
    <link rel="shotcut icon" type="img/png" href="../images/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,500,600,700,800,900|Cabin:400,400i,500,600,700|Caveat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>  
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
      
      <!-- Animate CSS CDN -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!--Jquery Validation Links-->
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>
      
      <link rel="stylesheet" href="../additional/datetimepicker/build/jquery.datetimepicker.min.css">
      <script src="../additional/datetimepicker/build/jquery.datetimepicker.full.js"></script>

      <link rel="stylesheet" type="text/css" href="../css/animate.css">
      <script type="text/javascript" src="../js/wow.min.js"></script>
      <script type="text/javascript" src=".../js/scroll.js"></script>
        

    <title>Insightstone</title>
</head>
<body>
<div class="container">
        <div style="margin-left:80%; margin-top: 3%;">
        <button class="btn btn-primary" onclick="log_out();">Log Out</button>
        </div>
        <ul class="nav nav-tabs ">
    <li class="active"><a data-toggle="tab" href="#new_blog">New Blog</a></li>
    <li><a data-toggle="tab" href="#blog_details">Blog Details</a></li>
    <li><a data-toggle="tab" href="#add_college">Add College</a></li>
    <li><a data-toggle="tab" href="#college_details">College Details</a></li>
    </ul>
  <div class="tab-content">
    <input type="hidden" name="hidden_input_blog_name" id="hidden_input_blog_name">
    <div id="new_blog" class="tab-pane fade in active">
    <form id="add_blog_form" method="POST" enctype="multipart/form-data"><br>
    <div class="form-group blog_name">    
    <label class="control-label"><h4>Enter Blog Name:</h4></label>
    <input type="text" name="blog_name" id="blog_name" class="form-control">
    </div><br>
    <div class="form-group blog_image">
    <label class="control-label"><h4>Choose Main Image:</h4></label>
    <input type="file"  accept="image/*" name="blog_image" id="blog_image">
    </div><br>
    <div class="form-group blog_content">
    <label class="control-label"><h4>Enter Content Of The Blog:</h4></label>
    <textarea id="blog_content" name="blog_content" class="form-control"></textarea>
    </div><br>
    <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success">
    <input type="button" name="add_more_content"   value="Add More Content" class="btn btn-primary add_more_content"  style="margin-left: 6px;display: none;">
    <button type="button" class="btn btn-primary" id="hidden_button" style="display: none;"></button>
    </form><br>
    <p id="msg_blog"></p>
    <div class="add_blog">
      <form id="add_more_blog" method="POST" enctype="multipart/form-data">
        
      </form>
    </div>

    <script type="text/javascript">
        $(".add_more_content").click(function(e){
           $("#hidden_button").click();
           $("input[type=submit]").hide();
           $('.blog_name').remove();
           $('.blog_image').remove();
           $('.blog_content').remove();
           $(this).attr("disabled","disabled");
           var scntDiv = $('#add_more_blog');
            $('<div class="form-group heading"><label class="control-label "><h4>Enter Heading</h4></label><input type="text" name="more_blog_name"  class="form-control more_blog_name"/></div>').appendTo(scntDiv);
            $('<div class="form-group gallery_images"><label class="control-label"><h4>Choose Gallery Images</h4></label> <input type="file"  accept="image/*" name="more_blog_image" class="more_blog_image"></div>').appendTo(scntDiv);
            $('<div class="form-group content"><label class="control-label"><h4>Enter The Content</h4></label><input type="text" name="more_blog_content" class="form-control more_blog_content"/></div>').appendTo(scntDiv);
            $('<input type="submit" name="add_more_content" value="Submit" class="btn btn-success" style="margin-left: 6px;">').appendTo(scntDiv);
            $('<p class="more_blog_msg"></p>').appendTo(scntDiv);
         });
    </script>

    </div>
    <div id="blog_details" class="tab-pane fade">
     <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped " style="width: 100%;" id="fetch_blog_details">
            <thead>
             <tr>
                <th>Sl.No.</th>
                <th>Blog Name</th>
                <th>Posted On</th>
                <th>Delete Blog</th>
              </tr>
             </thead>
        <!--<tbody id="fetch_event_data_body"></tbody>-->
        </table>
        <p id="delete_blog_msg"></p>
     </div>
    </div>
    <div id="add_college" class="tab-pane fade">
      <form id="add_college_form" method="POST" enctype="multipart/form-data"><br>
      <div class="form-group">    
      <label class="control-label"><h4>Enter College Name:</h4></label>
      <input type="text" name="college_name" id="college_name" class="form-control">
      </div><br>
      <div class="form-group">
      <label class="control-label"><h4>Choose Image:</h4></label>
      <input type="file"  accept="image/*" name="college_image" id="college_image" >
      </div><br>
      <div class="form-group">
      <label class="control-label"><h4>Details of College:</h4></label>
      <textarea id="about_college" name="about_college" class="form-control"></textarea>
      </div><br>
      <div class="form-group">    
      <label class="control-label"><h4>Give Link Of College Website:</h4></label>
      <input type="text" name="link_to_college" id="link_to_college" class="form-control">
      </div><br>
      <input type="submit" name="submit_college" value="Submit" id="submit_college" class="btn btn-success">
    </form><br>
    <p id="msg_college"></p>
    </div>

    <div id="college_details" class="tab-pane fade">
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped " style="width: 100%;" id="fetch_college_details">
            <thead>
             <tr>
                <th>Sl.No.</th>
                <th>College Name</th>
                <th>Link to College</th>
                <th>Delete College</th>
              </tr>
             </thead>
        <!--<tbody id="fetch_event_data_body"></tbody>-->
        </table>
        <p id="delete_college_msg"></p>
     </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="add_blog_ajax.js"></script>
</body>
<script type="text/javascript">
    function log_out(){
         window.location.replace('blog.php');
         return false;

    }
</script>
</html>