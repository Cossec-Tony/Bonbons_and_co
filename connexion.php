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
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required>

                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>    
                
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
                
                <label for="ddn">Date de naissance:</label>
                <input type="date" id="ddn" name="ddn" required>
                
                <input type="submit" value="Envoyer">
            </form>
        </section>
    </main>
</body>
</html>
