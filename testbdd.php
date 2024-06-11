<?php
include_once("db.php");

$a = requete("SELECT * FROM utilisateurs");

echo ("<pre>");
print_r($a);
echo ("</pre>");

?>