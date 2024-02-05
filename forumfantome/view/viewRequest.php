<div class="loginLeft">
</div>
<div class = "loginmid">
  <form class="" action="./?_=request" method="post">
    <label> <p class="Soft">Enter a code for the request</p> </label><input class="request" type="text" name="privatecode" value="">
    <br>
    <label> <p class="Soft">Enter your request</p> </label><input class="request" type="text" name="requestcontent" value="">
    <br>
    <input type="submit" name="confirm" value="Take their Heart">
  </form>
  <?php
  if(isset($sentrequest) ){
    if($sentrequest){
      echo "<p class='Soft'>Request Sent.</p>";
    }else {
        echo "<p class='Soft'>Error invalid informations.</p>";
    }
  }
   ?>
</div>
<div class = "loginRight">

</div>
