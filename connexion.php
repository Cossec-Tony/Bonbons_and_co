<?php
include_once('head.php');
?>




<body>
    <?php
        include_once('header.php');
    ?>
    <main>
        <section class="form-container">
            <h2>Inscription Utilisateur</h2>
            <form action="submit.php" method="post">    
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
                
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                                
                <input type="submit" value="Envoyer">
            </form>
        </section>
    </main>
<?php
include_once('footer.php')
?>
</body>
</html>
