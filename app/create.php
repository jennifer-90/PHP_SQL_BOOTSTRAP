
  <?php

  $url = 'index.php?view=view/create';

  if(!empty
      ($_POST['login'])
        && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        && (!empty($_POST['pwd']))
  ){


        /* -- Vérification si l'utilisateur existe déjà via notre fonction créer dans lib/user.php-- */

        if (userExists($_POST['login'])) {
          $_SESSION['alert'] = 'L\'utilisateur existe déjà!';
          header('Location: ' . $url);
          die;
        }



      foreach ($_POST as $key => $value) {
          $$key = $value;
      }



      $params = [
          trim($login),
          password_hash($pwd, PASSWORD_DEFAULT),
          $email
      ];



      /* CONNECT */
      global $connect;

      /* QUERY */
      $insert = $connect->prepare("INSERT INTO user (login, pwd, email, created) VALUES (?, ?, ?, NOW())");

      /* EXECUTE */
      $insert->execute($params);

      if($insert->rowCount()){

          $user_id = $connect->lastinsertId();
          $_SESSION['alert'] = 'Utilisateur ' . $login . ' a été créé avec succès';
          $_SESSION['alert-color'] = 'success';
          $url= 'index.php?view=view/login';

      } else {
          $_SESSION['alert'] = 'La création de l\'utilisateur a échoué';
      }



  }  /********** Mais si c'est ces champs sont vides.... (Toujours dans le tout 1er "if") **********/
      else {
              $_SESSION['alert'] = 'La création a échoué';
          }
          header('Location: ' . $url);
          die;

