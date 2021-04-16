<?php require_once("../../private/init.php"); ?>

<?php $page_title = "Form Update"; ?>

<?php require(UTILS_PATH . "/header.php"); ?>

<head>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>


<?php

  // echo $_REQUEST['id'];
?>

<!-- Form to update employee's credential -->

<div class="center">

  <form action="../../private/methods/crud_update.php?id=<?php echo $_REQUEST['id'];?>" method="post" enctype="multipart/form-data">
    <fieldset class="disabled">
    <div class="form-group">
      <label for="disabledTextInput">UserId</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $_REQUEST['id'];?>" disabled>
    </div>
  </fieldset>

    <br> 

    <div class="form-group">
      <label for="name">Name</label>
      <input name="name" type="text" class="form-control" placeholder="Enter Name">
    </div>

    <br>

    <div class="form-group">
      <label for="email">Email</label>
      <input name="email" type="text" class="form-control" placeholder="Your Email">
    </div>

    <br>

     <div class="form-group">
      <label for="role">State</label>
      <select name = "role" class="form-control">
        <option selected>Choose...</option>
        <option>HR</option>
        <option>Trainee</option>
        <option>SE</option>
        <option>Admin</option>
      </select>
    </div>

    <br>

<!--     <div class="form-group">
      <label for="role">Role</label>
      <input name="role" type="text" class="form-control" placeholder="Your Role">
    </div>

    <br> -->

    <div class="form-group">
      <label for="phone">Phone</label>
      <input name="phone" type="text" class="form-control"  placeholder="Your Phone Number">
    </div>

    <br>

    <div class="custom-file">
      <input name = "file" type="file" class="custom-file-input" id="customFile">
      <label class="custom-file-label" for="customFile">Browse Your Profile Image</label>
    </div>

    <br>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>

</div>


<?php require(UTILS_PATH . "/footer.php"); ?>