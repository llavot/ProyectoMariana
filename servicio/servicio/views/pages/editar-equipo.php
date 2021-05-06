<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro/';</script>";
    return;
}
?>

<?php


$rutas = explode("/", $_GET["page"]);

$id =  $rutas[1];
  $equipo = EquipoControlador::ctrMostarRegistroInfo('id', $id);
 
?> 

<div class="centrar">

<div class="form-registro">

<h4 class="text-center">Editar Equipo</h4>

  <form method="POST">
    <div class="form">
      <label for="">Nombre:</label>
      <input type="text" name="nombre" class="input-form" value="<?php echo $equipo['nombre'];?>">
    </div>
    <div class="form">
      <label for="">Modelo:</label>
      <input type="text" name="modelo" class="input-form" value="<?php echo $equipo['modelo'];?>">
    </div>
    <div class="form">
      <label for="">Marca:</label>
      <input type="text" name="marca" class="input-form" value="<?php echo $equipo['marca'];?>">
    </div>
    <div class="form">
      <label for="">Descripcion:</label>
      <textarea name="descripcion" id="" cols="30" rows="10"><?php echo $equipo['descripcion'];?>
      </textarea>
    </div>
    <div class="form">
      <label for="">Categoria:</label>
       <select name="idcategoria" id="" class="input-form">
       <option value="">Seleccione una opción</option>
    
       <?php     
          
          $categoria = CategoriaControlador::ctrMostarRegistroInfo(null, null);
          foreach($categoria as $key => $categoria){
          
       ?>
       <option <?php echo $categoria['id'] == $equipo["idcategoria"] ? 'selected': '' ?> value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nombre'] ?></option>
   

       <?php }  ?>
       </select>
    </div>

  
    <div class="form text-center">
    <input type="hidden" name="idEquipo" value="<?php  echo $equipo["id"];?>">
    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
       $equipoActualizar = EquipoControlador::ctrActualizarRegistro();
       if ($equipoActualizar == "ok") {

        echo "<script> 
               alert('Registro Exitosos');
           </script>";
        echo "<script> window.location = '".URL_BASE."equipo/';</script>";
      }
    
    ?>
 
          
  </form>
    

</div>

</div>