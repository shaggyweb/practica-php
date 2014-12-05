<?php
/*Incluimos el fichero de la clase*/
include_once 'clase_DB.php'; 

/**
 * Clase que gestiona las distintas consultas de los envíos
 * @author Mario Vilches Nieves
 *
 */
class ClaseUsuarios
{
	
	/**
	 * Instancia de la clase conexión
	 */
	private $instancia_conexion;

	/**
	 * Constructor de la clase usuarios
	 */
	public function __construct()
	{
		$this->instancia_conexion=Db::getInstance();
	}
	
	/**
	 * Consulta que muestra el usuario en base al nombre y clave introducida
	 * @param string $nombre Nombre del usuario
	 * @param string $clave Password del usuario
	 * @return array|NULL
	 */
	function login($nombre,$clave)
	{
	
		$sql_usuario="select * from usuarios where nombre='$nombre' and clave='$clave';";
	
	
		$stmt2 = $this->instancia_conexion->Consulta($sql_usuario);
	
		$usuarios=array();
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$usuarios[]=$registro;
		}
	
		return $usuarios;
	
	}
	
	/**
	 * Consulta para listar todos los usuarios
	 * @return array|NULL
	 */
	function listar_usuarios()
	{
	
		$sql_usuarios ='SELECT * FROM usuarios;';
		$stmt2 = $this->instancia_conexion->Consulta($sql_usuarios);
	
		$usuarios=array();
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$usuarios[]=$registro;
		}
	
		return $usuarios;
	}
	
	/**
	 * Consulta para añadir un usuario
	 * @param array $datos_usuario Datos de todos los campos del usuario
	 */
	function anadir_usuario($datos_usuario)
	{
		$sql_usuarios="INSERT INTO usuarios VALUES (
				'null',
				'".$datos_usuario['nombre']."',
				'".$datos_usuario['clave']."'
				)";
		$stmt2=$this->instancia_conexion->Consulta($sql_usuarios);
	}
	
	/**
	 * Consulta que selecciona el usuario a borrar
	 * @param int $cod_usuario Código del usuario
	 * @return array|NULL
	 */
	function usuario_borrar($cod_usuario)
	{
		$sql_usuarios = "select nombre from usuarios where codigo=".$cod_usuario.";";
		$stmt2 = $this->instancia_conexion->Consulta($sql_usuarios);
	
		$usuarios=array();
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$usuarios[]=$registro;
		}
	
		return $usuarios;
	}
	
	/**
	 * Consulta que elimina un usuario de la base de datos
	 * @param int $cod_usuario Código del usuario
	 */
	function borrar_usuario($cod_usuario)
	{
	
		$sql_usuarios="Delete From usuarios where codigo=".$cod_usuario.";";
		$stmt2=$this->instancia_conexion->Consulta($sql_usuarios);
	}
	
	/**
	 * Consulta que selecciona el usuario a modificar
	 * @param int $cod_usuario Código del usuario
	 * @return array|NULL
	 */
	function usuario_mod($cod_usuario)
	{
		$sql_usuarios = "select * from usuarios where codigo=".$cod_usuario.";";
		$stmt2 = $this->instancia_conexion->Consulta($sql_usuarios);
	
		$usuarios=array();
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$usuarios[]=$registro;
		}
	
		return $usuarios;
	}
	
	/**
	 * Consulta que modifica un usuario
	 * @param array $datos_usuario Datos de todos los campos del usuario
	 */
	function modificar_usuario($datos_usuario)
	{
		$sql_usuarios="UPDATE usuarios
		SET `nombre`= '".$datos_usuario['nombre']."',
		`clave`= '".$datos_usuario['clave']."'
		WHERE `codigo`=".$datos_usuario['cod_usuario'].";";
	
		$stmt2=$this->instancia_conexion->Consulta($sql_usuarios);
	
	}
}