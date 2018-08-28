<?php
include 'db.php';
$delete_college_id=$_POST['delete_college_id'];
$query1 = "SELECT college_image,college_name FROM college_data WHERE s_no ='".$delete_college_id."'";
$result1 = mysqli_query($connect,$query1);
$query="DELETE FROM college_data WHERE s_no ='".$delete_college_id."' ";
if (mysqli_query($connect,$query)) {
 	# code...
 	
 	$row1 = mysqli_fetch_array($result1);
 	$image_name = $row1['college_image'];
 	unlink($image_name);
 	echo "<div class='alert alert-success'>College Deleted Successfully</div>";
 	
 } 
 else{
 	echo "<div class='alert alert-danger'>There was a error in Deleting College</div>";
 }

?>