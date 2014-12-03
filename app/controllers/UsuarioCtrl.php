<?php
/**
 * Controlador de Usuarios
 * Contiene toda la funcionalidad de los usuarios
 * @author Mario Vilches Nieves
 */
class UsuarioCtrl {

	private $OperacionUsuarios;
	/**
	 * Array que almacena la lista de errores
	 * @var array
	 */
	private $lista_errores=array();
	
	
	/** 
	 * Creación de un objeto de la clase usuarios */
	public function __construct(){
	
		$this->OperacionUsuarios=new ClaseUsuarios();
	}
	
	/**
	 * Función que carga la página de login del usuario
	 */
	public function CargarLogin()
	{
		include 'app/views/login.php';
	}
	
	/**
	 * Función que valida si un usuario es válido
	 * 
	 * Si es válido accederá a la funcionalidad, si no lo es volverá a la página de login
	 */
	public function Validar()
	{
		$nombre=$_POST['usuario'];
		$clave=$_POST['password'];
		
		$usuarios=$this->OperacionUsuarios->login($nombre, $clave);
		
		if (!empty($usuarios))
		{
			
			$_SESSION['dentro']="ok";
			$inicio_sesion = getdate( time() );
			$_SESSION['tiempo'] = $inicio_sesion["hours"] . ":" . $inicio_sesion["minutes"];
			header('location:index.php');
		}
		else
		{
			include 'app/views/login.php';
		}
	}
	
	/**
	 * Función que muestra la página de Gestión de Usuarios
	 * 
	 * Desde Gestión de Usuarios se podrá añadir, eliminar y modificar un usuario
	 */
	public function GestionUsuarios()
	{
		$usuarios=$this->OperacionUsuarios->listar_usuarios();
		include 'app/views/gestion_usuarios.php';
	}
	
	/**
	 * Función que muestra el formulario de nuevo usuario y lo añade a la Base de Datos
	 */
	public function NuevoUsuario()
	{
		if (!$_POST)
		{
			include 'app/views/nuevo_usuario.php';
		}
		else
		{
			// Filtramos datos
			$this->Validar_Campos();
			// Si hay error
			if(!empty($this->lista_errores))
			{
				// Mostramos de nuevo formulario
				include 'app/views/nuevo_usuario.php';
			}
			else
			{
				// Realizamos operacion
				//Creacion de array para pasar los valores del post al modelo
				$datos_usuario=$_POST;
				$this->OperacionUsuarios->anadir_usuario($datos_usuario);
				// Realizamos la operación que proceda
				$this->GestionUsuarios();
			}
		}
	}
	
	/**
	 * Función que elimina un usuario
	 */
	public function ConfirmarBorradoUsu()
	{
		$cod_usuario=isset($_GET['id'])?$_GET['id']:'';
		$respuesta=isset($_GET['respuesta'])?$_GET['respuesta']:'';
		
		
		if($respuesta=='')
		{
			echo $cod_usuario;
			$usuarios=$this->OperacionUsuarios->usuario_borrar($cod_usuario);
		
			include 'app/views/confirmar_borrar_usu.php';
		}
		elseif($respuesta=='si')
		{
		
			if ($cod_usuario!='')
			{
		
				$this->OperacionUsuarios->borrar_usuario($cod_usuario);
				$this->GestionUsuarios();
			}
		}
		elseif($respuesta=='no')
		{
			header('location:index.php');
		}
	}
	
	/**
	 * Función que modifica los datos de un usuario existente
	 */
	public function UsuarioModificar()
	{
		$cod_usuario=isset($_GET['id'])?$_GET['id']:'';
		
		if (!$_POST)
		{
			$usuarios=$this->OperacionUsuarios->usuario_mod($cod_usuario);
				
			include 'app/views/usuario_modificar.php'; //se muestra la vista con los datos del empleado a modificar
				
		}
		else
		{
				
			$datos_usuario=$_POST; //array que guarda los datos modificados del usuario
				
			$usuarios=$this->OperacionUsuarios->modificar_usuario($datos_usuario);

			$this->GestionUsuarios();
		}
	}
	
	/**
	 * Función que cierra la sesión de un usuario
	 * 
	 * Destrucción de la sesión
	 */
	public function Cerrar()
	{
		session_unset();
		session_destroy();
		header('location:index.php');
	}
	
	/**
	 * Función que recoge si un campo ha sido fijado con el método POST
	 * @param string $campo Campo del formulario
	 * @return string Contendrá el valor del campo al enviar mediante POST, vacío si no hay POST
	 */
	public function Valor_Post($campo)
	{
		if (isset($_POST[$campo]))
		{
			return $_POST[$campo];
		}
		else
		{
			return '';
		}
	}
	
	/**
	 * Función que muestra los errores
	 * @param string $campo Campo del formulario
	 * @return string Devolverá el mensaje de error perteneciente al campo
	 */
	private function Mostrar_Error($campo)
	{
		if(isset($this->lista_errores[$campo]))
		{
			return $this->lista_errores[$campo];
		}
		else
		{
			return "";
		}
	}
	
	/** 
	 * Funcion que añade el mensaje de error al array que los almacena 
	 */
	private function Validar_Campos()
	{
		if($this->Valor_Post('nombre')=="")
		{
			$this->lista_errores['nombre']="El usuario es obligatorio";
		}
		if($this->Valor_Post('clave')=="")
		{
			$this->lista_errores['clave']="La clave es obligatoria";
		}
	}
}