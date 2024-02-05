<?php
include "$racine/model/classComments.php";
$commentarrays = new CommentsTable();

 ?>
<div class="login">
    <div class = "loginLeft">
    </div>
      <div class = "loginmid">
        <div class='Post'>
          <?php
          if(isset($_GET['poststolike'])){
            $id = $_GET['poststolike'];
          }elseif (isset($_GET['commentcontent'])) {
            $id = $_GET['previousid'];
          }
          $mainPost = getPostWithID($id);
          $MainAuthorID = getUtilisateurWithPostID($mainPost['idPost']);
          $MainAuthorID=$MainAuthorID['idUtil'];
          $MainAuthor = getUserWithId($MainAuthorID);
          $pseudo = $MainAuthor['pseudo'];
          $subscribers = getSubscribers($MainAuthor['idUtil']);
          $subscriptions = getSubscriptions($MainAuthor['idUtil']);
          $PostContent = $mainPost['Contenu'];
          $datepublish = $mainPost['DatePubli'];
          $profilepic = $MainAuthor['idPhoto'];
          $LikesNumber =getLikes($id);
          $LikesNumber = $LikesNumber['count(*)'];
          echo"<div class='Posts'>
            <div class='profileandusername'>
                <div class='imgProfil'>
                    <a href='.?_=selectedprofile&id=$MainAuthorID'><img class='postprofilImg'src=$profilepic width='100%'></a>
                </div>
                <div class='Username'>
                    <p class='pseudo'>$pseudo </p>
                    <p class='Soft'> \n Subscribers: $subscribers \n Subscriptions: $subscriptions</p>
                </div>
            </div>";
              if(CheckLoggedOn()){
                $user=getUserWithEmail($_SESSION["session_email"]);
                if(!checkifSubscribed($user['idUtil'],$MainAuthor['idUtil'])){
                  echo "<a href='./?subscribe=true&postuserid=$MainAuthorID'><input type='button' name='Subscribe' value ='Subscribe to $pseudo'/></a>";
                }else {
                  echo "<a href='./?subscribe=false&postuserid=$MainAuthorID'><input type='button' name='Subscribe' value ='Unsubscribe to $pseudo'/></a>";
                }
              }

              echo"<div class=''>
                  <p class='PostContent'>$PostContent</p>
                  <p class='Soft'>Likes:$LikesNumber</p>
                </div>";
           ?>
        </div>
        <div>
          <?php if(!$commentability){
             echo "<p class='Soft'>LOG IN TO COMMENT.</p>";
           }
             else {
               ?>
               <form class="" action="" method="get">
                 <input type="text" name="commentcontent" value="">
                 <?php echo"<input type='hidden' name='previousid' value= $id >"; ?>
                 <input type="submit" name ='post' value='Comment'/>
               </form>
               <?php } ?>

          } ?>
        </div>
        <?php
        foreach ($AllComments as $number => $Comment) {
          $classComment = new CommentsClass($Comment['idUtil'],$Comment['idPost'],$Comment['CommentaireTexte'],$Comment['idCom']);
          $commentarrays->SetComment($classComment);
        }
        foreach ($commentarrays->getComments(null) as $number => $Comment) {
          // code...
          $Comment = $Comment->getComment();
          $Author = getUserWithId($Comment['User']);
          $AuthorID = $Author['idUtil'];
          $AuthorPseudo = $Author['pseudo'];
          $AuthorImage = $Author['idPhoto'];
          $Content = $Comment['Content'];
          echo"<div class='Comment'>
            <div class='ImageComment'>
              <a href='.?_=selectedprofile&id=$AuthorID'><img src=$AuthorImage width=100%></a>
              <p class='Soft'>$AuthorPseudo</p>
            </div>
          <div>
          <div class='UnderComment'><p class='Soft'>$Content</p></div>
          </div>
          </div>";
        }
         ?>
      </div>
    <div class = "loginRight">
    </div>
</div>
