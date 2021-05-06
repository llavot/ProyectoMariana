<?php

class CategoriaControlador {


 static public function ctrRegistroInfo(){

    

    if(isset($_POST["nombre"])){
     

        $table = "categorias";
//         nombre

        $data = array(
            'nombre'=> $_POST['nombre'],
        );

        $resultado = Categoria::mdlRegistro($table, $data);

        return $resultado;

    }

}

// mostrar

static public function ctrMostarRegistroInfo( $item, $value){

    $table = "categorias";
    $result = Categoria::mdlMostrarRegistroInfo($table, $item, $value);
    return $result;
    
}


static public function ctrActualizarRegistro(){

    if (isset($_POST["nombre"])) {
       
      $table = "categorias";

   $data = array(
    "id" => $_POST["idCategoria"],
    'nombre'      => $_POST['nombre'],
   );
   
   $resultado = Categoria::mdlEditarRegistro($table, $data);
   
   return $resultado;
   

    }
    
}


// Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id_Categoria"])){

    $table = "categorias";

    $value =  $_POST["id_Categoria"];

    $resultado = Categoria::mdlEliminarRegistro($table, $value);

    if ($resultado == "ok") {

      echo "<script> 
              alert('Se elimino correctamente');
            </script>";
      echo "<script> window.location = '".URL_BASE."categoria';</script>";

    }

  }


}


}


