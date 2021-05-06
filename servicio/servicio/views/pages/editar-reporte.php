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

<h4 class="text-center">Editar Reporte de Servicio</h4>

  <form method="POST">
    <div class="form">
      <label for="">Asunto:</label>
      <input type="text" name="asunto" class="input-form" value="<?php echo $reporte['asunto'];?>">
    </div>
    <div class="form">
      <label for="">Descripcion:</label>
      <textarea name="descripcion" id="" cols="30" rows="10"><?php echo $reporte['descripcion'];?></textarea>
    </div>
    <div class="form">
      <label for="">Tipo de Servicio:</label>
       <select name="tipo_servicio" id="" class="input-form">
       <option value="">Seleccione una opción</option>
       <option  value="<?php echo $reporte["tipo_servicio"];?>" selected > <?php echo ucfirst ( $reporte["tipo_servicio"] ) ;?> </option>
       <option value="Mantenimiento">Mantenimiento</option>
       <option value="Reparacion">Reparacion</option>
       </select>
    </div>
    <div class="form">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" value="<?php echo $reporte["codigo"]  ;?>" class="input-form">
    </div>
    <div class="form">
      <label for="">Fecha:</label>
      <input type="date" class="input-form"  name="fecha" value="<?php echo $reporte["fecha"]  ;?>">
    </div>
    <div class="form text-center">
    <input type="hidden" name="usuario_id" value="<?php  echo$reporte["usuario_id"];?>">
    <input type="hidden" name="idReporte" value="<?php  echo$reporte["id"];?>">
    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
     $reporteActualizar = ReporteControlador::ctrActualizarRegistro();

     if ($reporteActualizar == "ok") {

      echo "<script> 
             alert('Se actualizo Correctamente');
         </script>";
      echo "<script> window.location = '".URL_BASE."reporte/';</script>";
    }

    
    ?>
 
          
  </form>
    

</div>

</div>