<?php

//try to connect with the server using the database connection information in defined in constants.php
try {
    $PDO = new PDO(
        DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';port=' . DB_PORT,
        DB_USERNAME,
        DB_PASSWORD
    );
} catch (Exception $ex) {
    echo ($ex->getMessage());
    die;
}

//Magie noir mais ça marche
function requete_preparee($sql, $params) {
    global $PDO;
    // Requête préparer qui protège contre les injections SQL
    $stmt = $PDO->prepare($sql);
    // Execute la requête
    $stmt->execute($params);
    return $stmt->fetchAll();
}

?>


