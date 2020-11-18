<?php

function my_facto($nbr){
  function factorielle($nbr){
    if ($nbr == 0){
      return 1;
    }
    else{
      return $nbr*factorielle($nbr-1);
    }
  }
  
  if (is_int($nbr) and $nbr > 0){
    return factorielle($nbr);
  }
  else{
    return NULL;
  }
}

var_dump(my_facto(5));

?>
