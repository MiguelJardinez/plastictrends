<?php include 'header.php'; ?>
<div class="BreadCrumbs"></div>
<section class="Producto">
	<div class="contenedor">
		<ul class="col2">
			<li>
				<div class="ConteColProd">
					<div class="GaleriaProyecto">
					<?php
						$query09 = $link->query("SELECT * FROM catalogo_productos_img WHERE (codigo_cat = '".$url_producto."' AND articulo = '".$codigo."' AND calidad = 'HD') ");
						while($rowDest = $query09 ->fetch_array()){
						?>
						<div class="item">
							<?php echo $rowCol['descripcion']; ?>
							<div class="DestacadaCatalogo" style="background-image: url('<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowDest['articulo'].'/'.$rowDest['dir']; ?>')"></div>
						</div>							
						<?php
						}
					?>
					</div>
					<div id="owl-thumbs">
					<?php
						$query10 = $link->query("SELECT * FROM catalogo_productos_img WHERE (codigo_cat = '".$url_producto."' AND articulo = '".$codigo."' AND calidad = 'HD') ");
							while($rowThumb = $query10->fetch_array()){
						?>
						<div data-thumb class="Thumb" style="background-image: url('<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowThumb['articulo'].'/'.$rowThumb['dir']; ?>')"></div>					
						<?php
					}
					?>
					</div>
				</div>
			</li>
			<li>
				<div class="ConteColProd">
					<div class="ContDescripcion">
						<h2><?php echo $rowColor['descripcion']; ?></h2>
						<p>SKU: <?php if((isset($url_producto))&&(isset($codigo))) { 
							$rowCodigo = $link->query("SELECT * FROM catalogo_productos_color WHERE c_catalogo = '".$url_producto."' AND codigo = '".$codigo."' ")->fetch_array();
							echo $rowCodigo['codigo']; } else  { echo $rowProd['codigo']; }?></p>
						<p>Código de barras: <?php if((isset($url_producto))&&(isset($codigo))) { 
							$rowCodigo = $link->query("SELECT * FROM catalogo_productos_color WHERE c_catalogo = '".$url_producto."' AND codigo = '".$codigo."' ")->fetch_array();
							echo $rowCodigo['codigo_barras']; } else  { echo "N/A"; }?></p>
						<div class="Categoria">
							<p>Categoría <a href="#"><i class="fa fa-tag"></i> <?php echo $rowCatP['descripcion']; ?></a></p>
						</div>
						<p>Colores disponibles:</p>
						<?php
						$query08 = $link->query("SELECT * FROM catalogo_productos_color WHERE c_catalogo = '".$rowProd['codigo']."' ");
							while($rowColorCuad = $query08->fetch_array()){
							$rowColTitulo = $link->query("SELECT * FROM colores WHERE titulo = '".$rowColorCuad['color']."' ")->fetch_array();
							?>
							<a href="<?php echo _ROOT.'productos/'.$rowProd['codigo'].'&codigo='.$rowColorCuad['codigo']; ?>" class="Color Color-<?php echo $rowColTitulo['id']; ?>" style="background-color: <?php echo $rowColTitulo['principal']; ?>" title="<?php echo $rowColorCuad['color']; ?>"></a>
							<?php
							}
						?>
						<div class="clear"></div>
						<p>Descargar:</p>
						<div class="Descargas">
						<?php
						$queryDesHD = $link->query("SELECT * FROM catalogo_productos_img WHERE (codigo_cat = '".$url_producto."' AND articulo = '".$codigo."' AND calidad = 'HD') LIMIT 1 ");
							while($rowDesc = $queryDesHD->fetch_array()){
							?>
							<a href="<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowDesc['articulo'].'/'.$rowDesc['dir']; ?>" target="_blank" download="<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowDesc['articulo'].'/'.$rowDesc['dir']; ?>"><?php echo $rowDesc['calidad']?></a>
							<?php
							}
						?>
						<?php
						$queryDesGD = $link->query("SELECT * FROM catalogo_productos_img WHERE (codigo_cat = '".$url_producto."' AND articulo = '".$codigo."' AND calidad = 'GD') LIMIT 1 ");
							while($rowDesc1 = $queryDesGD->fetch_array()){
							?>
							<a href="<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowDesc1['articulo'].'/'.$rowDesc1['dir']; ?>" target="_blank" download="<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowDesc1['articulo'].'/'.$rowDesc1['dir']; ?>"><?php echo $rowDesc1['calidad']?></a>
							<?php
							}
						?>
						<?php
						$queryDesMD = $link->query("SELECT * FROM catalogo_productos_img WHERE (codigo_cat = '".$url_producto."' AND articulo = '".$codigo."' AND calidad = 'MD') LIMIT 1 ");
							while($rowDesc2 = $queryDesMD->fetch_array()){
							?>
							<a href="<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowDesc2['articulo'].'/'.$rowDesc2['dir']; ?>" target="_blank" download="<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowDesc2['articulo'].'/'.$rowDesc2['dir']; ?>"><?php echo $rowDesc2['calidad']?></a>
							<?php
							}
						?>
						<?php
						$queryDesSM = $link->query("SELECT * FROM catalogo_productos_img WHERE (codigo_cat = '".$url_producto."' AND articulo = '".$codigo."' AND calidad = 'SM') LIMIT 1 ");
							while($rowDesc3 = $queryDesSM->fetch_array()){
							?>
							<a href="<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowDesc3['articulo'].'/'.$rowDesc3['dir']; ?>" target="_blank" download="<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowDesc3['articulo'].'/'.$rowDesc3['dir']; ?>"><?php echo $rowDesc3['calidad']?></a>
							<?php
							}
						?>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</li>
			<script>
			$('.owl-dot').click(function () {
			    owl.trigger('to.owl.carousel', [$(this).index(), 300]);
			});
			</script>
			<div class="clear"></div>
		</ul>
		<div class="DetallesProducto">
			<h5>Detalles de embalaje / medidas del producto</h5>
			<ul class="col3">
				<li>
					<div class="ConteTablas">
						<h4>Dimensiones</h4>
						<?php if ($rowProd['alto'] != '0' ) { echo '<p>Alto: <span>'.$rowProd['alto'].' cm</span></p>'; } else {  } ?>
						<?php if ($rowProd['largo'] != '0' ) { echo '<p>Largo: <span>'.$rowProd['largo'].' cm</span></p>'; } else {  } ?>
						<?php if ($rowProd['ancho'] != '0' ) { echo '<p>Ancho: <span>'.$rowProd['ancho'].' cm</span></p>'; } else {  } ?>
						<?php if ($rowProd['diametro'] != '0' ) { echo '<p>Diametro: <span>'.$rowProd['diametro'].'</span></p>'; } else {  } ?>
						<?php if ($rowProd['capac_lts'] != '0' ) { echo '<p>Capacidad Litros: <span>'.$rowProd['capac_lts'].' L.</span></p>'; } else {  } ?>
						<?php if ($rowProd['capac_gal'] != '0' ) { echo '<p>Capacidad Galones: <span>'.$rowProd['capac_gal'].' Gal.</span></p>'; } else {  } ?>
					</div>
				</li>
				<li>
					<div class="ConteTablas">
						<h4>Dimensiones Empaque</h4>
						<p>Empaques: <span><?php echo $rowProd['cant_emp']; ?></span></p>
						<p>Piezas: <span><?php echo $rowProd['pzas_paq']; ?></span></p>
						<p>Alto: <span><?php echo $rowProd['alto_em_mt'].' m'; ?></span></p>
						<?php if ($rowProd['larg_em_mt'] != '0' ) { echo '<p>Largo: <span>'.$rowProd['larg_em_mt'].' m</span></p>'; } else {  } ?>
						<?php if ($rowProd['anch_em_mt'] != '0' ) { echo '<p>Ancho: <span>'.$rowProd['anch_em_mt'].' m</span></p>'; } else {  } ?>

					</div>
				</li>
				<li>
					<div class="ConteTablas">
						<h4>Dimensiones <?php echo $rowProd['tipo_emp']; ?></h4>
						<p><?php echo $rowProd['tipo_emp']; ?></p>
						<p>Piezas: <span><?php echo $rowProd['pzas_paq']; ?></span></p>
						<p>Alto: <span><?php echo $rowProd['alto_x_tar'].' m'; ?></span></p>
						<p>Largo: <span><?php echo $rowProd['largo_tar'].' m'; ?></span></p>
						<p>Ancho: <span><?php echo $rowProd['ancho_tar'].' m'; ?></span></p>
					</div>
				</li>
				<div class="clear"></div>
			</ul>
		</div>
	</div>
</section>
<section class="Relacionados">
	<div class="contenedor">
		<h2>Productos Relacionados</h2>
		<ul class="col3">
			<?php
			$contador = 1;
			$query = $link->query("SELECT * FROM catalogo_productos WHERE codigo != '".$rowProd['codigo']."' AND c_categoria = '".$rowProd['c_categoria']."' ORDER BY rand() LIMIT 3");
					while($rowProdRel = $query->fetch_array()){
					$rowProdRelDest = $link->query("SELECT * FROM catalogo_productos_img WHERE codigo_cat = '".$rowProdRel['codigo']."' ")->fetch_array();
					$rowProdRelCat = $link->query("SELECT * FROM categorias WHERE codigo = '".$rowProd['c_categoria']."' ")->fetch_array();
					$rowColorLink = $link->query("SELECT * FROM catalogo_productos_color WHERE c_catalogo = '".$rowProdRel['codigo']."' LIMIT 1 ")->fetch_array();
				?>
				<li>
					<div class="ConteCatalogo">
						<div class="DestacadaCatalogo" style="background-image: url('<?php echo 'http://www.plastictrends.com.mx/IMG_ARTS/'.$rowProdRelDest['articulo'].'/'.$rowProdRelDest['dir']; ?>')"></div>
						<div class="Colores">
						<?php
						$query2 = $link->query("SELECT * FROM catalogo_productos_color WHERE c_catalogo = '".$rowProdRel['codigo']."' ");
							while($rowColorCuadDest = $query2->fetch_array()){
							$rowColTituloDest = $link->query("SELECT * FROM colores WHERE titulo = '".$rowColorCuadDest['color']."' ")->fetch_array();
							?>
							<a href="<?php echo _ROOT.'productos/'.$rowProdRel['codigo'].'&codigo='.$rowColorCuadDest['codigo']; ?>" class="Color Color-<?php echo $rowColTituloDest['id']; ?>" style="background-color: <?php echo $rowColTituloDest['principal']; ?>">
								<!--<?php echo $rowColorCuadDest['color']; ?>-->
							</a>
							<?php
							}
							?>
							<div class="clear"></div>
						</div>
						<div class="TituloCatalogo">
							<p><?php echo $rowProdRelCat['descripcion']; ?></p>
							<h4><?php echo $rowProdRel['descripcion']; ?></h4>
							<a href="<?php echo _ROOT.'productos/'.$rowProdRel['codigo']?><?php if($rowColorLink['codigo'] != '') { echo '&codigo='.$rowColorLink['codigo']; } else { }; ?>">Ver más</a>
						</div>
					</div>
				</li>
				<?php
				if($contador == 2){ echo '<div class="clear movil"></div>'; }				
				$contador ++;
				}
			?>
			<div class="clear"></div>
		</ul>
	</div>
</section>
<section class="CallContactoProducto">
	<div class="contenedor">
		<h4>Atención a ventas, colaboradores y distribuidores</h4>
		<p>Somos una empresa mexicana líder en la distribución de una extensa línea de productos de plástico de la más alta calidad con presencia en Centro América y el Caribe. </p>
		<a href="#">Contáctanos</a>
	</div>
</section>
<?php include 'footer.php'; ?>