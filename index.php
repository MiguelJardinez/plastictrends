<?php include 'header.php'; ?>
<div class="Slider">
	<!-- INICIA COPIAR PARA MULTIPLICAR SLIDER -->
	<div class="item">
		<div class="BackSlider" style="background-image: url('<?php echo _ROOT; ?>img/slider/slider-background.jpg')">
			<a class="Circulo" href="<?php echo _ROOT; ?>#" target="_self">
				<img src="<?php echo _ROOT; ?>img/slider/producto-slider-home.png" class="ProductoSlider">
				<div class="TituloSlider">
					<h3>Maceta Florida 6"</h3>
					<p><i class="fa fa-tag"></i> Jardín</p>
				</div>
			</a>
		</div>
	</div>
	<!-- TERMINA COPIAR PARA MULTIPLICAR SLIDER -->
	<div class="item">
		<div class="BackSlider" style="background-image: url('<?php echo _ROOT; ?>img/slider/slider-background.jpg')">
			<a class="Circulo" href="<?php echo _ROOT; ?>#" target="_self">
				<img src="<?php echo _ROOT; ?>img/slider/producto-slider-home.png" class="ProductoSlider">
				<div class="TituloSlider">
					<h3>Maceta Florida 6"</h3>
					<p><i class="fa fa-tag"></i> Jardín</p>
				</div>
			</a>
		</div>
	</div>
</div>
<section class="Inicio-01">
	<div class="contenedor">
		<ul class="col2 vertical-align">
			<li>
				<h3><span>Acerca de </span>Plastic Trends</h3>
				<p>Somos el principal fabricante de plástico en México con una amplia trayectoria en el mercado. Tenemos un extenso catálogo que nos permite ofrecer soluciones integrales que se adaptan a todo tipo de hogares y negocios.</p>
				<p>Facilitamos vidas con productos resistentes, durables y de la mejor calidad a precios justos.</p>
				<a href="<?php echo _ROOT; ?>nosotros" target="_self">saber más</a>
				<div class="clear"></div>
			</li>
			<li>
				<img src="<?php echo _ROOT; ?>img/inicio/logo-plastic-trends.png">
			</li>
			<div class="clear"></div>
		</ul>
	</div>
</section>

<section class="Inicio-03">
	<div class="contenedor">
		<h2>Categoría de productos</h2>
		<ul class="col7mix">
		<?php
			$contador = 1;
			// EL 6 ES EL UNA CATEGORÍA QUE NO SE TOMO EN CUENTA 'Mueble con aluminio' 
			$query = $link->query("SELECT * FROM categorias WHERE id != '6' ORDER BY id ");
				while($rowCateg = $query->fetch_array()){
				?>
				<li>
					<a class="ContenedorCat" href="<?php echo _ROOT; ?>">
						<img src="<?php echo _ROOT.'img/productos/categorias/'.$rowCateg['id'].'.png'; ?>">
						<h4><?php echo $rowCateg['descripcion']?></h4>
					</a>
				</li>
				<?php
					if($contador == '4') {
						echo "<div class='clear desktop'></div>";
					}
				$contador ++;
				}
			?>
			<div class="clear"></div>
		</ul>
		<a href="#" class="vermas">Ver todos</a>
	</div>
</section>




<section class="Inicio-02">
	<div class="contenedor">
		<div class="HomeHonores">
			<div class="item">
				<div class="ConteHonores">
					<img src="<?php echo _ROOT; ?>img/inicio/logo-plastictrends-iso9001.png">
					<h3>Garantía de satisfacción Plastic Trends</h3>
					<p>Contamos con distintas certificaciones que respaldan nuestra calidad y compromiso con nuestros clientes.</p>
				</div>
			</div>
			<div class="item">
				<div class="ConteHonores">
					<img src="<?php echo _ROOT; ?>img/inicio/logo-plastictrends-anipac.png">
					<h3>Orgullosos de formar parte de ANIPAC</h3>
					<p>Tenemos el honor de ser miembros de la Asociación Nacional de Industrias de Plástico, A.C. organización con mayor representatividad en nuestro sector, quien nos acompaña en toda nuestra cadena de suministro.</p>
				</div>
			</div>
			<div class="item">
				<div class="ConteHonores">
					<img src="<?php echo _ROOT; ?>img/inicio/logo-plastictrends-heb.png">
					<h3>Socio estratégico del año 2016</h3>
					<p>Tuvimos la fortuna de ser distinguidos por la cadena HEB como “Socio estratégico 2016” por contribuír consistentemente a la mejora de sus ventas, rentabilidad y nivel de servicios.</p>
				</div>
			</div>
			<div class="item">
				<div class="ConteHonores">
					<img src="<?php echo _ROOT; ?>img/inicio/logo-plastictrends-walmart.png">
					<h3>Socio comercial del año 2015</h3>
					<p>Plastic Trends fue reconocido como el Proveedor del Año 2015 de Walmart de México y Centroamérica.</p>
				</div>
			</div>
			<div class="item">
				<div class="ConteHonores">
					<img src="<?php echo _ROOT; ?>img/inicio/logo-plastictrends-ema.png">
					<h3>Acreditación como Laboratorio de Ensayos de acuerdo a la Norma 17025</h3>
					<p>Con un esfuerzo compartido, nuestra empresa hermana Sundance Polimers, S.A. DE C.V. logramos el reconocimiento de la Entidad Mexicana de Acreditación A.C. como Laboratorio de Ensayos de acuerdo a los requisitos establecidos por la Norma NMX-EC-17025-IMNC-2018 (ISO/IEC 17025:2017).</p>
				</div>
			</div>
		</div>
	</div>
</section>


 <!--<section class="Inicio-04">
	<div class="contenedor">
		<h2>Plastic Trends productos destacados</h2>
		<div class="Destacados">
			<div class="ContpromoProd" style="background-image: url('<?php echo _ROOT; ?>img/productos/back-caja-10-atlanta.jpg')">
				 INICIA LINK DE PRODUCTO 
				<a class="CoverProd" href="<?php echo _ROOT; ?>#" target="_self">
					<h4>Caja 10 gal Atlanta c/tapa</h4>
					<p><i class="fa fa-tag"></i> Organización</p>
					<img src="<?php echo _ROOT; ?>img/productos/caja-10-atlanta.png">
				</a>
				 TERMINA LINK DE PRODUCTO  
				<div class="clear"></div>
			</div>
		</div>
	</div>
</section> -->

<section class="Contacto-02">
	<div class="contenedor">
		<h2><a href="<?php echo _ROOT; ?>contacto">Contáctanos</a></h2>
		<div class="Contactanos">
			<p><a href="tel:"><i class="fa fa-phone"></i> (52) 33 3619 1616</a> / <a href="tel:"><i class="fa fa-phone"></i> (52) 33 3619 1385</a></p>
			<!-- <a href="mailto:contacto@plastictrends.com.mx"><i class="fa fa-envelope"></i> contacto@plastictrends.com.mx</a> -->
			<div class="clear"></div>
		</div>
		<ul class="col2">
			<li>
				<h4><i class="fa fa-map-marker"></i> Corporativo</h4>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.4179062069657!2d-103.34608738554103!3d20.652570286203357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b210f38d29bf%3A0xa85ee8fad6f84872!2sPlastic%20Trends!5e0!3m2!1ses-419!2smx!4v1589905867056!5m2!1ses-419!2smx" class="IframeMap" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				<p>Privada Matías Romero 1210, Col. Rincón de Agua Azul, C.P. 44467 Guadalajara, Jalisco.</p>
			</li>
			<li>
				<h4><i class="fa fa-map-marker"></i> Planta Guadalajara</h4>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.4093419075684!2d-103.345662685541!3d20.65291898620313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b21092ca4531%3A0x5b943a67a5ace4d2!2sAv.%20Dr.%20Roberto%20Michel%20750%2C%20Ferrocarril%2C%2044440%20Guadalajara%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1594218022301!5m2!1ses-419!2smx" class="IframeMap" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				<p>Dr. R. Michel 750, Col. La Aurora, C.P. 44450 Guadalajara, Jalisco.</p>
			</li>
			</li>
			<li>
				<h4><i class="fa fa-map-marker"></i> Planta Tlajomulco</h4>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3737.0652513786426!2d-103.4168119855439!3d20.503551186285186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842f53b0cbfd46ef%3A0xd89fe0baaed0e783!2sAv.%20Jes%C3%BAs%20Michel%20Gonz%C3%A1lez%20280%2C%20Jalisco!5e0!3m2!1ses-419!2smx!4v1589906054239!5m2!1ses-419!2smx" class="IframeMap" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				<p>Av. Jesús Michel 280, Tlajomulco de Zúñiga, C.P. 45650, Guadalajara, Jal.</p>
			</li>
			</li>
			<li>
				<h4><i class="fa fa-map-marker"></i> Oficinas corporativas CDMX</h4>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3760.65100676042!2d-99.23272458556279!3d19.513645086838373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d202d6e348d643%3A0xc8cd456e32b77d51!2sCto%20Centro%20Comercial%2027%2C%20Cd.%20Sat%C3%A9lite%2C%2053100%20Naucalpan%20de%20Ju%C3%A1rez%2C%20M%C3%A9x.!5e0!3m2!1ses-419!2smx!4v1589906119159!5m2!1ses-419!2smx" class="IframeMap" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				<p>Circuito Centro Comercial 27, Ciudad Satélite, Naucalpan Juárez, C.P. 53100, Estado de México.</p>
			</li>
			<div class="clear"></div>
		</ul>
	</div>
</section>
<?php include 'footer.php'; ?>