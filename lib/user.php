<?php

############# - FONCTION - VERIFICATION DOUBLON LORS DE LA CREATION - ################################################

/**
 * @param string $login
 * @return object|$0|false|stdClass|null
 */
function getUser(string $login): mixed
{
    $connect = connect(); /* -- la fct se connecte à la db via la fct connect() -- */

    // 2. QUERY
    /* -- prépare une requête sql qui selectionnes toutes les colone de la table "user" dont "login"
            --> tout ceci dans une nouvelle variable: " $request "-- */
    $request = $connect->prepare("SELECT * FROM user WHERE login = ?");

    $params = [
        trim($login),
    ];

    // 3. EXECUTE
    $request->execute($params);

    // 4. FETCH
    /* -- récupère les résultats de la requête en utilisant la méthode " fetchObject()" de l'objet PDOStatement
          $request.  -- */

    return $request->fetchObject();

    /* --  la fct retourne l'objet stdClass représentant l'utilisateur correspondant au nom d'utilisateur
           $login, ou NULL si aucun utilisateur n'a été trouvé -- */

}

############# - FONCTION - VERIFICATION USER EXISTE DANS DB- ################################################


/**
 * @param string $login
 * @return bool
 */
function userExists(string $login): bool
{
    if (is_object(getUser($login))) {
        return true;
    } else {
        return false;
    }
}

/* --

Dans la fonction userExists(),
on vérifie si la valeur retournée par getUser() est un objet avec la fonction "is_object()".

Si c'est le cas, cela signifie qu'un utilisateur existe dans la base de données avec le nom d'utilisateur spécifié,
et donc la fonction retourne true. Sinon, la fonction retourne false. --

*/