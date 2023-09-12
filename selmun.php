<?php
	require_once('models/conexion.php');

	$valor = $_REQUEST["valor"];
	$data = selmuni($valor);
	$i=0;
	foreach ($data as $res) {
		$mmun[$i]["value"]=$res["codubi"];
		$mmun[$i]["nombre"]=$res["nomubi"];
		$i++;
	}

	$html = '<div id="reloadMun">';
		$html .= '<select name="usu_ubi" class="form-control" required>';
			$html .= '<option value=0>Seleccione Municipio</option>';
		foreach ($mmun as $res) {
			$html .= '<option value="'.$res['value'].'">'.$res['nombre'].'</option>';
		}
		$html .= '</select>';
	$html .= '</div>';
	echo $html;

	function selmuni($valor){
		$resultado=null;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql = "SELECT codubi, nomubi FROM ubicacion WHERE depubi=:valor ORDER BY nomubi;";
		//echo "<br><br><br><br>".$sql."<br>";
		$result = $conexion->prepare($sql);
		//echo $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result->bindParam(':valor',$valor);
		$result->execute();

		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}
?>