<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro/';</script>";
    return;
}
?>

<?php


$rutas = explode("/", $_GET["page"]);

$id =  $rutas[1];
  $atencion = AtencionControlador::ctrMostarRegistroInfo('id', $id);
 

?> 

<div class="centrar">

<div class="form-registro">

<h4 class="text-center">Editar Atención</h4>

  <form method="POST">
    <div class="form">
      <label for="">Asunto:</label>
      <input type="text" name="asunto" class="input-form" value="<?php echo $atencion['asunto'];?>">
    </div>
    <div class="form">
      <label for="">Descripcion:</label>
      <textarea name="descripcion" id="" cols="30" rows="10"><?php echo $atencion['descripcion'];?>
      </textarea>
    </div>
    <div class="form">
      <label for="">Reporte:</label>
       <select name="codigo" id="" class="input-form">
       <option value="">Seleccione una opción</option>
    
       <?php     
          
          $reportes = ReporteControlador::ctrMostarRegistroInfo(null, null);
          //   echo "<pre>";
          //     var_dump( $reportes);
          //     echo "</pre>";
              foreach($reportes as $key => $reporte){
               
       
       ?>
       <option <?php echo $reporte['codigo'] == $atencion["codigo"] ? 'selected': '' ?> value="<?php echo $reporte['codigo'] ?>"><?php echo $reporte['asunto'] ?></option>
   

       <?php }  ?>
       </select>
    </div>

    <div class="form">
      <label for="">Estado:</label>
      <input type="text" class="input-form"  name="estado" value="<?php echo $atencion['estado'];?>">
    </div>

    <div class="form">
      <label for="">Fecha:</label>
      <input type="date" class="input-form"  name="fecha" value="<?php echo $atencion['fecha'];?>">
    </div>
    <div class="form text-center">
    <input type="hidden" name="idAtencion" value="<?php  echo $atencion["id"];?>">
    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
       $atencionActualizar = AtencionControlador::ctrActualizarRegistro();
       if ($atencionActualizar == "ok") {

        echo "<script> 
               alert('Registro Exitosos');
           </script>";
        echo "<script> window.location = '".URL_BASE."atencion/';</script>";
      }
    
    ?>
 
          
  </form>
    

</div>

</div>