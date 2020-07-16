<?php
	// DATOS DE LA BASE DE DATOS
	$hostname = 'localhost';
	$usuario = 'progno8_plastic';
	$password = 'wguvqdXH2MnOQtpZ';
	$basededatos = 'progno8_plastic';

	//DATOS DE LA EMPRESA
	$tituloEmpresa = 'Plastic Trends';
	$subtituloEmpresa = '¡A prueba de Gorilas!';
	$descripcion_seo = 'fabricante de plástico en México con 47 años con presencia en el mercado. Tenemos un extenso catálogo que nos permite ofrecer soluciones integrales que se adaptan a todo tipo de hogares y negocios';
	$palabras_seo = '';

	// https://developers.facebook.com/apps/ -> CREAS UNA APP / WEBSITE
	$id_facebook = '1111111111';

	$imagen_share = 'img/header/logo-plastic-share.jpg';
	$logoD = 'img/header/logo-plastic-trends.png';
	$logoM = 'img/header/logo-plastic-trends-movil.png';
	$favicon = 'img/header/favicon.png';


	// $base ='/'; // URL DE PRODUCCION
	$base ='/plastictrends/'; // URL DE PRUEBAS
	
	$dominio = 'https://'.$_SERVER['HTTP_HOST'].$base; // si tiene ssl
	// $dominio = 'http://'.$_SERVER['HTTP_HOST'].$base; // si no tiene ssl
	
	define('_ROOT', $dominio);
	
	date_default_timezone_set('America/Mexico_City');
	$time = time();
	$TiempoActual = date('Y-m-d H:i:s', $time);
	
	$link = mysqli_connect($hostname, $usuario, $password)or die('No se pudo conectar: ' . mysqli_error());
	
	$db_select = mysqli_select_db($link, $basededatos);
?>