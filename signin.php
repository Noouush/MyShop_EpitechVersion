<?php 
session_start(); 
require('functions.php');
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
    <title>Welcome to Ikeouf - Connect to your admin workspace</title>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row align-self-center">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <a href="index.php" ><img class="Logo" src="assets/Logo.png" alt="website logo" /></a><br/>

                    <h1>IKEOUF - CONNECTION TO THE ADMIN WORKSPACE</h1>

                    <form action="check_connexion.php" method="POST">
                    <?php if (isset($_GET['error'])) {?>
                    <p class="error">Please enter correct username and password (yes, we need both !)</p>
                    <?php }?>
                    <?php if (isset($_GET['error-admin'])) {?>
                    <p class="error-admin">You must be connected with an admin username to enjoy the admin workspace. </p>
                    <?php }?>
                    <p>Login : <input type="text" name="username"/></p>
                    <p>Password : <input type="password" name="password" /></p>

                    <p><input type="submit" value="CONFIRM"></p>
                    </form>
                
                    <div>
                        <p>You don't have an account ? <a href="signup.php">Create one</a> ! </p>
                    </div>

                </div>
            </div>
        </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

    <footer>
        <div class="footer-content">
            <div class="footer-bottom">
                &copy; ikeouf.com | Designed by Tom-Tom-Thoum
            </div>
        </div>
    </footer>

        <!-- CDN JavaScript toujours à la fin du body pour éviter les bug -->
        <!-- D'abord le CDN de JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- Puis le CDN du Popper.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <!-- Et enfin le CDN de Bootstrap.js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <!-- Sweet alert 2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <!-- Lien avec la page JS (toujours après les CDN de JQuery/AngularJs) -->
        <script src=".js"></script>
    </body>
</html>