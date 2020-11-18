<?php

function str_beautifuler(...$arguments){
  try{
    if (func_num_args() < 1){ // si pas d'arguments return NULL
      return NULL;
    }
    $str = func_get_arg(0); // récupérer l'argument7
    if(!is_string($str) or strlen($str) == 0){
      return NULL;
    }
    while(!is_bool(strpos($str, "  ")) or !is_bool(strpos($str, "\t"))){ // Si y'a plusieurs espaces consécutifs alors récursivement remplacer un double espace par un espace simple (+ d'un espace -> 1 espace)
      $str = str_replace("  ", " ", $str);
      $str = str_replace("\t", " ", $str);
    }
    $str = trim($str); // supprimer les espaces en début et en fin de string
    // echo $str;

    // $l = array();
    $str = strtolower($str); //Met $str en full minuscules
    $str .= " "; //Ajouter un espace à la fin du mot pour pouvoir faire le if dans le for juste après
    // echo $str;

    for($i=0; $i<strlen($str)-1; $i++){
      if($str[$i+1] == " "){ // si il y a un espace juste après (donc si c'est la fin du mot), mettre la dernière lettre ($str[$i]) en majuscule
        $str[$i] = strtoupper($str[$i]);
      }
    }
    return trim($str); // supprime l'espace de fin
    // echo $str;
  } catch (Exception $e){
    return NULL;
  }

}


var_dump(str_beautifuler("          Un \tPangOLin        caCHe    "));
var_dump(str_beautifuler());
var_dump(str_beautifuler(0));
var_dump(str_beautifuler("aaaaaa"));

?>
