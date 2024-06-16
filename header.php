<header>
    <section class="box-logo">
        <a href="./index.php"><img class="logo" src="img/03.jpg" alt="logo confiz"></a>    
    </section>
    
    <section class="box-nav">
        <nav id="navigation">
            <ul>
                <li><a href="./index.php<?php echo isset($_SESSION['user_id']) ? '?user_id=' . $_SESSION['user_id'] : ''; ?>"><span class='bouton-nav'>Accueil</span></a></li>
                <li><a href="./boutiques.php<?php echo isset($_SESSION['user_id']) ? '?user_id=' . $_SESSION['user_id'] : ''; ?>"><span class='bouton-nav'>Boutiques</span></a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="./logout.php"><span class='bouton-nav'>Déconnexion</span></a></li>
                <?php else: ?>
                    <li><a href="./connexion.php"><span class='bouton-nav'>Connexion</span></a></li>
                <?php endif; ?>
            </ul>
        </nav>       
    </section>
</header>
