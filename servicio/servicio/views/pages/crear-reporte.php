<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro/';</script>";
    return;
}
?>

<div class="centrar">

<div class="form-registro">

<h4 class="text-center">Reporte de Servicio</h4>

  <form method="POST">
    <div class="form">
      <label for="">Asunto:</label>
      <input type="text" name="asunto" class="input-form">
    </div>
    <div class="form">
      <label for="">Descripcion:</label>
      <textarea name="descripcion" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form">
      <label for="">Tipo de Servicio:</label>
       <select name="tipo_servicio" id="" class="input-form">
       <option value="">Seleccione una opción</option>
       <option value="Mantenimiento">Mantenimiento</option>
       <option value="Reparacion">Reparacion</option>
       </select>
    </div>
    <div class="form">
      <label for="">Codigo:</label>
      <?php   $codigo = uniqid();  ?>
      <input type="text" name="codigo" value="<?php  echo $codigo;?>" class="input-form">
    </div>
    <div class="form">
      <label for="">Fecha:</label>
      <input type="date" class="input-form"  name="fecha" value="">
    </div>
    <div class="form text-center">
    <input type="hidden" name="usuario_id" value="<?php  echo $_SESSION['id'] ;?>">
    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
       $reporte = ReporteControlador::ctrRegistroInfo();
       if ($reporte == "ok") {

        echo "<script> 
               alert('Registro Exitosos');
           </script>";
        echo "<script> window.location = '".URL_BASE."reporte/';</script>";
      }
    
    ?>
 
          
  </form>
    

</div>

</div>