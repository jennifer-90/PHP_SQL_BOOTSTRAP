<?php


############# - FONCTION POUR CONNEXION DB- #################

function connect(){

    global $connect;

    if(is_a($connect, 'PDO')){
        return $connect;

    } else {
            try{$connect = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PASSWORD);

                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    /* --> Avec l'utilisation de la méthode setAttribute(), une exception PDO serait automatiquement
                    levée lorsque la requête SQL échoue à cause de l'email en double, avec un message d'erreur clair tel que "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry 'john@example.com' for key 'email'".

                            --> IMPORTANT DONC DE METTRE CETTE METHODE ! -- */

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        *   - PDO::ERRMODE_SILENT : PDO ne génère aucune erreur ou avertissement en cas d'échec d'une requête SQL.   *
        *   - PDO::ERRMODE_WARNING : PDO génère une alerte (avertissement) en cas d'échec d'une requête SQL, mais    *
        *                            l'exécution du code continue.                                                   *
        *   - PDO::ERRMODE_EXCEPTION : PDO génère une exception en cas d'échec d'une requête SQL, ce qui interrompt  *
        *                            l'exécution du code et permet de capturer l'erreur de manière précise.          *
        * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  */

            }catch(PDOException $exception){
                die('Erreur'.$exception->getMessage());
            }
            return $connect; /*** si le "try" se passe bien --> return $connect  ***/
    }
}


