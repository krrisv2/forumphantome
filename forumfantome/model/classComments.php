<?php
/**
 *
 */
class CommentsClass {
  private $Comment;

  /*creation of the class post*/
  public function __construct($User,$PostID,$Content,$ComID){
    $this->Comment = array("User"=>$User,"PostID"=>$PostID,"Content"=>$Content,"ComID"=>$ComID);

  }
  public function getComment(){
    return $this->Comment;
  }

}
/**
 *
 */

class CommentsTable
{
  private $AllComments = array();
  /*table of all posts(objects)*/

  public function __construct()
  {
    $this->AllComments;
  }
  public function getComments($Index){
    if (isset($Index)){
      if(gettype($Index) == "integer"){
        return $this->AllComments[$Index];
      }
    }
    else {
      return $this->AllComments;
    }
  }

  public function SetComment($Comment){
    $max = count($this->AllComments);
    if (isset($max)){
      $this->AllComments[$max]=$Comment;
    }
  }
}

?>
