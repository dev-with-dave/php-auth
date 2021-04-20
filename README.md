# Authentification

Aujourd'hui on va mettre en place un système d'authentification ! (inscription / connexion)

> l'intégrateur a déjà fait le plus gros du boulot, il ne nous reste plus qu'a importer les fichiers de styles/javascript dans nos pages et d'y ajouter la logique serveur...

## Mise en place

Avant d'attaquer la logique serveur pour chaque page, on va mettre en place notre environnement.

- mettre en place les variables d'environnement
- Créer une connexion à la base de donnée

### Variables d'environnement

On va se servir de variables d'environnement pour ne pas exposer sur github nos mots de passe/identifiants de connexion à la base de donnée.

- Initialiser le projet avec composer

```bash
$ composer init
```

- Installer le paquet vlucas/phpdotenv à l'initialisation ou par cette commande

```bash
$ composer require vlucas/phpdotenv
```

Les instructions pour utiliser la class dotenv se trouvent ici: https://github.com/vlucas/phpdotenv

<details>
  <summary>Ou sinon -> Spoiler</summary>

```php
<?php

require_once './vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
```

</details>

---

### Connexion base de donnée

On va instancier la class PDO et stocker le retour dans une variable nommée sobrement $pdo.

Tout se trouve dans le manuel php: https://www.php.net/manual/fr/pdo.connections.php

<details>
  <summary>Ou sinon -> Spoiler</summary>

```php
try {
  $pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASS'],
    [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
  echo $e->getMessage();
}
```

</details>

---

## Page d'accueil / index.php

On commence en douceur avec la page d'accueil, on va devoir:

- Rediriger sur la page login.php si l'utilisateur n'est pas connecté
- Saluer l'utilisateur une fois connecté (à faire après la page login)

<details>
  <summary>Pour rediriger l'utilisateur</summary>

On pourrait peut être vérifier si on a un utilisateur dans la session... 🤷‍♂️

</details>

<details>
  <summary>Pour saluer l'utilisateur</summary>

On peut mettre tout un tas d'infos intéressantes dans cette session...

</details>

---

## Page de connexion / login.php

Ca commence à se corser avec la page de connexion, ici on va devoir:

- vérifier les erreurs du formulaire coté serveur (vérifier si tout les champs sont bien remplis par exemple...)
- vérifier si avec les données transmises par l'utilisateur on obtient des resultats du côté de la base de donnée, le cas échéant on peut connecter notre utilisateur et le rediriger en page d'accueil.
- conserver les données transmises par l'utilisateur et lui renvoyer dans le formulaire en cas d'erreur.

> un utilisateur existe deja en base

- email: john-dw@gmail.com

- mot de passe: Password_DW1234+

> NB: d'après l'intégrateur les messages d'erreur devront être mis dans un paragraphe avec la class error et affiché que s'il y'a une erreur (il a laissé des commentaire la ou se trouveront les messages d'erreur)

<details>
  <summary>Pour vérifier les erreurs du formulaire</summary>

On pourrait peut être regarder dans la superglobales $\_POST et vérifier si tout les champs de texte ont bien été remplis...

</details>

<details>
  <summary>Vérifier les resultats en base de donnée</summary>

On peut faire une requête à la base de donnée pour chercher un utilisateur qui aurait le même email que celui transmis par l'utilisateur.

Si la base de donnée ne retourne pas de resultat on pourrait envoyer un message d'erreur à l'utilisateur pour lui spécifier que cet email n'existe pas en base de donnée.

Si on a un resultat on pourrait vérifier si les deux mots de passe concordent (attention le mot de passe qui se trouve en base de donnée est crypté !), si c'est le cas on peut connecter notre utilisateur et le rediriger sinon on lui envoi une erreur.

https://www.php.net/manual/fr/function.password-verify.php

</details>

<details>
  <summary>Pour renvoyer les données à l'utilisateur</summary>
L'élément HTML input possède un attribut value qui correspont au texte de celui-ci, on pourrait peut être s'en servir...
</details>

## Page d'inscription / signup.php

LA on passe aux choses serieuses ! Si vous avez déjà reussi les 2 étapes précedentes c'est déjà pas mal, vous pouvez être fiers du travail accompli et vous reposer un peu, pour ceux qui en veulent encore, suivez le guide.

Ici on va mettre le paquet au niveau des vérifications ! On va:

- vérifier que tout les champs sont bien remplis au risque de se prendre un crochet du gauche par la base de donnée ! 🥊
- vérifier que l'email est bien un email (expressions régulières... 🥰)
- vérifier que le mot de passe correspond bien à un certain niveau de sécurité (8 caractères minimum, au moins une majuscule, au moins une minuscule, un chiffre et un caractère spécial)
- vérifier que le mot de passe correspond bien à la confirmation.

A ce stade on va bien entendu vouloir garder les données précédement transmises par l'utilisateur pour qu'il n'ai pas à tout retaper.

Une fois toutes les vérifications passée on va pouvoir inscrire notre utilisateur en base de donnée en prenant soin de sécuriser son mot de passe en le cryptant. On pourra ensuite le rediriger vers la page login.php pour qu'il puisse se connecter.

> NB: d'après l'intégrateur les messages d'erreur devront être mis dans un paragraphe avec la class error et affiché que s'il y'a une erreur (il a laissé des commentaire la ou se trouveront les messages d'erreur)

<details>
  <summary>Pour vérifier que l'email est bien un email et que le mot de passe correspond à un certain niveau de sécurité</summary>

En php on a une fonction qui nous permet de faire une recherche de correspondance avec une expression régulière...

https://www.php.net/manual/fr/function.preg-match.php

Pour trouver l'expression régulière à utiliser google sera notre meilleur allié ! 🥰

</details>

<details>
  <summary>Crypter un mot de passe</summary>

En php on dispose de pas mal de manières de crypter un mot de passe, on utilisera l'algorithme bcrypt qui est plutot bien sécurisé.

https://www.php.net/manual/fr/function.password-hash.php

</details>

---

## Page de déconnexion / login.php

On garde le plus facile pour la fin, après avoir bien sué et s'être arraché les cheveux. 🥵

Sur cette page on va juste deconnecter notre utilisateur et le rediriger sur la page login ! 🎉

<details>
<summary>
  Spoiler
</summary>

Ici on va juste vouloir enlever l'utilisateur de notre session et le rediriger...

un peu d'aide: https://www.php.net/manual/fr/function.unset.php

</details>

---

## Bonus

- Empêcher l'accès à la page login.php et la page signup.php à un utilisateur connecté (le rediriger vers l'accueil si jamais il essaye d'y acceder en entrant l'url)
