<?php
include_once('head.php');
?>

<body>
    <?php
        include_once('header.php');
    ?>
    <main>
        <section class="form-container">
            <h2>Connexion</h2>
            <form id="loginForm" action="submit.php" method="post">    
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
                
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <?php
                     if (isset($_GET['error'])) {
                        echo '<span id="errorMessage" class="error">' . ($_GET['error']) . '</span>';
                    } else {
                        echo '<span id="errorMessage" class="error" style="display: none;"></span>';
                    }
                ?>
                <input type="submit" value="Envoyer">
            </form>
        </section>
    </main>
<?php
include_once('footer.php')
?>
</body>
</html>
