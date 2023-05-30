<?php
$user = getUser('id', $_SESSION['userId']);
?>

<form action="index.php?view=app/update" method="post">
    <label>
        <span>Name</span>
        <input type="text" name="login" id="login" value="<?php echo $user->login ?>">
    </label>

    <label>
        <span>Email</span>
        <input type="email" name="email" id="email" value="<?php echo $user->email ?>">
    </label>

    <label>
        <span>Country</span>
        <input type="text" name="country" id="country" value="<?php echo $user->country ?>">
    </label>

    <input type="submit">

</form>
