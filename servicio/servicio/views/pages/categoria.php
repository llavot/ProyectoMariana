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
    <h3 class="text-center">Panel de Categoria</h3>


    <a href="<?php echo URL_BASE ?>crear-categoria/" class="boton">Crear Categoria</a>
<div class="contenedor  centrar">

<table >
<caption>Tabla de categoria.</caption>
<tr> 
    <th>Numero</th>
    <th>Nombre</th>
     <th>Acciones </th>
</tr>
<tbody>
<?php  
         
        $categorias = CategoriaControlador::ctrMostarRegistroInfo(null, null);
    //   echo "<pre>";
    //     var_dump( $Categoria);
    //     echo "</pre>";
        foreach($categorias as $key => $categoria){

                   
?>


<tr> 
    <td># <?php echo $key + 1;  ?></td> 
    <td><?php echo  $categoria['nombre'];  ?></td>
    <td>
        <a href="<?php echo URL_BASE ?>editar-categoria/<?php echo $categoria['id']; ?>" class="btn naranja">Editar</a>
        <form method="POST">
        <input type="hidden" name="id_Categoria" value="<?php echo  $categoria['id']; ?>">
           <button type="submit"  class="btn rojo">Eliminar</button>
           <?php
               $eliminarCategoria = new CategoriaControlador();
               $eliminarCategoria->ctrEliminarRegistro();        
           ?>
        </form>
    </td> 

</tr>
<?php }?>
</tbody>


</table>

</div>






</div>