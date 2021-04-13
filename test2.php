<?php
function rev_epur_str($str){
    if (is_string($str) && !empty($str)){
        $rev = strrev($str);
        $preg = preg_replace('/\s\s+/', " ", $rev);
        $array = explode(" ", $preg);
        echo count($array);
        // for ($array as )
        $arrayreverse = array_reverse($array);
        $imp = implode(" " ,$arrayreverse);
        $preg = preg_replace('/\s\s+/', ' ', $imp);
        $trim = trim($str, " ");
        return $trim;
    }
    else {
        return FALSE;
    }
}


var_dump(rev_epur_str("hello    \t\t\t  45 eEeeEEEe          heee \t"));

?>
