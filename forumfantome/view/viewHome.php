<p class="Home">Home</p>
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
foreach ($PostsTable->getPosts(null) as $i => $pPost) {

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
$thumbsup = 'assets\thumbsup.png';
$thumbsdown = 'assets\thumbsdown.png';
$LikesNumber = getLikes($PostInfos['PostID']);
$LikesNumber = $LikesNumber['count(*)'];
echo "
<div class='Posts'>
  <div class='profileandusername'>
      <div class='imgProfil'>
          <a href='.?_=selectedprofile&id=$PostUserID' target= '_self' ><img class='postprofilImg'src=$profilepic width='100%'></a>
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
    if(CheckLoggedOn()){
      $user=getUserWithEmail($_SESSION["session_email"]);
      if(!checkifSubscribed($user['idUtil'],$UserInfo['idUtil'])){
        echo "<a href='./?subscribe=true&postuserid=$PostUserID'><input type='button' name='Subscribe' value ='Subscribe to $pseudo'/></a>";
      }
      else {
        echo "<a href='./?subscribe=false&postuserid=$PostUserID'><input type='button' name='Subscribe' value ='Unsubscribe to $pseudo'/></a>";
      }
    }

    echo"<div class='PostContent'>
      <p class='PostContent'>$PostContent</p>
      <p class='Soft'>Likes:$LikesNumber</p>
      <a href='./?post=$postid&like=true'><img src=$thumbsup width='3.5%' alt ='Like'></a><a href='./?post=$postid&like=false'><img src=$thumbsdown width='3.5%' alt ='Dislike'></a>
    </div>
    <a href='./?todo=comments&poststolike=$postid'><input type='button' name='commmentaire' value='Open the Comments'/></a>
</div>";
}
 ?>
 <div class="Posting">
   <?php
   if($postdebounce){
     if (isset($_POST['PostTitle']) && isset($_POST['PostContent'])){
       unset($_POST['PostTitle']);
       unset($_POST['PostContent']);
     }
     ?>
      <form class="Posting" name ='PostContent'action="./?_=home" method="post">
        <label for=""><p class="Posting">Post Title:</p></label><input type="text" name="PostTitle" value="" width='20%'/>
        <label for=""><p class="Posting">Post Content:</p></label><input type="text" name="PostContent" value="" width='20%'/>
        <br>
        <input type="submit" name="confirm" value="Post">
      </form>
     <?php
   }else {
     ?>
      <p class="Posting" >Log in to be able to post something.</p>
     <?php
   }
    ?>
 </div>
