<?php
$root = dirname(__FILE__);
include("$root/getRacine.php");
include("$root/controller/maincontroller.php");

if (isset($_GET["_"])) {
    $action = $_GET["_"];
}
else {
    $action = "default";
}

$file = controllerhub($action);
include "$root/controller/$file";

?>
