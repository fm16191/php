<?php

class Dolly{
  public $animal;
  public $age;
  public $doctor;

  public function __construct($animal, $age, $doctor){
    $this->animal = $animal;
    $this->age = $age;
    $this->doctor = NULL;
  }

  public function __clone() {
    echo "I will survive !\n";
  }
}

class Dolly2{
  public $animal;
  public $age;
  public $doctor;

  public function __construct($animal, $age, $doctor){
    $this->animal = $animal;
    $this->age = $age;
    $this->doctor = $doctor;
  }
}

class Dolly_null{
  public $animal;
  public $age;
  public $doctor;

  public function __construct($animal, $age){
    $this->animal = $animal;
    $this->age = $age;
    $this->doctor = NULL;
  }
}
class Dolly_doctor2{
  public $animal;
  public $age;
  public $doctor2;

  public function __construct($animal, $age, $doctor2){
    $this->animal = $animal;
    $this->age = $age;
    $this->doctor = $doctor2;
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

function objects_comparison($object1, $object2){

  $attributes_object1 = array();

  if (count(get_object_vars($object1)) != count(get_object_vars($object2))){
    echo "\n";
    return;
  }

  foreach(get_object_vars($object1) as $varname => $varvalue){
    $attributes_object1[$varname] = $varvalue;
  }

  foreach(get_object_vars($object2) as $varname=>$varvalue){
    if (!array_key_exists($varname, $attributes_object1)){
      echo "\n";
      return;
    }
    if ($attributes_object1[$varname] != $varvalue){
      echo "\n";
      return;
    }
  }

  if (get_class($object1) == get_class($object2)){
    echo "Objects are the same.\n";
  }
  else{
    echo "Objects are equal.\n";
  }
}


// function objects_comparison($object1 , $object2){
//     if($object1 === $object2){
//         echo "Objects are the same.\n";
//     }elseif($object1 == $object2){
//         echo "Objects are equal.\n";
//     }else{
//         echo "\n";
//     }
// }

$doll = new Dolly(1,2,3);
$dollclone = clone_object($doll);
$doll2 = new Dolly2(1,2,3);
$dolldoctor2 = new Dolly_doctor2(1,2,3);
$doll_null = new Dolly_null(1,2);
$doll_nullnull = new Dolly(1,2,NULL);

objects_comparison($doll, $dollclone); // vérif si identique c'est la même instance
objects_comparison($doll, $doll2); // vérif si c'est identique et de classe différente
objects_comparison($doll_null, $doll_nullnull); // vérifier si identique avec null
objects_comparison($doll, $dolldoctor2); // vérifier si identique mais variable name différente
// objects_comparison($doll3, $doll4); //

?>
