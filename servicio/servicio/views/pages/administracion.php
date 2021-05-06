<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro';</script>";
    return;
}
?>

<h3 class="text-center">Panel de Administración</h3>
<div class="row">
  <div class="column column-md  side" >
   <div class="btnGrupo">
       <a href="<?php echo URL_BASE ?>reporte/" class="boton mt">Reporte</a>
       <?php 

   if ($_SESSION['rol'] == "administrador"){
   
       ?>
       <a href="<?php echo URL_BASE ?>contacto/"  class="boton mt">Contactos</a>
       <a href="<?php echo URL_BASE ?>atencion/"  class="boton mt">Atenciones</a>
       <a href="<?php echo URL_BASE ?>categoria/"  class="boton mt">Categorias</a>
       <a href="<?php echo URL_BASE ?>equipo/"  class="boton mt">Equipos</a>
       <a href="<?php echo URL_BASE ?>servicio/"  class="boton mt">Servicios</a>
       <a href="<?php echo URL_BASE ?>usuario/"  class="boton mt">Usuarios</a>
       <?php }?>
   </div>
 
  </div>
  <div class="column middle" style="background-color:#bbb;">
     <?php echo URL_BASE; ?>
</div>
</div>

