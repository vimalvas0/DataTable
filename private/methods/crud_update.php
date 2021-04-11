<?php include("../functions.php"); ?>

<?php 

	$id = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$role = $_REQUEST['role'];
	$fileName = $_REQUEST['file'];


	updateEntries($id, $name, $email, $phone, $role, $fileName);

?>