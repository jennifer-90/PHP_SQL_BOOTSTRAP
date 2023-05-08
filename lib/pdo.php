<?php

############# - FONCTION POUR CONNEXION DB- #################
function connect(){

    global $connect; // il y'a un $connect qui a été définit ds le projet, on va la rechercher et la mettre ds notre fct

    if(is_a($connect, 'PDO')){  // si il est déjà connecté à la db, alors on ne fait rien,d'où le return
        return $connect;

    }
    else{
        // On utilise le try/catch -> système de protection contre les erreurs => il affichera le message si problème
        // dans ce cas-ci.

        try{ $connect= new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8', DB_USER,DB_PWD);

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
        }

        catch(PDOException $exception){
            die('Erreur'.$exception->getMessage());// On affiche l'explication de l'erreur
        }

        return $connect; /*** si le "try" se passe bien --> return $connect  ***/
    }

}
