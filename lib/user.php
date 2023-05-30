<?php

/*--------1fct------------*/
/* - Return (n'affiche rien) la liste des logins de la db - */
function getLogins():array{

    global $connect;
    $sql="SELECT login FROM user";

    /* QUERY */
    $requete=$connect->prepare($sql);

    /* EXCUTION REQUETE*/

    $requete->execute();
    $resultat=$requete->fetchAll();
    $tableau =[];
    foreach($resultat as $item){
        $tableau[] = $item['login'];
    }
    return $tableau;
}



/*--------2fct------------*/
############# - FONCTION - VERIFICATION USER EXISTE DANS DB- ################################################
/* note prof: function userExists */
/* -- cherche si le login exist dans la db -- */

function checkLogin(string $login):bool{
    $listeLogins= getLogins();// Résultat de la fct getUsers()
    if(in_array($login, $listeLogins)){
        return 1;
    } else{
        return 0;
    }
}



/*--------3fct------------*/
/* on va recuperer tout les champs d'une table ex: user => login, country, pwd,...  */

function getChamps():array{
    global $connect;
    $sql="DESCRIBE USER";
    $requete = $connect->prepare($sql);
    $requete->execute();
    $resultat= $requete->fetchAll();
    $tableau=[];
    foreach( $resultat as $key){
        $tableau[]=$key['Field'];
    }
    return $tableau;
}






/*--------4fct------------*/

/* - fct pemet de récupérer toutes les infos d'un utilisateur - */
/* - champs: ex:login ; valeur: ex:jen - */
function getUser(string $champs, string $valeur ){
    if(in_array($champs, getChamps())){
        global $connect;
        $sql='SELECT * FROM user WHERE '.$champs.' = ?';
        //champs peut être un "id", un "login",ect tant que ça un rapport avec la table user.

        $param=[$valeur]; /*ex:$valeur= Jen, Belgique, .. */
        /* les paramètres c'est TJRS un tableau */

        $requete=$connect->prepare($sql);

        $requete->execute($param);

        /* fetchobject= on récupère le résultat de notre $requete et on va pouvoir l'utiliser*/

        return $requete->fetchObject();
    }
    else{
        return false;
    }

}
