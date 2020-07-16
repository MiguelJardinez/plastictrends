<?php
include 'configuracion.php';
include 'class.phpmailer.php';
include 'class.smtp.php';
header("Content-Type: text/html;charset=utf-8");
extract($_POST);

function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}

$tmp_name = $_FILES["file"]["tmp_name"];
$name = $_FILES["file"]["name"];

if($tmp_name != ""){
	$ext = getExtension($name);
	$ext = strtolower($ext);
	$prefijo = substr(md5(uniqid(rand())),0,9);

	if(($ext == "pdf")||($ext == "doc")||($ext == "docx")){
		$destino =  "../cv/".$prefijo."-bolsa-de-trabajo".".".$ext;
		$destinoa =  $destino;
		copy($tmp_name,$destinoa);

		$row = "SELECT * FROM $cual WHERE titulo = '$correo' ";
		$result = $link->query($row);
		$link -> query("
				INSERT INTO bolsa_trabajo (
				titulo,
				correo,
				telefono,
				cv,
				fecha_alta
			)
			VALUES (
				'".htmlentities($nombre)."',
				'$correo',
				'$telefono',
				'$destinoa',
				NOW()
			)
		")or die(mysqli_error($link)); 
		
		if(mysqli_affected_rows($link)>0){


		$mail = new phpmailer();
		$mail -> From = "noreply@prognosis.mx";
		$mail -> FromName = "PlasticTrends"; 
		$mail -> Subject = "Forma de Bolsa de Trabajo - PlasticTrends";
		
		$mail -> AddAddress ('mperez@prognosis.mx');
		// $mail -> AddAddress ('');
		// $mail -> AddBCC('');
		// $mail -> AddBCC('');
		// $mail -> AddBCC('');
		
		$mail -> Body = "
		<img src='https://desarrollo.prognosis.mx/plastictrends/img/header/logo-plastic-trends.png' width='200' />
		<p><strong>¡Datos de la Forma de Bolsa de Trabajo!</strong></p>
		<table>
			<tr>
				<td><strong>Nombre:</strong> $nombre </td>
			</tr>
			<tr>
				<td><strong>Correo:</strong> $correo </td>
			</tr>
			<tr>
				<td><strong>Teléfono:</strong> $telefono </td>
			</tr>
			<tr>
				<td><strong>CV:</strong> <a href='https://desarrollo.prognosis.mx/plastictrends/$destinoa'>Descargar</a> </td>
			</tr>
	
		</table>
		";
		
		$mail -> IsHTML (true);
		if($mail -> Send ()){
			echo "alta_registro";
			/*PARTE DEL CLIENTE*/
			$mail_cliente = new phpmailer();
			$mail_cliente -> From = "noreply@prognosis.mx";
			$mail_cliente -> FromName = "PlasticTrends"; 
			$mail_cliente -> Subject = "Forma de Bolsa de Trabajo - PlasticTrends";
			$mail_cliente -> AddAddress ($correo);
			$mail_cliente -> Body = "
				<img src='https://desarrollo.prognosis.mx/plastictrends/img/header/logo-plastic-trends.png' width='200' />
				<br />
				<h2>Gracias $nombre por enviar tu información, pronto un reclutador se comunicará contigo.</h2>
			";
			$mail_cliente -> IsHTML (true);
			$mail_cliente -> Send ();
			/**/
		}
	}else{// si la extension no es PDF o WORD
		echo 'Error en la extension del Archivo!!!';
		}
	}
}
?>