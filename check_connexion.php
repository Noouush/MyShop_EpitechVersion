<?php
    session_start();
    require("functions.php");

    if(isset($_POST['username']) AND isset($_POST['password'])) {
        $login = $_POST['username'];
        $password = $_POST['password'];

        // Connect to DB
        $bdd = connect_bdd('localhost', '3306', 'my_shop', 'root', 'root1234');
        //Prepare request
        $user = $bdd->prepare("SELECT count(username) FROM users WHERE username = ?");
        //Execute request
        $user->execute(array($login));
        //Fetch request
        $test = $user->fetch(PDO::FETCH_ASSOC);
        
        //get count(username) in a var
        $combien = $test['count(username)'];

        //Check if count(username == 1)
        if ($combien == 1) {
            
            $user = $bdd->prepare("SELECT username, admin, password FROM users WHERE username = ?");
            //Execute request
            $user->execute(array($login));
            //Fetch request
            $test = $user->fetch(PDO::FETCH_ASSOC);
            //If only 1, setup $my_login & $is_admin var
            $my_login = $test['username'];
            $is_admin = $test['admin'];
            $hash = $test['password'];
            
            $_SESSION['username'] = $my_login;
            
            if ($is_admin == 1){
                $_SESSION['is_admin'] = $is_admin;
            }
            else{
                $_SESSION['is_admin'] = "0";
            }
            
            if (password_verify($password, $hash)) {

                if ($is_admin == 1){
                    // A COMPLETER
                    header("Location: admin.php");
                    exit();
                }
                else {
                    // A COMPLETER
                    header("Location: index.php");
                    exit();
                }
            }

        }
        else {
            header("Location: signin.php?error=IncorrectField");
            exit();
         }
    }
    else {
        //veuillez entrer des données
        echo "Please complete all the fields ! \n";
        header("Location: signin.php");
            exit();
    }
?>