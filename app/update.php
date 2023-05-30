<?php

if(!empty($_POST['login']) && !empty($_POST['email'])){

    if (!empty($_SESSION['userId'])){
        $user = getUser('id', $_SESSION['userId']);

        if ($user->login == $_POST['login']){
            /*-- Connexion à la base de donnée --*/

            foreach ($_POST as $key => $value) {
                $$key = $value;
            }




            global $connect;


            /*-- Préparation de la requête - REQUETE --*/
            $sql="UPDATE user SET email = ? WHERE id = ? ";
            $param = [
                $email, $user->id
            ];

            $requete= $connect->prepare($sql);

            $requete->execute($param);

            if($requete->rowCount()){
                echo 'C\est ok';
            } else{
                header('location: index.php?view=view/profile');
                die;
            }

        }
    }

} else {
    echo "datas missing";
}

