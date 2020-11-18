<?php

function str_beautifuler($str){
  while(strpos($str, '  ')){ // Si y'a plusieurs espaces consécutifs alors récursivement remplacer un double espace par un espace simple (+ d'un espace -> 1 espace)
    $str = str_replace("  ", " ", $str);
  }
  $str = trim($str); // supprimer les espaces en début et en fin de string
  // echo $str;

  // $l = array();
  $str = strtolower($str); //Met $str en full minuscules
  $str .= " ";
  // echo $str;

  for($i=0; $i<strlen($str)-1; $i++){
    if($str[$i+1] == " "){
      $str[$i] = strtoupper($str[$i]);
    }
  }
  return trim($str); // supprime l'espace de fin
  // echo $str;

}


echo str_beautifuler(" Un PanGolin    cAcHe  ");

?>
