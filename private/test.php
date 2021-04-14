<!-- ========================================== RAW CODE TO TEST ============================================== -->

<!-- Trying to upload file in php -->
<!-- ERROR : Permission denid -->

<?php echo exec('whoami');

	echo "<br>";

	if($_FILES)
	{
	// {
	// 	echo $_FILES['my_file']['tmp_name'];

	// 	$target_dir = "IMAGES_PATH";
	// 	$file = $_FILES['my_file']['name'];
	// 	$path = pathinfo($file);
	// 	$filename = $path['filename'];
	// 	echo$path['extension'];
	// 	$temp_name = $_FILES['my_file']['tmp_name'];
	// 	$path_filename_ext = $target_dir.$filename.".".$ext;
	// 	if (file_exists($path_filename_ext)) {
	// 		 echo "Sorry, file already exists.";
	// 	}else{
	// 		move_uploaded_file($temp_name,$path_filename_ext);
	// 		echo "Congratulations! File Uploaded Successfully.";
	// 	}


		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
	}
?>


<form name="form" method="post" action="test.php" enctype="multipart/form-data" >
	<input type="file" name="my_file" /><br /><br />
	<input type="submit" name="submit"/>
</form>


