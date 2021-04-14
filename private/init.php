<?php 

	// Paths 
	require_once('db.php');

	define("PROJECT_PATH", dirname(__FILE__));
	define("PUBLIC_PATH", '/var/www/html/Datatable/public');
	define("PRIVATE_PATH", PROJECT_PATH);
	define("UTILS_PATH", PRIVATE_PATH . "/utils");
	define("IMAGES_PATH", PUBLIC_PATH . "/images");

	require_once("functions.php");

?>