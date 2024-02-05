<div class="login">
  <div class = "loginLeft">
    <?php
    $ProfileID = $_GET["id"];
    $pseudo = $user['pseudo'];
    $profilepic = $user['idPhoto'];
    $bio = $user['bio'];

    $subscribers = getSubscribers($ProfileID);
    $subscriptions = getSubscriptions($ProfileID);
    echo "<div class='userProfil'>
        <img class='postprofilImg'src=$profilepic width='50%'>
       </div>
    <p class='Soft'> \n Subscribers: $subscribers \n Subscriptions: $subscriptions</p>
    <p class='profilename'>$pseudo</p>
 ";?>
  </div>
    <div class = "loginmid">
      <?php
        echo "<p class='profileinfos'>$bio</p> ";
        if(CheckLoggedOn()){
          $ClientUser=getUserWithEmail($_SESSION["session_email"]);
          if(!checkifSubscribed($ClientUser['idUtil'],$ProfileID)){
            echo "<a href='./?subscribe=true&postuserid=$ProfileID'><input type='button' name='Subscribe' value ='Subscribe to $pseudo'/></a>";
          }
          else {
            echo "<a href='./?subscribe=false&postuserid=$ProfileID'><input type='button' name='Subscribe' value ='Unsubscribe to $pseudo'/></a>";
          }
        }
       ?>
    </div>
  <div class = "loginRight">
  </div>
</div>
