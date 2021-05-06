<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro/';</script>";
    return;
}
?>

<div class="centrar">

<div class="form-registro">

<h4 class="text-center">Crear Servicio</h4>

  <form method="POST"  enctype="multipart/form-data">
    <div class="form">
      <label for="">Titulo:</label>
      <input type="text" name="titulo" class="input-form" value="">
    </div>
    <div class="form">
      <label for="">Descripcion:</label>
      <textarea name="descripcion" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form">
      <label for="">img:</label>
      <input type="file" class="input-form"  name="imagen" >
    </div>

  
    <div class="form text-center">

    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
       $servicio = ServicioControlador::ctrRegistroInfo();
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