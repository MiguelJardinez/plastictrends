<?php
function tituloUrl($toClean) {
	$GLOBALS['normalizeChars'] = array(
		'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 
		'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 
		'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 
		'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 
		'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 
		'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 
		'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f'
	);
   $toClean = strtr($toClean, $GLOBALS['normalizeChars']);
   $toClean = str_replace('&', 'y', $toClean);
   $toClean = trim(preg_replace('/[^\w\d_ -]/si', '', $toClean));
   $toClean = str_replace(' ', '-', $toClean);
   $toClean = str_replace('--', '-', $toClean);
   return  strtolower($toClean);
}
function tituloUrl2($toClean) {
  $GLOBALS['normalizeChars'] = array(
    'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 
    'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 
    'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 
    'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 
    'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 
    'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 
    'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f'
  );
   $toClean = strtr($toClean, $GLOBALS['normalizeChars']);
   $toClean = str_replace('&', 'y', $toClean);
   $toClean = trim(preg_replace('/[^\w\d_ -]/si', '', $toClean));
   $toClean = str_replace(' ', '-', $toClean);
   $toClean = str_replace('--', '-', $toClean);
   return  strtolower($toClean);
}
function formatoLiga($liga){
	$string1 = "http://";
	$string2 = "https://";
	if($liga != ""){
		if((stristr($liga, $string1) === FALSE) && (stristr($liga, $string2) === FALSE)) {
			$liga = $string1."".$liga;
		}
	}
	return $liga;
}
function br2nl($text){
	$text = str_replace("<br />","",$text);
	$text = str_replace("<br>","",$text);
	return $text;
}
function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}
function nop($str) {
	$str = preg_replace('/<p[^>]*>/', '', $str);
	$str = preg_replace('/<\/p>/', '<br /><br />', $str);
	return $str;
}
function smart_resize_image( $file, $width = 0, $height = 0, $proportional = true, $output = 'file', $delete_original = false, $use_linux_commands = false, $quality = 100){
    if ( $height <= 0 && $width <= 0 ) {
      return false;
    }
    $info = getimagesize($file);
    $image = '';
    $final_width = 0;
    $final_height = 0;
    list($width_old, $height_old) = $info;
    if ($proportional) {
      if ($width == 0) $factor = $height/$height_old;
      elseif ($height == 0) $factor = $width/$width_old;
      else $factor = min ( $width / $width_old, $height / $height_old);   
 
      $final_width = round ($width_old * $factor);
      $final_height = round ($height_old * $factor);
 
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
    }
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:
        $image = imagecreatefromgif($file);
      break;
      case IMAGETYPE_JPEG:
        $image = imagecreatefromjpeg($file);
      break;
      case IMAGETYPE_PNG:
        $image = imagecreatefrompng($file);
      break;
      default:
        return false;
    }
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $trnprt_indx = imagecolortransparent($image);
      if ($trnprt_indx >= 0) {
      	$trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
        $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
        imagefill($image_resized, 0, 0, $trnprt_indx);
        imagecolortransparent($image_resized, $trnprt_indx);
      } 
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
         imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
    if ( $delete_original ) {
      if ( $use_linux_commands )
        exec('rm '.$file);
      else
        unlink($file);
    }
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:
        imagegif($image_resized, $output);
      break;
      case IMAGETYPE_JPEG:
        imagejpeg($image_resized, $output, $quality);
      break;
      case IMAGETYPE_PNG:
        imagepng($image_resized, $output);
      break;
      default:
        return false;
    }
    return true;
}
function hoy ($hoy=null) {
	if($hoy==null){
		$hoy = getdate(); 
		$dia_mes = $hoy[mday];               
		$mes = $hoy[mon];                    
		$ano = $hoy[year];               
		$dia_ano = $hoy[yday]; 				
	}else{
		list($ano,$mes,$dia_mes)=explode("-",$hoy);
	}

	$re= " $dia_mes/";

	if ($mes == 1) $re=$re."01";          
	if ($mes == 2) $re=$re."02";       
	if ($mes == 3) $re=$re."03";         
	if ($mes == 4) $re=$re."04";         
	if ($mes == 5) $re=$re."05";           
	if ($mes == 6) $re=$re."06";           
	if ($mes == 7) $re=$re."07";           
	if ($mes == 8) $re=$re."08";          
	if ($mes == 9) $re=$re."09";      
	if ($mes == 10) $re=$re."10";         
	if ($mes == 11) $re=$re."11";      
	if ($mes == 12) $re=$re."12";       
	
	$re=$re."/$ano";
	return $re;
}
function vaciarDirectorio($dir, $DeleteMe=false) {
    if(!$dh = @opendir($dir)) return;
    while (false !== ($obj = readdir($dh))) {
        if($obj=='.' || $obj=='..') continue;
        if (!@unlink($dir.'/'.$obj)) vaciarDirectorio($dir.'/'.$obj, false);
    }

    closedir($dh);
    if ($DeleteMe){
        @rmdir($dir);
    }
}
function limpiaTexto($toClean) {
  $GLOBALS['normalizeChars'] = array(
    'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 
    'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 
    'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 
    'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 
    'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 
    'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 
    'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f'
  );
   $toClean = strtr($toClean, $GLOBALS['normalizeChars']);
   $toClean = str_replace('&', 'y', $toClean);
   $toClean = trim(preg_replace('/[^\w\d_ -]/si', '', $toClean));
   return  strtolower($toClean);
}
function cambiaCadena($string){
  //ñ
  $string = str_replace('&ntilde;', 'ñ', $string);
  $string = str_replace('&ntilde', 'ñ', $string);
  $string = str_replace('&ntild', 'ñ', $string);
  $string = str_replace('&ntil', 'ñ', $string);
  $string = str_replace('&nti', 'ñ', $string);
  $string = str_replace('&nt', 'ñ', $string);
  $string = str_replace('&nbsp;', ' ', $string);  

  //a minuscula
  $string = str_replace('&aacute;', 'á', $string);
  $string = str_replace('&aacute', 'á', $string);
  $string = str_replace('&aacut', 'á', $string);
  $string = str_replace('&aacu', 'á', $string);
  $string = str_replace('&aac', 'á', $string);
  $string = str_replace('&aa', 'á', $string);
  $string = str_replace('&a', 'á', $string);

  //a mayuscula
  $string = str_replace('&Aacute;', 'Á', $string);
  $string = str_replace('&Aacute', 'Á', $string);
  $string = str_replace('&Aacut', 'Á', $string);
  $string = str_replace('&Aacu', 'Á', $string);
  $string = str_replace('&Aac', 'Á', $string);
  $string = str_replace('&Aa', 'Á', $string);
  $string = str_replace('&A', 'Á', $string);

  //e minuscula
  $string = str_replace('&eacute;', 'é', $string);
  $string = str_replace('&eacute', 'é', $string);
  $string = str_replace('&eacut', 'é', $string);
  $string = str_replace('&eacu', 'é', $string);
  $string = str_replace('&eac', 'é', $string);
  $string = str_replace('&ea', 'é', $string);
  $string = str_replace('&e', 'é', $string);

  //e mayuscula
  $string = str_replace('&Aacute;', 'É', $string);
  $string = str_replace('&Aacute', 'É', $string);
  $string = str_replace('&Aacut', 'É', $string);
  $string = str_replace('&Aacu', 'É', $string);
  $string = str_replace('&Aac', 'É', $string);
  $string = str_replace('&Aa', 'É', $string);
  $string = str_replace('&A', 'É', $string);

  //i minuscula
  $string = str_replace('&iacute;', 'í', $string);
  $string = str_replace('&iacute', 'í', $string);
  $string = str_replace('&iacut', 'í', $string);
  $string = str_replace('&iacu', 'í', $string);
  $string = str_replace('&iac', 'í', $string);
  $string = str_replace('&ia', 'í', $string);
  $string = str_replace('&i', 'í', $string);

  //i mayuscula
  $string = str_replace('&Iacute;', 'Í', $string);
  $string = str_replace('&Iacute', 'Í', $string);
  $string = str_replace('&Iacut', 'Í', $string);
  $string = str_replace('&Iacu', 'Í', $string);
  $string = str_replace('&Iac', 'Í', $string);
  $string = str_replace('&Ia', 'Í', $string);
  $string = str_replace('&I', 'Í', $string);

  //o minuscula
  $string = str_replace('&oacute;', 'ó', $string);
  $string = str_replace('&oacute', 'ó', $string);
  $string = str_replace('&oacut', 'ó', $string);
  $string = str_replace('&oacu', 'ó', $string);
  $string = str_replace('&oac', 'ó', $string);
  $string = str_replace('&oa', 'ó', $string);
  $string = str_replace('&o', 'ó', $string);

  //o mayuscula
  $string = str_replace('&Oacute;', 'Ó', $string);
  $string = str_replace('&Oacute', 'Ó', $string);
  $string = str_replace('&Oacut', 'Ó', $string);
  $string = str_replace('&Oacu', 'Ó', $string);
  $string = str_replace('&Oac', 'Ó', $string);
  $string = str_replace('&Oa', 'Ó', $string);
  $string = str_replace('&O', 'Ó', $string);

  //u minuscula
  $string = str_replace('&uacute;', 'ú', $string);
  $string = str_replace('&uacute', 'ú', $string);
  $string = str_replace('&uacut', 'ú', $string);
  $string = str_replace('&uacu', 'ú', $string);
  $string = str_replace('&uac', 'ú', $string);
  $string = str_replace('&ua', 'ú', $string);
  $string = str_replace('&u', 'ú', $string);

  //u mayuscula
  $string = str_replace('&Uacute;', 'Ú', $string);
  $string = str_replace('&Uacute', 'Ú', $string);
  $string = str_replace('&Uacut', 'Ú', $string);
  $string = str_replace('&Uacu', 'Ú', $string);
  $string = str_replace('&Uac', 'Ú', $string);
  $string = str_replace('&Ua', 'Ú', $string);
  $string = str_replace('&U', 'Ú', $string);

  //$string = str_replace('&', '', $string);

  return $string;
}
function cambiaCadenaSearch($string){
  //MINUSCULAS
  $string = str_replace('ñ', '&ntilde;', $string);
  $string = str_replace('á', '&aacute;', $string);
  $string = str_replace('é', '&eacute;', $string);
  $string = str_replace('í', '&iacute;', $string);
  $string = str_replace('ó', '&oacute;', $string);
  $string = str_replace('ú', '&uacute;', $string);

  //MAYUSCULAS
  $string = str_replace('Ñ', '&ntilde;', $string);
  $string = str_replace('Á', '&aacute;', $string);
  $string = str_replace('É', '&eacute;', $string);
  $string = str_replace('Í', '&iacute;', $string);
  $string = str_replace('Ó', '&oacute;', $string);
  $string = str_replace('Ú', '&uacute;', $string);

  return $string;
}
function cambiaCadenaSearchInverso($string){
  //MINUSCULAS
  $string = str_replace('&aacute;', 'a', $string);
  $string = str_replace('&eacute;', 'e', $string);
  $string = str_replace('&iacute;', 'i', $string);
  $string = str_replace('&oacute;', 'o', $string);
  $string = str_replace('&uacute;', 'u', $string);

  //MAYUSCULAS
  $string = str_replace('&aacute;', 'A', $string);
  $string = str_replace('&eacute;', 'E', $string);
  $string = str_replace('&iacute;', 'I', $string);
  $string = str_replace('&oacute;', 'O', $string);
  $string = str_replace('&uacute;', 'U', $string);

  return $string;
}
?>