<?php
function rev_epur_str($str){
    if (is_string($str) && !empty($str)){
      $preg = preg_replace('/\s\s+/', ' ', $rev);
        for()
        $rev = strrev($str);
        echo $rev;
        $trim = trim($preg, " ");
        return $trim;
    }
    else {
        return FALSE;
    }
}

var_dump(rev_epur_str("hello    \t\t\t  45 eEeeEEEe          heee \t"));

?>
