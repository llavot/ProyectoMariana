<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro/';</script>";
    return;
}
?>

<?php


$rutas = explode("/", $_GET["page"]);

$id =  $rutas[1];
  $servicio = ServicioControlador::ctrMostarRegistroInfo('id', $id);
 

?>

<div class="centrar">

<div class="form-registro">

<h4 class="text-center">Editar Servicio</h4>

  <form method="POST" enctype="multipart/form-data">
    <div class="form">
      <label for="">Titulo:</label>
      <input type="text" name="titulo" class="input-form" value="<?php echo $servicio['titulo'];?>">
    </div>
    <div class="form">
      <label for="">Descripcion:</label>
      <textarea name="descripcion" id="" cols="30" rows="10"><?php echo $servicio['descripcion'];?></textarea>
    </div>
    <div class="form">
    <img src="<?php echo URL_BASE.$servicio['img'];?>" alt="" width="100px">
    <input type="hidden" name="imagenActual" value="<?php echo $servicio['img'];?>">
    </div>


    <div class="form">
      <label for="">img:</label>
      <input type="file" class="input-form"  name="imagen" >
    </div>

  
    <div class="form text-center">
    <input type="hidden" name="carpeta" value="<?php echo $servicio['carpeta'];?>">
    <input type="hidden" name="idServicio" value="<?php echo $servicio['id'];?>">
    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
       $servicio = ServicioControlador::ctrActualizarRegistro();
       if ($servicio == "ok") {

        echo "<script> 
               alert('Registro Exitosos');
           </script>";
        echo "<script> window.location = '".URL_BASE."servicio/';</script>";
      }
    
    ?>
 
          
  </form>
    

</div>

</div>