<?php

/* -- °°view/login°°  ==> app/login ==>  view/profile  -- */
?>

<form action="index.php?view=app/login" method="post">

    <div class="cont">
        <div class="form sign-in">
            <h2>** SE CONNECTER ** </h2>

            <label>
                <span>Name</span>
                <input type="text" name="login" id="login" placeholder="login">
            </label>

            <label>
                <span>Password</span>
                <input type="password" name="pwd" id="pwd" placeholder="pwd">
            </label>

            <button type="submit" class="submit">Connect</button>
        </div>
    </div>

</form>




<script>
    window.addEventListener('load', function () {
        console.log('Cette fonction est exécutée une fois quand la page est chargée.');
    });
</script>
