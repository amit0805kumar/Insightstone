<?php
include 'db.php';
include 'validate_input.php';
require_once('ImageManipulator.php');
$blog_name = vi($_POST['blog_name']);
$blog_content = vi($_POST['blog_content']);
$file = $_FILES['blog_image'];
$file_name = $_FILES['blog_image']['name'];
$file_tmp_name = $_FILES['blog_image']['tmp_name'];
$file_size = $_FILES['blog_image']['size'];
$file_error = $_FILES['blog_image']['error'];
$file_type = $_FILES['blog_image']['type'];

if ($file_error === 0 && $file_size > 0) {
    $newNamePrefix = time() . '_';
	$file_destination = '../uploads/blog/'.$file_name;
    
    $manipulator = new ImageManipulator($file_tmp_name);
        // resizing to 400x400
    $newImage = $manipulator->resample(400, 400);
    
    $manipulator->save('../uploads/blog/'.$file_name);
    
//	move_uploaded_file($file_tmp_name, $file_destination);
    
	$query="INSERT INTO blog_data(blog_name,image,blog_content) VALUES (?,?,?)";
    
	$query_prepare_statement=mysqli_prepare($connect,$query);
    
	mysqli_stmt_bind_param($query_prepare_statement,"sss",$blog_name,$file_destination,$blog_content);
	if (mysqli_stmt_execute($query_prepare_statement)) {
		 	echo "<div class='alert alert-success'>Inserted Successfully</div>";
		 }
}
else{
	echo "<div class='alert alert-danger'>There was a error in uploading your file</div>";
}

?>