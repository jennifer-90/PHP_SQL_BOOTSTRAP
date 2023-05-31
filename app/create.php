<?php

/* -- view/create  ==> °°app/create°° ==> DB  -- */

$url = 'index.php?view=view/create';

$msg = 'Création réussie ! <br>';

if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['pwd'])){

    foreach($_POST as $key => $values) {
        $$key = $values;
    }

    $param=[
        $login,
        $email,
        password_hash($pwd,PASSWORD_DEFAULT)
    ]; // suivre l'ordre de la requête(login,email,pwd)


    /* - Si l'utilisateur veut rajouter un country, ce qui n'est pas obligatoire dans ce cas - */
    $field = '';
    $value = '';

    if(!empty($_POST['country'])){
        $field = ', country';
        $value = ', ?';
        $param[] = $country;
    }



    /* connect */
    global $connect;

    /* préparation de la requête sql = QUERY */
    $sql="INSERT INTO user (login, email, pwd, created $field) VALUES ( ?, ?, ?, NOW() $value)";



    /* excécuté la requête sql = QUERY */

    $requete = $connect->prepare($sql);
    // en utilisant le prépare => on s'assure qu'on évite les injections sql(=requêtes préparées)

    $requete->execute($param);

    //rowCount => elle va compter si il y'a une ligne de plus avec la requêtes faite. si pas de ligne=> problème.
    // d'où le test
    if($requete->rowCount()){

        $user_id = $connect->lastInsertId();
        /* on affecte à la  variable = le dernier id inséré dans la bd, on va utilisé cette variable pour donner un
        nom à l'image que l'utilisateur aura inséré sur son profil. exemple: si son id est "3" le nom de l'image sera
         "3" - */


        /* - Message en cas de réussite de création de profile : - */
        $msg.='Bienvenue chez nous '.$login. ' !';
        $_SESSION['alert-color']='success';
        $url = 'index.php?view=view/login';

         /* - var_dump($_FILES); - -  On test le résultat de l'insertion de l'image */

        if($_FILES['photo']['tmp_name'] && $_FILES['photo']['name']) {
            /* - tmp_name = Accéder au chemin d'accès temporaire du fichier téléchargé  cfr var_dump - */
            if ($_FILES['photo']['type'] == 'image/png' || $_FILES['photo']['type'] == 'image/jpeg') {
                /* - Dans le input de view/create on a définit les types acceptées d'iamges - */
                if ($_FILES['photo']['size'] <= 1024000) {


                    /* - L'image se copie sur le serveur- */

                    $imgPath = ROOT_PATH . '/img/profile/';
                    /* - On détermine le chemin de l'image téléchargé (dans le dossier créé "img/profile" que l'on affecte
                    dans la variable $imgPath ( cfr dans config.php) - */

                    /* - On test pour voir si le chemin existe, si il n'existe pas, si c'est "false" alors ... */
                    if (is_dir($imgPath . $user_id) == false) {


                        /* - on crée lechemin "img/profile/" + "dossier/fichier" via la fonction native "mkdir" - */
                        mkdir($imgPath . $user_id, 0755); /* - 0755 => mode de permission/ TJS le même - */
                    }


                    /* -

                    basename est une fonction native qui renvoie le nom du fichier d'une chemin donné.
                    Exemple: si le chemin complet est "/chemin/vers/monfichier.jpg", la fonction basename() renverra
                    "monfichier.jpg".
                   $basename sera donc la variable qui stocke le nom du fichier téléchargé, sans le chemin complet. - */
                    $basename = basename($_FILES['photo']['name']);
                    /* - Dans ce cas ci, le nom du fichier est celui encore de l'utilisateur - */


                    /* - On va modifier le nom de ce fichier - 2 solutions possibles :  */
                    $basename = $user_id . '.' . substr($_FILES['photo']['type'], 6, 4);
                    /* -  https://www.php.net/manual/fr/function.substr.php - */

                    /* -

                    2ème solution = $basename = $user_id. '.'. substr($_FILES]['photo']['type'], strpos
                    ($_FILES['photo']['type'], '/') +1, 4);

                    - */

                    /* - On va déplacer le fichier via la fonction native " move_uploaded_file"
                    vers le dossier img/profile/ + nom du fichier  ==> tout ça affecté dans une variable - */
                    $move = move_uploaded_file($_FILES['photo']['tmp_name'], $imgPath . $user_id . '/' . $basename);
                    /* - https://www.php.net/manual/fr/function.move-uploaded-file.php - */


                    if ($move) {
                        $_SESSION['alert'] .= '<br>L\'image de profil a été correctement envoyé';
                    } else {
                        $_SESSION['alert'] .= '<br> L\'image de profil n\'a pas été correctement envoyé';
                    }

                } else {
                    $_SESSION['alert'] .= '<br> L\'image est trop grande';
                }
            }else {
            $_SESSION['alert'] .= '<br> L\'image n\'est pas dans le bon format jpeg ou jpg';
            }
        } else {
            $_SESSION['alert'] .= '<br> pas d\image';
            }

  }/*-- SINON PROBLEME CONNEXION: sinon pour chaque problème:  --*/
    else{
        $msg.='Il y\'a eu un problème, veuillez recommencer';
    }

} else{
    /* 1er if - si les champs sont vides...: */
    $msg.= 'Veuillez remplir tout les champs';
}

$_SESSION['alert'] = $msg;
header('location: '.$url);
die;
