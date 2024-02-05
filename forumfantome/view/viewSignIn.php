<div class="login">
  <div class = "loginLeft">
  </div>
<div class = "loginmid">
      <form class="Profile" action="./?_=signin" method="post">
        <label><p class="ProfileEmail">Email:</p> </label><input class="ProfileEmail" type="text" name="email" value="" size="25%" >
        <br />
        <label><p class="ProfilePassword">Password:</p> </label><input class="ProfilePassword" type="password" name="password" value="" size="25%">
        <br /><br />
        <input  class="ProfileSubmit"type="submit" name="confirmed" value="Confirm" width="100px">
      </form>
    <?php
    if (isset($result) ){
      if ($result){
        echo "<p>Informations non reconnues</p>";
      }
    }
     ?>
</div>
<div class = "loginRight">
  <a href="./?_=signups"><input type="button" name="signups" value='SIGN UP' width ='20%'</a>
</div>
</div>
