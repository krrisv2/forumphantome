<?php
include "$racine/model/databaseLogin.php";
include "$racine/model/functions.php";
include "$racine/model/classPosts.php";

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

$titre="Signed Out Succesfully";
logout();
include "$racine/view/header.html.php";
include "$racine/view/viewLogout.php";
include "$racine/view/bottom.html.php";
?>
