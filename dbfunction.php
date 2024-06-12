<?php

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
