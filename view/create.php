<?php

/* -- °°view/create°°  ==> app/create ==> DB  -- */

?>

<form action="index.php?view=app/create" method="post" enctype="multipart/form-data">  <!-- enctype = on va mettre
autre chose que du post (ex file)
 -->

    <div class="cont">
        <div class="form sign-in">
            <h2>** REJOINS-NOUS ! ** </h2>

            <label>
                <span>Name</span>
                <input type="text" name="login" id="login" placeholder="login">
            </label>

            <label>
                <span>Email</span>
                <input type="email" name="email" id="email" placeholder="email">
            </label>

            <label>
                <span>Password</span>
                <input type="password" name="pwd" id="pwd" placeholder="pwd">
            </label>

            <label>
                <span>Country</span>
                <input type="text" name="country" id="country" placeholder="country">
            </label>

            <label>
                <span>Photo</span>
                <input type="file" name="photo" id="photo" accept="image/jpeg, image/png">
            </label>

            <button type="submit" class="submit">S'inscrire</button>


        </div>
    </div>

</form>








<script>
    window.addEventListener('load', function () {
        console.log('Cette fonction est exécutée une fois quand la page est chargée.');
    });
</script>
