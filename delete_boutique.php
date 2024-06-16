<?php
require 'db.php';

session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin' && isset($_POST['boutique_id'])) {
    $sql = "DELETE FROM boutiques WHERE id = :id";
    $params = ['id' => $_POST['boutique_id']];
    requete_preparee($sql, $params);
}

header("Location: boutiques.php");
exit();
?>
