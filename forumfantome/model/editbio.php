<?php
if(isset($_POST['EditBio'])){
  $NewBio = $_POST['EditBio'];
  $User = getUserWithEmail($_SESSION['session_email']);
  if(strlen($NewBio)<255){
    setBio($User['idUtil'],$NewBio);
  }
  unset($_POST['EditBio']);
  echo "<meta http-equiv='refresh' content='0'>";
}
 ?>
