<?php
include 'db.php';
include 'validate_input.php';
session_start();
$hidden_input_blog_name = $_POST['hidden_input_blog_name'];
$noSpaces_name = str_replace(' ', '_', $hidden_input_blog_name);
$_SESSION['hidden_input_blog_name'] = $noSpaces_name;
if ($noSpaces_name) {
	# code...
	$query="CREATE TABLE ".$noSpaces_name."(
	s_no INT(11) AUTO_INCREMENT PRIMARY KEY,
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