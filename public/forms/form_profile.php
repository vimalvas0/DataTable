<?php require_once("../../private/init.php"); ?>

<?php $page_title = "Form Remove"; ?>

<?php require(UTILS_PATH . "/header.php"); ?>




<?php 
  // Getting the details of employee to be deleted
  $allEntries = allEntries();

  $id = $_REQUEST['id'];

  while($row = mysqli_fetch_assoc($allEntries))
  {
    if($row['Id'] == $_REQUEST['id'])
    {
      $user = $row;
      break;
    }
  }


  $filename = $user['ProfilePhoto'];
  $fileLink = "/$id" . "/$filename";
  // echo $fileLink;
?>

<head>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<div class="center">
  <div class="card" style="width: 18rem;">
  <img src="<?php echo "../images" . $fileLink; ?>" class="card-img-top" alt="">
    <div class="card-body">
      <h5 class="card-title"><?php echo $user['Name']; ?></h5>
      <p class="card-text">User with userId : <b><?php echo $id;?></b></p>
  </div>
  <ul class="list-group list-group-flush">
      <li class="list-group-item"><b>Name : </b><?php echo $user['Name'];?></li>
      <li class="list-group-item"><b>Email : </b><?php echo $user['Email'];?></li>
      <li class="list-group-item"><b>Phone : </b><?php echo $user['Phone'];?></li>
      <li class="list-group-item"><b>Role : </b><?php echo $user['Role'];?></li>
  </ul>
  </div>
</div>




<?php require(UTILS_PATH . "/footer.php");?>