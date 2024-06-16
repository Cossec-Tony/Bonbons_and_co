<?php
require 'db.php';

session_start(); // Assurez-vous de démarrer la session

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: boutiques.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $numero_rue = $_POST['numero_rue'];
    $nom_adresse = $_POST['nom_adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $utilisateur_id = $_SESSION['user_id']; // Récupère l'ID de l'utilisateur depuis la session

    // Préparez la requête SQL
    $sql = "INSERT INTO boutiques (nom, numero_rue, nom_adresse, code_postal, ville, pays, utilisateur_id) VALUES (:nom, :numero_rue, :nom_adresse, :code_postal, :ville, :pays, :utilisateur_id)";
    $stmt = $PDO->prepare($sql);

    // Exécutez la requête avec les paramètres
    $stmt->execute([
        ':nom' => $nom,
        ':numero_rue' => $numero_rue,
        ':nom_adresse' => $nom_adresse,
        ':code_postal' => $code_postal,
        ':ville' => $ville,
        ':pays' => $pays,
        ':utilisateur_id' => $utilisateur_id
    ]);

    // Redirigez vers la page des boutiques après l'insertion
    header("Location: boutiques.php");
    exit();
}
?>
