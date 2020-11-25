<?php

class Doly{
  public $animal;
  public $age;
  public $doctor;

  public function __construct($animal, $age, $doctor){
    $this->animal = $animal;
    $this->age = $age;
    $this->doctor = $doctor;
  }

  public function __clone() {
    echo "I will survive !\n";
  }
}

function print_object_attributes($object){
  foreach(get_object_vars($object) as $varname => $varvalue){
    echo $varname . " => " . $varvalue."\n";
  }
}

function clone_object($object){
  $obj = clone $object;
  return $obj;
}


$doll = new Doly(1,2,3);

$doll2 = clone_object($doll);

print_object_attributes($doll2);


?>
