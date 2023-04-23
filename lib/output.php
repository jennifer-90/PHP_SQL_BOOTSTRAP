<?php

/* LIBRAIRIES DE NOS FONCTIONS*/



function getContent(string $string):void {

        if(is_array(FILES_EXT)){
        foreach(FILES_EXT as $key)
            $file_name=$string.$key;

        if(file_exists($file_name)){
            include_once $file_name;
        }
    }
}