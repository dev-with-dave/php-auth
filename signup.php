<?php
// votre code php ici...

;?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dw shop | Inscription</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/auth/auth.css">
    <script src="assets/js/auth.js" defer></script>
  </head>

  <body>

    <main>
      <div class="container">
        <form method='POST'>
          <fieldset>
            <!-- emplacement du message d'erreur pour les mot de passes non identiques -->
            <div>
              <input placeholder=" " autocomplete="off" type="text" name="first_name" id="first_name">
              <label for="first_name">Prénom</label>
            </div>
            <!-- message d'erreur pour le champ prénom vide -->

            <div>
              <input placeholder=" " autocomplete="off" type="text" name="last_name" id="last_name">
              <label for="last_name">Nom</label>
            </div>
            <!-- message d'erreur pour le champ nom vide -->

            <div>
              <input placeholder=" " autocomplete="off" type="email" name="email" id="email">
              <label for="email">Email</label>
            </div>
            <!-- message d'erreur pour le champ email vide -->

            <div class="password__container">
              <span class="eye--open"></span>
              <span class="tooltip"
                title="8 caractères minimum, au moins une majuscule, au moins une minuscule, un chiffre et un caractère spécial">ℹ</span>
              <input placeholder=" " autocomplete="off" type="password" name="password" id="password">
              <label for="password">Mot de passe</label>
            </div>
            <!-- message d'erreur pour le champ mot de passe -->

            <div class="password__container">
              <span class="eye--open"></span>
              <input placeholder=" " autocomplete="off" type="password" name="confirm_password" id="confirm_password">
              <label for="confirm_password">Confirmation mot de passe</label>
            </div>
            <!-- message d'erreur pour le champ confirmation mot de passe vide -->

            <div>
              <button type="submit">S'inscrire</button>
            </div>
          </fieldset>
        </form>
        <div class="blur"></div>
      </div>
    </main>
  </body>

</html>