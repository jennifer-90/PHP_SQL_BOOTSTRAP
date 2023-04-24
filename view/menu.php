<?php

?>


<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Accueil</a>
    <a class="navbar-brand" href="index.php?view=view/contact">Contact</a>
    <a class="navbar-brand" href="index.php?view=view/profile">Profil</a>
    <a class="navbar-brand" href="index.php?view=view/create">Création du profil</a>

    <?php
        if(!empty($_SESSION['user_id'])){
            ?>
            <a class="navbar-brand" href="index.php?view=view/logout">Déconnexion</a>
            <?php
            } else {
                echo '<a class="navbar-brand" href="index.php?view=view/login">Se connecter</a>';
            }
            ?>
</nav>