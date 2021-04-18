<?php
// votre code php ici ...
;?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dw shop | Connexion</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/auth/auth.css">
    <script src="assets/js/auth.js" defer></script>
  </head>

  <body>
    <main>
      <div class="container">
        <form method='POST'>
          <fieldset>
            <!-- emplacement message d'erreur si mot de passe invalide ou utilisateur non trouvé -->
            <div>
              <input placeholder=" " autocomplete="off" type="email" name="email" id="email">
              <label for="email">Email</label>
            </div>
            <!-- emplacement message d'erreur email -->
            <div class="password__container">
              <span class="eye--open"></span>
              <input placeholder=" " autocomplete="off" type="password" name="password" id="password">
              <label for="password">Mot de passe</label>
            </div>
            <!-- emplacement message d'erreur mot de passe -->
            <div>
              <button type="submit">Se connecter</button>
              <a href="signup.php">pas de compte ?</a>
            </div>
          </fieldset>
        </form>
        <div class="blur"></div>
      </div>
    </main>

  </body>

</html>