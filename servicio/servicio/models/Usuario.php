<?php
require_once "database/conexion.php";

class Usuario {

    // registry

   static public function mdlRegistro($table, $data) {
    #Statment/ declaracion    

    $stmt = Conexion::conectar()->prepare("INSERT INTO $table (nombre,rol ,correo, contrasena, fecha) VALUES (:nombre,:rol, :correo, :contrasena, :fecha)");

    $stmt->bindParam(":nombre",  $data["nombre"],PDO::PARAM_STR);
    $stmt->bindParam(":rol",   $data["rol"],PDO::PARAM_STR);
    $stmt->bindParam(":correo",   $data["correo"],PDO::PARAM_STR);
    $stmt->bindParam(":contrasena",$data["contrasena"],PDO::PARAM_STR);
    $stmt->bindParam(":fecha",$data["fecha"],PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    }else{
      print_r(Conexion::conectar()->errorCode());  
    }


    $stmt->closeCursor();
    $stmt-> NULL;

   }


   static public function mdlMostrarRegistro($table ,$item, $value){
    if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
  
  }

  

   static public function mdlEliminarRegistro($table, $data){

    $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :id ");

    $stmt->bindParam(":id", $data,PDO::PARAM_INT);

    if ($stmt->execute()) {
      return "ok";
    }else{
      print_r(Conexion::conectar()->errorCode());  
    }


    $stmt->closeCursor();
    // $stmt-> null;
   }


}