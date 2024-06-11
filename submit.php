
<!-- mdp : 81dc9bdb52d04dc20036dbd8313ed055
alice22


-->


<?php
require 'db.php';

session_start();

function check_login($username,$password) {

    // Récupérer les valeurs saisies par l'utilisateur
    $tap_username = $_POST['username'];
    $tap_password = md5($_POST['password']);

    $username = query("SELECT username FROM utilisateurs");
    $password = query("SELECT password FROM utilisateurs");

    if($username == $tap_username || $password == $tap_password) {

        $_SESSION['username'] = $tap_username;
        echo "<h1>GG ma loutre</h1>";

        return $username;
                
    } else {
        echo("Votre nom d'utilisateur où votre mot de passe est incorrect !");
        echo "<h1>nom d'utilisateur ou mot de passe incorrect</h1>";
    }

}

check_login($_GET["password"], $_GET["username"] );

?>

