<?php
    try{
        $link = new PDO("mysql:host=ameb.tech;dbname=practica2", "plem", "practica2pass");
    }catch (PDOException $e){
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }




?>