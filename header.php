<?php
include_once('head.php');
?>

<body>
    <header>
        <section class="box-logo">
            <a href="./index.php"><img class="logo" src="img/03.jpg" alt="logo confiz"></a>    
        </section>
        
        <section class="box-nav">
            <nav id="navigation">
                <ul>
                    <a href="./index.php<?php echo isset($_SESSION['user_id']) ? '?user_id=' . $_SESSION['user_id'] : ''; ?>"><li class='bouton-nav'>Accueil</li></a> 
                    <a href="./boutiques.php<?php echo isset($_SESSION['user_id']) ? '?user_id=' . $_SESSION['user_id'] : ''; ?>"><li class='bouton-nav'>Boutiques</li></a>
                    <?php if (isset($_SESSION['username'])): ?>
                        <a href="./logout.php"><li class='bouton-nav'>Déconnexion</li></a>
                    <?php else: ?>
                        <a href="./connexion.php"><li class='bouton-nav'>Connexion</li></a>
                    <?php endif; ?>
                </ul>
            </nav>       
        </section>
    </header>
</body>
