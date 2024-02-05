<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include "$racine/model/databaseLogin.php";
include "$racine/model/functions.php";
include "$racine/controller/subs.php";
include "$racine/model/classPosts.php";
$titre="Sign In";
DBconnection();
if(CheckLoggedOn()){
  $User = getUserWithEmail($_SESSION['session_email']);
  $PostsID = getPostsOfAUser($User['idUtil']);
  $Posts = array();
  foreach ($PostsID as $PostID) {
    $Posts[] = getPostWithID($PostID);
  }
  include "$racine/view/header.html.php";
  include "$racine/view/viewUserPosts.php";
  include "$racine/view/bottom.html.php";
}
?>
