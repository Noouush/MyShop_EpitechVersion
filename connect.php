<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=my_shop', 'root','root1234');
    $db->exec('SET NAMES "UTF8"');

} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}

