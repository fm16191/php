<?php
function my_cat_files(...$path){
   $strr = "";
   $size_array=sizeof($path);
   foreach ($path as $key => $value){
       $size_array--;
       $handle = fopen($value, "r");
       $file_size = filesize($value);
       $filecontent = fread($handle, $filesize);
       $strr = $strr. $filecontent."__\n";
   }
   return $strr;
}
