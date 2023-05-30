<?php


/* -- view/login  ==>  app/login  ==>  °°view/profile°°  -- */


if(!empty($_SESSION['userId'])){

    $user=getUser('id', $_SESSION['userId']);
    /* -->  getUser => permet de récuperer les infos lié à un champs/valeur - dans ce cas-çi l'id -- */
    ?>
<table class="table">
    <thead>
        <tr>
            <th>Intitulé</th>
            <th>Valeurs</th>
        </tr>
    </thead>

    <tbody>
        <?php
         foreach($user as $key=> $value){
             if ($key == 'pwd' or $key == 'id'){
                 continue;
             }
             echo '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
         }
        ?>
    </tbody>
</table>

<?php

echo '<hr><h2>Modificiation du profil:<h2>';
include 'update.php';
}