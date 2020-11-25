<?php
class Body{
  private $head = 1;
  protected $arm = 2;
  public $hand = 2;
  protected $leg = 2;
  public $foot = 2;

  public function print_inside_attributes(){
    foreach(get_object_vars($this) as $varname => $varvalue){
      echo $varname . ":" . $varvalue."\n";
    }
  }
}

function print_object_attributes($object){
  foreach(get_object_vars($object) as $varname => $varvalue){
    echo $varname . " => " . $varvalue."\n";
  }
}

$bod = new Body();
$bod->print_inside_attributes();

print_object_attributes($bod);


?>
