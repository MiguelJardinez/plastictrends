<header>
	<div class="TopHead">
		<div class="contenedor">
			<div class="AbrirBolsa">Bolsa de Trabajo</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="contenedor">
		<a href="<?php echo _ROOT; ?>" class="logo">
			<img src="<?php echo _ROOT.$logoD; ?>" class="desktop">
			<img src="<?php echo _ROOT.$logoM; ?>" class="movil">
		</a>
		<div class="MenuContent desktop">
			<div class="TopMenu">
				<ul class="menu-top">
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
			</div>
			<div class="MainMenu">
				<ul class="menu-cats">
					<li>
						<a href="<?php echo _ROOT.'categoria/organizacion'; ?>">Organización</a>
					</li>
					<li>
						<a href="<?php echo _ROOT.'categoria/cocina'; ?>">Cocina</a>
					</li>
					<li>
						<a href="<?php echo _ROOT.'categoria/mueble'; ?>">Muebles</a>
					</li>
					<li>
						<a href="<?php echo _ROOT.'categoria/contenedores'; ?>">Contenedores</a>
					</li>
					<li>
						<a href="<?php echo _ROOT.'categoria/infantil'; ?>">Infantil</a>
					</li>
					<li>
						<a href="<?php echo _ROOT.'categoria/lavanderia'; ?>">Lavandería</a>
					</li>
					<div class="clear"></div>
				</ul>
			</div>
		</div>
		<div class="btn_movil movil">
			<span></span>
			<span></span>
			<span></span>
			<div class="clear"></div>
		</div>
		<div class="MovilMenu movil">
			<ul class="main-menu">
				<li>
					<p>Buscar:</p>
					<form method="get" action="resultados" id="Search">
						<input name="search" type="search" placeholder="Buscar:" <?php if($search != '') { echo 'value="'.$search.'"';  } else {  }?> required>
						<i class="fa fa-search fa-fw"></i>
						<input value="" type="submit" id="SubmitSearch">
					</form>
				</li>
				<li>
					<p>Menú</p>
				</li>
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
					<a href="<?php echo _ROOT.'categoria/organizacion'; ?>">Organización</a>
				</li>
				<li>
					<a href="<?php echo _ROOT.'categoria/cocina'; ?>">Cocina</a>
				</li>
				<li>
					<a href="<?php echo _ROOT.'categoria/mueble'; ?>">Muebles</a>
				</li>
				<li>
					<a href="<?php echo _ROOT.'categoria/contenedores'; ?>">Contenedores</a>
				</li>
				<li>
					<a href="<?php echo _ROOT.'categoria/infantil'; ?>">Infantil</a>
				</li>
				<li>
					<a href="<?php echo _ROOT.'categoria/lavanderia'; ?>">Lavandería</a>
				</li>
				<li>
					<a href="<?php echo _ROOT; ?>contacto">Contacto</a>
				</li>
				<li>
					<a href="<?php echo _ROOT; ?>distribucion">Distribución</a>
				</li>
				<div class="clear"></div>
			</ul>
			<div class="OverlayMenu"></div>
		</div>
		
	</div>
</header>
<div class="Bolsa">
	<div class="CerrarBolsa">x</div>
	<div class="ConteBolsa">
		<div class="OpenBolsa Admon" id="Admon">Administración</div>
		<div class="OpenBolsa Produ" id="Produ">Producción</div>
		<div class="" id="AbrirBolsa"></div>
	</div>
</div>
<div class="Overlay"></div>