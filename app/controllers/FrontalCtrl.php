<?php
//Carga de Modelos y Controladores
include_once 'app/models/clase_envios.php';
include_once 'app/models/clase_usuarios.php';
include_once 'app/controllers/EnviosCtrl.php';
include_once 'app/controllers/UsuarioCtrl.php';

/**
 * Clase del Controlador Frontal
 * @author Mario Vilches Nieves
 *
 */
class FrontalCtrl
{
	/**
	 * Función que permite acceder a las acciones en los distintos controladores
	 */
	public function Run()
	{
	
		// enrutamiento
		/**
		 * Array que permite el enrutamiento
		 */
		$map = array(
				'menu' => array('controller' =>'EnviosCtrl', 'action' =>'Menu'),
				'nuevo' => array('controller' =>'EnviosCtrl', 'action' =>'Nuevo'),
				'listar' => array('controller' =>'EnviosCtrl', 'action' =>'Listar'),
				'borrar' => array('controller' =>'EnviosCtrl', 'action' =>'Borrar'),
				'confirmar' => array('controller' =>'EnviosCtrl', 'action' =>'ConfirmarBorrado'),
				'consultar' => array('controller' =>'EnviosCtrl', 'action' =>'Consultar'),
				'recepcion' => array('controller' =>'EnviosCtrl', 'action' =>'Recepcion'),
				'nueva_recepcion' => array('controller' =>'EnviosCtrl', 'action' =>'NuevaRecepcion'),
				'modificar' => array('controller' =>'EnviosCtrl', 'action' =>'Modificar'),
				'envio_modificar' => array('controller' =>'EnviosCtrl', 'action' =>'EnvioModificar'),
				'login' => array('controller' =>'UsuarioCtrl', 'action' =>'CargarLogin'),
				'validar' => array('controller' =>'UsuarioCtrl', 'action' =>'Validar'),
				'gestion_usuarios' => array('controller' =>'UsuarioCtrl', 'action' =>'GestionUsuarios'),
				'nuevo_usuario' => array('controller' =>'UsuarioCtrl', 'action' =>'NuevoUsuario'),
				'confirmar_borrado_usu' => array('controller' =>'UsuarioCtrl', 'action' =>'ConfirmarBorradoUsu'),
				'usuario_modificar' => array('controller' =>'UsuarioCtrl', 'action' =>'UsuarioModificar'),
				'cerrar' => array('controller' =>'UsuarioCtrl', 'action' =>'Cerrar')
		);
		
		// Parseo de la ruta
		if (isset($_GET['action'])) {
			if (isset($map[$_GET['action']])) {
				$ruta = $_GET['action'];
			} else {
				header('Status: 404 Not Found');
				echo '<html><body><h1>Error 404: No existe la ruta <i>' .
						$_GET['ctl'] .
						'</p></body></html>';
				exit;
			}
		} else {
			if(isset($_SESSION['dentro']))
			{
				$ruta = 'menu';
			}
			else
			{
				$ruta = 'login';
			}
		}
		
		
		$controlador = $map[$ruta];
		// Ejecución del controlador asociado a la ruta
		
		if (method_exists($controlador['controller'],$controlador['action'])) {
			call_user_func(array(new $controlador['controller'], $controlador['action']));
		} else {
		
			header('Status: 404 Not Found');
			echo '<html><body><h1>Error 404: El controlador <i>' .
					$controlador['controller'] .
					'->' .
					$controlador['action'] .
					'</i> no existe</h1></body></html>';
		}
		
	}
	
}
