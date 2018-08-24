<?php
include 'db.php';

$read_about_button_id=$_POST['read_about_button_id'];
$query="SELECT blog_content,blog_name FROM blog_data WHERE s_no ='".$read_about_button_id."' ";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_array($result);
echo $row['blog_name'].'|'.$row['blog_content'];
?>