<?php

?>

<br><h4>** INSCRIPTION D'UN NOUVEL UTILISATEUR ** </h4><br>

<form action="index.php?view=app/create" method="post">

    <label for="login"></label>
    <input type="text" name="login" id="login" placeholder="login"><br><br>

    <label for="email"></label>
    <input type="email" name="email" id="email" placeholder="email"><br><br>

    <label for="pwd"></label>
    <input type="password" name="pwd" id="pwd" placeholder="pwd"><br><br>

    <input type="submit" class="btn btn-primary" value="SENT" >
    <input type="reset" class="btn btn-primary" value="DELETE">
</form>