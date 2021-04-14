<?php include("../functions.php"); ?>
<?php include_once("../init.php"); ?>

<?php 

	$username =  $_REQUEST['id'];

	echo $username . "<br>";

	// Remove the image folder of the username
	removeEntries($username);

	if(is_dir(IMAGES_PATH . "/$username"))
	{

		$images = glob(IMAGES_PATH . "/$username/*");

		foreach($images as $image)
		{
			unlink($image);
		}

		rmdir(IMAGES_PATH . "/$username");
	}
	else{
		echo "No records exists... <br>";
		exit();
	}

	echo "Folder Deleted! <br>";

?>