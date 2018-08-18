<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shotcut icon" type="img/png" href="images/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,500,600,700,800,900|Cabin:400,400i,500,600,700|Caveat:400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/scroll.js"></script>
    <title>Insightstone</title>
</head>
<body>
    <div class="container">
        <div style="margin-left:80%;">
        <button class="btn btn-primary" onclick="log_out();">Log Out</button>
        </div>
    <form id="add_blog_form" method="POST" enctype="multipart/form-data"><br>
    <div class="form-group">    
    <label class="control-label"><h4>Enter Blog Name:</h4></label>
    <input type="text" name="blog_name" id="blog_name" class="form-control">
    </div><br>
    <div class="form-group">
    <label class="control-label"><h4>Choose Image:</h4></label>
    <input type="file"  accept="image/*" name="file" id="file" >
    </div><br>
    <div class="form-group">
    <label class="control-label"><h4>Enter Content Of The Blog:</h4></label>
    <textarea id="blog_content" name="blog_content" class="form-control"></textarea>
    </div><br>
    <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success">
    </form>
    <p id="msg"></p>
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