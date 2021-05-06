
 <h3 class="text-center">Bienvenido al Sistema Servicios Tecnicos</h3>




  
   
   <h4 class="text-center">Registrate en el Sistema</h4>
   <div class="centrar">
     <form method="POST" class="cuadro">
       <div class="form">
         <label for="">Nombre:</label>
         <input type="text" name="nombre" class="input-form">
       </div>
       <div class="form">
         <label for="">Correo:</label>
         <input type="text" name="correo" class="input-form">
       </div>
       <div class="form">
         <label for="">Contraseña:</label>
         <input type="password" name="contrasena" class="input-form">
       </div>
       <div class="form">
         <label for="">Confirmar Contraseña:</label>
         <input type="password" class="input-form">
       </div>
       <div class="form text-center">
       <input type="hidden" name="registro" value="registro">
       <button type="submit" class="boton  ">Enviar</button>
       </div>
       <?php
      
       //Forma en que se instancia la clase de un método estático
       $registro = UsuarioControlador::ctrRegistro();

    if ($registro == "ok") {

      echo "<script> 
             alert('Registro Exitosos');
         </script>";
         echo "<script> window.location = '".URL_BASE."login/';</script>";
    }
       
   ?>

             
     </form>
       
   
 



</div>

<div class="cajanenlace text-center">
  <a href="<?php echo URL_BASE ?>login/" class="enlace ">Si ya te registraste</a>

</div>