
  <?php

  $url = 'index.php?view=view/create';

  if((!empty($_POST['login'])) && (!empty($_POST['email'])) && (!empty($_POST['pwd']))) {

    if (userExists('login', $_POST['login'])) {
      $_SESSION['alert'] = 'L\'utilisateur existe déjà!';
      header('Location: ' . $url);
      die;
    }








  }

