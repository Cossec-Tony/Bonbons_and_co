<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['boutique_id'], $_POST['confiserie_id'], $_POST['quantite'])) {
    $boutique_id = $_POST['boutique_id'];
    $confiserie_id = $_POST['confiserie_id'];
    $quantite = $_POST['quantite'];

    try {
        $PDO->beginTransaction();

        // Vérifier si le bonbon existe déjà dans la boutique
        $sql_check_existence = "SELECT * FROM stocks WHERE boutique_id = :boutique_id AND confiserie_id = :confiserie_id";
        $stmt_check_existence = $PDO->prepare($sql_check_existence);
        $stmt_check_existence->execute(['boutique_id' => $boutique_id, 'confiserie_id' => $confiserie_id]);
        $existing_stock = $stmt_check_existence->fetch(PDO::FETCH_ASSOC);

        if ($existing_stock) {
            // Mettre à jour la quantité existante
            $new_quantite = $existing_stock['quantite'] + $quantite;
            $sql_update_stock = "UPDATE stocks SET quantite = :quantite WHERE boutique_id = :boutique_id AND confiserie_id = :confiserie_id";
            $stmt_update_stock = $PDO->prepare($sql_update_stock);
            $stmt_update_stock->execute(['quantite' => $new_quantite, 'boutique_id' => $boutique_id, 'confiserie_id' => $confiserie_id]);
        } else {
            // Ajouter un nouveau bonbon à la boutique
            $sql_add_stock = "INSERT INTO stocks (boutique_id, confiserie_id, quantite) VALUES (:boutique_id, :confiserie_id, :quantite)";
            $stmt_add_stock = $PDO->prepare($sql_add_stock);
            $stmt_add_stock->execute(['boutique_id' => $boutique_id, 'confiserie_id' => $confiserie_id, 'quantite' => $quantite]);
        }

        $PDO->commit();
        header("Location: friandises.php?boutique_id={$boutique_id}");
        exit;
    } catch (PDOException $e) {
        $PDO->rollBack();
        echo "Erreur lors de l'ajout du bonbon à la boutique : " . $e->getMessage();
    }
} else {
    echo "Formulaire invalide.";
    exit;
}
