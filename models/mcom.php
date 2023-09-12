<?php
class Mcom{
//Atributos
	private $emp_id;

	private $com_id;
	private $com_nom;
	private $com_ndoc;
	private $com_tel;
	private $com_ubi;
	private $com_dir;
	private $com_ema;
	private $com_act;
	private $com_tipo;

// Métodos Get devuelven datos
	function getemp_id(){
		return $this->emp_id;
	}
	function getcom_id(){
		return $this->com_id;
	}
	function getcom_nom(){
		return $this->com_nom;
	}
	function getcom_ndoc(){
		return $this->com_ndoc;
	}
	function getcom_tel(){
		return $this->com_tel;
	}
	function getcom_ubi(){
		return $this->com_ubi;
	}
	function getcom_dir(){
		return $this->com_dir;
	}
	function getcom_ema(){
		return $this->com_ema;
	}
	function getcom_act(){
		return $this->com_act;
	}
	function getcom_tipo(){
		return $this->com_tipo;
	}
	
	
//Métodos Set guardan datos
	function setemp_id($emp_id){
		$this->emp_id = $emp_id;
	}

	function setcom_id($com_id){
		$this->com_id = $com_id;
	}
	function setcom_nom($com_nom){
		$this->com_nom = $com_nom;
	}
	function setcom_ndoc($com_ndoc){
		$this->com_ndoc = $com_ndoc;
	}
	function setcom_tel($com_tel){
		$this->com_tel = $com_tel;
	}
	function setcom_ubi($com_ubi){
		$this->com_ubi = $com_ubi;
	}
	function setcom_dir($com_dir){
		$this->com_dir = $com_dir;
	}
	function setcom_ema($com_ema){
		$this->com_ema = $com_ema;
	}
	function setcom_act($com_act){
		$this->com_act = $com_act;
	}
	function setcom_tipo($com_tipo){
		$this->com_tipo = $com_tipo;
	}
	
	

//Métodos CRUD
	function getAll($num){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		if($_SESSION['per_id']==1){
			$sql= "SELECT c.com_id , c.com_nom , c.com_ndoc , c.com_tel , c.com_ema , c.com_dir , c.com_ubi, c.com_tipo, u.nomubi, ec.com_act FROM comercio as c
					INNER JOIN ubicacion as u on c.com_ubi=u.codubi 
					INNER JOIN empxcom as ec on c.com_id=ec.com_id 
					INNER JOIN empresa as e on e.emp_id=ec.emp_id WHERE e.emp_id=:emp_id and c.com_tipo='C' ";
				$result = $conexion->prepare($sql);
				$emp_id = $this->getemp_id();
				$result->bindParam(':emp_id',$emp_id);
		}else if($num==1){
			$sql= "SELECT c.com_id , c.com_nom , c.com_ndoc , c.com_tel , c.com_ema , c.com_dir , c.com_ubi, c.com_tipo, u.nomubi, ec.com_act FROM comercio as c
					INNER JOIN ubicacion as u on c.com_ubi=u.codubi 
					INNER JOIN empxcom as ec on c.com_id=ec.com_id 
					INNER JOIN empresa as e on e.emp_id=ec.emp_id WHERE e.emp_id=:emp_id and c.com_tipo='C' and ec.com_act!=0 ";
				$result = $conexion->prepare($sql);
				$emp_id = $this->getemp_id();
				$result->bindParam(':emp_id',$emp_id);
		}else if($_SESSION['per_id']==1){
			$sql= "SELECT c.com_id , c.com_nom , c.com_ndoc , c.com_tel , c.com_ema , c.com_dir , c.com_ubi, c.com_tipo, u.nomubi, ec.com_act FROM comercio as c
					INNER JOIN ubicacion as u on c.com_ubi=u.codubi 
					INNER JOIN empxcom as ec on c.com_id=ec.com_id 
					INNER JOIN empresa as e on e.emp_id=ec.emp_id WHERE e.emp_id=:emp_id and c.com_tipo='P'";
				$result = $conexion->prepare($sql);
				$emp_id = $this->getemp_id();
				$result->bindParam(':emp_id',$emp_id);
		}else if($num==2){
			$sql= "SELECT c.com_id , c.com_nom , c.com_ndoc , c.com_tel , c.com_ema , c.com_dir , c.com_ubi, c.com_tipo, u.nomubi, ec.com_act FROM comercio as c
					INNER JOIN ubicacion as u on c.com_ubi=u.codubi 
					INNER JOIN empxcom as ec on c.com_id=ec.com_id 
					INNER JOIN empresa as e on e.emp_id=ec.emp_id WHERE e.emp_id=:emp_id and c.com_tipo='P' and ec.com_act!=0";
				$result = $conexion->prepare($sql);
				$emp_id = $this->getemp_id();
				$result->bindParam(':emp_id',$emp_id);
		}
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function getOne(){
		$sql="SELECT c.com_id , c.com_nom , c.com_ndoc , c.com_tel , c.com_ema , c.com_dir , c.com_ubi, c.com_tipo, u.nomubi, ec.com_act FROM comercio as c
			INNER JOIN ubicacion as u on c.com_ubi=u.codubi 
			INNER JOIN empxcom as ec on c.com_id=ec.com_id
			INNER JOIN empresa as e on e.emp_id=ec.emp_id WHERE c.com_id=:com_id AND e.emp_id=:emp_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$com_id = $this->getcom_id();
		$result->bindParam(':com_id',$com_id);
		$emp_id = $this->getemp_id();
		$result->bindParam(':emp_id',$emp_id);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function save(){
		$sql = "INSERT INTO comercio(com_id, com_nom, com_ndoc, com_tel, com_ubi, com_dir, com_ema, com_tipo) VALUES (:com_id, :com_nom, :com_ndoc, :com_tel, :com_ubi, :com_dir, :com_ema, :com_tipo )";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $com_id = $this->getcom_id();
        $result->bindParam(':com_id',$com_id);
		$com_nom = $this->getcom_nom();
        $result->bindParam(':com_nom',$com_nom);
		$com_ndoc = $this->getcom_ndoc();
        $result->bindParam(':com_ndoc',$com_ndoc);
		$com_tel = $this->getcom_tel();
        $result->bindParam(':com_tel',$com_tel);
		$com_ubi = $this->getcom_ubi();
        $result->bindParam(':com_ubi',$com_ubi);
        $com_dir = $this->getcom_dir();
        $result->bindParam(':com_dir',$com_dir);
        $com_ema = $this->getcom_ema();
        $result->bindParam(':com_ema',$com_ema);
		$com_tipo = $this->getcom_tipo();
        $result->bindParam(':com_tipo',$com_tipo);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function edit(){
        $sql ="UPDATE comercio SET com_nom=:com_nom, com_ndoc=:com_ndoc, com_tel=:com_tel" ;
		$com_ubi=$this->getcom_ubi();
		if($com_ubi) $sql .= ",com_ubi=:com_ubi";
		 $sql .=  ", com_dir=:com_dir ,com_ema=:com_ema, com_tipo=:com_tipo WHERE com_id=:com_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $com_id = $this->getcom_id();
        $result->bindParam(':com_id',$com_id);
		$com_nom = $this->getcom_nom();
        $result->bindParam(':com_nom',$com_nom);
		$com_ndoc = $this->getcom_ndoc();
        $result->bindParam(':com_ndoc',$com_ndoc);
		$com_tel = $this->getcom_tel();
        $result->bindParam(':com_tel',$com_tel);
		if($com_ubi) $result->bindParam(':com_ubi',$com_ubi);
        $com_dir = $this->getcom_dir();
        $result->bindParam(':com_dir',$com_dir);
        $com_ema = $this->getcom_ema();
        $result->bindParam(':com_ema',$com_ema);
		$com_tipo = $this->getcom_tipo();
        $result->bindParam(':com_tipo',$com_tipo);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
// -------------------------------------Activo o inactivo-----------------------------
function ediAct(){
	$sql = "UPDATE empxcom SET com_act=:com_act WHERE com_id=:com_id AND emp_id=:emp_id";
	$modelo = new conexion();
	$conexion = $modelo->get_conexion();
	$result = $conexion->prepare($sql);
	$com_id = $this->getcom_id();
	$result->bindParam(':com_id',$com_id);
	$com_act=$this->getcom_act();
	$result->bindParam(':com_act',$com_act);
	$emp_id=$this->getemp_id();
	$result->bindParam(':emp_id',$emp_id);
	$result->execute();
	$res = NULL;
	while($f=$result->fetch())
		$res[]=$f;
	return $res;
}
	// function del(){
	// 	$sql = "DELETE FROM comercio WHERE com_id=:com_id";
	// 	$modelo = new conexion();
	// 	$conexion = $modelo->get_conexion();
	// 	$result = $conexion->prepare($sql);
    //     $com_id = $this->getcom_id();
    //     $result->bindParam(':com_id',$com_id);
	// 	$result->execute();
	// 	$res = NULL;
	// 	while($f=$result->fetch())
	// 		$res[]=$f;
	// 	return $res;

// -------------------------------------Traer ultimo ID insertado-----------------------------
function getIdins(){
	$sql="SELECT MAX( com_id ) as com_id FROM comercio";
	$modelo = new conexion();
	$conexion = $modelo->get_conexion();
	$result = $conexion->prepare($sql);
	$result->execute();
	$res= $result->fetch();
	return $res;
}	//-------------------------Contador de empresas----------------------
	function countemp($com_id, $ope){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		if($ope==1){
			$sql="SELECT emp_id from empresa WHERE 1";
			$result = $conexion->prepare($sql);
		}else{
			$sql="SELECT e.emp_id, ec.com_act FROM empxcom as ec 
				INNER JOIN empresa as e on e.emp_id=ec.emp_id 
				WHERE ec.com_id=:com_id";
				$result = $conexion->prepare($sql);
				$result->bindParam(':com_id',$com_id);
		}
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
// ------------------------------------------Traer Empresas------------------------------------
function selEmp($com_id){
	$resultado = NULL;
	$modelo = new conexion();
	$conexion = $modelo->get_conexion();
	// ---------------------------Traer Todas las empresa Admin-------------------------
	if($_SESSION['per_id']==1){
		$sql = "SELECT emp_id, emp_nom, emp_img FROM empresa ";
		$result = $conexion->prepare($sql);
	}
	// ---------------------------Traer Empresas por ususario----------------------------
	else{
		$num =$_SESSION['emp_id'];
		$sql="SELECT e.emp_id, e.emp_nom, e.emp_img, eu.com_id FROM empresa as e
			INNER JOIN empxcom as eu on eu.emp_id=e.emp_id WHERE eu.com_id=:com_id AND e.emp_id=$num";
			$result = $conexion->prepare($sql);
			$result->bindParam(":com_id",$com_id);
	}
	$result->execute();
	while($f=$result->fetch()){
		$resultado[]=$f;
	}
	return $resultado;
}
// ----------------------------------------Traer Empresas por comercio activo---------------------------------
function selExU($com_id,$emp_id){
	$resultado = NULL;
	$modelo = new conexion();
	$conexion = $modelo->get_conexion();
	$sql = "SELECT emp_id, com_act FROM empxcom WHERE com_id=:com_id AND emp_id=:emp_id";
	$result = $conexion->prepare($sql);
	$result->bindParam(":com_id",$com_id);
	$result->bindParam(":emp_id",$emp_id);
	$result->execute();
	while($f=$result->fetch()){
		$resultado[]=$f;
	}
	return $resultado;
}
// ------------------------------------------Eliminar empresa por comercio------------------------------
function delExU($com_id){
	$modelo = new conexion();
	$conexion = $modelo->get_conexion();
	$sql = "DELETE FROM empxcom WHERE com_id=:com_id";
	$result = $conexion->prepare($sql);
	$result->bindParam(":com_id",$com_id);
	$result->execute();
}
// ------------------------------------------Insertar Empresas por comercio-------------------------
function insExU($com_id,$emp_id,$com_act){
	$modelo = new conexion();
	$conexion = $modelo->get_conexion();
	$sql = "INSERT INTO empxcom (emp_id,com_id,com_act) VALUES (:emp_id,:com_id,:com_act);";
	$result = $conexion->prepare($sql);
	$result->bindParam(":com_id",$com_id);
	$result->bindParam(":emp_id",$emp_id);
	$result->bindParam(":com_act",$com_act);
	$result->execute();
}
}
?>