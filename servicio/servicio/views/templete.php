
<?php 

  include 'views/components/header.php';
  include 'views/components/navigation.php';

?>
<div class=" contenido">

<?php

      
      if(isset($_GET["page"])){
        $rutas = explode("/", $_GET["page"]);

          $ruta =  $rutas[0];



         if($ruta == "registro" || 
            $ruta == "crear-reporte" || 
            $ruta == "editar-reporte" || 
            $ruta == "reporte" || 
            $ruta == "crear-atencion" || 
            $ruta == "agregar-atencion" || 
            $ruta == "editar-atencion" || 
            $ruta == "atencion" || 
            $ruta == "crear-categoria" || 
            $ruta == "editar-categoria" || 
            $ruta == "categoria" || 
            $ruta == "crear-equipo" || 
            $ruta == "editar-equipo" || 
            $ruta == "equipo" || 
            $ruta == "crear-servicio" || 
            $ruta == "editar-servicio" || 
            $ruta == "servicio" || 
            $ruta == "administracion" || 
            $ruta == "usuario" || 
            $ruta == "inicio" ||  
            $ruta == "login" ||  
            $ruta == "logout"){

             include "pages/". $ruta.".php";
            }else{
                include "pages/404.php";
            }

      }else{
          include "pages/inicio.php";
      }
    ?>


</div>
   
<?php 

include 'views/components/footer.php';

?>


   
