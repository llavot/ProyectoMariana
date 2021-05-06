
<?php
/*========================================================================
 * 
 * Bloque de requerimiento de controladores y modelos en la ruta principal
 * 
 *========================================================================*/
require_once __DIR__. "/config.php";

require_once __DIR__."/controllers/TempleteControlador.php";
require_once __DIR__."/controllers/UsuarioControlador.php";
require_once __DIR__."/controllers/ReporteControlador.php";
require_once __DIR__."/controllers/AtencionControlador.php";
require_once __DIR__."/controllers/CategoriaControlador.php";
require_once __DIR__."/controllers/EquipoControlador.php";
require_once __DIR__."/controllers/ContactoControlador.php";
require_once __DIR__."/controllers/ServicioControlador.php";

require_once __DIR__."/models/Usuario.php";
require_once __DIR__."/models/Reporte.php";
require_once __DIR__."/models/Atencion.php";
require_once __DIR__."/models/Categoria.php";
require_once __DIR__."/models/Equipo.php";
require_once __DIR__."/models/Contacto.php";
require_once __DIR__."/models/Servicio.php";

//Se instancia la clase del controlador que devuelve una vista principal
$templete = new TempleteControlador();
$templete-> index();