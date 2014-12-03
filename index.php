<?php
session_start();
include_once 'app/controllers/FrontalCtrl.php'; //inclusion del controlador frontal

if (isset($_SESSION['dentro']))
{

	include 'app/views/top_page.php'; //capa con la aparetura del html
	include 'app/views/encabezado.php';

//Cuerpo
//include 'app/controllers/EnviosCtrl.php'; //inclusion del controlador
//$controlador=new EnviosCtrl(); //creacion de un objeto del controlador
//$controlador->Run(); //llamada al metodo

	
	$controlador_frontal=new FrontalCtrl();
	$controlador_frontal->Run();

include('app/views/pie.php'); 
}
else
{
	$controlador_frontal=new FrontalCtrl();
	$controlador_frontal->Run();
	//$usuario = new UsuarioCtrl();
	//$usuario->CargarLogin();
}

