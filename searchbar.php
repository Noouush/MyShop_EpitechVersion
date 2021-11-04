<?php


require("functions.php");

if(isset($_GET['s']) AND !empty($_GET['s'])) {
    $bdd = connect_bdd('localhost', '3306', 'my_shop', 'root', 'root1234');
    $_GET['s'] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les failles html
    $search = $_GET['s'];
    $search = trim($search); //pour supprimer les espaces dans la requête de l'internaute
    $search = strip_tags($search);



    if (isset($search))
    {
     $search = strtolower($search);
     $select_terme = $bdd->prepare("SELECT name FROM products WHERE name LIKE ?");
     $select_terme->execute(array("%".$terme."%"));
     $result = $select_terme->fetch(PDO::FETCH_ASSOC);
    }
    else
    {
     $message = "Vous devez entrer votre requete dans la barre de recherche";
    }

}

?>


<!DOCTYPE html>
<!-- Spécification du langage de la page et du sens de lecture -->
<html lang="fr" dir="ltr">

    <head>
    <!-- Prise en charge des accents et autres caractères spéciaux -->
    <meta charset="utf-8" />
    <!-- (meta) Pour être responsive et éviter une mise à l'échelle automatique -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CDN de font awesome pour l'utilisation des fa-fa et des icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- CDN de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Lien avec la page CSS (toujours après Bootstrap pour éviter les bug) -->
    <link rel="stylesheet" href="style.css">

    <!-- Titre de la page affiché dans l'onglet -->
    <title>Test search barre</title>
    </head>

    <body>

    <form method="GET">
        <input type="search" name="s" placeholder="Search ..." >
        <input type="submit" name="SEARCH">

    </form>

    <section class="resultats">

    <!DOCTYPE html>
<html>
 <head>
  <meta charset = "utf-8" >
  <title>Les résultats de recherche</title>
 </head>
 <body>
  <?php

   echo "<p>".$result['titre']."</p>";

   ?>
 </body>
</html>

    </body>
    </html>



