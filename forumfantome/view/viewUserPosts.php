<div class="UserPosts">


<?php
$PostsTable = new PostsTable();
 foreach ($Posts as $key => $value){
  $UserID = getUtilisateurWithPostID($value["idPost"]);
  $User = getUserWithId($UserID["idUtil"]);
  $PostID = $value["idPost"];
  $Content = $value["Contenu"];
  $Date = $value["DatePubli"] ;
  $Titre = $value["titre"];
  $Post =  new PostsClass($User,$PostID,$Content,$Date,$Titre);
  $PostsTable->SetPost($Post);
}
$Noposts = true;
foreach ($PostsTable->getPosts(null) as $i => $pPost) {
$Noposts = false;
$PostInfos = $pPost->getPost();
$UserInfo = $PostInfos["User"];
$PostUserID = $UserInfo['idUtil'];
$pseudo = $UserInfo["pseudo"];
$subscribers = getSubscribers($UserInfo['idUtil']);
$subscriptions = getSubscriptions($UserInfo['idUtil']);
$profilepic = $UserInfo['idPhoto'];
$PostContent = $PostInfos["Content"];
$postid = $PostInfos['PostID'];
$TitrePost = $PostInfos["Titre"];
$datepublish = $PostInfos['Date'];
$LikesNumber = getLikes($PostInfos['PostID']);
$LikesNumber = $LikesNumber['count(*)'];
echo "
<div class='Posts'>
    <div class='profileandusername'>
      <div class='imgProfil'>
          <a href='.?_=selectedprofile&id=$PostUserID' target= '_self' ><img class='postprofilImg'src=$profilepic width='60%'></a>
      </div>

      <div class='Username'>
          <p class='pseudo'>$pseudo </p>
          <p class='Soft'> \n Subscribers: $subscribers \n Subscriptions: $subscriptions</p>
      </div>
  </div>

    <div class='titrePost'>
      <p class='PostContent'> Publish Date: $datepublish</p>
      <p class='pseudo'>$TitrePost</p>

    </div>";
    echo"<div class='PostContent'>
      <p class='PostContent'>$PostContent</p>
      <p class='Soft'>Likes:$LikesNumber</p>
    </div>
    <a href='./?todo=comments&poststolike=$postid'><input type='button' name='commmentaire' value='Open the Comments'/></a>
</div>";
}
if($Noposts){
  echo "<p class='Soft'>NO POSTS DETECTED</p>";
}
 ?>
</div>
