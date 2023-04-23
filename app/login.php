<?php
/*-----------------------------------*/

if(!empty($_POST['login']) && !empty($_POST['pwd'])) {

    $login = trim($_POST['login']);


    /* - fct créé pour interroger notre db pour savoir si le login existe ou non - */
    $user = getUser($_POST['login']);


    /* - ON DEMARRE LA VERIFICATION - */
    if (password_verify($_POST['pwd'], $user->pwd)) {

        if (!empty($user->id)) {
            $_SESSION['user_id'] = $user->id;

            $sql = "UPDATE user SET lastlogin = NOW() WHERE id = ?";

            /* QUERY */
            $connect = connect();
            $update  = $connect->prepare($sql);

            // EXECUTE
            $update->execute([$user->id]);

            if ($update->rowCount()) {
                echo 'Dernière précédente connexion : ' . $user->lastlogin;
            }
        }
        $url = 'index.php?view=view/profile';

    } else {
        $_SESSION['alert'] = 'Connexion échouée';
        $url               = 'index.php?view=view/login';


    }
    header('Location: ' . $url);
}