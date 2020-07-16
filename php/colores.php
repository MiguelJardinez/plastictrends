<?php include 'header.php'; ?>
<?php
$query = $link->query("SELECT * FROM catalogo_productos_color  ");
while($rowColores = $query->fetch_array()){
	?>
	<p><?php echo $rowColores['color']; ?></p>
	<?php
}
?>