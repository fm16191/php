<?php

function is_prime(...$arguments){
  try{
    if (func_num_args() < 1){ // si pas d'arguments return NULL
      return NULL;
    }
    $nbr = func_get_arg(0); // récupérer l'argument
    if (!is_int($nbr)){ // Si c'est pas un entier return NULL
      return NULL;
    }
    if ($nbr < 0){ // Si c'est un entier négatif alors ça peut pas être un nombre premier
      return false;
    }
    for($i = 2 ; $i < $nbr; $i++){ // On teste pour toutes les valeurs inférieures à $nbr
      if(intval($nbr/$i) == $nbr/$i){ // que la division entière n'est pas égale à la division flottante (donc que c'est pas un diviseur commun)
        // echo "false";
        return false;
      }
    }
    // echo "true";
    return true;
  }
  catch (Exception $e){ // Si y'a une erreur on return NULL
    return NULL;
  }
}


echo is_prime(15);

?>
