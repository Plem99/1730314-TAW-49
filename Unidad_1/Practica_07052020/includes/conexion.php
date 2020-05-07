<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=taw_07_05_2020", "root", "");
}catch (PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
