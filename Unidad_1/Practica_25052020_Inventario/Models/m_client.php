<?php
require_once "conexion.php";
    //m_ = prefijo de 'model'
    class m_client extends Conexion{

        public function m_create_client($c_data, $table){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $table (client_name, client_email, client_phone, client_address, client_birthday, client_purchases) VALUES (:client_name, :client_email, :client_phone, :client_address, :client_birthday, :client_purchases)");

			$stmt -> bindParam(":client_name", $c_data["client_name"], PDO::PARAM_STR);
			$stmt -> bindParam(":client_email", $c_data["client_email"], PDO::PARAM_STR);
			$stmt -> bindParam(":client_phone", $c_data["client_phone"], PDO::PARAM_INT);
			$stmt -> bindParam(":client_address", $c_data["client_address"], PDO::PARAM_STR);
            $stmt -> bindParam(":client_birthday", $c_data["client_birthday"], PDO::PARAM_STR);
            $stmt -> bindParam(":client_purchases", $c_data["client_purchases"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return true;
			} else {
				return false;
			}
			$stmt -> close();
        }

        public function m_read_client($table){
            $stmt = Conexion::conectar()->prepare("SELECT id, client_name, client_email, client_phone, client_address, client_birthday, client_purchases FROM $table");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt->close();
        }

        public function m_update_client($c_data, $table){
            $stmt = Conexion::conectar()->prepare("UPDATE $table SET client_name = :client_name, client_email = :client_email, client_phone = :client_phone, client_address = :client_address, client_birthday = :client_birthday, client_purchases = :client_purchases WHERE id = :id");

            $stmt -> bindParam(":id", $c_data["id"], PDO::PARAM_INT);
			$stmt -> bindParam(":client_name", $c_data["client_name"], PDO::PARAM_STR);
			$stmt -> bindParam(":client_email", $c_data["client_email"], PDO::PARAM_STR);
			$stmt -> bindParam(":client_phone", $c_data["client_phone"], PDO::PARAM_INT);
			$stmt -> bindParam(":client_address", $c_data["client_address"], PDO::PARAM_STR);
            $stmt -> bindParam(":client_birthday", $c_data["client_birthday"], PDO::PARAM_STR);
            $stmt -> bindParam(":client_purchases", $c_data["client_purchases"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return true;
			} else {
				return false;
			}
			$stmt -> close();
        }

        public function m_update_client_view($c_data, $table){
            $stmt = Conexion::conectar()->prepare("SELECT id, client_name, client_email, client_phone, client_address, client_birthday, client_purchases FROM $table WHERE id = :id");
			$stmt->bindParam(":id", $c_data, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();
        }

        public function m_delete_client($c_data, $table){
            $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :id");
			$stmt -> bindParam(":id", $c_data, PDO::PARAM_INT);

			if ($stmt -> execute()) {
				return true;
			} else {
				return false;
			}
			$stmt -> close();
		}
		

    }


?>