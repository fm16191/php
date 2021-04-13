<?php
function write_into_my_file($str,$file, $append = false){
  if (is_string($str)&&is_string($file)&&is_bool($append)){
    if ($append == false) {
      $handle = fopen ($file, "w+");
        fwrite ($handle ,$str);
    }
    else {
      $handle = fopen ($file, "a+");
      fwrite ($handle ,$str);
    }
    return true;
  }
  else {
    return false;
  }
}

write_into_my_file()
?>
