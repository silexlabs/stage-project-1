<?php

require ('connect.php');


// print_r($user); 
$resultat = $pdo->query("SELECT nom, prenom FROM user"); 

echo '<h2> Il y a ' .$resultat->rowCount() . ' utilisateur(s) </h2>';

while ($user = $resultat->fetch(PDO::FETCH_ASSOC)) {

    

    echo '<div>L\'utilisateur est ' . $user['nom'] . ' ' . $user['prenom'] . '</div>';

}
