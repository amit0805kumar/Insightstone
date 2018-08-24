<?php
include 'db.php';
$delete_blog_id=$_POST['delete_blog_id'];
$query="DELETE FROM blog_data WHERE s_no ='".$delete_blog_id."' ";
if (mysqli_query($connect,$query)) {
 	# code...
 	echo "<div class='alert alert-success'>Blog Deleted Successfully</div>";
 } 
 else{
 	echo "<div class='alert alert-danger'>There was a error in Deleting Your Blog</div>";
 }

?>