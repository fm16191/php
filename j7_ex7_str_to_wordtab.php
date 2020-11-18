<?php

// function str_to_wordtab($str, $delim){
function str_to_wordtab(){
  // echo func_num_args();
  if (func_num_args() < 2){ // Si le nombre d'arguments inférieur à 2 return NULL
    return NULL;
  }
  $str = func_get_arg(0);
  $delim = func_get_arg(1);

  try{
    // echo strpos($str, $delim);
    if (is_string($str) and is_string($delim) and strlen($str) > 0 and strlen($delim) > 0 and strpos($str, $delim)){
    // Si $str ou $delim n'est pas une string, et si la taille de $str ou $delim est nulle ou si $delim n'est pas dans $str alors return NULL
      return explode($delim, $str); // retourne une liste split par $delim
    }
    else{
      return NULL;
    }
  } catch(Exception $e){
    return NULL; // Si y'a une erreur quelconque return NULL (énoncé)
  }
}

$a = str_to_wordtab("Mais tu es tout la", ' ');
print_r($a);
?>
