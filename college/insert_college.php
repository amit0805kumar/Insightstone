<?php
include 'db.php';
include 'validate_input.php';
require_once('ImageManipulator.php');

$college_name = vi($_POST['college_name']);
$about_college = vi($_POST['about_college']);
$link_to_college = vi($_POST['link_to_college']);
$file = $_FILES['college_image'];
$file_name = $_FILES['college_image']['name'];
$file_tmp_name = $_FILES['college_image']['tmp_name'];
$file_size = $_FILES['college_image']['size'];
$file_error = $_FILES['college_image']['error'];
$file_type = $_FILES['college_image']['type'];
echo "ahgcahgcag";
if ($file_error === 0 && $file_size > 0) {
    $newNamePrefix = time() . '_';
	$file_destination = '../uploads/college/'.$file_name;
    
    $manipulator = new ImageManipulator($file_tmp_name);
        // resizing to 600x600
    $newImage = $manipulator->resample(600, 600);
    
    $manipulator->save('../uploads/college/'.$file_name);
    
//	move_uploaded_file($file_tmp_name, $file_destination);
    
	$query="INSERT INTO college_data(college_name,college_image,about_college,link_to_college) VALUES (?,?,?,?)";
    
	$query_prepare_statement=mysqli_prepare($connect,$query);
    
	mysqli_stmt_bind_param($query_prepare_statement,"ssss",$college_name,$file_destination,$about_college,$link_to_college);
	if ( mysqli_stmt_execute($query_prepare_statement)) {
			
		 	echo "<div class='alert alert-success'>Inserted Successfully</div>";
		 }
}
else{
	
	echo "<div class='alert alert-danger'>There was a error in uploading your file</div>";
}

?>