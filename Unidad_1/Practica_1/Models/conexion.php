<?php
    class Conexion{

        public function conectar(){
            //$link = new PDO("mysql:host=localhost;dbname=datos", "root", "");
            try{
                $link = new PDO("mysql:host=localhost;dbname=datos", "root", "");
            }catch (PDOException $e){
                print "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            return $link;

        }
    }

?>