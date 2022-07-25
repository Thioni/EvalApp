<?php

// fonction servant à récuperer et afficher les infos de la table de jonction
// utilisée dans: agentsList.php

function getSkills($idAgents) {

$junction = new PDO('mysql:host=localhost;dbname=spycraft', 'root', '');
foreach ($junction->query('SELECT agents_id, specialities_id, first_name, last_name, skill 
  FROM agents_skills
  JOIN agents ON agents_id = agents.id 
  JOIN specialities ON specialities_id = specialities.id 
  WHERE agents_id LIKE \''.$idAgents.'\'', PDO::FETCH_ASSOC) as $test) {
      echo $test['skill'].'<br>';
      };
}