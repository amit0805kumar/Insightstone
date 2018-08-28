<?php
include 'db.php';
$delete_blog_id=$_POST['delete_blog_id'];
$query1 = "SELECT image,blog_name FROM blog_data WHERE s_no ='".$delete_blog_id."'";
$result1 = mysqli_query($connect,$query1);
$query="DELETE FROM blog_data WHERE s_no ='".$delete_blog_id."' ";
if (mysqli_query($connect,$query)) {
 	# code...
 	
 	$row1 = mysqli_fetch_array($result1);
 	$no_space_name = str_replace(' ', '_', $row1['blog_name']);
 	$image_name = $row1['image'];
 	unlink($image_name);
 	$query2 = "DROP TABLE IF EXISTS ".$no_space_name."";
 	if(mysqli_query($connect,$query2)){

 		echo "<div class='alert alert-success'>Blog Deleted Successfully</div>";
 	}
 	else{
 		echo "<div class='alert alert-danger'>There was a error in Deleting Your Blog</div>";
 	}
 	
 } 
 else{
 	echo "<div class='alert alert-danger'>There was a error in Deleting Your Blog</div>";
 }

?>