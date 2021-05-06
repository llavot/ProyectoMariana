<?php

class EquipoControlador {


 static public function ctrRegistroInfo(){

    

    if(isset($_POST["nombre"])){
     

        $table = "equipos";
//         nombre
// modelo
// marca
// descripcion
        $data = array(
            'nombre'      => $_POST['nombre'],
            'modelo'      => $_POST['modelo'],
            'marca'       => $_POST['marca'],
            'descripcion' => $_POST['descripcion'],
            'idcategoria' => $_POST['idcategoria'],
        );

        $resultado = Equipo::mdlRegistro($table, $data);

        return $resultado;

    }

}

// mostrar

static public function ctrMostarRegistroInfo( $item, $value){

    $table = "equipos";
    $result = Equipo::mdlMostrarRegistroInfo($table, $item, $value);
    return $result;
    
}


static public function ctrActualizarRegistro(){

    if (isset($_POST["nombre"])) {
       
      $table = "equipos";

   $data = array(
    "id" => $_POST["idEquipo"],
    'nombre'      => $_POST['nombre'],
    'modelo'      => $_POST['modelo'],
    'marca'       => $_POST['marca'],
    'descripcion' => $_POST['descripcion'],
    'idcategoria' => $_POST['idcategoria'],
   );
   
   $resultado = Equipo::mdlEditarRegistro($table, $data);
   
   return $resultado;
   

    }
    
}


// Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id_Equipo"])){

    $table = "equipos";

    $value =  $_POST["id_Equipo"];

    $resultado = Equipo::mdlEliminarRegistro($table, $value);

    if ($resultado == "ok") {

      echo "<script> 
              alert('Se elimino correctamente');
            </script>";
      echo "<script> window.location = '".URL_BASE."equipo';</script>";

    }

  }


}


}


