<?php
/*Incluimos el fichero de la clase*/
include_once 'clase_DB.php';

/**
 * Clase que gestiona las distintas consultas de los envÃ­os
 * @author Mario Vilches Nieves
 *
 */
class ClaseEnvios
{
/**
 * Instancia de la clase conexiÃ³n
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
	 * Consulta que devuelve las provincias con su cÃ³digo
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
	 * Consulta que lista todos los envÃ­os
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
	 * Consulta que muestra el envÃ­o que se va a modificar
	 * @param int $cod_envio Código de envío que queremos modificar
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
	 * Consulta de modificaciÃ³n de un envÃ­o
	 * @param array $datos_envios Contiene los datos de los campos del envío
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
	 * Consulta que lista el envÃ­o al cual queremos aÃ±adir la recepciÃ³n
	 * @param int $cod Código de envío que vamos a cambiar su estado
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
	
	/**
	 * Consulta que aÃ±ade un nuevo envÃ­o a la base de datos
	 * @param array $datos_envio Contiene los datos de los campos del envío
	 * @param DateTime $fecha_creacion Fecha de creación del pedido
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
	 * Consulta que muestra el envÃ­o a borrar
	 * @param int $cod_envio Código de envío que queremos borrar
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
	 * Consulta que elimina un envÃ­o de la base de datos
	 * @param int $cod_envio Código del envío que se va a borrar
	 */
	function borrar($cod_envio)
	{
	
		$sql_envio="Delete From envio where cod_envio=".$cod_envio.";";
		$stmt2=$this->instancia_conexion->Consulta($sql_envio);
	}
	
	/**
	 * Consulta que nos muestra el resultado de una bÃºsqueda
	 * @param string $destinatario Destinatario del envío que queremos buscar
	 * @param string $poblacion Población del envío que queremos buscar
	 * @param string $estado Estado del pedido que queremos buscar
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
	 * Consulta para actualizar el estado de un envÃ­o a entregado
	 * @param array $datos_envio Datos de todos los campos del envío
	 * @param DateTime $fecha_entrega Fecha de entrega del pedido
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
	 * Consulta para calcular el nÃºmero total de envÃ­os para la paginaciÃ³n
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
	 * Consulta para listar los envÃ­os en un determinado rango, para la paginaciÃ³n
	 * @param int $inicio Inicio de registro por el que empieza la lista
	 * @param int $cantidad Número de registros que muestra la lista
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
	
}