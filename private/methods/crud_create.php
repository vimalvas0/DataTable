<?php include("../functions.php"); ?>


<?php
	

	// Fetch the fields
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$role = $_REQUEST['role'];
	$username = substr($name, 0, 4) . substr($phone, -4);

	$password = $_REQUEST['password'];
	$hashPassword = "";


	// Hashing password

	if(!strcasecmp($role, 'Admin'))
	{
		$hashFormat = "$2a$10";    // Check Documentation - Blowfish function


		$salt = '$stringThatMakesMyPWSecure$';


		$hashType = $hashFormat . $salt;


		$hashPassword = crypt($password, $hashType);
	}



	if(!$_FILES['file'])
	{
		echo "Please upload a file";
		exit();
	}


	// Array of dir of image and dir/image.ext
	$FILE_DATA = saveImage($_FILES['file'], $username);


	// image having name as inserted...
	$fileName = resizeAndSaveImages($FILE_DATA);


	createEntry($username, $name, $email, $phone, $role, $fileName, $hashPassword);


	echo "Profile Created! <br>";

?>
