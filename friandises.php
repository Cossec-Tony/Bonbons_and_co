<?php
session_start();
include_once('head.php'); 

$isAuthorized = false;

if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'gerant')) {
    $isAuthorized = true;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre titre</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include_once('header.php'); ?>
    
    <div class="backbutton"><img src="retour" alt="retour"></div>

    <?php
    require 'db.php';


    if (isset($_GET['boutique_id'])) {
        $boutique_id = $_GET['boutique_id'];

        $sql = "
            SELECT b.nom AS boutique_nom, b.numero_rue, b.nom_adresse, b.code_postal, c.illustration, b.ville, b.pays, 
                   c.id AS confiserie_id, c.nom AS confiserie_nom, s.quantite
            FROM boutiques b
            LEFT JOIN stocks s ON b.id = s.boutique_id
            LEFT JOIN confiseries c ON s.confiserie_id = c.id
            WHERE b.id = ?
            ORDER BY c.nom
        ";  
        $stmt = $PDO->prepare($sql);
        $stmt->execute([$boutique_id]);
        $boutique_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Boutique non spécifiée.";
        exit;
    }

    if (empty($boutique_details)) {
        echo "Aucune friandise trouvée pour cette boutique.";
        exit;
    }

    $boutique = $boutique_details[0];
    ?>

    <div class="shop-detail">
        <h1><?php echo htmlspecialchars($boutique['boutique_nom']); ?></h1>
        <img class="img_boutique" src="./img/boutiqueImg.jpg" alt="">
        <p><?php echo htmlspecialchars("{$boutique['numero_rue']} {$boutique['nom_adresse']}, {$boutique['code_postal']} {$boutique['ville']}, {$boutique['pays']}"); ?></p><br>
        <h2>Bonbons en stock :</h2>
        <div class='bonbons'>
            <?php foreach ($boutique_details as $row) : ?>
                <?php if (isset($row['confiserie_nom'])) : ?>
                    <div class="candy">
                        <a href='produit.php?produit_id=<?php echo $row['confiserie_id']; ?>'>
                            <img class='candy-image' src='img/<?php echo $row['illustration']; ?>' alt='<?php echo $row['confiserie_nom']; ?>'>
                            <p class='candy-name'><?php echo "{$row['confiserie_nom']}"; ?></p>
                            <p class='candy-stock'><?php echo "Quantité en stock : {$row['quantite']}"; ?></p>
                        </a>
                        <?php if ($isAuthorized) : ?>
                            <form action='delete_produit.php' method='post' class='delete-form'>
                            <input type='hidden' name='confiserie_id' value='<?php echo $row['confiserie_id']; ?>'>
                            <input type='hidden' name='boutique_id' value='<?php echo $boutique_id; ?>'>
                            <button type='submit' class='delete-button'>Supprimer</button>
                        </form>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if ($isAuthorized): ?>
        <form action="add_produit.php?boutique_id=<?php echo $boutique_id; ?>" method="post" class="add-form">
            <button type="submit" class="add-button">Ajouter un bonbon</button>
        </form>
    <?php endif; ?>

    <?php include_once('footer.php'); ?>
</body>
</html>
