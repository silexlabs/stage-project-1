<?php

require ('connect.php');


if(!empty($_POST)) {
    $resultat =$pdo->prepare("INSERT INTO user (pseudo, mot_de_passe, nom, prenom, email) VALUES (:pseudo, :mot_de_passe, :nom, :prenom, :email)");

    $resultat->execute(array(
        ':pseudo' => $_POST['pseudo'],
        ':mot_de_passe' => $_POST['mot_de_passe'],
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':email' => $_POST['email']
    ));
}


?>
<h1>Formulaire d'inscription Marketplace Silex</h1>

<form method="POST" action="home.php">
    <table>
        <tr>
            <td><label for="pseudo">Pseudo</label></td>
            <td><input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo'] ?? '';?>"></td>
        </tr>
        <tr></tr>
        <tr>
            <td><label for="mdp">Mot de passe</label></td>
            <td><input type="password" name="mot_de_passe" id="mot_de_passe" value="<?php echo $_POST['mot_de_passe'] ?? '';?>"></td>
        </tr>
        <tr></tr>
        <tr>
            <td><label for="nom">Nom</label></td>
            <td><input type="text" name="nom" id="nom" value="<?php echo $_POST['nom'] ?? '';?>"></td>
        </tr>
        <tr></tr>
        <tr>
            <td><label for="prenom">Prénom</label></td>
            <td><input type="text" name="prenom" id="prenom" value="<?php echo $_POST['prenom'] ?? '';?>"></td>
        </tr>
        <tr></tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="text" name="email" id="email" value="<?php echo $_POST['email'] ?? '';?>"></td>
        </tr>
        <tr></tr>
        
        <tr>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>


<?php
// print_r($user); 
$resultat = $pdo->query("SELECT nom, prenom FROM user"); 

echo '<h2> Il y a ' .$resultat->rowCount() . ' utilisateur(s) </h2>';

while ($user = $resultat->fetch(PDO::FETCH_ASSOC)) {

    

    echo '<div>L\'utilisateur est ' . $user['nom'] . ' ' . $user['prenom'] . '</div>';

    


}