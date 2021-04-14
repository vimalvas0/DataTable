<?php include("../functions.php"); ?>


<?php
	

	// Fetch the fields
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$role = $_REQUEST['role'];
	$username = substr($name, 0, 4) . substr($phone, -4);



	if(!$_FILES['file'])
	{
		echo "Please upload a file";
		exit();
	}


	// Array of dir of image and dir/image.ext
	$FILE_DATA = saveImage($_FILES['file'], $username);


	// image having name as inserted...
	$fileName = resizeAndSaveImages($FILE_DATA);


	createEntry($username, $name, $email, $phone, $role, $fileName);


	echo "Profile Created! <br>";

?>
