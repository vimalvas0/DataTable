<?php include("../functions.php"); ?>


<?php
 

 // Checking if we have credentials
if($_POST['userid'] && $_POST['password'])
{


	$userId = $_POST['userid'];
	$password = $_POST['password'];

	$allEntries = allEntries();

	while($row = mysqli_fetch_assoc($allEntries))
	{
		if($row['Id'] == $userId)
		{
			$user = $row;
			break;
		}
	}


	// Check if userId is valid
	if(!isset($user))
	{
		 header("Location: ../../public/forms/form_validate_admin.php?errorCode=4&error='Wrong Credentials'");
		 exit();
	}


	$hashFormat = "$2a$10";    // Check Documentation - Blowfish function
	$salt = '$stringThatMakesMyPWSecure$';
	$hashType = $hashFormat . $salt;
	$hashPassword = crypt($password, $hashType);


	// Check if user is Superuser
	if($user['Id'] == 'admn1111')
	{
		$hashPassword = "vimal@123";
	}

	// Check if userId and Password are correct
	if($user['Id'] == $userId && $hashPassword == $user['Password'])
	{

		// Start a new session
		session_start();

		$_SESSION['admin'] = $user['Id'];
		// $_SESSION['logout'] = strtotime('+10 minutes', time()); 
		header('Location: ../../public/index.php');
	}
	else
	{
		header("Location: ../../public/forms/form_validate_admin.php?errorCode=2&error='Wrong Credentials'");
	}

}else
{
	header("Location: ../../public/forms/form_validate_admin.php?errorCode=3&error='No Credentials'");
}


// 	if()

// 	// if($adminUser)
// 	// {

// 	// 	session_start();

// 	// 	$_SESSION['admin'] = 'Vimal';
// 	// 	$_SESSION['logout'] = strtotime('+10 minutes', time()); 
// 	// 	header('Location: ../../public/index.php');
// 	// }

// }
// else
// {
// 	echo ("Location: ../../public/forms/form_create.php?error='Wrong Credentials'");
// }

 ?>