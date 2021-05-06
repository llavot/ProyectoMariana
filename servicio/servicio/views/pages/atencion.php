<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = '".URL_BASE."registro';</script>";
    return;
}else{
    if ($_SESSION['rol'] != "administrador"){
        echo "<script> window.location = '".URL_BASE."administracion';</script>";
        return;
    }
}



?>




<div class="contenedor">
    <h3 class="text-center">Panel de Atenciones</h3>


    <a href="<?php echo URL_BASE ?>crear-atencion/" class="boton">Crear Atención</a>
<div class="contenedor  centrar">

<table >
<caption>Tabla de Atencion.</caption>
<tr> 
<!-- asunto
codigo
fecha
descripcion
estado -->
    <th>Numero</th>
    <th>Asunto</th>
     <th>Codigo </th>
     <th>Fecha</th> 
     <th>Descripción</th> 
     <th>Estado</th>
     <th>Acciones </th>
</tr>
<tbody>
<?php  
         
        $atenciones = AtencionControlador::ctrMostarRegistroInfo(null, null);
    //   echo "<pre>";
    //     var_dump( $atenciones);
    //     echo "</pre>";
        foreach($atenciones as $key => $atencion){

                   
?>


<tr> 
    <td># <?php echo $key + 1;  ?></td> 
    <td><?php echo  $atencion['asunto'];  ?></td> 
    <td><?php echo  $atencion['codigo'];  ?></td> 
    <td><?php echo  $atencion['fecha'];  ?></td> 
    <td><?php echo  $atencion['descripcion'];  ?></td> 
    <td><?php echo  $atencion['estado'];  ?></td>  
  
    <td>
        <a href="<?php echo URL_BASE ?>editar-atencion/<?php echo $atencion['id']; ?>" class="btn naranja">Editar</a>
        <form method="POST">
        <input type="hidden" name="id_Atencion" value="<?php echo  $atencion['id']; ?>">
           <button type="submit"  class="btn rojo">Eliminar</button>
           <?php
               $eliminarAtencion = new AtencionControlador();
               $eliminarAtencion->ctrEliminarRegistro();        
           ?>
        </form>
    </td> 

</tr>
<?php }?>
</tbody>


</table>

</div>






</div>