<div class="ProduccionConte">
	<h3>Vacantes Disponibles</h3>
	<?php
	include 'configuracion.php';
	extract($_GET);
	
	header("Content-Type: text/html;charset=utf-8");
	header("Access-Control-Allow-Origin: *");

	$query = $link->query("SELECT * FROM vacantes WHERE estatus = '1' ORDER BY orden ASC ");
		while($rowVac = $query->fetch_array()){
		?>
		<p class="Lista"><?php echo $rowVac['titulo']?></p>
		<?php
		}
	?>
	<p class="Presentarse">Presentarse con solicitud elaborada en horarios de oficina en Dr. R. Michel 750, Col. La Aurora, C.P. 44450,  Guadalajara, Jal.</p>
</div>