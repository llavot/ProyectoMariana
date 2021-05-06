<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro/';</script>";
    return;
}
?>

<div class="centrar">

<div class="form-registro">

<h4 class="text-center">Reporte de Atención</h4>
<!-- asunto
codigo
fecha
descripcion
estado -->
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
       <option value="<?php echo $reporte['codigo'] ?>"><?php echo $reporte['asunto'] ?></option>
   

       <?php }  ?>
       </select>
    </div>

    <div class="form">
      <label for="">Estado:</label>
      <input type="text" class="input-form"  name="estado" value="">
    </div>

    <div class="form">
      <label for="">Fecha:</label>
      <input type="date" class="input-form"  name="fecha" value="">
    </div>
    <div class="form text-center">
    <button type="submit" class="boton  ">Enviar</button>
    </div>
    <?php
       $atencion = AtencionControlador::ctrRegistroInfo();
       if ($atencion == "ok") {

        echo "<script> 
               alert('Registro Exitosos');
           </script>";
        echo "<script> window.location = '".URL_BASE."atencion/';</script>";
      }
    
    ?>
 
          
  </form>
    

</div>

</div>