<?php
include_once('head.php');
include_once('header.php');
require 'db.php';

if (isset($_GET['produit_id'])) {
    $produit_id = $_GET['produit_id'];

    // Récupération des informations du bonbon
    $sql = "
        SELECT c.nom, c.type, c.prix, c.description, c.illustration
        FROM confiseries c
        WHERE c.id = ?
    "; 
    $stmt = $PDO->prepare($sql);
    $stmt->execute([$produit_id]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$produit) {
        echo "Bonbon non trouvé.";
        exit;
    }
} else {
    echo "Bonbon non spécifié.";
    exit;
}
?>

<body>
    <section id="page-produit">
        <div id="divbonbon">
            <img id="bonbon" src='img/<?php echo ($produit["illustration"]); ?>' alt='<?php echo ($produit["nom"]); ?>'>
        </div>
        <div class="desc">
            <h2 id="name"><?php echo ($produit["nom"]); ?></h2>
            <div><p class="prod-desc">Type :</p><p><?php echo ($produit["type"]); ?></p></div>
            <div><p class="prod-desc">Prix :</p><p><?php echo ($produit["prix"]); ?> €</p></div>
            <div><p class="prod-desc">Description :</p><p><?php echo ($produit["description"]); ?></p></div>
        </div>
    </section>
<?php
include_once('footer.php')
?>
</body>
</html>
