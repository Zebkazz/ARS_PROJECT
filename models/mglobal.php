<?php
// ----------------------------------------Traer Ciudad------------------------------------

function getCiu(){
	$sql = "SELECT c.codubi, c.nomubi AS ciu, d.nomubi AS dep FROM ubicacion AS c INNER JOIN ubicacion AS d ON c.depubi=d.codubi WHERE c.depubi=d.codubi  ORDER BY ciu ASC";
	$modelo = new conexion();
	$conexion = $modelo->get_conexion();
	$result = $conexion->prepare($sql);
	$result->execute();
	$res = NULL;
	while($f=$result->fetch())
		$res[]=$f;
	return $res;
}
// ------------------------------------------Traer departamento------------------------------------
function seldep(){
	$resultado=null;
	$modelo = new conexion();
	$conexion = $modelo->get_conexion();
	$sql = "SELECT codubi, nomubi, depubi FROM ubicacion WHERE depubi=0 ORDER BY nomubi";
	$result = $conexion->prepare($sql);
	$result->execute();

	while($f=$result->fetch()){
		$resultado[]=$f;
	}
	return $resultado;
}