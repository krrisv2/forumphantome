<?php
$user = getUserWithEmail($_SESSION["session_email"]);
if(isset($_POST['profilepic'])){
  $pfplink = $_POST['profilepic'];
  changeProfilePictures($pfplink,$user['idUtil']);
  header("refresh: 0.1");
}
 ?>
