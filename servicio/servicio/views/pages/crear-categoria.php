<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro/';</script>";
    return;
}
?>

<div class="centrar">

<div class="form-registro">

<h4 class="text-center">Crear Categoria</h4>
<!-- asunto
codigo
fecha
descripcion
estado -->
  <form method="POST">
    <div class="form">
      <label for="">Nombre de la categoria:</label>
      <input type="text" name="nombre" class="input-form">
    </div>
    

    <div class="form text-center">
    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
       $categoria = CategoriaControlador::ctrRegistroInfo();
       if ($categoria == "ok") {

        echo "<script> 
               alert('Registro Exitosos');
           </script>";
        echo "<script> window.location = '".URL_BASE."categoria/';</script>";
      }
    
    ?>
 
          
  </form>
    

</div>

</div>