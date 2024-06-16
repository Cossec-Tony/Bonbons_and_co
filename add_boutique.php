<?php
include_once('head.php');
include_once('header.php');
require 'db.php';

if (isset($_SESSION['role']) && $_SESSION['role'] !== 'admin') {
    header("Location: boutiques.php");
    exit();
}
?>

<body>
    <main>
        <form action="insert_boutique.php" method="post">
            <br><br><br>
            <h2>Ajouter une nouvelle boutique</h2>
            <label for="nom">Nom de la boutique:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="numero_rue">Numéro de rue:</label>
            <input type="text" id="numero_rue" name="numero_rue" required>

            <label for="nom_adresse">Nom de l'adresse:</label>
            <input type="text" id="nom_adresse" name="nom_adresse" required>

            <label for="code_postal">Code postal:</label>
            <input type="text" id="code_postal" name="code_postal" required>

            <label for="ville">Ville:</label>
            <input type="text" id="ville" name="ville" required>

            <label for="pays">Pays:</label>
            <input type="text" id="pays" name="pays" required>

            <button type="submit" class="submit-button">Ajouter</button>
        </form>
    </main>
</body>
</html>
