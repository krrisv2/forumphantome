<?php
if(isset($_GET['subscribe']) && isset($_GET['postuserid'])){
  $sub = $_GET['subscribe'];
  $postuserid = $_GET['postuserid'];
  $localuser = getUserWithEmail($_SESSION['session_email']);
  if($sub=='true'){
    setSubscribers($localuser['idUtil'],$postuserid);
  }elseif($sub=='false') {
    // code...
    deleteSubscription($localuser['idUtil'],$postuserid);
  }
  unset($_GET['subscribe'],$_GET['postuserid']);
  header("Location: index.php");
}
?>
