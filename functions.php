<?php

// Creation de la fonction de connexion

function connect_bdd($host, $port, $db, $username, $password){
    
    try
    { 
    $bdd = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $db, $username, $password);
    }
    catch(PDOException $e)
    {
        $error_message = "PDO ERROR: " . $e->getmessage() . "\n";
        echo $error_message;
        return false;
    }

    return $bdd;
    
}

// Creation de la fonction pour vérifier si l'username n'est pas déjà pris

function check_username($username) {
    $bdd = connect_bdd('localhost', '3306', 'my_shop', 'root', 'root1234');
    $check = $bdd->prepare("SELECT username FROM users WHERE username = ?");
    $check->execute([$username]);
    $exist_or_no = $check->fetch();

    if ($exist_or_no == TRUE){
        return TRUE;
    }
    else {
        return FALSE;
    }
}

// Création de la fonction pour vérifier si l'email n'est pas déjà pris 

function check_email($email) {
    $bdd = connect_bdd('localhost', '3306', 'my_shop', 'root', 'root1234');
    $check = $bdd->prepare("SELECT email FROM users WHERE email = ?");
    $check->execute([$email]);
    $exist_or_no = $check->fetch();

    if ($exist_or_no == TRUE){
        return TRUE;
    }
    else {
        return FALSE;
    }
}
?>