<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Afficher les données pour le moment, vous pouvez les stocker dans une base de données ou les envoyer par e-mail
    echo "<h1>Merci de nous avoir contactés, $name!</h1>";
    echo "<p>Email: $email</p>";
    echo "<p>Message: $message</p>";
} else {
    echo "<h1>Erreur de soumission du formulaire.</h1>";
}
?>
