<?php

function controllerhub($action) {
    $Actions = array();
    $Actions["default"]="home.php";
    $Actions["home"]="home.php";
    $Actions["request"]="request.php";
    $Actions["memento"]="memento.php";
    $Actions["signin"]="signin.php";
    $Actions["logout"] = "logoutpage.php";
    $Actions['signups'] = "signups.php";
    $Actions['profile'] = "signin.php";
    $Actions['selectedprofile'] = "profilehandler.php";
    $Actions['posts'] = "posts.php";
    if (array_key_exists($action, $Actions)) {
        return $Actions[$action];
    }
    else {
        return $Actions["default"];
    }
}

?>
