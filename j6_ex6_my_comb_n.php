<?php

function make_new_var($n){
  $l = array();
  while($n >= 1){ // Faire une liste de chaque chiffre du nombre -> on récupère à chaque fois l'unité
    $a = $n - intval($n/10)*10; // Je supprime toute les dizaines supérieures : pour donner le premier chffre
    if (in_array($a, $l) or $a == 0){
      return False; // si y'a un chiffre en double ou si y'a un 0 alors combinaison fausse return False
    }
    array_push($l, $a); // mettre le chiffre dans la liste des chiffres
    $n = intval($n/10); // recommencer avec la dizaine inférieure
  }
  // array_push($l, $n);

  sort($l); // Je trie la liste des chiffres, je trie la liste par chiffres croissant
  // print_r($l);

  $r = 0;
  for($i = 0; $i<count($l); $i++){ // A partir de la liste des chiffres je trie la liste par chiffres croissants
    $mult = 1;
    for ($j =0; $j < $i; $j++){ // On multiplie le nombre au fur et à mesure par dizaines pour refaire la combinaison
      $mult *= 10;              // 3 + 2*10 + 1*100
    }
    $r += $l[$i]*$mult;
  }
  return $r; // Je renvoie la combinaison par ordre croissant de chiffres
}

function my_comb_n($n){
  if(is_int($n) and $n >= 0 and $n <= 9){ // Vérifier que $n est bien entre 0 et 9
    $vars = array(); // contient toutes les combinaisons ok
    $mult = 1; // définit la limite du nombre de chiffres -> le for par de 100 à 1000 pour tout les nombres à 3 chiffres
    for ($i = 0; $i < $n; $i++){
      $mult *= 10; // on multiplie la borne par 10 pour définir les bornes
    }
    // echo "mult:" . $mult . "\n";

    for ($v= $mult/10 ; $v< $mult; $v++){ // Pour les nombres à 3 chiffres il faut des bornes de 100 à 1000
      $vv = make_new_var($v); // Prends le nombre et le trie par ordre croissants de chiffres
                              // (ex ; si on a 984 c'est la même combinaison que 489)
      if (!$vv){ // Si la fonction a return false alors on skip
        continue;
      }
      // echo $vv . "\n";
      if (in_array($vv, $vars)){ // si la combinaison existe déjà dans $vars alors on skip
        continue;
      }
      else{
        array_push($vars, $vv); // ajouter la nouvelle combinaison qui est ok
        echo $v . "\n"; // l'afficher
      }
    }
    // echo "\n\n" . count($vars);
  }
}

my_comb_n(3);

?>
