<?php
if(isset($_GET['poststolike']) || isset($_GET['commentcontent'])){
  if(isset($_GET['poststolike'])){
    $id = $_GET['poststolike'];
  }elseif (isset($_GET['commentcontent'])) {
    $id = $_GET['previousid'];
    $Content = $_GET['commentcontent'];
    if(CheckLoggedOn()){
      $user = getUserWithEmail($_SESSION['session_email']);
      addComment($Content,$user['idUtil'],$id);
    }else{
      $commentability=false;
    }
    $server =$_SERVER['HTTP_REFERER'];
      header("Location: $server ");
  }
  if (true){
    $AllComments=getAllComments($id);
    include "$racine/view/header.html.php";
    include "$racine/view/viewComments.php";
    include "$racine/view/bottom.html.php";
  }
  unset($_GET['poststolike']);
  unset($_GET['commentcontent']);
}
else {
    include "$racine/view/header.html.php";
    include "$racine/view/viewHome.php";
    include "$racine/view/bottom.html.php";
}
 ?>
