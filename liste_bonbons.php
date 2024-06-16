<?php
session_start();
require 'db.php';

// Vérification de la session et récupération de l'ID de la boutique
$boutique_id = $_GET['boutique_id'] ?? null;
if (!$boutique_id) {
    echo "Boutique non spécifiée.";
    exit;
}

$sql = "SELECT id, nom, prix, illustration FROM confiseries";
$stmt = $PDO->prepare($sql);
$stmt->execute();
$bonbons = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des bonbons</title>
    <link rel="stylesheet" href="./style/styles_liste_bonbons.css">
</head>
<body>
    <?php include_once('header.php'); ?>

    <main>
        <br><br><br>
        <h2>Liste des bonbons disponibles</h2>
        <div class="bonbons-list">
            <?php foreach ($bonbons as $bonbon) : ?>
                <div class="bonbon-item">
                    <img src="img/<?php echo $bonbon['illustration'] ?: 'bonbonsDivers.png'; ?>" alt="<?php echo htmlspecialchars($bonbon['nom']); ?>">
                    <h3><?php echo htmlspecialchars($bonbon['nom']); ?></h3>
                    <p>Prix : <?php echo htmlspecialchars($bonbon['prix']); ?> €</p>
                    <form action="add_bonbon_boutique.php" method="post">
                        <input type="hidden" name="boutique_id" value="<?php echo $boutique_id; ?>">
                        <input type="hidden" name="confiserie_id" value="<?php echo $bonbon['id']; ?>">
                        <label for="quantite_<?php echo $bonbon['id']; ?>">Quantité :</label>
                        <input type="number" id="quantite_<?php echo $bonbon['id']; ?>" name="quantite" value="1" min="1" required>
                        <button type="submit">Ajouter</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include_once('footer.php'); ?>
</body>
</html>
