<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro/';</script>";
    return;
}
?>

<?php


$rutas = explode("/", $_GET["page"]);

$id =  $rutas[1];
  $categoria = CategoriaControlador::ctrMostarRegistroInfo('id', $id);
 

?> 

<div class="centrar">

<div class="form-registro">

<h4 class="text-center">Editar Categoria</h4>

  <form method="POST">
    <div class="form">
      <label for="">Nombre de la Categoria:</label>
      <input type="text" name="nombre" class="input-form" value="<?php echo $categoria['nombre'];?>">
    </div>
 
    <div class="form text-center">
    <input type="hidden" name="idCategoria" value="<?php  echo $categoria["id"];?>">
    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
       $categoriaActualizar = CategoriaControlador::ctrActualizarRegistro();
       if ($categoriaActualizar == "ok") {

        echo "<script> 
               alert('Registro Exitosos');
           </script>";
        echo "<script> window.location = '".URL_BASE."categoria/';</script>";
      }
    
    ?>
 
          
  </form>
    

</div>

</div>