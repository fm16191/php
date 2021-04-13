<?php
function espace($str){
    $chaineespace = '';
    for ($i=0;$i<strlen($str);$i++) {
    $chaineespace .= substr($str,$i,1);
        if ($i!=strlen($str)-1) {
        $chaineespace .= '§';
        }
    }
}

function test($str, $nb){
    if(strlen($str)>=$nb){
        $ex = explode('§', espace($str));
        if ($nb == 8){
            $as = array_slice($ex, -9, $nb);
        }
        elseif ($nb == 12){
            $as = array_slice($ex, 0, $nb);
        }
        echo implode($as);
    }
    else{
        $newnb = strlen($str)-$nb;
        for($i=0; $i == $newnb; $i++){
            $str = $str. '.';
        }
        echo $str;
    }
}

function resum_join_str($str1, $str2){
    if (empty($str1) or empty($str2)){
        return false;
    }
    else {
        test($str1, 12);
        test($str2, 8);
    }
}

var_dump (resum_join_str("tototototototototototototototototo","titititititititititititititititi"));