<?php
function rev_epur_str($str){
    if (is_string($str) && !empty($str)){
        $rev = strrev($str);
        $array = explode(" ", $rev);
        $arrayreverse = array_reverse($array);
        $imp = implode(" " ,$arrayreverse);
        $preg = preg_replace('/\s\s+/', ' ', $imp);
        // echo $preg;
        $trim = trim($preg, " ");
        return $trim;
    }
    else {
        return FALSE;
    }
}

var_dump(rev_epur_str("\t  hello    \t\t\t  45 eEeeEEEe  ,?.;/:&\"'(-_)~#{[|`        heee \t   "));

?>
