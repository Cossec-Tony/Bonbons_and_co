<?php
require 'db.php';
session_start();


$sql = "
    SELECT b.id, b.nom AS boutique_nom, b.numero_rue, b.nom_adresse, b.code_postal, b.ville, b.pays, 
           c.nom AS confiserie_nom, s.quantite
    FROM boutiques b
    LEFT JOIN stocks s ON b.id = s.boutique_id
    LEFT JOIN confiseries c ON s.confiserie_id = c.id
    ORDER BY b.id, c.nom
"; 
$boutiques = $PDO->query($sql)->fetchAll(PDO::FETCH_ASSOC);

include_once('head.php');
include_once('header.php');


$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>

<body>
    <h1 class="gtitre">Nos boutiques</h1>
    <div class="shops">
        <?php
        $current_boutique = null;
        foreach ($boutiques as $row) {
            if ($current_boutique !== $row['id']) {
                if ($current_boutique !== null) {
                   
                    if ($isAdmin) {
                        echo "
                            <form action='delete_boutique.php' method='post' class='delete-form'>
                                <input type='hidden' name='boutique_id' value='{$current_boutique}'>
                                <button type='submit' class='delete-button'>Supprimer la boutique</button>
                            </form>
                        ";
                    }
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
            
            if ($row['confiserie_nom']) {
                echo "<p>- {$row['confiserie_nom']}: {$row['quantite']} en stock</p>";
            }
        }

        if ($current_boutique !== null) {
            
            if ($isAdmin) {
                echo "
                    <form action='delete_boutique.php' method='post' class='delete-form'>
                        <input type='hidden' name='boutique_id' value='{$current_boutique}'>
                        <button type='submit' class='delete-button'>Supprimer la boutique</button>
                    </form>
                ";
            }
            echo "</div>";
        }
        ?>
    </div>

    <?php if ($isAdmin): ?>
        <form action="add_boutique.php" method="post" class="add-form">
            <button type="submit" class="add-button">Ajouter une boutique</button>
        </form>
    <?php endif; ?>

    <?php include_once('footer.php'); ?>
</body>
</html>
