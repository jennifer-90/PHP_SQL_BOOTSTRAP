<?php

/* -- view/login  ==>  °°app/login°°  ==>  view/profile  -- */


/* généré notre message d'erreur via deux viariables
iniation de valeur par défaut de nos variables*/
$message= '';
$url= 'index.php?view=view/login'; // si problème de connexion => on renvoi vers login


if(!empty($_POST['login']) && !empty($_POST['pwd'])){
    /* on test si notre login existe via ntre fct checkLogin*/

    if(checkLogin($_POST['login'])){
        /* du coup on va chercher toutes les infos lié au login */

        $user = getUser('login', $_POST['login']);
        /* contenu de user= toutes les infos du login recherché */
        /* ici user est un objet donc on fera:$user->pwd
        si user avait été un tableau (via le fetchall dans la fct au lieu de fetchobject, on aurait fait: $user['pwd']
          */

        if(password_verify($_POST['pwd'], $user->pwd)){
            /* et si le password est coorect alors on connect l'utilisateur */


            /* Ne pas oublier de mettre session_start() dans index */

            /* on afecte une valeur à $_SESSION['userId'] => la valeur id, car en $_SESSION on fait tjs référence au
            id */
            /* * * * * * * * * * * * * * * * * * * * * * * * * * *
             * -- Note du prof: pour une meilleur sécu:          *
             *                                                   *
             * if(!empty($user->id)) {                           *
             *   $_SESSION['userid'] = $user->id;                *
             *                                                   *
             * * * * * * * * * * * * * * * * * * * * * * * * * * */

            $_SESSION['userId']=$user->id; // cette session "userId" contient l'id de l'utilisateur connecté.
            $message.='Bienvenue '.$_POST['login'].' :) ';
            /* OU : $message.='Bienvenue '.$user->login.' :)';    */

            /* Permet de garder les données de l'utilisateur sur chaque page où l'on va */
            /* userId, ou autre nom */
            $url= 'index.php?view=view/profile';
            $_SESSION['alert-color']='success';

/*-- SINON PROBLEME CONNEXION: sinon pour chaque problème:  --*/

        } else {
            $url= 'index.php?view=view/login';// pas obliger de le mettre vu que c'est la valeur par défaut
            $message.= 'Mauvais password ;( ';
        }
    }  else {
        $url= 'index.php?view=view/login';/* pas obliger de le mettre vu que c'est la valeur par défaut, dc ne pas la
        mettre */
        $message.= 'Le '.$_POST['login'].' n\'existe pas';
    }

} else{
    $url= 'index.php?view=view/login';/* pas obliger de le mettre vu que c'est la valeur par défaut, dc ne pas la
        mettre */
    /* - si l'user n'a rien mit ds les champs - */

    $message='Il manque votre<br>';

    if(empty($_POST['login'])){
        $message.='- login<br>';
    }

    if(empty($_POST['pwd'])){
        $message.='- pwd';
    }

}




$_SESSION['alert']=$message;
header('location: '.$url);