<?php require_once("../../private/init.php"); ?>

<?php $page_title = "Form Create"; ?>

<?php require(UTILS_PATH . "/header.php"); ?>




<!-- Form to create a employee -->

<head>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<div class="center">

  <form action="../../private/methods/crud_create.php" method="post" enctype="multipart/form-data">
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
      <label for="password">Password</label>
      <input name="password" type="password" class="form-control" placeholder="Password only required for Admin account">
    </div>

    <br>

    <div class="form-group">
      <label for="role">Role</label>
      <input name="role" type="text" class="form-control" placeholder="If role is admin, type ADMIN">
    </div>

    <br>

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

    <button name="submit" type="submit" class="btn btn-primary">Add</button>
  </form>

</div>


<?php require(UTILS_PATH . "/footer.php"); ?>