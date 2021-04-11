
<!-- Run init in the beginning -->
<?php require_once("../private/init.php"); ?>

<?php $page_title = "Datatable"; ?>

<?php require(UTILS_PATH . "/header.php"); ?>


<?php 
	// All the entries in the databse's table
	$allEntries = allEntries();
?>


<!-- HTML DOC -->

<div>

	<p><b>Add New User : <a href="./forms/form_create.php">+ New User</a></b></p>
	

</div>


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
				echo '<tr>
					<td>'. $row['Id'] . '</td>
					<td>' .$row['Name'] . '</td>
					<td>' .$row['Email'] . '</td>
					<td>' .$row['Phone'] . '</td>
					<td>' .$row['Role'] . '</td>
					<td><a name="some" href="href" onclick="test.php">' . $row['ProfilePhoto'] .'</a>';
				echo "<td><a href='./forms/form_update.php?id=" . $row['Id'] . "'>Edit</a>";
				echo "<td><a href='./forms/form_remove.php?id=" . $row['Id'] . "'>Remove</a>
				</tr>";
			}
	
		 ?>
	</tbody>
</table>



<?php require(UTILS_PATH . "/footer.php"); ?>
