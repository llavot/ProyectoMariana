<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro/';</script>";
    return;
}
?>

<div class="centrar">

<div class="form-registro">

<h4 class="text-center">Crear Equipo</h4>

  <form method="POST">
    <div class="form">
      <label for="">Nombre:</label>
      <input type="text" name="nombre" class="input-form">
    </div>
    <div class="form">
      <label for="">Descripcion:</label>
      <textarea name="descripcion" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form">
      <label for="">Categoria:</label>
       <select name="idcategoria" id="" class="input-form">
       <option value="">Seleccione una opción</option>
       <?php     
          
          $categorias = CategoriaControlador::ctrMostarRegistroInfo(null, null);
          //   echo "<pre>";
          //     var_dump( $categorias);
          //     echo "</pre>";
              foreach($categorias as $key => $categoria){
       
       ?>
       <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nombre'] ?></option>
   

       <?php }  ?>
       </select>
    </div>

    <div class="form">
      <label for="">Modelo:</label>
      <input type="text" class="input-form"  name="modelo" value="">
    </div>

    <div class="form">
      <label for="">Marca:</label>
      <input type="text" class="input-form"  name="marca" value="">
    </div>

    <div class="form text-center">
    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
       $equipo = EquipoControlador::ctrRegistroInfo();
       if ($equipo == "ok") {

        echo "<script> 
               alert('Registro Exitosos');
           </script>";
        echo "<script> window.location = '".URL_BASE."equipo/';</script>";
      }
    
    ?>
 
          
  </form>
    

</div>

</div>