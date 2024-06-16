<?php
session_start();
require 'db.php';

if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'gerant') && isset($_POST['confiserie_id']) && isset($_POST['boutique_id'])) {
    $confiserie_id = $_POST['confiserie_id'];
    $boutique_id = $_POST['boutique_id'];

    try {
        // Supprimer seulement l'entrée dans la table stocks
        $sql_delete_stocks = "DELETE FROM stocks WHERE confiserie_id = :confiserie_id AND boutique_id = :boutique_id";
        $stmt_delete_stocks = $PDO->prepare($sql_delete_stocks);
        $stmt_delete_stocks->execute(['confiserie_id' => $confiserie_id, 'boutique_id' => $boutique_id]);

        // Redirection vers la page de détail de la boutique après suppression
        header("Location: friandises.php?boutique_id={$boutique_id}");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression du bonbon : " . $e->getMessage();
    }
} else {
    echo "Action non autorisée ou paramètres manquants.";
}
?>
