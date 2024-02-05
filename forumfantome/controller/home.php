<?php
include "$racine/model/databaseLogin.php";
include "$racine/model/functions.php";
include "$racine/model/classPosts.php";

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

$titre="Home Page";
$Posts = getPosts();
if(!CheckLoggedOn()){
  $postdebounce =false;
  $commentability = false;
}
else{
include "$racine/controller/likes.php";
include "$racine/controller/subs.php";
include "$racine/controller/commentaire.php";
$commentability = true;
}
include "$racine/model/commentshandler.php";
?>
