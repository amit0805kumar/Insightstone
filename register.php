<?php
//vbbvhjebhvbrhghrvrgv
include 'blog/db.php';
include 'blog/validate_input.php';

$check=1;
if (empty($_POST["name"])) {
		$check=0;
	 echo "<div class='alert alert-danger'>Please Enter Your Name</div>";
	}
	else{
		$name=vi($_POST["name"]);
					
	}

if (empty($_POST["email"])) {
		$check=0;
	 echo "<div class='alert alert-danger'>Please Enter Your Email</div>";
	}
	else{

		$email=vi($_POST["email"]);
					
	}

if (empty($_POST["contact_number"])) {
		$check=0;
	 echo "<div class='alert alert-danger'>Please Enter Your Contact Number</div>";
	}
	else{
		$contact_number=vi($_POST["contact_number"]);
					
	}

if (empty($_POST["college"])) {
		$check=0;
	 echo "<div class='alert alert-danger'>Please Enter Your College</div>";
	}
	else{
		$college=vi($_POST["college"]);
					
	}

if (empty($_POST["profile_link"])) {
		$check=0;
	 echo "<div class='alert alert-danger'>Please Enter Your Profile Link</div>";
	}
	else{
		$profile_link=vi($_POST["profile_link"]);
					
	}

if (empty($_POST["followers"])) {
		$check=0;
	 echo "<div class='alert alert-danger'>Please Enter Your Followers</div>";
	}
	else{
		$followers=vi($_POST["followers"]);
					
	}

		if ($check==1) 
				{
						$query="INSERT INTO registration(name,email,contact_number,college,profile_link,followers) VALUES (?,?,?,?,?,?)";
						$query_prepare_statement=mysqli_prepare($connect,$query);
						mysqli_stmt_bind_param($query_prepare_statement,"ssissi",$name,$email,$contact_number,$college,$profile_link,$followers);
						if (mysqli_stmt_execute($query_prepare_statement)) 
							{
		 				echo "<p style='text-align: center;color: #066310;font-size: 20px;font-weight: 700;''>Inserted Successfully</p>";
						 	} 
						 else
						 {
						 	echo "<p style='text-align: center;color: #D10505;font-size: 20px;font-weight: 700;'>Registration Unsuccessfull</p>";
						 }

				}				

?>