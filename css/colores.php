<?php
	include '../php/configuracion.php';
	// include 'admin/php/funciones.php';
	extract($_GET);
	header("Content-type: text/css; charset: UTF-8"); 
	?>
<?php
$query = $link->query("SELECT * FROM colores ORDER BY id ASC");
while($rowColor = $query->fetch_array()){
?>
.Color-<?php echo $rowColor['id']; ?> { background-color: <?php echo $rowColor['principal']; ?>;border: 1px solid #000;position: relative;}
<?php
if($rowColor['secundario'] != '') { 
?>
.Color-<?php echo $rowColor['id']; ?>::before { content: '';width: 15px;height: 15px;position: absolute;bottom: -1px;right: -1px;border-radius: 50%;background-color: <?php echo $rowColor['secundario']; ?>;border: 1px solid #000;}
<?php
} else { 
echo "";
}
?>
<?php
}
?>
