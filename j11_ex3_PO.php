<?php

namespace Imperium{

  class Soldier{
    private $hp;
    private $attack;
    private $name;

    function __construct($name, $hp = 50, $attack = 12){
      $this->name = $name;
      $this->hp = $hp;
      $this->attack = $attack;
    }
    public function getHP(){
      return $this->hp;
    }

    public function setHP($hp){
      $this->hp = $hp;
    }

    public function getAttack(){
      return $this->attack;
    }
    public function setAttack($attack){
      $this->attack = $attack;
    }

    public function doDamage($obj){
      if (get_class($obj) == "Chaos\Soldier" or get_class($obj) == "Imperium\Soldier"){
        $obj->setHP($obj->getHP() - $this->getAttack());
      }
    }

    public function __toString(){
      return $this->name . " the " . __NAMESPACE__. " Space Marine : " . $this->hp . " HP.";
    }
  }
}


namespace Chaos{

  class Soldier
  {
    function __construct($name, $hp = 70, $attack = 12){
      $this->name = $name;
      $this->hp = $hp;
      $this->attack = $attack;
    }

    public function getHP(){
      return $this->hp;
    }

    public function setHP($hp){
      $this->hp = $hp;
    }

    public function getAttack(){
        return $this->attack;
    }
    public function setAttack($attack){
      $this->attack = $attack;
    }

    public function doDamage($obj){
      if (get_class($obj) == "Chaos\Soldier" or get_class($obj) == "Imperium\Soldier"){
        $obj->setHP($obj->getHP() - $this->getAttack());
      }
    }

    public function __toString(){
      return $this->name . " the " . __NAMESPACE__. " Space Marine : " . $this->hp . " HP.";
    }
  }
}

// use Imperium;
// use Chaos;

namespace{
  use Imperium;
  use Chaos;

  $spaceMarine = new \Imperium\Soldier ("Gessart");
  $chaosSpaceMarine = new \Chaos\Soldier("Ruphen");
  echo $spaceMarine . "\n";
  echo $chaosSpaceMarine . "\n";
  $spaceMarine -> doDamage($chaosSpaceMarine);
  echo $spaceMarine . "\n";
  echo $chaosSpaceMarine . "\n";
}

?>
