<?php
if(isset($_POST['privatecode']) &&isset($_POST['requestcontent']))
{
  $code = $_POST['privatecode'];
  $content = $_POST['requestcontent'];
  $user = getUserWithEmail($_SESSION['session_email']);

  $result = checkifEmpty($code);
  $result2 = checkifEmpty($content);

  if(checkIfCodeAvailable($code) && strlen($content)<255 && $result >0 && $result2 >0){
    setRequests($code,$content,$user);
    $sentrequest = true;
  }else {
    $sentrequest = false;
  }
  unset($_POST['privatecode'],$_POST['requestcontent']);
}
 ?>
