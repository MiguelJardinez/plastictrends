<?php include 'header.php'; ?>
<div class="BreadCrumbs"></div>
<section class="Catalogo">
	<div class="contenedor">
		<div class="Filtros"></div>
		<h2>Resultados</h2>
		<p class="Res">Resultados de búsqueda para: <span style='color: #005fa8'><?php echo $search; ?></span></p>
		<ul class="ListadoCatalogo">
		<!-- INICIA CATALOGO CON PAGINADOR -->
			<?php
				$contador = 1;
				$seachNew = limpiaTexto($search);
				$query = "SELECT * FROM catalogo_productos WHERE (descripcion LIKE '%".$seachNew."%' || codigo LIKE '%".$seachNew."%') ORDER BY id";
				$result = $link->query($query);
				if(mysqli_num_rows($result)>0){
					while($row = $result->fetch_array()){
					$rowDest = $link->query("SELECT * FROM catalogo_productos_img WHERE codigo_cat = '".$row['codigo']."' ")->fetch_array();
					$rowCat = $link->query("SELECT * FROM categorias WHERE codigo = '".$row['c_categoria']."' ")->fetch_array();
					$rowColorLink = $link->query("SELECT * FROM catalogo_productos_color WHERE c_catalogo = '".$row['codigo']."' LIMIT 1 ")->fetch_array();
				?>
				<li>
					<div class="ConteCatalogo">
						<div class="DestacadaCatalogo" style="background-image: url('<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowDest['articulo'].'/'.$rowDest['dir']; ?>')"></div>
						<div class="Colores">
						<?php
						$query2 = $link->query("SELECT * FROM catalogo_productos_color WHERE c_catalogo = '".$row['codigo']."' ");
							while($rowColorCuadDest = $query2->fetch_array()){
							$rowColTituloDest = $link->query("SELECT * FROM colores WHERE titulo = '".$rowColorCuadDest['color']."' ")->fetch_array();
							?>
							<a href="<?php echo _ROOT.'productos/'.$row['codigo'].'&codigo='.$rowColorCuadDest['codigo']; ?>" class="Color Color-<?php echo $rowColTituloDest['id']; ?>" style="background-color: <?php echo $rowColTituloDest['principal']; ?>" title="<?php echo $rowColorCuadDest['color']; ?>"></a>
							<?php
							}
						?>
						<div class="clear"></div>
						</div>
						<div class="TituloCatalogo">
							<p><?php echo $rowCat['descripcion']; ?></p>
							<h4><?php echo $row['descripcion']; ?></h4>
							<a href="<?php echo _ROOT.'productos/'.$row['codigo']?><?php if($rowColorLink['codigo'] != '') { echo '&codigo='.$rowColorLink['codigo']; } else { }; ?>">Ver más</a>
						</div>
					</div>
				</li>
				<?php
					if($contador % 3 == 0){ echo '<div class="clear desktop"></div>'; }
					if($contador % 2 == 0){ echo '<div class="clear movil"></div>'; }
					$contador ++;
					}
				}else{ echo("<li><p>Sin resultados para <span style='color: #005fa8'>$seachNew</span></p></li>");}
			?>
			<div class="clear"></div>
		</ul>
	</div>
</section>
<?php include 'footer.php'; ?>