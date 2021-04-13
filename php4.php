<?php

function my_cat_files(...$path){
   $strr = "";
   foreach ($path as $filename){
       $handle = fopen($filename, "r");
       $file_size = readfile($filename);
       $filecontent = fread($handle, $file_size);
       $strr = $strr. $filecontent."_____";
   }
   echo $strr;
   return $strr;
}

my_cat_files("./a.txt", "b.txt")
?>
