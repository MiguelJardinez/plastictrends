<?php include 'header.php'; ?>
<div class="BreadCrumbs"></div>
<section>
	<div class="contenedor">
		<table width="100%">
			<tr>
				<td>#</td>
				<td>Nombre</td>
				<td>Correo</td>
				<td>Telefono</td>
				<td>Mensaje</td>
				<td>Área de Interes</td>
				<td>Fecha de Contacto</td>
			</tr>
		<?php
		$query = $link->query("SELECT * FROM contacto ORDER BY id");
			while($row = $query->fetch_array()){
			?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['titulo']; ?></td>
				<td><?php echo $row['correo']; ?></td>
				<td><?php echo $row['telefono']; ?></td>
				<td><?php echo $row['mensaje']; ?></td>
				<td><?php echo $row['ineteres']; ?></td>
				<td><?php echo $row['fecha_alta']; ?></td>
			</tr>
			<?php
			}
		?>
		</table>
	</div>
</section>
<?php include 'footer.php'; ?>