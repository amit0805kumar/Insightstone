<?php
include 'db.php';
session_start();
if (isset($_POST['submit'])) {
    # code...
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    if ($user_id!="" && $password!="") {
    $query = "SELECT password FROM admin where user_id='".$user_id."'";
    $result = mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    if ($row['password']==$password) {
        # code...
    	$_SESSION['userid'] = $user_id;
        header("Location: add_blog.php"); /* Redirect browser */
        exit();
    }
    else{
        echo "<p style='text-align: center;color: #D10505;font-size: 20px;font-weight: 500;'>User Id OR Password is incorrect</p>";
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shotcut icon" type="img/png" href="../images/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,500,600,700,800,900|Cabin:400,400i,500,600,700|Caveat:400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <script type="text/javascript" src="../js/scroll.js"></script>
    <title>Insightone</title>
</head>
<body>
    <div class="container">
        <form id="admin_login_form" action=""  method="post" enctype="multipart/form-data">
        <div class="form-group col-md-8">
            <label class="control-label"><h4>User Id:</h4></label>
            <input type="text" id="user_id" name="user_id" class="form-control" value="admin">
        </div><br>
        <div class="form-group col-md-8">
            <label class="control-label"><h4>Password:</h4></label>
            <input type="password" id="password" name="password" class="form-control" value="admin">
        </div>
        <div class="form-group col-md-8">
        <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success">
        </div>
        </form>
    </div>
</body>
</html>