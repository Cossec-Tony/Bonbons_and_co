<?php
include_once('head.php');
include_once('header.php');
require 'db.php';

// Récupération des informations des boutiques et des stocks
$sql = "
    SELECT b.id, b.nom AS boutique_nom, b.numero_rue, b.nom_adresse, b.code_postal, b.ville, b.pays, 
           c.nom AS confiserie_nom, s.quantite
    FROM boutiques b
    LEFT JOIN stocks s ON b.id = s.boutique_id
    LEFT JOIN confiseries c ON s.confiserie_id = c.id
    ORDER BY b.id, c.nom
"; 
$boutiques = $PDO->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <h1 class="gtitre">Nos boutiques</h1>
    <div class="shops">
        <?php
        $current_boutique = null;
        foreach ($boutiques as $row) {
            if ($current_boutique !== $row['id']) {
                if ($current_boutique !== null) {
                    // Fin de la précédente boutique
                    echo "</div>";
                }

                echo "
                <a href='friandises.php?boutique_id={$row['id']}' class='shop-link'>
                <div class='shop'>
                    <img src='./img/boutiqueImg.jpg' alt='Image de la boutique' class='shop-image'>
                    <h2 class='shop-name'>{$row['boutique_nom']}</h2>
                    <p class='shop-address'>{$row['numero_rue']} {$row['nom_adresse']}, {$row['code_postal']} {$row['ville']}, {$row['pays']}</p>
                    <p class='shop-stock'>Quantité de bonbons en stock :</p>
                ";
                $current_boutique = $row['id'];
            }
            // Affichage des confiseries et de leurs quantités pour la boutique actuelle
            if ($row['confiserie_nom']) {
                echo "<p>- {$row['confiserie_nom']}: {$row['quantite']} en stock</p>";
            }
        }
        if ($current_boutique !== null) {
            // Fin de la dernière boutique
            echo "</div>";
        }
        ?>
    </div>
    <?php
        include_once('footer.php');
    ?>


<?php
include_once('footer.php');
?>