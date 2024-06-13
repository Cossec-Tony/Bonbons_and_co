<?php
include_once('head.php');
include_once('header.php');
require 'db.php';
?>

<?php
if (isset($_GET['boutique_id'])) {
    $boutique_id = $_GET['boutique_id'];

    // Récupération des informations de la boutique et des bonbons en stock
    $sql = "
        SELECT b.nom AS boutique_nom, b.numero_rue, b.nom_adresse, b.code_postal, b.ville, b.pays, 
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

<body>
    <div class="shop-detail">
        <img class="img_boutique" src="./img/boutiqueImg.jpg" alt="">
        <h1><?php echo htmlspecialchars($boutique['boutique_nom']); ?></h1>
        <p><?php echo htmlspecialchars("{$boutique['numero_rue']} {$boutique['nom_adresse']}, {$boutique['code_postal']} {$boutique['ville']}, {$boutique['pays']}"); ?></p>
        <h2>Bonbons en stock :</h2>
        <ul>
            <?php
            foreach ($boutique_details as $row) {
                if ($row['confiserie_nom']) {
                    echo "
                    <a href='produit.php?produit_id={$row['confiserie_id']}'>
                    <li>{$row['confiserie_nom']}: {$row['quantite']} en stock</li>
                    </a>
                    ";
                } 
            }
            ?>
        </ul>
    </div>
</body>
</html>


<?php
include_once('footer.php');
?>
