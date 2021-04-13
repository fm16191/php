<?php

class Pangolin{
  public $friends;
  // public Skill $skills;

  public function __construct($friends){ // , Skill $skills
    if (!gettype($friends) == "array"){
      echo "none";
    }
    $this->friends = $friends;
  }
}

function print_object_attributes($object){
  foreach(get_object_vars($object) as $varname => $varvalue){
    print_r($varname);
    echo " => ";
    print_r($varvalue);
    echo "\n";
  }
}


$pango = new Pangolin("array(1,2)");
// print_object_attributes($pango);



?>
