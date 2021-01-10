<?php

$handler = null;
try {
    $handler = new PDO('mysql:host = localhost;dbname=sign_up_form' , 'root' , 'BLACKjack23#');
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo $e->getMessage();
    die();
}
