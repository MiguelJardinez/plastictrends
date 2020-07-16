<?php
	include 'php/configuracion.php';
	include 'php/funciones.php';
	extract($_GET);
	
	header("Content-Type: text/html;charset=utf-8");
	header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php
	if(isset($url_producto)) {//SI VIENE LA VARIABLE DEL POST BLOG
		//OBTIENE LOS DATOS DEL BLOG ACTUAL
		$rowProd = $link->query("SELECT * FROM catalogo_productos WHERE codigo  = '".$url_producto."' ")->fetch_array();
		$rowCatP = $link->query("SELECT * FROM categorias WHERE codigo = '".$rowProd['c_categoria']."' ")->fetch_array();
	
		if($codigo != '') {
			$rowColor = $link->query("SELECT * FROM catalogo_productos_color WHERE c_catalogo = '".$url_producto."' AND codigo = '".$codigo."' ")->fetch_array();
			echo '<!-- Trae Color -->';
			 $idArticulo = $codigo;
		} else {
			$rowColor = $link->query("SELECT * FROM catalogo_productos_color WHERE c_catalogo = '".$url_producto."' ")->fetch_array();
			echo '<!-- No Trae Color -->';
		}
			
		//OBTENER LA URL
		$host= $_SERVER["HTTP_HOST"];
		$url= $_SERVER["REQUEST_URI"];
		?>
		<title><?php echo $tituloEmpresa.' | '.$rowProd['descripcion'] ?></title>
		<meta name="description" content="<?php echo $descripcion_seo ?>">
		<meta name="keywords" content="<?php echo $palabras_seo ?>">

		<!--TWITTER CARD-->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:url" content="<?php echo "https://" .$host.$url; ?>">
		<meta name="twitter:title" content="<?php echo $tituloEmpresa.' | '.$rowProd['descripcion']; ?>">
		<meta name="twitter:description" content="<?php echo $descripcion_seo; ?>">
		<meta name="twitter:image" content="<?php echo _ROOT.$imagen_share; ?>">
	
		<meta name="twitter:site" content="">
		<meta name="twitter:creator" content="">


		<?php
		if($id_facebook != ''){
			?>
			<!--FACEBOOK-->
			<meta property="og:url"           content="<?php echo "http://" .$host.$url; ?>" />
			<meta property="og:type"          content="article" />
			<meta property="og:title"         content="<?php echo $tituloEmpresa.' | '.$rowCat['titulo']?>" />
			<meta property="og:description"   content="<?php echo $descripcion_seo; ?>" />
			<meta property="og:image" content="<?php echo _ROOT.$rowCat['ruta_img']; ?>" />
			<meta property="fb:app_id" content="<?php echo $id_facebook; ?>" />

			<script type="text/javascript" defer>
			  window.fbAsyncInit = function() {
			    FB.init({
			      appId      : '<?php echo $id_facebook?>',
			      xfbml      : true,
			      version    : 'v3.2'
			    });
			    FB.AppEvents.logPageView();
			  };
			
			  (function(d, s, id){
			     var js, fjs = d.getElementsByTagName(s)[0];
			     if (d.getElementById(id)) {return;}
			     js = d.createElement(s); js.id = id;
			     js.src = "https://connect.facebook.net/en_US/sdk.js";
			     fjs.parentNode.insertBefore(js, fjs);
			   }(document, 'script', 'facebook-jssdk'));
			</script>
			<?php
		}
	} else if(isset($url_categoria)) {
		//OBTIENE LOS DATOS DEL BLOG ACTUAL
		$rowCat = $link->query("SELECT * FROM categorias WHERE url = '".$url_categoria."' ")->fetch_array();

		//OBTENER LA URL
		$host= $_SERVER["HTTP_HOST"];
		$url= $_SERVER["REQUEST_URI"];
		?>
		<title><?php echo $tituloEmpresa.' | '.$rowCat['descripcion'] ?></title>
		<meta name="description" content="<?php echo $descripcion_seo ?>">
		<meta name="keywords" content="<?php echo $palabras_seo ?>">

		<!--TWITTER CARD-->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:url" content="<?php echo "https://" .$host.$url; ?>">
		<meta name="twitter:title" content="<?php echo $tituloEmpresa.' | '.$rowBlog['titulo']; ?>">
		<meta name="twitter:description" content="<?php echo $descripcion_seo; ?>">
		<meta name="twitter:image" content="<?php echo _ROOT.$rowBlog['ruta_img']; ?>">
	
		<meta name="twitter:site" content="">
		<meta name="twitter:creator" content="">
		
		<?php
		if($id_facebook != ''){
			?>
			<!--FACEBOOK-->
			<meta property="og:url"           content="<?php echo "https://" .$host.$url; ?>" />
			<meta property="og:type"          content="article" />
			<meta property="og:title"         content="<?php echo $tituloEmpresa.' | '.$rowBlog['titulo']?>" />
			<meta property="og:description"   content="<?php echo $descripcion_seo; ?>" />
			<meta property="og:image" content="<?php echo _ROOT.$rowBlog['ruta_img']; ?>" />
			<meta property="fb:app_id" content="<?php echo $id_facebook; ?>" />

			<script type="text/javascript" defer>
			  window.fbAsyncInit = function() {
			    FB.init({
			      appId      : '<?php echo $id_facebook?>',
			      xfbml      : true,
			      version    : 'v3.2'
			    });
			    FB.AppEvents.logPageView();
			  };
			
			  (function(d, s, id){
			     var js, fjs = d.getElementsByTagName(s)[0];
			     if (d.getElementById(id)) {return;}
			     js = d.createElement(s); js.id = id;
			     js.src = "https://connect.facebook.net/en_US/sdk.js";
			     fjs.parentNode.insertBefore(js, fjs);
			   }(document, 'script', 'facebook-jssdk'));
			</script>
			<?php
		}
	} else {
		?>
		<title><?php echo $tituloEmpresa.' | '.$subtituloEmpresa; ?></title>
		<meta name="description" content="<?php echo $descripcion_seo; ?>">
		<meta name="keywords" content="<?php echo $palabras_seo; ?>">

		<!--TWITTER CARD-->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:url" content="<?php echo _ROOT; ?>">
		<meta name="twitter:title" content="<?php echo $tituloEmpresa.' | '.$subtituloEmpresa; ?>">
		<meta name="twitter:description" content="<?php echo $descripcion_seo; ?>">
		<meta name="twitter:image" content="<?php echo _ROOT.$imagen_share; ?>">
	
		<meta name="twitter:site" content="">
		<meta name="twitter:creator" content="">
		
		<?php
		if($id_facebook != ''){
			?>
			<!--FACEBOOK-->
			<meta property="og:url"           content="<?php echo _ROOT; ?>" />
			<meta property="og:type"          content="website" />
			<meta property="og:title"         content="<?php echo $tituloEmpresa.' | '.$subtituloEmpresa; ?>" />
			<meta property="og:description"   content="<?php echo $descripcion_seo; ?>" />
			<meta property="og:image" content="<?php echo _ROOT.$imagen_share; ?>" />			
			<meta property="fb:app_id" content="<?php echo $id_facebook; ?>" />

			<script type="text/javascript" defer>
			  window.fbAsyncInit = function() {
			    FB.init({
			      appId      : '<?php echo $id_facebook?>',
			      xfbml      : true,
			      version    : 'v3.2'
			    });
			    FB.AppEvents.logPageView();
			  };
			
			  (function(d, s, id){
			     var js, fjs = d.getElementsByTagName(s)[0];
			     if (d.getElementById(id)) {return;}
			     js = d.createElement(s); js.id = id;
			     js.src = "https://connect.facebook.net/en_US/sdk.js";
			     fjs.parentNode.insertBefore(js, fjs);
			   }(document, 'script', 'facebook-jssdk'));
			</script>
			
			
		<?php
		}
	}
	?>
	<link rel="alternate" hreflang="es-mx" href="<?php echo _ROOT; ?>" >
	
	<!-- RESPONSIVO -->
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo _ROOT.$favicon; ?>">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo _ROOT; ?>css/styles.css?'<?php echo(rand(1, 999))?>">
	<link rel="stylesheet" type="text/css" href="<?php echo _ROOT; ?>css/colores.css?'<?php echo(rand(1, 999))?>">

	<!-- ANIMATIONS -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	
	<!-- JQUERY -->
	<script type="text/javascript" src="<?php echo _ROOT; ?>js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="<?php echo _ROOT; ?>js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo _ROOT; ?>js/jquery.form.js"></script>

	<!--JQUERY UI-->
	<link rel="stylesheet" type="text/css" href="<?php echo _ROOT; ?>lib/JqueryUi/jquery-ui.css">
	<script type="text/javascript" src="<?php echo _ROOT; ?>lib/JqueryUi/jquery-ui.js"></script>

	<!-- FONT AWESOM -->
	<script src="https://use.fontawesome.com/411c034f21.js"></script>

	<!-- FANCYBOX -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	
	<!-- OWL CARUSEL -->
	<link rel="stylesheet" type="text/css" href="<?php echo _ROOT; ?>lib/owl_carousel/owl.carousel.min.css">
	<script type="text/javascript" src="<?php echo _ROOT; ?>lib/owl_carousel/owl.carousel.js"></script>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo _ROOT; ?>lib/owl_carousel/dist/assets/owl.carousel.css">
	<script type="text/javascript" src="<?php echo _ROOT; ?>lib/owl_carousel/dist/owl.carousel.js"></script>-->

	<!-- SWEETALERT -->
	<link rel="stylesheet" type="text/css" href="<?php echo _ROOT; ?>lib/sweetalert/sweetalert.css">
	<script type="text/javascript" src="<?php echo _ROOT; ?>lib/sweetalert/sweetalert.min.js"></script>

	<!-- FUNCIONES -->
	<script type="text/javascript" src="<?php echo _ROOT; ?>js/funciones.js?'<?php echo(rand(1, 999))?>" ></script>
</head>
<body>
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<?php include 'menu.php'; ?>