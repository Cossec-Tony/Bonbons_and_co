<?php
session_start();
require 'db.php';

$nom_bonbon = '';
$prix = '';
$description = '';
$quantite_stock = '';
$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer données du formulaire
    $nom_bonbon = $_POST['nom_bonbon'] ?? '';
    $prix = $_POST['prix'] ?? '';
    $description = $_POST['description'] ?? '';
    $quantite_stock = $_POST['quantite_stock'] ?? '';

    // Récupérer boutique_id depuis $_GET
    $boutique_id = $_GET['boutique_id'] ?? '';

    if (empty($nom_bonbon)) {
        $errors[] = "Le nom du bonbon est requis.";
    }

    if (!is_numeric($prix) || $prix < 0) {
        $errors[] = "Le prix doit être un nombre positif.";
    }

    if (!is_numeric($quantite_stock) || $quantite_stock < 0) {
        $errors[] = "La quantité en stock doit être un nombre positif.";
    }

    if (empty($errors)) {
        try {
            $sql = "INSERT INTO confiseries (nom, prix, illustration, description) VALUES (?, ?, 'bonbonsDivers.png', ?)";
            $stmt = $PDO->prepare($sql);
            $stmt->execute([$nom_bonbon, $prix, $description]);

            // Récup id de la confiserie ajoutée
            $confiserie_id = $PDO->lastInsertId();

            $sql = "INSERT INTO stocks (boutique_id, confiserie_id, quantite) VALUES (?, ?, ?)";
            $stmt = $PDO->prepare($sql);
            $stmt->execute([$boutique_id, $confiserie_id, $quantite_stock]);

            // Redirection après ajout
            header("Location: friandises.php?boutique_id={$boutique_id}");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Erreur lors de l'ajout du bonbon : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un bonbon</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include_once('header.php'); ?>
    
    <main>
        <br><br><br>
        <form action="add_produit.php?boutique_id=<?php echo htmlspecialchars($_GET['boutique_id']); ?>" method="post">
            <h2>Ajouter un nouveau bonbon</h2>

            <div class="errors">
                <?php if (!empty($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="nom_bonbon">Nom du bonbon :</label>
                <input type="text" id="nom_bonbon" name="nom_bonbon" value="<?php echo htmlspecialchars($nom_bonbon); ?>" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix du bonbon :</label>
                <input type="number" id="prix" name="prix" value="<?php echo htmlspecialchars($prix); ?>" required>
            </div>
            <div class="form-group">
                <label for="quantite_stock">Quantité en stock :</label>
                <input type="number" id="quantite_stock" name="quantite_stock" value="<?php echo htmlspecialchars($quantite_stock); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description"><?php echo htmlspecialchars($description); ?></textarea>
            </div>
            <button type="submit" class="submit-button">Ajouter</button>
        </form>
    </main>

    <?php include_once('footer.php'); ?>
</body>
</html>
