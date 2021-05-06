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

<!-- 1	id Primaria	int(12)			No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	
Más Más
	2	nombre	varchar(80)	utf8mb4_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
Más Más
	3	modelo	varchar(80)	utf8mb4_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
Más Más
	4	marca	varchar(80)	utf8mb4_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
Más Más
	5	descripcion	text	utf8mb4_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
Más Más
	6	idcategoria -->


<div class="contenedor">
    <h3 class="text-center">Panel de Equipo</h3>


    <a href="<?php echo URL_BASE ?>crear-equipo/" class="boton">Crear Equipo</a>
<div class="contenedor  centrar">

<table >
<caption>Tabla de equipo.</caption>
<tr> 
    <th>Numero</th>
    <th>Nombre</th>
    <th>Modelo</th>
    <th>Marca</th>
    <th>Descripcion</th>
    <th>Categoria</th>
     <th>Acciones </th>
</tr>
<tbody>
<?php  
         
        $equipos = EquipoControlador::ctrMostarRegistroInfo(null, null);
    //   echo "<pre>";
    //     var_dump( $equipos);
    //     echo "</pre>";
        foreach($equipos as $key => $equipo){
               
?>


<tr> 
    <td># <?php echo $key + 1;  ?></td> 
    <td><?php echo  $equipo['nombre'];  ?></td>
    <td><?php echo  $equipo['modelo'];  ?></td>
    <td><?php echo  $equipo['marca'];  ?></td>
    <td><?php echo  $equipo['descripcion'];  ?></td>
    <td><?php echo  $equipo['idcategoria'];  ?></td>
    <td>
        <a href="<?php echo URL_BASE ?>editar-equipo/<?php echo $equipo['id']; ?>" class="btn naranja">Editar</a>
        <form method="POST">
        <input type="hidden" name="id_Equipo" value="<?php echo  $equipo['id']; ?>">
           <button type="submit"  class="btn rojo">Eliminar</button>
           <?php
               $eliminarEquipo = new EquipoControlador();
               $eliminarEquipo->ctrEliminarRegistro();        
           ?>
        </form>
    </td> 

</tr>
<?php }?>
</tbody>


</table>

</div>






</div>