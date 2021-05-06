<?php

class ServicioControlador {

  
  //Metedo para registrar servicios
 static public function ctrRegistroInfo(){

    

    if(isset($_POST["titulo"])){


        // echo $_FILES["imagen"];
     

        $table = "servicios";
        
        $ruta = "";

        $slugTitulo =  createSlug($_POST["titulo"]);

      if(isset($_FILES["imagen"]["tmp_name"])){
      
          list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);
      
          $nuevoAncho = 500;
          $nuevoAlto = 500;
      
          /*=============================================
          CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
          =============================================*/
       
          $directorio ="views/img/servicios/".$slugTitulo;
      
          mkdir($directorio, 0755);
      
          /*=============================================
          DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
          =============================================*/

         if($_FILES["imagen"]["type"] == "image/jpeg"){
     
             /*=============================================
             GUARDAMOS LA IMAGEN EN EL DIRECTORIO
             =============================================*/
     
             $aleatorio = mt_rand(100,999);
             
             
             $ruta = "views/img/servicios/".$slugTitulo."/".$aleatorio.".jpg";
     
             $origen = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);						
     
             $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
     
             imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
     
             imagejpeg($destino, $ruta);
     
         }
     
         if($_FILES["imagen"]["type"] == "image/png"){
     
             /*=============================================
             GUARDAMOS LA IMAGEN EN EL DIRECTORIO
             =============================================*/
     
             $aleatorio = mt_rand(100,999);
     
             $ruta = "views/img/servicios/".$slugTitulo."/".$aleatorio.".png";
     
             $origen = imagecreatefrompng($_FILES["imagen"]["tmp_name"]);						
     
             $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
     
             imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
     
             imagepng($destino, $ruta);
     
         }
     
     }
     

        $data = array(
            "titulo" => $_POST["titulo"],
            "img" => $ruta,
            "descripcion" => $_POST["descripcion"],
            "carpeta" =>  $slugTitulo,
        );

        $resultado = Servicio::mdlRegistro($table, $data);

        return $resultado;

    }

}

// mostrar

static public function ctrMostarRegistroInfo( $item, $value){

    $table = "servicios";
    $result = Servicio::mdlMostrarRegistroInfo($table, $item, $value);
    return $result;
    
}


static public function ctrActualizarRegistro(){

    if (isset($_POST["titulo"])) {
      

      $ruta = $_POST["imagenActual"];
      $table = "servicios";
      $slugTitulo =  createSlug($_POST["titulo"]);
     
     
      // echo $_FILES["imagen"];

      if(isset($_FILES["imagen"]["tmp_name"]) && !empty($_FILES["imagen"]["tmp_name"])){

     list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);

     $nuevoAncho = 500;
     $nuevoAlto = 500;

     /*=============================================
     CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
     =============================================*/

     $directorio = "views/img/servicios/".$slugTitulo;
     mkdir($directorio, 0755);	
     /*=============================================
     PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
     =============================================*/

     if(!empty($_POST["imagenActual"])){

       unlink($_POST["imagenActual"]);
       $carpeta = "views/img/servicios/".$_POST['carpeta']."/";
       rmdir($carpeta );
     }
     
     /*=============================================
     DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
     =============================================*/

     if($_FILES["imagen"]["type"] == "image/jpeg"){

       /*=============================================
       GUARDAMOS LA IMAGEN EN EL DIRECTORIO
       =============================================*/

       $aleatorio = mt_rand(100,999);

       $ruta = "views/img/servicios/".$slugTitulo."/".$aleatorio.".jpg";

       $origen = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);						

       $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

       imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

       imagejpeg($destino, $ruta);

     }

     if($_FILES["imagen"]["type"] == "image/png"){

       /*=============================================
       GUARDAMOS LA IMAGEN EN EL DIRECTORIO
       =============================================*/

       $aleatorio = mt_rand(100,999);

       $ruta = "views/img/servicios/".$slugTitulo."/".$aleatorio.".png";

       $origen = imagecreatefrompng($_FILES["imagen"]["tmp_name"]);						

       $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

       imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

       imagepng($destino, $ruta);

     }

   }

   $data = array(
    "id" => $_POST["idServicio"],
    "titulo" => $_POST["titulo"],
    "descripcion" => $_POST["descripcion"],
    "img" => $ruta,
    "carpeta" =>  $slugTitulo,
   );
   
   $resultado = Servicio::mdlEditarRegistro($table, $data);
   
   return $resultado;
   


    }
    
}


// Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id_Servicio"])){

    $table = "servicios";

    $value =  $_POST["id_Servicio"];

    $resultado = Servicio::mdlEliminarRegistro($table, $value);

    if ($resultado == "ok") {
      if(!empty($_POST["imagenActual"])){

        unlink($_POST["imagenActual"]);
        $carpeta = "views/img/servicios/".$_POST['carpeta'];
        rmdir($carpeta );
      }

        echo "<script> 
            alert('Se elimino correctamente');
        </script>";
      echo "<script> window.location = '".URL_BASE."servicio';</script>";

    }

  }


}


}


