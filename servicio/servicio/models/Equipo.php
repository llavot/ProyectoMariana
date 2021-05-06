<?php
require_once "database/conexion.php";

class Equipo {

  // 	varchar(80)	utf8mb4_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
  // Más Más
  //   3		varchar(80)	utf8mb4_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
  // Más Más
  //   4		varchar(80)	utf8mb4_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
  // Más Más
  //   5	descripcion	tex   
  static public function mdlRegistro($table, $data) {

    $stmt = Conexion::conectar()->prepare("INSERT INTO $table( nombre, modelo, marca, descripcion, idcategoria ) VALUES ( :nombre, :modelo,:marca, :descripcion, :idcategoria )");

    Conexion::conectar()->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

    $stmt->bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
    $stmt->bindParam(":modelo",$data["modelo"],PDO::PARAM_STR);
    $stmt->bindParam(":marca",$data["marca"],PDO::PARAM_STR);
    $stmt->bindParam(":descripcion",$data["descripcion"],PDO::PARAM_STR);
    $stmt->bindParam(":idcategoria",$data["idcategoria"],PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    }else{
      var_dump( Conexion::conectar()->errorInfo()); 
    }



   }


   static public function mdlMostrarRegistroInfo($table ,$item, $value){
    if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ORDER by id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
  

  }


   static public function mdlMostrarCatRegistro($table ,$item, $value){
  
  $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER by id DESC ");
  
  $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
	$stmt -> execute();

	return $stmt -> fetchAll();

  }


   // editar

static public function mdlEditarRegistro($table, $data){

  $stmt = Conexion::conectar()->prepare("UPDATE $table SET nombre  = :nombre, modelo = :modelo, marca = :marca, descripcion = :descripcion, idcategoria = :idcategoria WHERE id = :id");
  $stmt->bindParam(":id",$data["id"],PDO::PARAM_STR);
  $stmt->bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
  $stmt->bindParam(":modelo",$data["modelo"],PDO::PARAM_STR);
  $stmt->bindParam(":marca",$data["marca"],PDO::PARAM_STR);
  $stmt->bindParam(":descripcion",$data["descripcion"],PDO::PARAM_STR);
  $stmt->bindParam(":idcategoria",$data["idcategoria"],PDO::PARAM_STR);

  if($stmt->execute()){

    return "ok";

  }else{

    return "error";
  
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
   }


}