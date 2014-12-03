<?php
/*Incluimos el fichero de la clase*/
include_once 'clase_DB.php';

/**
 * Clase que gestiona las distintas consultas de los envíos
 * @author Mario Vilches Nieves
 *
 */
class ClaseEnvios
{
/**
 * Instancia de la clase conexión
 * @var unknown
 */
private $instancia_conexion; //instancia de la clase conexion
	
	/**
	 * Constructor de la clase envíos
	 */
	public function __construct()
	{
		$this->instancia_conexion=Db::getInstance();
	}

	/**
	 * Consulta que devuelve las provincias con su código
	 * @return array|NULL
	 */
	function select_provincias()
	{
		$sql_prov = 'select Cod,Nombre from tbl_provincias;';
		$stmt2 = $this->instancia_conexion->Consulta($sql_prov);
		
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$provincias[]=$registro;
		}
		
		return $provincias;
	}
	
	/**
	 * Consulta que lista todos los envíos
	 * @return array|NULL
	 */
	function listar()
	{
	
		$sql_envios ='select *,tbl_provincias.nombre as prov from envio,tbl_provincias where envio.provincia=tbl_provincias.cod;';//modifcar la consulta
		$stmt2 = $this->instancia_conexion->Consulta($sql_envios);
		
		$envios=array();
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$envios[]=$registro;
		}
	
		return $envios;
	}
	
	/**
	 * Consulta que muestra el envío que se va a modificar
	 * @param int $cod_envio
	 * @return array|NULL
	 */
	function envio_mod($cod_envio)
	{
		$sql_envios="select *,tbl_provincias.nombre as prov from envio,tbl_provincias where envio.provincia=tbl_provincias.cod and
		envio.cod_envio='$cod_envio';";
	
	
		$stmt2 = $this->instancia_conexion->Consulta($sql_envios);
	
		$envios=array();
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$envios[]=$registro;
		}
	
		return $envios;
	}
	
	/**
	 * Consulta de modificación de un envío
	 * @param array $datos_envios
	 */
	function modificar($datos_envios)
	{
		$sql_envio="UPDATE envio
		SET `destinatario`= '".$datos_envios['destinatario']."',
		`telefono`= '".$datos_envios['telefono']."',
		`direccion`= '".$datos_envios['direccion']."',
		`poblacion`= '".$datos_envios['poblacion']."',
		`postal`= '".$datos_envios['postal']."',
		`provincia`= '".$datos_envios['provincias']."',
		`email`= '".$datos_envios['web']."',
		`estado`= '".$datos_envios['estado']."',
		`creacion`= '".$datos_envios['creacion']."',
		`entrega`= '".$datos_envios['entrega']."',
		`observaciones`= '".$datos_envios['observaciones']."'
		WHERE `cod_envio`=".$datos_envios['cod_envio'].";";
		
		$stmt2=$this->instancia_conexion->Consulta($sql_envio);
	
	}
	
	/**
	 * Consulta que lista el envío al cual queremos añadir la recepción
	 * @param int $cod
	 * @return array|NULL
	 */
	function listar_recepcion($cod)
	{
	
		$sql_envios ="select * from envio where cod_envio=".$cod.";";
		$stmt2 = $this->instancia_conexion->Consulta($sql_envios);
	
		$envios=array();
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$envios[]=$registro;
		}
	
		return $envios;
	}
	
	/*function listar_paginacion()
	{
	
		$sql_envios ='select *,tbl_provincias.nombre as prov from envio,tbl_provincias where envio.provincia=tbl_provincias.cod;';//modifcar la consulta
		$stmt2 = $this->instancia_conexion->Consulta($sql_envios);
	
		$envios=array();
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$envios[]=$registro;
		}
	
		return $envios;
		
		https://nafiux.com/blog/2010/10/04/paginacion-de-resultados-con-php-y-mysql/
	}*/
	
	/**
	 * Consulta que añade un nuevo envío a la base de datos
	 * @param array $datos_envio
	 * @param DateTime $fecha_creacion
	 */
	function anadir($datos_envio,$fecha_creacion)
	{
		$sql_envio="INSERT INTO envio VALUES (
				'null',
				'".$datos_envio['destinatario']."',
				'".$datos_envio['telefono']."',
				'".$datos_envio['direccion']."',
				'".$datos_envio['poblacion']."',
				'".$datos_envio['postal']."',
				'".$datos_envio['provincias']."',
				'".$datos_envio['web']."',
				'".$datos_envio['estado']."',
				'".$fecha_creacion."',
				'null',
				'".$datos_envio['observaciones']."'
				)";
		$stmt2=$this->instancia_conexion->Consulta($sql_envio);
	}
	
	/**
	 * Consulta que muestra el envío a borrar
	 * @param int $cod_envio
	 * @return array|NULL
	 */
	function envio_borrar($cod_envio)
	{
		$sql_envio = "select destinatario from envio where cod_envio=".$cod_envio.";";
		$stmt2 = $this->instancia_conexion->Consulta($sql_envio);
		
		$envios=array();
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$envios[]=$registro;
		}
	
		return $envios;
	}
	
	/**
	 * Consulta que elimina un envío de la base de datos
	 * @param int $cod_envio
	 */
	function borrar($cod_envio)
	{
	
		$sql_envio="Delete From envio where cod_envio=".$cod_envio.";";
		$stmt2=$this->instancia_conexion->Consulta($sql_envio);
	}
	
	/**
	 * Consulta que nos muestra el resultado de una búsqueda
	 * @param string $destinatario
	 * @param string $poblacion
	 * @param string $estado
	 * @return array|NULL
	 */
	function consultar($destinatario,$poblacion,$estado)
	{
	
		$sql_envio="select *,tbl_provincias.nombre as prov from envio,tbl_provincias where envio.provincia=tbl_provincias.cod and
		(envio.destinatario like '$destinatario' or envio.poblacion like '$poblacion' or envio.estado ='$estado');";
	
	
		$stmt2 = $this->instancia_conexion->Consulta($sql_envio);
		
		$envios=array();
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$envios[]=$registro;
		}
	
		return $envios;
	
	}
	
	/**
	 * Consulta para actualizar el estado de un envío a entregado
	 * @param array $datos_envio
	 * @param DateTime $fecha_entrega
	 */
	function actualizar_recepcion($datos_envio,$fecha_entrega)
	{
		$sql_envio="UPDATE envio
		SET `estado`= 'E',
		`entrega`= '".$fecha_entrega."',
		`observaciones`= '".$datos_envio['observaciones']."'
		WHERE `cod_envio`=".$datos_envio['cod_envio'].";";
		$stmt2=$this->instancia_conexion->Consulta($sql_envio);
	}
	
	/**
	 * Consulta para calcular el número total de envíos para la paginación
	 * @return array
	 */
	public function numero_envios(){
	
		$sql_envios = "select count(*) as total from envio;";
		$stmt2 = $this->instancia_conexion->Consulta($sql_envios);
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$num_envios[]=$registro['total'];
		}
	
		return $num_envios;
	}
	
	/**
	 * Consulta para listar los envíos en un determinado rango, para la paginación
	 * @param int $inicio
	 * @param int $cantidad
	 * @return array|NULL
	 */
	public function ListarRango($inicio, $cantidad){
			
		$sql_envios = $sql_envios ='select *,tbl_provincias.nombre as prov from envio,tbl_provincias where envio.provincia=tbl_provincias.cod order by envio.destinatario limit '.$inicio.','.$cantidad.';';
	
		$stmt2 = $this->instancia_conexion->Consulta($sql_envios);
	
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$envios[]=$registro;
		}
	
		return $envios;
	}
	
	/*function numero_envios()
	{
		$sql_envios="select count(*) from envios";
		$stmt2 = $this->instancia_conexion->Consulta($sql_envios);
		
		while ($registro = $this->instancia_conexion->LeeRegistro($stmt2))
		{
			$envios[]=$registro;
		}
		
		return $envios;
		
	}*/
}