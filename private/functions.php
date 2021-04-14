<?php include "db.php";
	  include_once "init.php";


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

	echo $id . "<br>";
	
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


// Function to save image
function saveImage($IMAGE_FILE, $username)
{
	// echo "<pre>";
	// echo print_r($IMAGE_FILE);
	// echo "</pre>";


	// echo "$username <br>";
	// echo $IMAGE_FILE['name'] . "<br>";
	// echo $IMAGE_FILE['tmp_name'] . "<br>";
	// echo $IMAGE_FILE['size'] . "<br>";
	// echo $IMAGE_FILE['type'];
	// global IMAGES_PATH;


	// Type of image supported
	$supportedImageTypes = ['jpg', 'jpeg', 'png'];


	$imageExt = explode("/", $IMAGE_FILE['type'])[1];


	if(!in_array($imageExt, $supportedImageTypes))
	{
		echo "Image Format is not supported <br>";
	}

	if($IMAGE_FILE['size'] > 2000000)
	{
		echo "Maximum fize size limit : 2 MB <br>";
	}


	$imageName = $username . "." . $imageExt;
	// echo $imageName;

	$tempDir = $IMAGE_FILE['tmp_name'];

	$targetDir = IMAGES_PATH . "/$username";
	$path_file_ext = $targetDir . "/$imageName";

	// echo $path_file_ext;
	// echo $tempDir;

	if(!is_dir($targetDir))
	{
		mkdir($targetDir);
	}

	if(file_exists($targetDir . "/$imageName"))
	{
		echo "Image already exists <br>";
	}
	else
	{
		move_uploaded_file($tempDir, $path_file_ext);
		echo "Image uploaded successfully <br>";
	}


	$fileData = [$targetDir, $path_file_ext];

	return $fileData;

}



// Function to resize image
function resizeAndSaveImages($FILE_DATA)
{
	$pathDir = $FILE_DATA[0];
	$path_file_ext = $FILE_DATA[1];

	$filename_ext = basename($path_file_ext);

	$filename = explode('.', $filename_ext)[0];
	$ext= explode('.', $filename_ext)[1];

	// echo "$pathDir <br> $path_file_ext";

	$sizes = [
		'small' => 200,
		'medium' => 400,
		'large' => 600,
		'extra-large' => 900
	];


	if($ext == 'png')
	{
		$resource = imagecreatefrompng($path_file_ext);
	}
	elseif($ext == 'jpg' || $ext == 'jpeg')
	{
		$resource = imagecreatefromjpeg($path_file_ext);
	}else{
		echo "Image file not supported <br>";
		exit();
	}


	// $resource = imagecreatefrompng($path_file_ext);   // wrong
	foreach($sizes as $size => $figure)
	{
		$scaled = imagescale($resource, $figure);
		imagejpeg($scaled, $pathDir . "/$filename" . '_' . $size . '.jpg', 65);
		imagedestroy($scaled);
	}

	imagedestroy($resource);

	echo "Imaged resized and done";

	return $filename . '_small' . '.jpg';


}


?>