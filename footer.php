<footer>
	<div class="contenedor">
		<ul class="Foot-menu">
			<li>
				<a href="<?php echo _ROOT; ?>">Inicio</a>
			</li>
			<li>
				<a href="<?php echo _ROOT; ?>nosotros">Nosotros</a>
			</li>
			<li>
				<a href="<?php echo _ROOT; ?>catalogo">Catálogo</a>
			</li>
			<li>
				<a href="<?php echo _ROOT; ?>contacto">Contacto</a>
			</li>
			<li>
				<a href="<?php echo _ROOT; ?>distribucion">Distribución</a>
			</li>
			<li>
				<form method="get" action="resultados" id="Search">
					<input name="search" type="search" placeholder="Buscar:" <?php if($search != '') { echo 'value="'.$search.'"';  } else {  }?> required>
					<i class="fa fa-search fa-fw"></i>
					<input value="" type="submit" id="SubmitSearch">
				</form>
			</li>
			<div class="clear"></div>
		</ul>
		<ul class="Acercate">
			<li>
				<a href="tel:">
					<i class="fa fa-phone"></i>
				</a>
			</li>
			<li>
				<a href="<?php echo _ROOT; ?>">
					<i class="fa fa-map-marker"></i>
				</a>
			</li>
			<li>
				<a href="mailto:">
					<i class="fa fa-envelope"></i>
				</a>
			</li>
			<div class="clear"></div>
		</ul>
		<div class="clear"></div>
		<div class="Copy">
			Copyright &copy; <?php echo date('Y'); ?> - Developed by: <a href="#">Prognosis</a>
		</div>
		<div class="clear"></div>
	</div>
</footer>