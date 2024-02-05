<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include "$racine/model/databaseLogin.php";
include "$racine/model/functions.php";
include "$racine/controller/subs.php";
$titre="Sign In";

DBconnection();
if (isset($_POST["email"]) and isset($_POST["password"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result=login($email,$password);
}
if (!CheckLoggedOn()){
  include "$racine/view/header.html.php";
  include "$racine/view/viewSignIn.php";
  include "$racine/view/bottom.html.php";
}
else{
  include "$racine/model/profilechanges.php";
  include "$racine/model/editbio.php";
  include "$racine/view/header.html.php";
  include "$racine/view/viewProfile.php";
  include "$racine/view/bottom.html.php";
}

?>
