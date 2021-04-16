<?php include("../functions.php"); ?>

<?php 


	$username = $_REQUEST['id'];

	$allEntries = allEntries();

	while($row = mysqli_fetch_assoc($allEntries))
	{
		if($row['Id'] == $username)
		{
			$user = $row;
			break;
		}
	}


	$name = $_REQUEST['name'] == "" ? $user['Name'] : $_REQUEST['name'];
	$email = $_REQUEST['email'] == "" ? $user['Email'] : $_REQUEST['email'];
	$phone = $_REQUEST['phone'] == "" ? $user['Phone'] : $_REQUEST['phone'];
	$role = $_REQUEST['role'] == "" ? $user['Role'] : $_REQUEST['role'];
	$fileName = $user['ProfilePhoto'];


	// echo "$name <br>";
	// echo "$email <br>";
	// echo "$phone <br>";
	// echo "$role <br>";
	// echo $fileName . "<br>";


	if($_FILES['file']['name'] != "")
	{
		// Array of dir of image and dir/image.ext
		$FILE_DATA = saveImage($_FILES['file'], $username);

		// image having name as inserted...
		$fileName = resizeAndSaveImages($FILE_DATA);
	}

	
	echo "Profile updated! <br>";


	updateEntries($username, $name, $email, $phone, $role, $fileName);
?>
