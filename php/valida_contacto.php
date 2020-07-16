<?php
include 'configuracion.php';
include 'class.phpmailer.php';
include 'class.smtp.php';
header("Content-Type: text/html;charset=utf-8");
extract($_POST);

	$row = "SELECT * FROM $cual WHERE titulo = '$correo' ";
	$result = $link->query($row);
	$link -> query("
			INSERT INTO contacto (
			titulo,
			correo,
			telefono,
			mensaje,
			interes,
			fecha_alta
		)
		VALUES (
			'".htmlentities($nombre)."',
			'$correo',
			'$telefono',
			'$mensaje',
			'$interes',
			NOW()
		)
	")or die(mysqli_error($link)); 
	
	if(mysqli_affected_rows($link)>0){
	
	$mail = new phpmailer();
	$mail -> From = "noreply@prognosis.mx";
	$mail -> FromName = "PlasticTrends"; 
	$mail -> Subject = "Forma de contacto - PlasticTrends";
	
	$mail -> AddAddress ('mperez@prognosis.mx');
	// $mail -> AddAddress ('');
	// $mail -> AddBCC('');
	// $mail -> AddBCC('');
	// $mail -> AddBCC('');
	
	$mail -> Body = "
	<img src='https://desarrollo.prognosis.mx/plastictrends/img/header/logo-plastic-trends.png' width='200' />
	<p><strong>¡Datos de la Forma de Contacto!</strong></p>
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
			<td><strong>Área de interes:</strong> $interes </td>
		</tr>
		<tr>
			<td><strong>Mensaje:</strong> $mensaje </td>
		</tr>

	</table>
	";
	
	$mail -> IsHTML (true);
	if($mail -> Send ()){
		
		echo 'alta_registro';
		
		$mail_cliente = new phpmailer();
		$mail_cliente -> From = "noreply@prognosis.mx";
		$mail_cliente -> FromName = "PlasticTrends"; 
		$mail_cliente -> Subject = "Forma de contacto - PlasticTrends";
		$mail_cliente -> AddAddress ($correo);
		$mail_cliente -> Body = "
			<img src='https://desarrollo.prognosis.mx/plastictrends/img/header/logo-plastic-trends.png' width='200' />
			<br />
			<h2>Gracias $nombre por ponerte en contacto con nosotros, pronto un ejecutivo se comunicará contigo.</h2>
		";
		$mail_cliente -> IsHTML (true);
		$mail_cliente -> Send ();
	
} else {
		
	echo 'existe_registro';
	}	
}
?>