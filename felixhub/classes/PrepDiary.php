<?php
class PrepDiary
{
  private $title;
  private $preps = array();
  
  public function __construct($title = null)
  {
    $this->setTitle($title);
  }
  
  public function setTitle($title)
  {
    if(empty($title)){
      $this->title = null;
    }else{
      $this->title = ucwords($title);
    }
  }
  
  public function getTitle()
  {
    return $this->title;
  }
  
  public function addPrep($prep)
  {
    $this->preps[] = $prep;
  }
  
  public function getPrep()
  {
    return $this->preps;
  }
  
  public function getTaskNames()
  {
    $titles=array();
    foreach ($this->preps as $prep){
      $titles[] = $prep->getTaskName();
    }
    return $titles;
  }
  
  public function filterByTag($tag)
  {
    $taggedPreps = array();
    foreach ($this->preps as $prep){
      if (in_array(strtolower($tag), $prep->getTags())){
        $taggedPreps[] = $prep; 
      }
    }
    return $taggedPreps;
  }
  
  
  public function filterByID($id)
  {
    return $this->preps[$id];
  }
}
?>