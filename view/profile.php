<?php

?>

<table class="table table-striped">

    <thead>
    <tr>
        <th scope="col">Champs</th>
        <th scope="col">Informations</th>
    </tr>
    </thead>


    <tbody>

    <?php
    if((!empty($_POST['login'])) && (!empty($_POST['email'])) && (!empty($_POST['pwd']))) {
        foreach ($_POST as $key => $values) {
            echo '<tr><td>' . $key . '</td><td> ' . $values . '</td></tr>';
        }
    }
    ?>

    </tbody>
</table>
