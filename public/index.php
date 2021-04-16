
<!-- Run init in the beginning -->
<?php require_once("../private/init.php"); ?>

<?php $page_title = "Datatable"; ?>

<?php require(UTILS_PATH . "/header.php"); ?>


<?php 

	session_start();
	// All the entries in the databse's table
	$allEntries = allEntries();
?>


<!-- HTML DOC -->



<?php

if(isset($_SESSION['admin']))
{
	echo '<div class="card" style="float : right;">
  	<div style="color : green" class="card-body">
  		User logged in as : ' . $_SESSION['admin'];
  	echo '</div>
	</div>';

	echo '<a style="float : right; margin-right : 10px; padding : 1rem 2em;" href="index.php?logout=yes" class="btn btn-danger" role="button" aria-pressed="true">Logout</a>';

	$i = 1;
	while($i < 7)
	{
		echo '<br>';
		$i++;
	}
}



if(isset($_SESSION['admin'])){
	echo "<p><b> Add New User : <a href='./forms/form_create.php'>+ New User</a></b></p>";
}else
{
	 echo "<p style='color : grey'>  🚫 You cannot edit this table. Only Admin has rights to edit. Use this link switch to Admin : <a href='./forms/form_validate_admin.php?request=admin'>Login to Admin</a></p>";
}


?>



<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">UserID</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Phone</th>
			<th scope="col">Role</th>
			<th scope="col">Profile Image</th>
			<th scope="col">Action</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>

		<?php
			// Dynamically Filling the table
			while($row = mysqli_fetch_assoc($allEntries))
			{
				$id = $row['Id'];
				if($id != 'admn1111')
				{
					echo '<tr>
					<td>'. $row['Id'] . '</td>
					<td>' .$row['Name'] . '</td>
					<td>' .$row['Email'] . '</td>
					<td>' .$row['Phone'] . '</td>
					<td>' .$row['Role'] . '</td>';
					echo "<td><a href='./forms/form_profile.php?id=" . $row['Id'] . "'>". $row['ProfilePhoto'] . " </a>";

					if(isset($_SESSION['admin']))
					{
						echo "<td><a href='./forms/form_update.php?id=" . $row['Id'] . "'>Edit</a>";
						echo "<td><a href='./forms/form_remove.php?id=" . $row['Id'] . "'>Remove</a>
						</tr>";
					}else
					{
						echo "<td><p style='color : red'>Not Allowed</td>";
						echo "<td><p style='color : red'>Not Allowed</td>";
					}
				}	
				
			}
		 ?>
	</tbody>
</table>


<?php 

if(isset($_SESSION['admin']) && isset($_REQUEST['logout']))
{
	session_destroy();
    header("Location: index.php"); 
}

?>

<?php require(UTILS_PATH . "/footer.php"); ?>
