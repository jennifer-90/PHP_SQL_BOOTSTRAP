<?php

/* -- view/create  ==> °°app/create°° ==> DB  -- */


if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['pwd'])){

    foreach($_POST as $key => $values) {
        $$key = $values;
    }


    /* connect */
    global $connect;

   /* préparation de la requête sql = QUERY */
    $sql="INSERT INTO user (login, email, pwd, created) VALUES ( ?, ?, ?, NOW())";

    $param=[
        $login,
        $email,
        password_hash($pwd,PASSWORD_DEFAULT)
    ]; // suivre l'ordre de la requête(login,email,pwd)

    /* excécuté la requête sql = QUERY */

    $requete = $connect->prepare($sql);
    // en utilisant le prépare => on s'assure qu'on évite les injections sql(=requêtes préparées)

    $requete->execute($param);

        //rowCount => elle va compter si il y'a une ligne de plus avec la requêtes faite. si pas de ligne=> problème.
        // d'où le test
        if($requete->rowCount()){

            header('location:index.php?view=view/login'); //header= redirection
           $_SESSION['alert']='Bienvenue chez nous '.$login. '!';
           $_SESSION['alert-color']='success';

        }

/*-- SINON PROBLEME CONNEXION: sinon pour chaque problème:  --*/


        else{
            echo 'Il y\'a eu un problème, veuillez recommencer';
            header('location:index.php?view=view/create');
        }

} else{
    /* 1er if - si les champs sont vides...: */
    header('location:index.php?view=view/create');
    echo 'Veuillez remplir tout les champs';
}