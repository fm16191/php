<?php

  $l = array(
    "foo" => "bar",
    "bar" => "foo",
  );
  $l2 = array(
    "foo" => "barejfeudnjednjendjed",
    "bar" => "foo",
  );
  $l3 = array(
    "foo" => "bar",
    "bar" => "fooejndnejdjnednenjdjned",
  );

  $array = array();

  array_push($array, $l);
  array_push($array, $l);
  array_push($array, $l2);
  array_push($array, $l);
  array_push($array, $l);
  array_push($array, $l3);


  $max_length = array();
  foreach($array[0] as $def){
    // echo ($def);
    array_push($max_length, strlen($def));
  }

  var_dump($max_length);

  foreach($array as $line){
    for($i = 0; $i < count($line); $i ++){
      // var_dump(array_keys($line));
      // echo $max_length[$i];
      // echo $line[array_keys($line)[$i]];
      if (strlen($line[array_keys($line)[$i]]) > $max_length[$i]){
        print(strlen($line[array_keys($line)[$i]]));
        $max_length[$i] = strlen($line[array_keys($line)[$i]]);
      }
    }
  }


  var_dump($max_length);

  $affichage = "" ;

  // for($i = 0; $i < $)

  for($i = 0; $i < count($array); $i++){
    for($j = 0; $j < count($array[$i]); $j++){
      $affichage.= "+";
      for($k = 0; $k < $max_length[$j] ; $k ++){
        $affichage.="-";
      }
      $affichage.= "+";
    }
    $affichage.="\n";
  }

  echo $affichage;
 ?>
