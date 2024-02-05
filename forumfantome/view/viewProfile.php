<div class="login">
  <div class = "loginLeft">
    <?php
    $pseudo = $user['pseudo'];
    $profilepic = $user['idPhoto'];
    $bio = $user['bio'];
    $subscribers = getSubscribers($user['idUtil']);
    $subscriptions = getSubscriptions($user['idUtil']);

    echo "<div class='userProfil'>
       <img class='profilImg'src=$profilepic width='50%'>
</div>
   <p class='profilename'>$pseudo</p>
    <p class='Soft'> \n Subscribers: $subscribers \n Subscriptions: $subscriptions</p>
   <a href='./?_=logout'><input type ='button' name='logoutsubmit' value='Sign out'></a>

 ";?>
  </div>
  <div class = "loginmid">
    <?php
      echo "<p class='profileinfos'>$bio</p> ";
     ?>
    <form class="" action=".?_=signin" method="post">
       <input class='bio' type="text" name="EditBio" value='Say something about you'/>
       <input type="submit" name="Edit" value="Edit">
    </form>
    <a href="./?_=posts"><input type="button" name="viewPosts" value="Click Here to see your posts."></a>

  </div>
  <div class = "loginRight">
    <form class="profilepic" name="profile" action="./?_=profile" method="post">
      <label for=""><p class="profileinfos">Choose your profile picture</p></label> <select class="profilepic" name="profilepic">
        <option value="assets\ryuji.jpg">Ryuji</option>
        <option value="assets\ryuji2.jpg">Ryuji2</option>
        <option value="assets\akechi.jpg">Akechi</option>
        <option value="assets\joker.png">Joker</option>
        <option value="assets\futaba.png">Futaba</option>
        <option value="assets\makotopic.png">Makoto</option>
        <option value="assets\takeyourtime.gif">Take your time</option>
        <option value="assets\profile1.gif">Phantom Thieves</option>
      </select>
      <br><br>
<div class="dropdown">
    <button class="dropbtn">Preview Pictures</button>
      <div class="dropdown-content">
      <p><img src="assets\ryuji.jpg" alt="" width="100%">Ryuji</p>
      <p><img src="assets\ryuji2.jpg" alt="" width="100%">Ryuji2</p>
      <p><img src="assets\akechi.jpg" alt="" width="100%">Akechi</p>
      <p><img src="assets\joker.png" alt="" width="100%">Joker</p>
      <p><img src="assets\futaba.png" alt="" width="100%">Futaba</p>
      <p><img src="assets\makotopic.png" alt="" width="100%">Makoto</p>
      <p><img src="assets\takeyourtime.gif" alt="" width="100%">Take your time</p>
      <p><img src="assets\profile1.gif" alt="" width="100%">Phantom Thieves</p>
    </div>
</div>
    <br><br>
      <input type="submit" name="confirm" value="Confirm">
    </form>
    <br>
  </div>
</div>
