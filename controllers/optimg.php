<?php
function opti($pict, $nomimg, $rut, $pre){
	ini_set('memory_limit', '512M');
	$nombre = '';
	if($pict){
		$max_ancho = 1024;
		$max_alto = 800;
		$docext = pathinfo($pict["name"], PATHINFO_EXTENSION);
		if($docext=="png" or $docext=="jpg" or $docext=="jpeg" or $docext=="jfif"){
			$medidasimagen = getimagesize($pict['tmp_name']);
			if($medidasimagen[0]>$max_ancho){
				echo "<script>alert('El limite de la imagen es de 1024x800 por favor intente con otra imgen de menor resolucion')</script>";
			}else if($medidasimagen[0]<=$max_ancho && $pict['size']<1048576){
				$nombre = $rut.'/'.$nomimg."_".$pre.".".$docext;
				move_uploaded_file($pict['tmp_name'], $nombre);
			}else{
				$nombre = $rut.'/'.$nomimg."_".$pre.".".$docext;
				$rtOriginal=$pict['tmp_name'];
				if($pict['type']=='image/jpeg'){
					$original = imagecreatefromjpeg($rtOriginal);
				}else if($pict['type']=='image/png'){
					$original = imagecreatefrompng($rtOriginal);
				}else if($pict['type']=='image/gif'){
					$original = imagecreatefromgif($rtOriginal);
				}
				list($ancho,$alto)=getimagesize($rtOriginal);
				$x_ratio = $max_ancho / $ancho;
				$y_ratio = $max_alto / $alto;
				if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
	    			$ancho_final = $ancho;
	    			$alto_final = $alto;
				}elseif (($x_ratio * $alto) < $max_alto){
	    			$alto_final = ceil($x_ratio * $alto);
	    			$ancho_final = $max_ancho;
				}else{
	    			$ancho_final = ceil($y_ratio * $ancho);
	    			$alto_final = $max_alto;
				}
				$lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
				imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
	 			$cal=8;
	 			if($pict['type']=='image/jpeg'){
					imagejpeg($lienzo,$nombre);
				}else if($pict['type']=='image/png'){
					imagepng($lienzo,$nombre);
				}else if($pict['type']=='image/gif'){
					imagegif($lienzo,$nombre);
				}
			}
		}elseif ($docext=="mp4" or $docext=="mov" or $docext=="avi") {
			if($pict['size']<100741824){
				$nombre = $rut.'/'."Vid_".$nomimg."_".$pre.".".$docext;
				move_uploaded_file($pict['tmp_name'], $nombre);
			}else{
				echo "<script>alert('Los archivos de video debe tener un peso maximo de 97Mb');</script>";
			}	
		}elseif ($docext=="xls" or $docext=="xlsx") {
			if($pict['size']<1048576){
				$nombre = $rut.'/'."fic_".$nomimg."_".$pre.".".$docext;
				move_uploaded_file($pict['tmp_name'], $nombre);
			}else{
				echo "<script>alert('Los archivos deben tener un peso maximo de 97Mb');</script>";
			}	
		}else{
			echo "<script>alert('Solo se permiten archivos de extensiones: png, jpg, jpeg, mp4, mov, avi.');</script>";
		}
	}
	return $nombre;
}
// -------------------------------------------funcion para ocultar o mostrar el formulario----------------------------
function titulo($tx,$mg,$ti){
	$txt = "<div class='tit'>";
		$txt .= "<h1>";
			$txt .= "<script>var am = '$ti'; </script>";
			$txt .= "<script>var mg = '$mg'; </script>";
			$txt .= "<script>var tmg = '0px'; </script>";
			$txt .= "<script>var tam = '$tx'; </script>";
			$txt .="<style>:root{--tam_inic:$tx;--tam_mg:0px;}</style>";
			$txt .= '<div id="mos" class="btnven" onclick="ocultar(tam,tmg,1);">';
				$txt .= '<div class="icoi"><i class="fa-duotone fa-minus ti"></i><h6>Ocultar</h6></div>';
			$txt .= '</div>';
			$txt .= '<div id="cer" class="btnven" onclick="ocultar(am,mg,0);">';
				$txt .= '<div class="icoi"><i class="fa-duotone fa-plus ti"></i><h6>Registrar</h6></div>';
			$txt .= '</div>';
		$txt .= "</h1>";
	$txt .= "</div>";
	return $txt;
}
function titulofact($tx,$mg,$ti){
	$txt = "<div class='tit'>";
		$txt .= "<h1>";
			$txt .= "<script>var am = '$ti'; </script>";
			$txt .= "<script>var mg = '$mg'; </script>";
			$txt .= "<script>var tmg = '0px'; </script>";
			$txt .= "<script>var tam = '$tx'; </script>";
			$txt .="<style>:root{--tam_inic:$tx;--tam_mg:0px;}</style>";
			$txt .= '<div id="mos" class="btnven" style="width:300px; margin-left:-75px;" onclick="ocultar(tam,tmg,1);">';
				$txt .= '<div class="icoi" style="width:300px"><i class="fa-duotone fa-minus ti"></i><h6>Ocultar Registro</h6></div>';
			$txt .= '</div>';
				$pg = isset($_GET['pg']) ? $_GET['pg'] : false;
			if($pg==1602){
			$txt .= '<div id="cer" class="btnven" style="width:300px; margin-left:-75px;" onclick="ocultar(am,mg,0);">';
				$txt .= '<div class="icoi" style="width:300px"><i class="fa-duotone fa-plus ti"></i><h6>Nuevo Proveedor</h6></div>';
			$txt .= '</div>';
			}else{
				$txt .= '<div id="cer" class="btnven" style="width:300px; margin-left:-75px;" onclick="ocultar(am,mg,0);">';
				$txt .= '<div class="icoi" style="width:300px"><i class="fa-duotone fa-plus ti"></i><h6>Registrar Cliente</h6></div>';
				$txt .= '</div>';
			}
		$txt .= "</h1>";
	$txt .= "</div>";
	return $txt;
}
function mosCer($tx,$mg,$ti){
	$txt = "<div class='tit'>";
		$txt .= "<h1>";
			$txt .= "<script>var am = '$tx'; </script>";
			$txt .= "<script>var mg = '$mg'; </script>";
			$txt .= "<script>var nmg = '0px'; </script>";
			$txt .= "<script>var tam = '$ti'; </script>";
			$txt .="<style>:root{--tam_inic:$ti;--tam_mg:$mg;}</style>";
			$txt .= '<div id="mosOne" class="btnven" onclick="ocultarOne(tam,mg,0);">';
				$txt .= '<div class="icoi"><i class="fa-duotone fa-plus ti"></i><h6>Mostrar</h6></div>';
			$txt .= '</div>';
			$txt .= '<div id="cerOne" class="btnven" onclick="ocultarOne(am,nmg,1);">';
				$txt .= '<div class="icoi"><i class="fa-duotone fa-minus ti"></i><h6>Ocultar</h6></div>';
			$txt .= '</div>';
		$txt .= "</h1>";
	$txt .= "</div>";
	return $txt;
}
function mosCerpag($tx,$mg,$ti){
	$txt = "<div class='tit'>";
		$txt .= "<h1>";
			$txt .= "<script>var am = '$tx'; </script>";
			$txt .= "<script>var mg = '$mg'; </script>";
			$txt .= "<script>var nmg = '0px'; </script>";
			$txt .= "<script>var tam = '$ti'; </script>";
			$txt .="<style>:root{--tam_inic:$ti;--tam_mg:$mg;}</style>";
			$txt .= '<div id="mosOne" class="btnven" style="width:300px; margin-left:-75px;" onclick="ocultarOne(tam,mg,0);">';
				$txt .= '<div class="icoi" style="width:300px"><i class="fa-duotone fa-plus ti"></i><h6>Registrar Cliente</h6></div>';
			$txt .= '</div>';
			$txt .= '<div id="cerOne" class="btnven" style="width:300px; margin-left:-75px;" onclick="ocultarOne(am,nmg,1);">';
				$txt .= '<div class="icoi" style="width:300px"><i class="fa-duotone fa-minus ti"></i><h6>Ocultar</h6></div>';
			$txt .= '</div>';
		$txt .= "</h1>";
	$txt .= "</div>";
	return $txt;
}
// -------------------------------------------funcion para verificar si hay conexion----------------------------
function hasConnection() {  
    $ch = curl_init("https://www.google.com");  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
    curl_exec($ch);  
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
    curl_close($ch);  
    return ($httpcode>=200 && $httpcode<300) ? TRUE : FALSE;
} 
if(hasConnection()){
    $col="#1ABC9C";
	$conxinf="<i class='fa-duotone fa-circle-check'></i>&nbsp;En linea";
}else{
    $col="#ff5252";
	$conxinf="<i class='fa-duotone fa-circle-xmark'></i> Se ha perdido la conexion a internet puede que algunos cambios se no guarden, intente por favor restablecer la conexion.";
}
?>
<style>:root{--color_cirimg: <?=$col?>;}</style>
	