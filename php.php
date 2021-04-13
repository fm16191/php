<?php
function display_names(...$arguments){
    $file = __FILE__;
    $dir = __DIR__;
    $filename = str_replace($dir."/", "", $file);
    // echo $filename;

    $a = array($filename);
    $concat = array_merge($a, $arguments);

    $count = 0;
    foreach ($arguments as $a){
      $count = $count + 1;
    }

    if ($count%2 == 0){
      $d = 1;
    }
    else {
      $d = 0;
    }

    $a = array($filename, "", "", $count, $d);
    // foreach ($a as $aa){
    //   echo $aa . "\n";
    // }
    return $a;
}

display_names("e", "a", "b", "c");

?>
