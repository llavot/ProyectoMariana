<?php

class UsuarioControlador {

  
  //Metedo para registrar usuarios
 static  public function ctrRegistro(){

    if(isset($_POST["registro"])){

        $table = "usuarios";

        //Encriptar contraseña
		$opciones = [
			'cost' => 12,
		];
    $encriptar  =	password_hash($_POST['contrasena'], PASSWORD_BCRYPT, $opciones);
    
    $fecha =  date('d-m-Y');
    $usuario = (isset($_POST['rol']) == '') ? 'usuario' : 'administrador';
        
        

        $data = array(
            'nombre' => $_POST['nombre'],
            'rol' => $usuario,
            'correo' => $_POST['correo'],
            'contrasena' => $encriptar ,
            'fecha' => $fecha,
        );
        $resultado = Usuario::mdlRegistro($table, $data);
        return $resultado;
    }

}

//mostrar

static public function ctrMostarRegistro( $item, $value){

    $table = "usuarios";
    $result = Usuario::mdlMostrarRegistro($table, $item, $value);
    return $result;
    
}

public function ctrLogin(){
    if (isset($_POST['login'])) {
        
        $table = "usuarios";
        $item  = "correo";
        $value = $_POST['correo'];

    
     $resultado = Usuario::mdlMostrarRegistro($table, $item, $value);
     
     if ($resultado['correo'] == $_POST['correo'] && password_verify($_POST['contrasena'], $resultado['contrasena']) ) {
        
       $_SESSION['validarIngreso'] = 'ok';
       $_SESSION['id'] = $resultado['id'];
       $_SESSION['nombre'] = $resultado['nombre'];
       $_SESSION['correo'] = $resultado['correo'];
       $_SESSION['fecha'] = $resultado['fecha'];
       $_SESSION['rol'] = $resultado['rol'];

    

        echo "<script> 
                alert('Login Exitoso');
             </script>";
        echo "<script> window.location = '".URL_BASE."administracion';</script>";
         
     } else {
      echo "<script> 
                 alert('Error  correo o contraseña no coinciden');
            </script>";
  
     }
     
    }
}
  

//Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id_usuario"])){

    $table = "usuarios";

    $value =  $_POST["id_usuario"];

    $result = Usuario::mdlEliminarRegistro($table, $value);

    if ($result == "ok") {
      echo "<script> window.location = '".URL_BASE."administracion';</script>";
    }

  }


}


}