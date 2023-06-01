<?php

?>


<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Accueil</a>
    <a class="navbar-brand" href="index.php?view=view/contact">Contact</a>
    <a class="navbar-brand" href="index.php?view=view/profile">Profil</a>
    <a class="navbar-brand" href="index.php?view=view/create">Création du profil</a>
    <?php
    if(!empty($_SESSION['userId'])){
        ?>

        <a href="index.php?view=view/logout" class="navbar-brand">Déconnexion</a>

        <?php
    } else {
        ?>

        <a href="index.php?view=view/login" class="navbar-brand">Se connecter</a>

    <?php
    }
    ?>
</nav>




