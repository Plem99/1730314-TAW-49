<?php
    try{
        $link = new PDO("mysql:host=localhost;dbname=practica2", "root", "pedromartinez99");
    }catch (PDOException $e){
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }




?>