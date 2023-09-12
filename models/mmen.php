<?php
class traerMenu
{
	//Atributos
	private $pag_id;
	private $per_id;
	private $pag_mos;
	// Metodos GET devuelven el dato
	function getpag_id(){
		return $this->pag_id;
	}
	function getper_id(){
		return $this->per_id;
	}
	function getpag_mos(){
		return $this->pag_mos;
	}
	// Metodos SET guardar el dato
	function setper_id($per_id)
	{
		$this->per_id = $per_id;
	}
	function setpag_id($pag_id){
		$this->pag_id = $pag_id;
	}
	function setpag_mos($pag_mos){
		$this->pag_mos = $pag_mos;
	}

	public function menu()
	{
		$sql = "SELECT g.pag_id, g.pag_nom, g.pag_rut, g.pag_ico, g.datMenu, g.pag_mos FROM pagina AS g INNER JOIN pagper AS e ON g.pag_id=e.pag_id WHERE e.per_id=:per_id ORDER BY g.pag_ord;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$per_id = $this->getper_id();
		$result->bindParam(':per_id', $per_id);
		$result->execute();
		$res = null;
		while ($f = $result->fetch()) {
			$res[] = $f;
		}
		return $res;
	}
	public function getVal(){
		$sql = "SELECT p.pag_id, p.pag_nom, p.pag_rut, p.pag_ico, p.datMenu FROM pagina AS p INNER JOIN pagper AS g ON p.pag_id=g.pag_id WHERE p.pag_id=:pag_id AND g.per_id=:per_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$per_id = $this->getper_id();
		$pag_id = $this->getpag_id();
		$result->bindParam(':per_id',$per_id);
		$result->bindParam(':pag_id',$pag_id);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
}
