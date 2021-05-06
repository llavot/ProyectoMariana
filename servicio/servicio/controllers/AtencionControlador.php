<?php

class AtencionControlador {


 static public function ctrRegistroInfo(){

    

    if(isset($_POST["asunto"])){
     

        $table = "atenciones";
        
        $data = array(
            'asunto'      => $_POST['asunto'],
            'codigo'      => $_POST['codigo'],
            'fecha'       => $_POST['fecha'],
            'descripcion' => $_POST['descripcion'],
            'estado'      => $_POST['estado'],
        );

        $resultado = Atencion::mdlRegistro($table, $data);

        return $resultado;

    }

}

// mostrar

static public function ctrMostarRegistroInfo( $item, $value){

    $table = "atenciones";
    $result = Atencion::mdlMostrarRegistroInfo($table, $item, $value);
    return $result;
    
}


static public function ctrActualizarRegistro(){

    if (isset($_POST["asunto"])) {
       
      $table = "atenciones";

   $data = array(
    "id" => $_POST["idAtencion"],
    'asunto'      => $_POST['asunto'],
    'codigo'      => $_POST['codigo'],
    'fecha'       => $_POST['fecha'],
    'descripcion' => $_POST['descripcion'],
    'estado'      => $_POST['estado'],
   );
   
   $resultado = Atencion::mdlEditarRegistro($table, $data);
   
   return $resultado;
   

    }
    
}


// Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id_Atencion"])){

    $table = "atenciones";

    $value =  $_POST["id_Atencion"];

    $resultado = Atencion::mdlEliminarRegistro($table, $value);

    if ($resultado == "ok") {

      echo "<script> 
              alert('Se elimino correctamente');
            </script>";
      echo "<script> window.location = '".URL_BASE."atencion';</script>";

    }

  }


}


}


