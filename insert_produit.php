<?php
require 'db.php';
session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    if (isset($_POST['nom'], $_POST['type'], $_POST['prix'], $_POST['description'], $_FILES['illustration'])) {
        $nom = $_POST['nom'];
        $type = $_POST['type'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $illustration = $_FILES['illustration']['name'];


        move_uploaded_file($_FILES['illustration']['tmp_name'], "img/$illustration");

        $sql = "INSERT INTO confiseries (nom, type, prix, description, illustration) VALUES (:nom, :type, :prix, :description, :illustration)";
        $params = [
            'nom' => $nom,
            'type' => $type,
            'prix' => $prix,
            'description' => $description,
            'illustration' => $illustration
        ];
        requete_preparee($sql, $params);
    }
}

header("Location: friandises.php?boutique_id={$boutique_id}");
exit();
?>
