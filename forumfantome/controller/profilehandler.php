<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include "$racine/model/databaseLogin.php";
include "$racine/model/functions.php";
include "$racine/controller/subs.php";

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $user = getUserWithId($id);
  $pseudo = $user['pseudo'];
}
$titre="Profile of $pseudo";

  include "$racine/view/header.html.php";
  include "$racine/view/viewProfiles.php";
  include "$racine/view/bottom.html.php";


?>
