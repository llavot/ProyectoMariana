<?php
require_once "database/conexion.php";

class Reporte {

    
  static public function mdlRegistro($table, $data) {
    #Statment/ declaracion    

    $stmt = Conexion::conectar()->prepare("INSERT INTO $table( asunto, descripcion, tipo_servicio, fecha, usuario_id, codigo ) VALUES ( :asunto, :descripcion, :tipo_servicio, :fecha, :usuario_id, :codigo )");

    Conexion::conectar()->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

    $stmt->bindParam(":asunto",$data["asunto"],PDO::PARAM_STR);
    $stmt->bindParam(":descripcion",$data["descripcion"],PDO::PARAM_STR);
    $stmt->bindParam(":tipo_servicio",$data["tipo_servicio"],PDO::PARAM_STR);
    $stmt->bindParam(":fecha",$data["fecha"],PDO::PARAM_STR);
    $stmt->bindParam(":usuario_id",$data["usuario_id"],PDO::PARAM_STR);
    $stmt->bindParam(":codigo",$data["codigo"],PDO::PARAM_INT);

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

  $stmt = Conexion::conectar()->prepare("UPDATE $table SET asunto  = :asunto, descripcion = :descripcion, tipo_servicio = :tipo_servicio, fecha = :fecha, usuario_id = :usuario_id, codigo = :codigo WHERE id = :id");
  $stmt->bindParam(":id",$data["id"],PDO::PARAM_STR);
  $stmt->bindParam(":asunto",$data["asunto"],PDO::PARAM_STR);
  $stmt->bindParam(":descripcion",$data["descripcion"],PDO::PARAM_STR);
  $stmt->bindParam(":tipo_servicio",$data["tipo_servicio"],PDO::PARAM_STR);
  $stmt->bindParam(":fecha",$data["fecha"],PDO::PARAM_STR);
  $stmt->bindParam(":usuario_id",$data["usuario_id"],PDO::PARAM_STR);
  $stmt->bindParam(":codigo",$data["codigo"],PDO::PARAM_INT);

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