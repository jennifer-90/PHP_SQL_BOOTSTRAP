<?php

/* LES CONSTANTES : */

const ROOT_PATH = __DIR__;

/* -
Par exemple, si le fichier qui contient cette instruction se trouve dans le répertoire /var/www/html/projet/, alors ROOT_PATH sera défini comme /var/www/html/projet/. On peut ensuite utiliser cette constante pour construire des chemins de fichiers relatifs en utilisant des concaténations, par exemple ROOT_PATH . '/images/photo.jpg' pour obtenir le chemin absolu complet vers un fichier photo.jpg dans le répertoire images du projet.
- */

const FILES_EXTENSIONS=['.html','.php'];


const DB_NAME = 'evalphp';
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PWD = '';
