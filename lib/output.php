<?php

/* LIBRAIRIES DE NOS FONCTIONS*/


############# - FONCTION POUR EXTENSION - #################
function getContent(string $string):void{

    if(is_array(FILES_EXTENSIONS)){
        foreach(FILES_EXTENSIONS as $key){
            $file_name= $string.$key;

            if(file_exists($file_name)){
                include_once $file_name;
            }

           /* else {

                echo 'Cette page n\'existe pas'; // ou un inlcude avec une "page_erreur.php" (ex: erreur 404)
            }
           */
        }
    }
}





