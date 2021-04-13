<?php

function display_xml_nodes2($xmlstr, $node){
  $sxml = new SimpleXMLElement($xmlstr);
  // print_r($sxml);
  $nodes = $sxml->children();

  echo $sxml->asXML();
  return;

  // $count = $sxml->count();
  // echo $count;

  // echo (string) $sxml->property;

  // echo $sxml->__toString();

  // print_r($nodes);

  $attributes = $sxml->attributes();

  // print_r($attributes);
  // foreach($attributes as $aname => $avalue){
  //   echo $aname . ":" . $avalue . "\n" ;
  // }

  foreach($nodes as $nname => $nvalue){
    // print_r($nname . ":" . $nvalue . "\n");
    echo $nname . " : " . $nvalue . "\n";
    // $child = $nvalue->children();
    // echo $child;
  }

  // if ((string) $sxml->property== $node) {
  //     echo (string) $sxml->property;
  // }
}

$xmlstr =
"<webacademie>
  <staff>
    <title> Staff Samung Campus</title>
    <personnes>
      <personne>
        <name>Francois-Afif Benthanane</name>
        <poste>Fondateur</poste>
      </personne>
      <personne>
        <name>Sophie Viger</name>
        <poste>Directrice</poste>
      </personne>
      <personne>
        <name>Michel Girard</name>
        <poste>Responsable Pedagogique</poste>
      </personne>
      <personne>
        <name>Sylvain Peigne</name>
        <poste>Pangolin</poste>
      </personne>
    </personnes>
  </staff>
</webacademie>";

function display_xml_nodes($xmlstr, $node){
  $sxml = new SimpleXMLElement($xmlstr);
  try{
    echo $sxml->asXML();
    return True;
  }
  catch (Exception $e) {
    return False;
  }
}

display_xml_nodes($xmlstr, "name");

// $xml = new SimpleXMLElement($xmlstr);


 ?>
