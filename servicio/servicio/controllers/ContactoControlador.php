<?php

class ContactoControlador {


 static public function ctrRegistroInfo(){

    

    if(isset($_POST["asunto"])){
     

        $table = "contactos";
        // asunto
        // correo
        // descripcion
        $data = array(
            'asunto'      => $_POST['asunto'],
            'correo'      => $_POST['correo'],
            'descripcion' => $_POST['descripcion'],
        );

        $resultado = Atencion::mdlRegistro($table, $data);

        return $resultado;

    }

}

// mostrar

static public function ctrMostarRegistroInfo( $item, $value){

    $table = "contactos";
    $result = Atencion::mdlMostrarRegistroInfo($table, $item, $value);
    return $result;
    
}


static public function ctrActualizarRegistro(){

    if (isset($_POST["asunto"])) {
       
      $table = "contactos";

   $data = array(
    "id" => $_POST["idContacto"],
    'asunto'      => $_POST['asunto'],
    'correo'      => $_POST['correo'],
    'descripcion' => $_POST['descripcion'],
   );
   
   $resultado = Atencion::mdlEditarRegistro($table, $data);
   
   return $resultado;
   

    }
    
}


// Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id_Contacto"])){

    $table = "contactos";

    $value =  $_POST["id_Contacto"];

    $resultado = Atencion::mdlEliminarRegistro($table, $value);

    if ($resultado == "ok") {

      echo "<script> 
              alert('Se elimino correctamente');
            </script>";
      echo "<script> window.location = '".URL_BASE."contacto';</script>";

    }

  }


}


}


