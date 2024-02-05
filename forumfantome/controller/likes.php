<?php
$user = getUserWithEmail($_SESSION["session_email"]);
$postdebounce =true;
if (isset($_POST['PostTitle']) && isset($_POST['PostContent'])){
  $title = $_POST['PostTitle'];
  $content = $_POST['PostContent'];
  $resulttitle = strlen($title) - substr_count($title,' ');
  $resultcontent = strlen($content) - substr_count($content,' ');
  if ($resulttitle<1 || $resultcontent<1){
    return;
  }
  else {
      $id;
      do {
        $verif = false;
        foreach ($Posts as $key => $Post) {
          $id = rand(40, 99999);
          if($Post['idPost']==$id){
            $verif = true;
            break;
          }
        }
        usleep(0.01);
      } while ($verif);
      $post=addPost($title,$content,$id);
      linkPostWithUser($user['idUtil'],$id);
      unset($_POST['PostTitle'], $_POST['PostContent']);
      header("Location: index.php");
      exit();
    }
  }

if(isset($_GET['post']) and isset($_GET['like'])){
  $postid = $_GET['post'];
  $like = $_GET['like'];
  if(!AlreadyLiked($user['idUtil'],$postid)){
    if ($like){
      setLike($postid,$user['idUtil']);
      unset($_GET['post']);
      unset($_GET['like']);
      header("Location: index.php");
    }
  }
    if($like=='false') {
      $idlike = getlikeID($postid,$user['idUtil']);
      unsetLike($idlike['idLike']);
      unset($_GET['post']);
      unset($_GET['like']);
      header("Location: index.php");
    }
}
?>
