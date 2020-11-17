<?php

function my_sort_int_tab(array $tab){

  for ($j=0; $j < count($tab); $j++){
    for ($i = 0; $i < count($tab)-1; $i++){
      if ($tab[$i] > $tab[$i+1]){
        $temp = $tab[$i];
        $tab[$i] = $tab[$i+1];
        $tab[$i+1] = $temp;
      }
    }
  }
  print_r($tab);
  // return $tab;

}

my_sort_int_tab(array(15000,1501,67,1944,12,15, "a"));
// my_sort_int_tab(array(125,3,4,15,6,7));

?>
