<?php
include 'db.php';
include 'validate_input.php';
require_once('ImageManipulator.php');
session_start();
$more_blog_name = vi($_POST['more_blog_name']);
$more_blog_content = vi($_POST['more_blog_content']);
$file = $_FILES['more_blog_image'];
$file_name = $_FILES['more_blog_image']['name'];
$file_tmp_name = $_FILES['more_blog_image']['tmp_name'];
$file_size = $_FILES['more_blog_image']['size'];
$file_error = $_FILES['more_blog_image']['error'];
$file_type = $_FILES['more_blog_image']['type'];
$main_blog_name = $_SESSION['hidden_input_blog_name'];

if ($file_error === 0 && $file_size > 0) {
    $newNamePrefix = time() . '_';
    $uploads_dir = '../uploads/blog/'.$main_blog_name;
    if (!file_exists($uploads_dir)) {
    	# code...
    	mkdir($uploads_dir);
    }
	$file_destination = $uploads_dir.'/'.$file_name;
    
    $manipulator = new ImageManipulator($file_tmp_name);
        // resizing to 400x400
    $newImage = $manipulator->resample(400, 400);
    
    $manipulator->save($file_destination);
    
//	move_uploaded_file($file_tmp_name, $file_destination);
    
	$query="INSERT INTO ".$main_blog_name ."(heading,image,content) VALUES (?,?,?)";
    
	$query_prepare_statement=mysqli_prepare($connect,$query);
    
	mysqli_stmt_bind_param($query_prepare_statement,"sss",$more_blog_name,$file_destination,$more_blog_content);
	if (mysqli_stmt_execute($query_prepare_statement)) {
		 	echo "<div style='background: #B8F9B4;color: #11C606;border-radius: 3px;padding: 1.2rem 3rem;'>New Blog Added</div>";
		 }
}
else{
	echo "<div style='background:#FCAD9D;color:#D12805;border-radius: 3px;padding: 1.2rem 3rem;'>Blog not Added</div>";
}

?>