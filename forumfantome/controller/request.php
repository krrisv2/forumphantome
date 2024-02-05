<?php
include "$racine/model/databaseLogin.php";
include "$racine/model/functions.php";
include "$racine/model/classPosts.php";

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
$titre="All Requests";
if(CheckLoggedOn()){
  include "$racine/model/requestshandler.php";
  include "$racine/view/header.html.php";
  include "$racine/view/viewRequest.php";
  include "$racine/view/bottom.html.php";
}
else {
  include "$racine/view/header.html.php";
  include "$racine/view/logintosee.php";
  include "$racine/view/bottom.html.php";
}
?>
