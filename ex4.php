

<?php
  //
  //
  //
  //
  //
  // // function xmlToArray(SimpleXMLElement $xml)
  // // {
  // //     $parser = function (SimpleXMLElement $xml, array $collection = []) use (&$parser) {
  // //         $nodes = $xml->children();
  // //         $attributes = $xml->attributes();
  // //
  // //         if (0 !== count($attributes)) {
  // //             foreach ($attributes as $attrName => $attrValue) {
  // //                 $collection['attributes'][$attrName] = strval($attrValue);
  // //             }
  // //         }
  // //
  // //         if (0 === $nodes->count()) {
  // //             $collection['value'] = strval($xml);
  // //             return $collection;
  // //         }
  // //
  // //         foreach ($nodes as $nodeName => $nodeValue) {
  // //             if (count($nodeValue->xpath('../' . $nodeName)) < 2) {
  // //                 $collection[$nodeName] = $parser($nodeValue);
  // //                 continue;
  // //             }
  // //
  // //             $collection[$nodeName][] = $parser($nodeValue);
  // //         }
  // //
  // //         return $collection;
  // //     };
  // //
  // //     return [
  // //         $xml->getName() => $parser($xml)
  // //     ];
  // // }
  // //
  // //
  // //
  // // function xmlecho(SimpleXMLElement $xml)
  // // {
  // //     $parser = function (SimpleXMLElement $xml, array $collection = []) use (&$parser) {
  // //         $nodes = $xml->children();
  // //         $attributes = $xml->attributes();
  // //
  // //         if (0 !== count($attributes)) {
  // //             foreach ($attributes as $attrName => $attrValue) {
  // //                 $collection['attributes'][$attrName] = strval($attrValue);
  // //                 echo "attributes" . "[" . $attrName . "]" . " => " . $attrValue . "\n";
  // //             }
  // //         }
  // //
  // //         if (0 === $nodes->count()) {
  // //             $collection['value'] = strval($xml);
  // //             echo "collection : value => " . $xml . "\n";
  // //             return $collection;
  // //         }
  // //
  // //         foreach ($nodes as $nodeName => $nodeValue) {
  // //             if (count($nodeValue->xpath('../' . $nodeName)) < 2) {
  // //                 $collection[$nodeName] = $parser($nodeValue);
  // //                 echo "collection : " . $nodeName . " : " . "ha parser\n";
  // //                 continue;
  // //             }
  // //
  // //             $collection[$nodeName][] = $parser($nodeValue);
  // //             echo "collection : " . $nodeName . "ha parser\n";
  // //         }
  // //
  // //         return $collection;
  // //     };
  // //
  // //     return [
  // //         $xml->getName() => $parser($xml)
  // //     ];
  // // }
  //
  function display_xml_nodes($xmlstr, $node){
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

  // display_xml_nodes($xmlstr, "name");

  $xml = new SimpleXMLElement($xmlstr);
  $ar = get_object_vars($xml) ;

  print_r($ar);
  echo "\n\n";

  // $tab = 0;
  // echo $tab++;

  function array_echo($ar, $tab) {

    echo is_array($ar) ? 'true' : 'false';
    echo count($ar);
    echo count($ar[0]);

    foreach ($ar as $name => $value){
      echo "he";
      echo $name;

    }
    return;


    // foreach ($ar as $val){
    //   if (is_array($val)){
    //     echo "array";
    //     array_echo($ar, $tab++);
    //   }
    //   else{
      foreach($ar as $name => $value){
        echo $name . " : " . $value;
      }
      echo "_";
      echo is_array($name) ? 'true' : 'false';
      echo is_array($value) ? 'true' : 'false';
      echo "_";
      // echo strval(is_array($name)) . "__" strval(is_array($value));
      echo "ha";
      for($i = 0; $i < $tab; $i++){
        echo " ";
      }
      echo $val . "\n";
      // }
    // }
  }

  array_echo($ar, 0);


  // $ar = xmlecho($xml);
  // print_r($ar);
  /* Affiche :
  Francois-Afif Benthanane
  Sophie Viger
  Michel Girard
  Sylvain Peigne
  */


?>
