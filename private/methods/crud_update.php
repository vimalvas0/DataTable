<?php include("../functions.php"); ?>

<?php 

	$username = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$role = $_REQUEST['role'];

	if(!$_FILES['file'])
	{
		echo "Please upload a file";
		exit();
	}

	// Array of dir of image and dir/image.ext
	$FILE_DATA = saveImage($_FILES['file'], $username);


	// image having name as inserted...
	$fileName = resizeAndSaveImages($FILE_DATA);


	echo "Profile updated! <br>";


	updateEntries($username, $name, $email, $phone, $role, $fileName);
?>
