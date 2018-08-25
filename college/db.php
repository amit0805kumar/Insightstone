<?php
$connect=mysqli_connect("localhost","root","","insightone");
if (!$connect) {
	# code...
	die("Connection failed:".mysqli_error());
}
?>