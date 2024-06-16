<?php
require 'db.php';

session_start(); // Assurez-vous de démarrer la session

function check_login($tap_username, $tap_password) {
    global $PDO;

    $tap_password = md5($tap_password);

    $sql = "SELECT * FROM utilisateurs WHERE username = :username AND password = :password";
    $params = ['username' => $tap_username, 'password' => $tap_password];
    $result = requete_preparee($sql, $params);

    if (!empty($result)) {
        $_SESSION['username'] = $tap_username;
        // Stocke l'id utilisateur
        $_SESSION['user_id'] = $result[0]['id'];
        // Stocke le rôle
        $_SESSION['role'] = $result[0]['role']; 
        // Redirection avec l'ID utilisateur
        header("Location: index.php?user_id=" . $_SESSION['user_id']);
        exit();
    } else {
        $error = urlencode("Votre nom d'utilisateur ou votre mot de passe est incorrect !");
        header("Location: connexion.php?error=$error");
        exit();
    }
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    check_login($_POST["username"], $_POST["password"]);
}
?>
