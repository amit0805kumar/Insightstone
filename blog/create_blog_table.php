<?php
include 'db.php';
include 'validate_input.php';
session_start();
$hidden_input_blog_name = $_POST['hidden_input_blog_name'];
$_SESSION['hidden_input_blog_name'] = $hidden_input_blog_name;
if ($hidden_input_blog_name) {
	# code...
	$query="CREATE TABLE ".$hidden_input_blog_name."(
	s_no INT AUTO_INCREMENT PRIMARY KEY,
	heading VARCHAR(255) NOT NULL,
	image   VARCHAR(255) NOT NULL,
	content TEXT NOT NULL
	)";
if (mysqli_query($connect,$query)){
	echo "<div class='alert alert-success'>Table Created Successfully</div>";
}
else{
		echo mysqli_error($connect);
	}
}
else{
	echo "<div class='alert alert-danger'>Table Not Created</div>";
}

?>