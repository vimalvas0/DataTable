<?php require_once("../../private/init.php"); ?>

<?php $page_title = "Form Create"; ?>

<?php require(UTILS_PATH . "/header.php"); ?>



<?php


if(isset($_REQUEST['errorCode']))
{

	if($_REQUEST['errorCode'] == 1)
	{
		echo '<div class="card">
  		<div style="color : red; text-align : center;" class="card-body">
    		Not a Admin Account!
  		</div>
		</div>';

	}elseif($_REQUEST['errorCode'] == 2){
		
		echo '<div class="card">
  		<div style="color : red; text-align : center;" class="card-body">
    		Wrong UserId or Password!
  		</div>
		</div>';

	}elseif($_REQUEST['errorCode'] == 3){
		
		echo '<div class="card">
  		<div style="color : red; text-align : center;" class="card-body">
    		Please Enter UserId and Password Both!
  		</div>
		</div>';
	}
	elseif($_REQUEST['errorCode'] == 4){
		
		echo '<div class="card">
  		<div style="color : red; text-align : center;" class="card-body">
    		No such user exists!
  		</div>
		</div>';
	}
}

?>



<!-- Form to create a employee -->

<head>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<div class="center">

	<h2>Login with Admin ID and Password</h2>
	<br>
	<br>

  <form action="../../private/methods/login_admin.php" method="post">
  <div class="form-group row">
    <label for="userid" class="col-sm-2 col-form-label">UserId</label>
    <div class="col-sm-10">
      <input name="userid" type="text" class="form-control" placeholder="Your 8 digit UserId">
    </div>
  </div>
  <div class="form-group row">
    <label for="role" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
      <input name="role" type="text" class="form-control" placeholder="Admin" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input name="password" type="password" class="form-control" placeholder="Your Password">
    </div>
  </div>
  <br>
  <hr>

  <button name="submit" type="submit" class="btn btn-primary">Login</button>
</form>


<?php

?>

</div>


<?php require(UTILS_PATH . "/footer.php"); ?>