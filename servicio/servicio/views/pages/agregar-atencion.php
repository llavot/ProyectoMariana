<?php
if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro/';</script>";
    return;
}else{
    if ($_SESSION['rol'] != "administrador"){
        echo "<script> window.location = '".URL_BASE."administracion/';</script>";
        return;
    }
}




?>

<?php


$rutas = explode("/", $_GET["page"]);

$id =  $rutas[1];
  $reporte = ReporteControlador::ctrMostarRegistroInfo('id', $id);
    //  echo "<pre>";
    //     var_dump( $reporte['asunto']);
    //     echo "</pre>";

?>  


<div class="centrar">

<div class="form-registro">

<h4 class="text-center">Agregar una Atencion</h4>

  <form method="POST">
  <div class="form">
     <p>
         El Reporte  de <?php  echo $reporte['asunto'];?>
         <br>
        Descripcion: <?php  echo $reporte['descripcion'];?>
        <br>
        El tipo de Servicio <?php  echo $reporte['tipo_servicio'];?>
     </p>
     <input type="hidden" name="codigo" value="<?php  echo $reporte['codigo'];?>">
</div>
  <div class="form">
      <label for="">Asunto:</label>
      <input type="text" name="asunto" class="input-form">
    </div>
    <div class="form">
      <label for="">Descripcion:</label>
      <textarea name="descripcion" id="" cols="30" rows="10"></textarea>
    </div>
  

    <div class="form">
      <label for="">Estado:</label>
      <input type="text" class="input-form"  name="estado" value="">
    </div>

    <div class="form">
      <label for="">Fecha:</label>
      <input type="date" class="input-form"  name="fecha" value="">
    </div>
    <div class="form text-center">
  
    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
       $atencion = AtencionControlador::ctrRegistroInfo();
       if ($atencion == "ok") {

        echo "<script> 
               alert('Registro Exitosos');
           </script>";
        echo "<script> window.location = '".URL_BASE."atencion/';</script>";
      }
    
    ?>
 
          
  </form>
    

</div>

</div>