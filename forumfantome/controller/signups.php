<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include "$racine/model/databaseLogin.php";
include "$racine/model/functions.php";
$titre="Sign Ups";
DBconnection();

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['pseudo'])){
$email = $_POST['email'];
$password = $_POST['password'];
$pseudo = $_POST['pseudo'];
$resultemail = strlen($email) - substr_count($email,' ');
$resultpassword = strlen($password) - substr_count($password,' ');
$resultpseudo = strlen($pseudo) - substr_count($pseudo,' ');
$validinfos = false;
  if ($resultemail>0 && $resultpassword>0 && $resultpseudo>0 ) {
    DBconnection();
    addUser($email,$password,$pseudo);
    login($email,$password);
    $user = getUserWithEmail($email);
    include "$racine/view/header.html.php";
    include "$racine/view/viewProfile.php";
    include "$racine/view/bottom.html.php";
  }else {
  $validinfos = true;
  include "$racine/view/header.html.php";
  include "$racine/view/viewSignups.php";
  include "$racine/view/bottom.html.php";
  }

}else {
include "$racine/view/header.html.php";
include "$racine/view/viewSignups.php";
include "$racine/view/bottom.html.php";
}


?>
