<?php
include "$racine/model/databaseLogin.php";
include "$racine/model/functions.php";
include "$racine/model/classPosts.php";

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
$titre="Memento";
if(CheckLoggedOn()){
  if(isset($_POST['privatecode']) && isset($_POST['type'])){
    $pCode = $_POST['privatecode'];
    $Type = $_POST['type'];
    $Search = getInfos($Type,$pCode);
  }
  include "$racine/view/header.html.php";
  include "$racine/view/viewMemento.php";
  include "$racine/view/bottom.html.php";

}else {

  include "$racine/view/header.html.php";
  include "$racine/view/logintosee.php";
  include "$racine/view/bottom.html.php";
}
?>
