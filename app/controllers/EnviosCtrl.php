<?php
/**
 * Controlador de Envíos
 * Contiene toda la funcionalidad de los envíos
 * @author Mario Vilches Nieves
 */
class EnviosCtrl
{

	private $OperacionEnvios;
	
	/**
	 * Array que almacena la lista de errores
	 * @var array
	 */
	private $lista_errores=array(); //array que almacena la lista de errores

	/**
	 * Creación de un objeto de la clase envíos
	 */
	public function __construct(){
	
		$this->OperacionEnvios=new ClaseEnvios();
	}
	
	
	/**
	 * Función que abre el menú de opciones
	 */
	public function Menu()
	{
	
		include 'app/views/menu.php';
	}
	
	/**
	 * Función que abre la página de nuevo envío
	 * Mostrará el formulario vacío si es la primera vez que entramos o con errores en caso de enviar datos erróneos
	 */
	public function Nuevo()
	{
		if (!$_POST)
		{
			// Es la primera vez Mostramos formulario en blanco
			$provincias=$this->OperacionEnvios->select_provincias();
			include 'app/views/nuevo_envio.php';
		
		}
		else
		{
			// Filtramos datos
			$this->Validar_Campos();
			// Si hay error
			if(!empty($this->lista_errores))
			{
				// Mostramos de nuevo formulario
				$provincias=$this->OperacionEnvios->select_provincias();
				include 'app/views/nuevo_envio.php';
			}
			else
			{
				// Realizamos operacion
				//Creacion de array para pasar los valores del post al modelo
				$datos_envios=$_POST;
				$fecha_ceacion=date("Y/m/d");
				$this->OperacionEnvios->anadir($datos_envios,$fecha_ceacion);
				// Realizamos la operación que proceda: Vista exito, listar ...
				$this->Listar();
			}			
		}
	}
	
	/**
	 * Función que abre la página de anotar recepcion
	 */
	public function Recepcion()
	{
		if (!$_POST)
		{
			include 'app/views/anotar_recepcion.php';
		}
		else
		{
			if($_POST['codigo']=="")
			{
				include 'app/views/anotar_recepcion.php';
			}
			else
			{
				$cod=$_POST['codigo'];
				$envios=$this->OperacionEnvios->listar_recepcion($cod);
				if (empty($envios))
				{
					include 'app/views/envio_no_encontrado.php';
				}
				else
				{
					include 'app/views/envio_recepcion.php';
				}
			}
			
		}
	}
	
	/**
	 * Función que añade la recepción de un envío
	 * 
	 * Añade como fecha de entrega la fecha actual a la hora de cambiar el estado a entregado
	 */
	public function NuevaRecepcion()
	{
		
		$datos_envios=$_POST;
		$fecha_entrega=date("Y/m/d");
		$this->OperacionEnvios->actualizar_recepcion($datos_envios,$fecha_entrega);
		$this->Listar();
	}
	
	/**
	 * Función que muestra la página de consulta de envíos
	 */
	public function Consultar()
	{	
		if (!$_POST)
		{
			// Es la primera vez Mostramos formulario en blanco
			include 'app/views/consultar.php';
				
		}
		else
		{
			if($this->Valor_Post('destinatario')=="" && $this->Valor_Post('poblacion')=="" && $this->Valor_Post('destinatario')=="" && $_POST['estado']=="")
			{
				include 'app/views/consultar.php';
			}
			else
			{
				$destinatario=$this->Valor_Post('destinatario');
				$poblacion=$this->Valor_Post('poblacion');
				$estado=$_POST['estado'];
				
				$envios=$this->OperacionEnvios->consultar($destinatario, $poblacion, $estado);
				if (!empty ($envios))
				{
					include 'app/views/listar_envios_consulta.php';
				}
				else
				{
					include 'app/views/no_datos_encontrados.php';
				}
			}
		}
		
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
	 * Función que añade el mensaje de error al array lista_errores
	 */
	private function Validar_Campos()
	{
		if($this->Valor_Post('destinatario')=="")
		{
			$this->lista_errores['destinatario']="El destinatario es obligatorio";
		}
		if(($this->Valor_Post('telefono')=="") ||(!is_numeric($this->Valor_Post('telefono'))) || !preg_match("/^\d{9}$/", $this->Valor_Post('telefono')))
		{
			$this->lista_errores['telefono']="El telefono es obligatorio y debe tener un formato válido";
		}
		if(($this->Valor_Post('postal')=="") ||(!is_numeric($this->Valor_Post('postal')))||(!preg_match("/^\d{5}$/", $this->Valor_Post('postal'))) )
		{
			$this->lista_errores['postal']="El código postal es obligatorio y debe tener un formato válido";
		}
		if(($this->Valor_Post('web')=="")||!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/", $this->Valor_Post('web')))
		{
			$this->lista_errores['web']="El e-mail es obligatorio y debe contener un formato válido";
		}
	}
	
	/**
	 * Función que devuelve los mensajes de errores
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
	 * Función que lista todos los envíos de la base de datos
	 * Listado paginado
	 */
	public function Listar(){
	
		// se calcula la pagina
		$fichero = 'index.php?action=listar';
		$datos = $this->CalcularPagina($fichero);
	
		//se asignan los valores devueltos para mostrarlos en el paginador de la vista.
		$envios = $datos['envios'];
		$numPag = $datos['numPag'];
		$totalPaginas = $datos['totalPaginas'];
	
		include 'app/views/listar_envios.php';
	
	}
	
	/**
	 * Calcula la página que muestra los datos de envíos
	 * @param string $fichero URL de la página que contendrá la página vista
	 * @return array $datos Array que guardará los envíos de la consulta, el número de página y el total de páginas
	 */
	public function CalcularPagina($fichero){
			
		if (isset($_GET['pag'])){
	
			$numPag=$_GET['pag'];
	
		}
		else {
			$numPag=1;
		}
	
		$totalRegistros = $this->OperacionEnvios->numero_envios();
		$registrosPagina = 3;
	
		//se calcula el total de paginas redondeando hacia arriba
		$totalPaginas=ceil($totalRegistros[0]/$registrosPagina);
	
		// Calculamos el registro por el que se empieza en la sentencia LIMIT
		$numRegInicio=($numPag-1)*$registrosPagina;
	
		$envios = $this->OperacionEnvios->ListarRango($numRegInicio, $registrosPagina);
	
		$datos['envios'] = $envios;
		$datos['numPag'] = $numPag;
		$datos['totalPaginas'] = $totalPaginas;
	
		return $datos;
	
	}
	
	/**
	 * Función que muestra el esquema visual del paginador
	 * @param int $pag_actual Pagina actual mostrada
	 * @param int $nPags Número de Páginas Total que genera la consulta
	 * @param string $url Parte del enlace a las páginas
	 */
	function MuestraPaginador($pag_actual, $nPags, $url){
		// Mostramos la estructura completa del paginador

		//mostrara el inicio del paginador osea la pagina numero 1
		echo $this->EnlaceAPagina($url, 1, 'Primera Página');
		
		if($pag_actual>1)
		{
			echo $this->EnlaceAPagina($url, $pag_actual-1, '<');
		}
	
		//muestra todas las paginas como links menos en la que se esta actualmente.
		for($pag=1; $pag<=$nPags; $pag++)
		{
		
		echo $this->EnlaceAPagina($url, $pag, $pag);
		echo "-";
		}
		if($pag_actual<$nPags)
		{
			echo $this->EnlaceAPagina($url, $pag_actual+1, '>');
		}
	
		echo $this->EnlaceAPagina($url, $nPags, 'Última Página');
	
	}
	
	/**
	 * Función que muestra el enlace la página en el paginador
	 * @param string $url Parte del enlace a la página
	 * @param int $pag Número de página
	 * @param string $texto Texto que actúa como enlace, ya sea un número, texto o símbolo
	 * @return string Devuelve el enlace completo con el formato en cuestión
	 */
	function EnlaceAPagina($url, $pag, $texto)
	{
		return '<a href=" '.$url.'&pag='.$pag.' " id="linkPaginador" >'.'  '.$texto.'  '.'</a> ';
	}
	
	/**
	 * Función que muestra los envíos con la opción de borrar
	 * 
	 * Los envíos de muestran paginados
	 */
	public function Borrar()
	{
		// se calcula la pagina
		$fichero = 'index.php?action=borrar';
		$datos = $this->CalcularPagina($fichero);
		
		//se asignan los valores devueltos para mostrarlos en el paginador de la vista.
		$envios = $datos['envios'];
		$numPag = $datos['numPag'];
		$totalPaginas = $datos['totalPaginas'];
	
		include 'app/views/borrar_envios.php';
	}
	
	/**
	 * Función que muestra los envíos con la opción de modificar
	 * 
	 * Los envíos se muestran paginados
	 */
	public function Modificar()
	{
		// se calcula la pagina
		$fichero = 'index.php?action=modificar';
		$datos = $this->CalcularPagina($fichero);
		
		//se asignan los valores devueltos para mostrarlos en el paginador de la vista.
		$envios = $datos['envios'];
		$numPag = $datos['numPag'];
		$totalPaginas = $datos['totalPaginas'];
		
		include 'app/views/modificar_envios.php';
	
	}
	
	/**
	 * Función que muestra los datos del envío a modificar y permite modificarlos
	 * 
	 * Se rellenarán los controles del formulario con los datos del envío
	 */
	public function EnvioModificar()
	{
		$cod_envio=isset($_GET['id'])?$_GET['id']:'';
		
		if (!$_POST)
		{
			$provincias=$this->OperacionEnvios->select_provincias();
			$envios=$this->OperacionEnvios->envio_mod($cod_envio);
				
			include 'app/views/envio_modificar.php'; //se muestra la vista con los datos del envío a modificar
				
		}
		else
		{
				
			$datos_envios=$_POST; //array que guarda los datos modificados del envio
			$envios=$this->OperacionEnvios->modificar($datos_envios);
			$this->Listar();
		}
		
	}
	
	/**
	 * Función para confirmar el borrado de un envío
	 * 
	 * Si la respuesta es sí borrará el envío si es no volveremos al index
	 */
	public function ConfirmarBorrado()
	{
		$cod_envio=isset($_GET['id'])?$_GET['id']:'';
		$respuesta=isset($_GET['respuesta'])?$_GET['respuesta']:'';
		
	
		if($respuesta=='')
		{
			$envios=$this->OperacionEnvios->envio_borrar($cod_envio);
				
			include 'app/views/confirmar_borrar.php';
		}
		elseif($respuesta=='si')
		{
	
			if ($cod_envio!='')
			{
	
				$this->OperacionEnvios->borrar($cod_envio);
				$this->Listar();
			}
		}
		elseif($respuesta=='no')
		{
			header('location:index.php');
		}
	
	}
	
	
	/** 
	 * Función que devuelve la fecha de creación del pedido
	 * 
	 * @return DateTime $fecha_actual Fecha actual con formato (día/mes/año)
	 */
	public function FechaCreacion()
	{
		$fecha_actual=date("d/m/Y");
		return $fecha_actual;
		
	}
	
	/**
	 * Función que formatea la fecha en formato válido para almacenarla en la BD
	 * @param DateTime $fecha Fecha sin formato válido para sql
	 * @return string $fecha_sql Fecha formateada (año-mes-día) válida en sql
	 */
	public function FechaSql($fecha)
	{
		$parte_fecha=explode("-",$fecha);
		$dia_actual=$parte_fecha[0];
		$mes_actual=$parte_fecha[1];
		$anno_actual=$parte_fecha[2];
		$fecha_sql=$anno_actual."-".$mes_actual."-".$dia_actual;
		return $fecha_sql;
	}
	
	/**
	 * Función para mostrar el estado de un envío
	 * 
	 * Convierte el value del radiobutton en las opciones para mostrarlas
	 * @param string $estado Valor almacenado en la Base de datos (P-E-D)
	 * @return string Devuelve el estado con texto completo
	 */
	public function MuestraEstado($estado)
	{
		if ($estado=='P')
		{
			return "Pendiente";
		}
		if ($estado=='E')
		{
			return "Entregado";
		}
		if ($estado=='D')
		{
			return "Devuelto";
		}
	}
	
}