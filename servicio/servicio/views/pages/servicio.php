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
    <h3 class="text-center">Panel de Servicios</h3>


    <a href="<?php echo URL_BASE ?>crear-servicio/" class="boton">Crear Servicio</a>
<div class="contenedor  centrar">

<table >
<caption>Tabla de Servicio.</caption>
<tr> 

     <th>Numero</th>
     <th>Titulo</th>
     <th>Descripcion </th>
     <th>Imagen</th> 
     <th>Acciones </th>
</tr>
<tbody>
<?php  
         
        $servicios = ServicioControlador::ctrMostarRegistroInfo(null, null);
    //   echo "<pre>";
    //     var_dump( $servicios);
    //     echo "</pre>";
        foreach($servicios as $key => $servicio){

                   
?>


<tr> 
    <td># <?php echo $key + 1;  ?></td> 
    <td><?php echo  $servicio['titulo'];  ?></td> 
    <td><?php echo  $servicio['descripcion'];  ?></td> 
    <td>
       <img src="<?php echo URL_BASE.$servicio['img']; ?>" width="100px" alt="">
    </td>  
    <td>
        <a href="<?php echo URL_BASE ?>editar-servicio/<?php echo $servicio['id']; ?>" class="btn naranja">Editar</a>
        <form method="POST">
        <input type="hidden" name="id_Servicio" value="<?php echo  $servicio['id']; ?>">
           <button type="submit"  class="btn rojo">Eliminar</button>
           <?php
               $eliminarServicio = new ServicioControlador();
               $eliminarServicio->ctrEliminarRegistro();        
           ?>
        </form>
    </td> 

</tr>
<?php }?>
</tbody>


</table>

</div>






</div>