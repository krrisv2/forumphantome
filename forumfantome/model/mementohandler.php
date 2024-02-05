<?php
if(!isset($Search)){
?>
<form class="" action=".?_=memento" method="post">
  <label> <p class="Soft">Find the post or request with the id</p> </label><input class="request" type="text" name="privatecode" value="">
  <label for=""><p class="Soft">Choose the type</p></label>
  <label for=""><p class="Soft">Post  Request</p></label> <input type="radio" name="type" value="posts">
  <input type="radio" name="type" value="requests">
  <br>
  <input type="submit" name="confirm" value="Search">
</form>
<?php
}else {
if($Search){
  if(isset($Search["idRequest"])){
    $User = getUserWithId($Search["idUtil"]);
    $Content = $Search["Content"];
    $pseudo = $User['pseudo'];
    $profilepic = $User['idPhoto'];
    echo "<div class='userProfil'>
        <img class='postprofilImg'src=$profilepic width='50%'>
       </div>
    <p class='profilename'>$pseudo</p>
    <p class='Soft'>$Content</p>
    ";
  }
  if(isset($Search["idPost"])){
    $UserID = getUtilisateurWithPostID($Search["idPost"]);
    print_r($UserID);
    $User = getUserWithId($UserID["idUtil"]);
    $Content = $Search["Contenu"];
    $pseudo = $User['pseudo'];
    $profilepic = $User['idPhoto'];
    echo "<div class='userProfil'>
        <img class='postprofilImg'src=$profilepic width='50%'>
       </div>
    <p class='profilename'>$pseudo</p>
    <p class='Soft'>$Content</p>
    ";
  }
}else {
  echo "<p class='Soft'>Nothing was found.</p>";
}
}
 ?>
