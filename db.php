<?php

// Si vous voulez éviter les problèmes vous devez ignorer ce fichier en l'ajoutant au .gitignore

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const DB_DRIVER = 'mysql';
const DB_HOST = '127.0.0.1';
const DB_PORT = 3306;
const DB_USERNAME = 'root';
const DB_PASSWORD = 'Maison99100.';
const DB_DATABASE = 'bddSAE203'; // Nom de votre base de données

try {
    $PDO = new PDO(
        DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';port=' . DB_PORT,
        DB_USERNAME,
        DB_PASSWORD
    );
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo ($ex->getMessage());
    die;
}

function requete_preparee($sql, $params) {
    global $PDO;
    $stmt = $PDO->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}
?>
