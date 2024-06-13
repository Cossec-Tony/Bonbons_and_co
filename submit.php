<?php
require 'db.php';

session_start();

function check_login($tap_username, $tap_password) {
    global $PDO;

    $tap_password = md5($tap_password);
    

    $sql = "SELECT * FROM utilisateurs WHERE username = :username AND password = :password";
    $params = ['username' => $tap_username, 'password' => $tap_password];
    // La magie prend vie
    $result = requete_preparee($sql, $params);

    if (!empty($result)) {
        $_SESSION['username'] = $tap_username;
        echo "<h1>GG ma loutre</h1>";
        return $result[0]['username'];
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
