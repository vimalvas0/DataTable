<?php include "db.php";


// Show all entries in the table
function allEntries()
{
	global $connection;	
	$query = "SELECT * FROM employee";
	$result =  mysqli_query($connection, $query);


	return $result;
}


// Create all the entries
function createEntry($username, $name, $email, $phone, $role, $image)
{
	global $connection;

	if($connection) echo'Connection exists...';

	$query = "INSERT INTO employee (Id, Name, Email, Phone, Role, ProfilePhoto) ";
	$query .= "VALUES ('$username', '$name', '$email', '$phone', '$role', '$image') ";

	$result = mysqli_query($connection, $query);


	if($result)
	{
		echo "Insertion Done <br>";
	}
	else{
		die('Action FAILED : ' . mysqli_error($connection));
	}
}


// Update entries in table
function updateEntries($id, $name, $email, $phone, $role, $image)
{
	global $connection;
	$query = "UPDATE employee SET " ;
	$query .= "Name = '$name', ";
	$query .= "Email = '$email', ";
	$query .= "Phone = '$phone', ";
	$query .= "Role = '$role', ";
	$query .= "ProfilePhoto = '$image' ";
	$query .= "WHERE Id = '$id'";

	$result = mysqli_query($connection, $query);

	if($result)
	{
		echo "Updated Successfully <br>";
	}else
	{
		die('Action FAILED : ' . mysqli_error($connection));
	}

}


// Remove entries from the table
function removeEntries($id)
{
	
	global $connection;
	$query = "DELETE FROM employee ";
	$query .= "WHERE Id = '$id' ";

	$result = mysqli_query($connection, $query);

	if($result)
	{
		echo "User Deleted Successfully <br>";
	}else
	{
		die('Action FAILED : ' . mysqli_error($connection));
	}
}

?>