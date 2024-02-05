<?php
function getPosts() {
$result = array();
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("select * from posts order by DatePubli DESC");

        $req->execute();

        $line = $req->fetch(PDO::FETCH_ASSOC);
        while ($line) {
            $result[] = $line;
            $line = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}
function getPostsOfAUser($UserID){
  $result =array();
  try {
      $cnx = DBconnection();
      $req = $cnx->prepare("select idPost from poster where idUtil=:ID ");
      $req->bindValue(':ID', $UserID, PDO::PARAM_STR);
      $req->execute();
      $line = $req->fetch(PDO::FETCH_ASSOC);
      while ($line) {
          $result[] = $line['idPost'];
          $line = $req->fetch(PDO::FETCH_ASSOC);
      }
  } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage();
      die();
  }
  return $result;
}
function checkifEmpty($Var){
  return strlen($Var) - substr_count($Var,' ');
}
function getInfos($Type,$ID){
  if($Type=="requests"){
    try {
      $conx = DBconnection();
      $req = $conx->prepare("select * from requests where idRequest=:ID");
      $req->bindValue(':ID', $ID, PDO::PARAM_STR);
      $req->execute();
      $line = $req->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $error){
      print"Error :".$error->getMessage();
      die();
    }
    return $line;
  }else {
    try {
      $conx = DBconnection();
      $req = $conx->prepare("select * from posts where idPost=:ID");
      $req->bindValue(':ID', $ID, PDO::PARAM_STR);
      $req->execute();
      $line = $req->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $error){
      print"Error :".$error->getMessage();
      die();
    }
    return $line;
  }
}
function checkIfCodeAvailable($Code){
  $result = true;
  try {
    $conx = DBconnection();
    $req = $conx->prepare("select * from requests where idRequest=:Code");
    $req->bindValue(':Code', $Code, PDO::PARAM_STR);
    $req->execute();
    $line = $req->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
  if($line){
    $result = false;
  }
  return $result;
}
function setRequests($Code,$Content,$User){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("insert into requests(idRequest,Content,idUtil) values(:code,:Content,:Userid)");
    $req->bindValue(':code', $Code, PDO::PARAM_STR);
    $req->bindValue(':Content', $Content, PDO::PARAM_STR);
    $req->bindValue(':Userid', $User['idUtil'], PDO::PARAM_STR);
    $req->execute();
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
}
function getPostWithID($id){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("select * from posts where idPost=:idPost");
    $req->bindValue(':idPost', $id, PDO::PARAM_STR);
    $req->execute();
    $line = $req->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }

  return $line;
}

function getAllComments($postid){
  $result = array();
      try {
          $cnx = DBconnection();
          $req = $cnx->prepare("select * from commentaire where idPost=:id");
          $req->bindValue(':id', $postid, PDO::PARAM_STR);
          $req->execute();
          $line = $req->fetch(PDO::FETCH_ASSOC);
          while ($line) {
              $result[] = $line;
              $line = $req->fetch(PDO::FETCH_ASSOC);
          }
      } catch (PDOException $e) {
          print "Erreur !: " . $e->getMessage();
          die();
      }
      return $result;
}
function getSubscribers($UserId){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("select count(*) from managesubs where idAbonnes=:id");
    $req->bindValue(':id', $UserId, PDO::PARAM_STR);
    $req->execute();
    $line = $req->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }

  return $line['count(*)'];
}
function setBio($UserId,$BIO){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("update utilisateur set bio =:BIO where idUtil = :id");
    $req->bindValue(':id', $UserId, PDO::PARAM_STR);
    $req->bindValue(':BIO', $BIO, PDO::PARAM_STR);
    $req->execute();
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
}
function setSubscribers($userId,$PostUser){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("insert into managesubs(idUtil,idAbonnes) values(:id,:TargetId)");
    $req->bindValue(':id', $userId, PDO::PARAM_STR);
    $req->bindValue(':TargetId', $PostUser, PDO::PARAM_STR);
    $req->execute();
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
}
function deleteSubscription($userId,$SubbedUser){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("delete from managesubs where idUtil = :id and idAbonnes=:TargetId ");
    $req->bindValue(':id', $userId, PDO::PARAM_STR);
    $req->bindValue(':TargetId', $SubbedUser, PDO::PARAM_STR);
    $req->execute();
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
}
function checkifSubscribed($userId,$PostUser){
  $result = false;
  try {
    $conx = DBconnection();
    $req = $conx->prepare("select * from managesubs where idUtil=:id and idAbonnes=:TargetId");
    $req->bindValue(':id', $userId, PDO::PARAM_STR);
    $req->bindValue(':TargetId', $PostUser, PDO::PARAM_STR);
    $req->execute();
    $line = $req->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
  if($line){
    $result = true;
  }
  return $result;
}
function getSubscriptions($UserId){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("select count(*) from managesubs where idUtil=:id");
    $req->bindValue(':id', $UserId, PDO::PARAM_STR);
    $req->execute();
    $line = $req->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }

  return $line['count(*)'];
}
function getLikes($postId){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("select count(*) from liker where idPost=:idPost");
    $req->bindValue(':idPost', $postId, PDO::PARAM_STR);
    $req->execute();
    $line = $req->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }

  return $line;
}
function AlreadyLiked($userid, $postid){
    $liked = false;
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("select * from liker where idUtil=:userid and  idPost=:postid");
        $req->bindValue(':userid', $userid, PDO::PARAM_INT);
        $req->bindValue(':postid', $postid, PDO::PARAM_STR);

        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    if ($result){
      $liked = true;
    }
    return $liked;
}
function setLike($postId,$userid){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("insert into liker(idPost,idUtil) values(:idPost,:userid)");
    $req->bindValue(':idPost', $postId, PDO::PARAM_STR);
    $req->bindValue(':userid', $userid, PDO::PARAM_STR);
    $req->execute();
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
}
function getlikeID($postId,$userid){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("select * from liker where idPost = :idPost and idUtil =:userid");
    $req->bindValue(':idPost', $postId, PDO::PARAM_STR);
    $req->bindValue(':userid', $userid, PDO::PARAM_STR);
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);

  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }

  return $result;
}
function unsetLike($likeid){

  try {
    $conx = DBconnection();
    $req = $conx->prepare("delete from liker where idLike =:likeid");
    $req->bindValue(':likeid', $likeid, PDO::PARAM_STR);
    $req->execute();
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
}
function addPost($title,$content,$id){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("insert into posts(titre,Contenu,idPost) values(:title,:content,:idPost)");
    $req->bindValue(':title', $title, PDO::PARAM_STR);
    $req->bindValue(':content',$content, PDO::PARAM_STR);
    $req->bindValue(':idPost',$id, PDO::PARAM_STR);
    $result=$req->execute();
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
}
function linkPostWithUser($userid,$Postid){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("insert into poster(idUtil,idPost) values(:idUtil,:idPost)");
    $req->bindValue(':idUtil',$userid , PDO::PARAM_STR);
    $req->bindValue(':idPost',$Postid, PDO::PARAM_STR);
    $req->execute();
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
}
function getUtilisateurWithPostID($PostId){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("select idUtil from poster where idPost=:idPost");
    $req->bindValue(':idPost', $PostId, PDO::PARAM_STR);
    $req->execute();
    $line = $req->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }

  return $line;
}
function addComment($Content,$userid,$postID){
  try {
    $conx = DBconnection();
    $req = $conx->prepare("insert into commentaire(idUtil,idPost,CommentaireTexte) values(:idUtil,:idPost,:content)");
    $req->bindValue(':idUtil',$userid , PDO::PARAM_STR);
    $req->bindValue(':idPost',$postID, PDO::PARAM_STR);
    $req->bindValue(':content',$Content, PDO::PARAM_STR);
    $req->execute();
  }catch(PDOException $error){
    print"Error :".$error->getMessage();
    die();
  }
}
  function getUserWithId($UserId){
    try{$conx = DBconnection();
    $req = $conx->prepare("select * from utilisateur where idUtil=:ID");
    $req->bindValue(':ID',$UserId,PDO::FETCH_ASSOC);
    $req->execute();
    $line = $req->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $error){
    print"Error".$error->getMessage();
    die();
  }
  return $line;
  }
function getUserWithEmail($email){
  try {
      $cnx = DBconnection();
      $req = $cnx->prepare("select * from utilisateur where mail=:email");
      $req->bindValue(':email', $email, PDO::PARAM_STR);
      $req->execute();

      $line = $req->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $error) {
      print " Error!: " . $error->getMessage();
      die();
  }
  return $line;
}
  function CheckLoggedOn() {
      if (!isset($_SESSION)) {
          session_start();
      }
      $log = false;

      if (isset($_SESSION["session_email"])) {
          $util = getUserWithEmail($_SESSION["session_email"]);
          if ($util["mail"] == $_SESSION["session_email"] && $util["mdp"] == $_SESSION["session_password"]
          ) {
              $log = true;
          }
      }
      return $log;
  }
function changeProfilePictures($pfplink,$UserId){
  try {
      echo "<p>$UserId,$pfplink</p>";
      $cnx = DBconnection();
      $req = $cnx->prepare('UPDATE utilisateur SET idPhoto=:link WHERE idUtil=:id');
      $req->bindValue(':link', $pfplink, PDO::PARAM_STR);
      $req->bindValue(':id', $UserId, PDO::PARAM_STR);
      $resultat = $req->execute();

  } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage();
      die();
  }
}

  function addUser($email, $password, $pseudo) {
      try {
          $cnx = DBconnection();
          $passwordCrypt = crypt($password, "sdhduhfduishqfsd");
          $req = $cnx->prepare("insert into utilisateur (mail, mdp, pseudo)
          values(:mail,:mdpCrypt,:pseudo)");
          $req->bindValue(':mail', $email, PDO::PARAM_STR);
          $req->bindValue(':mdpCrypt', $passwordCrypt, PDO::PARAM_STR);
          $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
          $resultat = $req->execute();
      } catch (PDOException $e) {
          print "Erreur !: " . $e->getMessage();
          die();
      }
      return $resultat;
  }
  function login($email, $password) {
      if (!isset($_SESSION)) {
          session_start();
      }

      $user = getUserWithEmail($email);
      $passwordDB = $user["mdp"];
      if (trim($passwordDB) == trim(crypt($password, $passwordDB))) {
          $_SESSION["session_email"] = $email;
          $_SESSION["session_password"] = $passwordDB;
      }
      else {
        return true;
      }
  }

  function logout() {
      if (!isset($_SESSION)) {
          session_start();
      }
      unset($_SESSION["session_email"]);
      unset($_SESSION["session_password"]);
  }
?>
