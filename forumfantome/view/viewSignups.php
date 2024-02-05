<div class="login">
  <div class = "loginLeft">
  </div>
<div class = "loginmid">
      <form class="Profile" action="./?_=signups" method="post">
        <label><p class="ProfileEmail">Email:</p> </label><input class="ProfileEmail" type="text" name="email" value="" size="25%" >
        <br />
          <label><p class="ProfilePassword">Pseudo:</p> </label><input class="ProfilePassword" type="text" name="pseudo" value="" size="25%">
            <br /><br />
        <label><p class="ProfilePassword">Password:</p> </label><input class="ProfilePassword" type="password" name="password" value="" size="25%">
        <br /><br />
        <input  class="ProfileSubmit"type="submit" name="confirmed" value="Confirm" width="100px">
      </form>
      <?php
        if(isset($validinfos)){
          if ($validinfos){
            echo"<p>Informations vide veuillez entrer des infomations non vide</p>";
          }
        }
       ?>
</div>
<div class = "loginRight">
</div>
</div>
