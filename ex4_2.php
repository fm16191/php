<?php

// foreach($SimpleXML->body->QueryWithAttributesResult->Item as $Item){
//     //Now you can access the 'row' data using $Item in this case
//     //two elements, a name and an array of key/value pairs
//     echo $Item->Name;
//     //Loop through the attribute array to access the 'fields'.
//     foreach($Item->Attribute as $Attribute){
//         //Each attribute has two elements, name and value.
//         echo $Attribute->Name . ": " . $Attribute->Value;
//     }
// }

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

$xml = new SimpleXMLElement($xmlstr);


function parseXML(SimpleXMLElement $xml) : array
{
    $array = [];

    foreach(iterator_to_array($xml, TRUE) as $key => $value)
        $array[$key] = ($value->count() > 1) ? parseXML($value) : (string)$value;
    return $array;
}


$ar = parseXML($xml);

print_r($ar);

?>
