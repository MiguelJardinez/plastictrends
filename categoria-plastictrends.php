<?php include 'header.php'; ?>
<div class="BreadCrumbs"></div>
<section class="Catalogo">
	<div class="contenedor">
		<div class="Filtros"></div>
		<h2><?php echo $rowCat['descripcion']; ?></h2>
		<ul class="ListadoCatalogo">
		<?php
								
			define('NUM_ITEMS_BY_PAGE', 12);
			$result = $link->query('SELECT COUNT(*) as total_products FROM catalogo_productos WHERE c_categoria = "'.$rowCat['codigo'].'" ORDER BY id');
			$row = $result->fetch_assoc();
			$num_total_rows = $row['total_products'];
			
			if($num_total_rows > 0){
			    $page = false;
		
			    //examino la pagina a mostrar y el inicio del registro a mostrar
			    if(isset($_GET["page"])) {
			        $page = $_GET["page"];
			    }
		
				if(!$page){
					$start = 0;
					$page = 1;
				}else{
					$start = ($page - 1) * NUM_ITEMS_BY_PAGE;
				}
			    //calculo el total de paginas
			    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
		
			    // pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
			    // echo '<h3>Numero de articulos: '.$num_total_rows.'</h3>';
			    // echo '<h3>En cada pagina se muestra '.NUM_ITEMS_BY_PAGE.' articulos ordenados por fecha en formato descendente.</h3>';
			    // echo '<h3>Mostrando la pagina '.$page.' de ' .$total_pages.' paginas.</h3>';
			    // echo '<div class="clear20"></div>';
			    $result = $link->query(
			    	'SELECT * FROM catalogo_productos WHERE c_categoria = "'.$rowCat['codigo'].'" 
			        ORDER BY id LIMIT '.$start.', '.NUM_ITEMS_BY_PAGE
			    );
			    if($result->num_rows > 0) {
			    	$contador = 1;
			        while ($row = $result->fetch_assoc()) {				        
						$rowDest = $link->query("SELECT * FROM catalogo_productos_img WHERE codigo_cat = '".$row['codigo']."' AND vista = 'APER' ")->fetch_array();
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
						</li>						<?php
						if($contador % 3 == 0){ echo '<div class="clear clearPc"></div>'; }
						$contador ++;
			        }
			    }
		
			    echo '<div class="clear"></div>';
			    echo '<nav>';
			    echo '<ul class="pagination">';
		
			    if($total_pages > 1) {
			        if ($page != 1) {
			            echo '<li class="page-item"><a class="page-link" href="'._ROOT.'catalogo'.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
			        }
		
			        for($i=1;$i<=$total_pages;$i++){
			            if ($page == $i) {
			                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
			            }else{
			                echo '<li class="page-item"><a class="page-link" href="'._ROOT.'catalogo/'.$i.'">'.$i.'</a></li>';
			            }
			        }
		
			        if($page != $total_pages){
			            echo '<li class="page-item"><a class="page-link" href="'._ROOT.'catalogo/'.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
			        }
			    }
			    echo '</ul>';
			    echo '</nav>';
			}else{
				echo '<h3>sin productos</h3>';
			}
			?>
		</ul>
	</div>
</section>
<?php include 'footer.php'; ?>