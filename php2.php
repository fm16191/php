<?php

function print_ascii($nbr){
  // echo ord($nbr) . "\n";
  return array(ord($nbr));
  // return array($nbr);
}

function convert_number($nbr){
  if ($nbr > 1000){
    echo "Vive les Pangolins\n";
  }
  $l = make_list($nbr);
  // print_r($l);
  // echo "\n";
  $r = array_reverse($l);
  // print_r($r);
  // echo "\n";
  foreach($r as $k){
    echo strval($k)."\n";
  }
}

function make_list($nbr){
  if(abs(floor($nbr/10)) > 1){
    // echo abs($nbr - intval($nbr/10)*10) . "\n"; // affiche les unités 12345
    $a = print_ascii(abs($nbr - intval($nbr/10)*10));
    $b = make_list(intval($nbr/10)); // passe pour les dizaines 1234
    $array = array_merge($a, $b);
    return $array;
  }
  else{
    // echo $nbr - intval($nbr/10)*10 . "\n";
    $a = print_ascii($nbr - intval($nbr/10)*10);
    // $b = array($nbr/10);
    return $a;
  }

}

convert_number(-12345);

?>
