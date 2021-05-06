
<div class="barra">
        <a href="#nav" class="mobile-menu">
            <i class="fas fa-ellipsis-v"></i>
        </a>

        <nav id="nav" class="navegacion-principal contenedor">
            <a href="<?php echo URL_BASE ?>">Inicio</a>
            <a href="<?php echo URL_BASE ?>">Nosotros</a>
            <a href="<?php echo URL_BASE ?>">Servicio</a>
            <a href="<?php echo URL_BASE ?>">Contacto</a>
            <a href="<?php echo URL_BASE ?>login/">Soporte Tecnico</a>
            <?php
                 
             if (isset($_SESSION['validarIngreso']) == "ok") {    ?>
                   
            
                   <a href="<?php echo URL_BASE ?>administracion/">administracion</a>
                 <a href="<?php echo URL_BASE ?>logout/">Cerrar Sessión</a>
                 

             <?php   }?>
                 
        

            <a href="#" class="cerrar">
                    <i class="fas fa-times"></i>
            </a>
        </nav>
    </div>