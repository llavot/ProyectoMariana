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
    <h3 class="text-center">Panel de Reporte</h3>


    <a href="<?php echo URL_BASE ?>crear-reporte/" class="boton">Crear Reporte</a>
<div class="contenedor  centrar">

<table >
<caption>Tabla de reporte.</caption>
<tr> 
    <th>Numero</th>
    <th>Asunto</th>
     <th>Descripción</th> 
     <th>Tipo de servicio</th>
     <th>Fecha</th> 
     <th>Codigo </th>
     <th>Usuario </th>
     <th>Reporte </th>
     <th>Acciones </th>
</tr>
<tbody>
<?php  
         
        $reportes = ReporteControlador::ctrMostarRegistroInfo(null, null);
    //   echo "<pre>";
    //     var_dump( $reportes);
    //     echo "</pre>";
        foreach($reportes as $key => $reporte){

                   
?>


<tr> 
    <td># <?php echo $key + 1;  ?></td> 
    <td><?php echo  $reporte['asunto'];  ?></td> 
    <td><?php echo  $reporte['descripcion'];  ?></td> 
    <td><?php echo  $reporte['tipo_servicio'];  ?></td> 
    <td><?php echo  $reporte['fecha'];  ?></td> 
    <td><?php echo  $reporte['codigo'];  ?></td> 
    <td><?php echo  $reporte['usuario_id'];  ?></td> 
    <td>
    <a href="<?php echo URL_BASE ?>agregar-atencion/<?php echo $reporte['id']; ?>" class="btn azul">atender</a>
    </td>  
    <td>
        <a href="<?php echo URL_BASE ?>editar-reporte/<?php echo $reporte['id']; ?>" class="btn naranja">Editar</a>
        <form method="POST">
        <input type="hidden" name="id_Reporte" value="<?php echo  $reporte['id']; ?>">
           <button type="submit"  class="btn rojo">Eliminar</button>
           <?php
               $eliminarReporte = new ReporteControlador();
               $eliminarReporte->ctrEliminarRegistro();        
           ?>
        </form>
    </td> 

</tr>
<?php }?>
</tbody>


</table>

</div>






</div>