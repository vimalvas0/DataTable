<?php include("../functions.php"); ?>


<?php
	
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$role = $_REQUEST['role'];
	$fileName = $_REQUEST['file'];
	$username = substr($name, 0, 4) . substr($phone, -4);


	createEntry($username, $name, $email, $phone, $role, $fileName);
?>