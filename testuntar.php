<?php
// tar -c file1 folder -f tarfolder.tar
function untar($file, $destination){
  if (!file_exists($destination)){
    mkdir($destination, 0777, true);//dossier destination
  }
  else if(!is_dir($destination)){
      echo "destination is not a directory";
      return false;
  }
  if (!is_readable($file)){
    echo "file unreadable";
    return false;
  }

  $filesize = filesize($file);
  // echo $filesize;

    $fh = fopen($file, 'rb'); // rb = lecture binaire
    $parsed_size = 0;
    $ccdefault = false;

    while(false !== ($header = fread($fh, 512))){
        // $header = fread($fh, 512); // get file first 512 octets : Header
        $finfo = array();
        $parsed_size +=512;
        // stat en unix
        $finfo['filename'] = trim(substr($header, 0, 99)); // trim car zérobinaire
        // echo $finfo['filename'];
        // return;

        $finfo['mode'] = octdec(trim(substr($header, 100, 8))); // octdec octet to decimal
        $finfo['uid'] = octdec(substr($header, 108, 8));
        $finfo['gid'] = octdec(substr($header, 116, 8));
        $finfo['filesize'] = octdec(substr($header, 124, 12));
        $finfo['mtime'] = octdec(substr($header, 136, 12));
        $finfo['chksum'] = octdec(substr($header, 148, 8));
        $finfo['type'] = octdec(substr($header, 156, 1));
        $finfo['linkname'] = trim(substr($header, 157, 99));
        $finfo['fdata'] = (511 + $finfo['filesize'] & ~511); // 512 c'est la taille du header -> position + taille du fichier
        // $finfo['filecontent'] = substr(fread($fh, $finfo['fdata']), 0, $finfo['filesize']);
        // ($meta['filesize'] + 511) & ~511;

        if ($finfo['filename'] == "" and $finfo['fdata'] == 0){
            return false;
        }

        foreach($finfo as $metaname => $metadata){
           echo $metaname . ":" . $metadata . "\n";
        }
        $path = $destination . "/" . $finfo['filename'];

        $file_type = array("fichier normal", "lien matériel", "lien symbolique", "fichier spécial charactère", "fichier spécial bloc", "répertoire", "tube nommé", "fichier contigu");
        // file_type = array();
        // array["0"] = "fichier normal";
        echo "Extracting " . $finfo['filename'] . " to " . $path . " (" . $file_type[$finfo['type']] . ")\n";


        if (file_exists($path)){
            echo "File " . $path ." already exists.\n";
            $ccprompt = false;
            if(!$ccdefault){ //cc = conflict_choice | ccdefault : conflict_choice_default | ccanswers = conflict_choice_correct_answers | ccanswer = conflict_choice_user_answer || ccmessages = conflict_choice_user_choice_message
                $ccanswers = array("o","oa","s","sa","e");
                $ccmessages = array("o" => "Overriding ".$path, "oa" => "Overriding ".$path." and all conflict files", "s" => "Skipping ".$path, "sa" => "Skipping ".$path." and all conflict files", "e" => "Stopping extraction and exiting");
                $ccprompt = "Choice : ";
                echo "o to override this file\n";
                echo "oa to override all conflift files\n";
                echo "s to skip this file\n";
                echo "sa to skip all conflict files\n";
                echo "e to stop the extraction and exit\n";
                do{
                $ccanswer = readline($ccprompt);
                } while(!in_array($ccanswer, $ccanswers));
                if ($ccanswer == "oa" or $ccanswer == "sa"){
                $ccdefault = $ccanswer;
                }
        }
        echo $ccmessages[$ccanswer]."\n\n";
        if ($ccdefault == "sa" or $ccanswer == "s"){
            // fread($fh, $finfo['fdata']);
            fseek($fh, $finfo['fdata']);

            $parsed_size += $finfo['fdata'];
            if ($parsed_size > $filesize) break;
            continue;
        }
        elseif ($ccanswer == "e") break;
        }


        if($finfo['type'] == 5){
            mkdir($path, 0777, true); //répertoire
        }

        elseif ($finfo['type'] == 0 and $finfo['fdata'] > 0){ //fichier normal
            $filecontent = substr(fread($fh, $finfo['fdata']), 0, $finfo['filesize']);
            // echo $filecontent;

            $fw = fopen($path, 'wb'); //ouverture en écriture binaire
            if ($fw != false){
                fwrite($fw, $filecontent);
                fclose($fw);

                touch($path, $finfo['mtime'], $finfo['mtime']);//écriture ancienne date création

                chmod($path, $finfo['mode']);
            }
            else{
                echo "error in file write";
                return false;
            }
        }

        // echo $finfo['filesize'];
        $parsed_size += $finfo['fdata'];
        // echo "\n\n";
        if ($parsed_size >= $filesize) break;
        // break;
    }
}

// untar("mytar.tar", "./test/");
// untar("tarfolder.tar", "test");


//echo($argc);
// print_r($argv);


if ($argc > 1){
  foreach(array_slice($argv, 1) as $fichier){//coupe fonction
    // echo "_".$arg."_";
    $destination = substr($fichier, 0, strlen($fichier)-4);// del .tar
    // echo $destination;
    untar($fichier, $destination);
  }
}

?>
