<h4 class="text-center">Iniciar Sesión</h4>
<div class="centrar ">


    <form  method="POST" class="cuadro">
  
    <div class="form">
      <label for="">Correo:</label>
      <input type="text" name="correo" class="input-form">
    </div>
    <div class="form">
      <label for="">Contraseña:</label>
      <input type="password" name="contrasena" class="input-form">
    </div>
    <div class="form text-center">
      <input type="hidden" name="login" value="login">
        <button type="submit" class="boton ">Enviar</button>
    </div>
    <?php
    //Forma en que se instancia la clase de un método estático
       $login = new UsuarioControlador();
       $login->ctrLogin()
     ?>
  </form>


</div>
<div class="cajanenlace text-center">
  <a href="<?php echo URL_BASE ?>registro/" class="enlace ">Si aun no te has registrado</a>

</div>