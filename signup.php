<?php //session_start(); 
    session_start();
    require("functions.php");

    // Conditions de validation de formulaire

    if (isset($_POST['username']) AND isset($_POST['email']) AND isset($_POST['password'])) {

        $bdd = connect_bdd('localhost', '3306', 'my_shop', 'root', 'root1234');

        $post_username = $_POST['username'];
        $post_email = $_POST['email'];
        $post_password = $_POST['password'];
        $post_conf = $_POST['password_confirmation'];

        if (strlen($post_username) < 4 OR strlen($post_username) > 15) {?>
            <p>The username you entered must be between 4 and 15 characters.</p><?php ;
        }

        elseif(!filter_var($post_email,FILTER_VALIDATE_EMAIL)) {?>
            <p>The email must be valid.</p><?php ;
        }

        elseif(check_username($post_username) == TRUE OR check_email($post_email) == TRUE) {?>
            <p>This username or email is already taken. Please choose another username or <a href="signin.php">sign in.</a></p><?php ;
        }
    
        elseif($post_password != $post_conf OR strlen($post_password) < 4 OR strlen($post_password) > 15) {?>
            <p>The password and password confirmation doesn't match ! Please enter the same password, between 4 and 15 characters.</p><?php ;
        }

        else {
            $hash = password_hash($post_password, PASSWORD_BCRYPT);

            $req = $bdd->prepare('INSERT INTO users(username, password, email, admin) VALUES(:username, :password, :email, :admin)');
            $req->execute(array(
                'username' => $post_username,
                'password' => $hash,
                'email' => $post_email,
                'admin' => 0,
                ));
            $_SESSION['username'] = $post_username;
            $_SESSION['is_admin'] = "0";

            header("Location: index.php");
            exit();
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
    <title>Welcome to Ikeouf - Subscription page</title>
    </head>

    <body>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <a href="index.php" ><img class="Logo" src="assets/Logo.png" alt="website logo" /></a><br/>

                    <h1>SUBSCRIPTION TO IKEOUF</h1>

                    <form action="signup.php" method="POST">
                    <p>Username : <input type="text" name="username"/></p>
                    <p>Email : <input type="text" name="email" /></p>
                    <p>Password : <input type="password" name="password" /></p>
                    <p>Password Confirmation : <input type="password" name="password_confirmation" /></p>

                    <p><input type="submit" value="CONFIRM"></p>
                    </form>

                    <div><p>Have an account ? <a href="signin.php">Sign in !</p></div>
                    
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>


    </body>
</html>