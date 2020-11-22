<?php



session_start();

// vérifier si l'utilisateur es déjà connecté, si oui, rediriger le vers la page d'accueil.

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

require ('connect.php');

$pseudo = $mot_de_passe = "";
$pseudo_err = $mot_de_passe_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["pseudo"]))) {
        $pseudo_err = "Veuillez entrer votre pseudo.";
    } else {
        $pseudo = trim($_POST["pseudo"]);
    }

    if (empty(trim($_POST["mot_de_passe"]))) {
        $mot_de_passe_err = "Veuillez entrer votre mot de passe.";
    } else {
        $mot_de_passe = trim($_POST["mot_de_passe"]);
    }

    if(empty($pseudo_err) && empty($mot_de_passe_err)) {
        $sql = "SELECT user_id, pseudo, mot_de_passe FROM user WHERE pseudo = ?";
    }

if(empty(trim($_POST["mot_de_passe"]))) {
    $mot_de_passe_err = "Veuillez entrer un mot de passe.";
} elseif(strlen(trim($_POST["mot_de_passe"])) < 8) {
    $mot_de_passe_err = "Le mot de passe doit contenir au moins 8 caractères.";
} else {
    $mot_de_passe = trim($_POST["mot_de_passe"]);
}

$sql = "INSERT INTO user (pseudo, mot_de_passe) VALUES (?, ?)";

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de connexion</title>
</head>
<body>

    <form method="POST" action="welcome.php">
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
                <td><input type="submit" value="LOGIN"></td>
            </tr>
        </table>
    </form>

</body>