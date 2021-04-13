<?php

function listdir($name, $path){
  if($dir = opendir($name)){
    $to_read = array();
    while($file = readdir($dir)){
      if ($file != "." && $file != ".."){
        if (is_dir($path . "/" . $file)){
          array_push($to_read, $file);
        }
        $filename = $path . "/" . $file;
        echo $filename . "\n";
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if (in_array($ext, array("png","jpg","jpeg"))){
          echo "image\n";
          array_push($GLOBALS['liste_images'], $filename);
        }
      }
    }
    foreach ($to_read as $file){
      echo "listing " . $file . "\n";
      listdir($path. "/" . $file, $path . "/" . strval($file));
    }
    closedir($dir);
  }
}

function generateSprite(){
  $path = realpath('.');
  listdir($path, $path);
}

$liste_images = array();
generateSprite();
echo "\n\n";
var_dump($liste_images);

?>
