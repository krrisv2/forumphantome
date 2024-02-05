<?php
/**
 *
 */
class PostsClass {
  private $Post;

  /*creation of the class post*/
  public function __construct($User,$PostID,$Content,$Date,$Titre){
    $this->Post = array("User"=>$User,"PostID"=>$PostID,"Content"=>$Content,"Date"=>$Date,"Titre"=>$Titre);

  }
  public function getPost(){
    return $this->Post;
  }

}
/**
 *
 */

class PostsTable
{
  private $AllPosts = array();
  /*table of all posts(objects)*/

  public function __construct()
  {
    $this->AllPosts;
  }

  public function getPosts($Index){
    if (isset($Index)){
      if(gettype($Index) == "integer"){
        return $this->AllPosts[$Index];
      }
    }
    else {
      return $this->AllPosts;
    }
  }

  public function SetPost($Post){
    $max = count($this->AllPosts);
    if (isset($max)){
      $this->AllPosts[$max]=$Post;
    }
  }
}

?>
