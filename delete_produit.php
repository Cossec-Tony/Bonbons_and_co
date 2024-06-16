<?php
require 'db.php';
session_start();

if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'gerant') && isset($_POST['confiserie_id'])) {
    $produit_id = $_POST['confiserie_id'];
    $boutique_id = $_POST['boutique_id']; 

    try {
        // Commencer transaction de fou
        $PDO->beginTransaction();

        // Supprimer dans table stocks
        $sql_delete_stocks = "DELETE FROM stocks WHERE confiserie_id = :id";
        $stmt_delete_stocks = $PDO->prepare($sql_delete_stocks);
        $stmt_delete_stocks->execute(['id' => $produit_id]);

        // Supprimer dans table confiseries
        $sql_delete_confiserie = "DELETE FROM confiseries WHERE id = :id";
        $stmt_delete_confiserie = $PDO->prepare($sql_delete_confiserie);
        $stmt_delete_confiserie->execute(['id' => $produit_id]);

        // Valider transaction de fou
        $PDO->commit();

    } catch (PDOException $e) {
        // pour erreur
        $PDO->rollBack();
        echo "Erreur lors de la suppression du bonbon : " . $e->getMessage();
    }
}

// Rediriger après traitement
header("Location: friandises.php?boutique_id={$boutique_id}");
exit();
?>
