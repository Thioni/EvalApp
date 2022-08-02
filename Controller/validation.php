<?php

$contactId = $managerContact->getAll();
$testid = $contactId[$contact_one-1];

$contact_one_nat = ($contactId[$contact_one-1]->getNationality());
$contact_two_nat;
//$agent_three_nat = ($contactId[$contact_three-1]->getNationality());

//var_dump($contact_one_nat);
//var_dump($contact_one);
//var_dump($contact_two);
//var_dump($country);

if (isset($contact_one_nat) && $country == $contact_one_nat) {
  echo 'Contact one same nationality'.'<br>';
} else {
  echo 'Contact one different nationailty'.'<br>';
}

if (isset($contact_two)) {
  $contact_two_nat = ($contactId[$contact_two-1]->getNationality());
  var_dump($contact_two_nat);
} if (isset($contact_two_nat) && $country == $contact_two_nat) {
  echo 'Contact two same nationality'.'<br>';
} else {
  echo 'Contact two different or void'.'<br>';  
}


// agents et targets doivent avoir des nationalités différentes
// hideout doivent être du pays de la mission
// au moins un agent doit avoir la spé de la mission

// hideout peut être à 0