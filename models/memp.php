<?php
class Memp{
//Atributos
	private $usu_id;

	private $emp_id;
	private $emp_nom;
	private $emp_desc;
	private $emp_nit;
	private $emp_resp;
	private $emp_razon;
	private $emp_dir;
	private $emp_ubi;
	private $emp_tel;
	private $emp_email;
	private $emp_img;
	private $emp_act;

	private $dom_id;
// Métodos Get devuelven datos
	function getusu_id(){
		return $this->usu_id;
	}

	function getemp_id(){
		return $this->emp_id;
	}
	function getemp_nom(){
		return $this->emp_nom;
	}
	function getemp_desc(){
		return $this->emp_desc;
	}
	function getemp_nit(){
		return $this->emp_nit;
	}
	function getemp_resp(){
		return $this->emp_resp;
	}
	function getemp_razon(){
		return $this->emp_razon;
	}
	function getemp_dir(){
		return $this->emp_dir;
	}
	function getemp_ubi(){
		return $this->emp_ubi;
	}
	function getemp_tel(){
		return $this->emp_tel;
	}
	function getemp_email(){
		return $this->emp_email;
	}
	function getemp_img(){
		return $this->emp_img;
	}
	function getemp_act(){
		return $this->emp_act;
	}
	function getdom_id(){
		return $this->dom_id;
	}


	
//Métodos Set guardan datos
	function setusu_id($usu_id){
		$this->usu_id = $usu_id;
	}

	function setemp_id($emp_id){
		$this->emp_id = $emp_id;
	}
	function setemp_nom($emp_nom){
		$this->emp_nom = $emp_nom;
	}
	function setemp_desc($emp_desc){
		$this->emp_desc = $emp_desc;
	}
	function setemp_nit($emp_nit){
		$this->emp_nit = $emp_nit;
	}
	function setemp_resp($emp_resp){
		$this->emp_resp = $emp_resp;
	}
	function setemp_razon($emp_razon){
		$this->emp_razon = $emp_razon;
	}
	function setemp_dir($emp_dir){
		$this->emp_dir = $emp_dir;
	}
	function setemp_ubi($emp_ubi){
		$this->emp_ubi = $emp_ubi;
	}
	function setemp_tel($emp_tel){
		$this->emp_tel = $emp_tel;
	}
	function setemp_email($emp_email){
		$this->emp_email = $emp_email;
	}
	function setemp_img($emp_img){
		$this->emp_img = $emp_img;
	}
	function setemp_act($emp_act){
		$this->emp_act = $emp_act;
	}
	function setdom_id($dom_id){
		$this->dom_id = $dom_id;
	}



//Métodos CRUD
	function getAll(){
		$sql= "SELECT e.emp_id, e.emp_nom, e.emp_desc, e.emp_nit, e.emp_resp, e.emp_razon, e.emp_dir, e.emp_ubi, e.emp_tel, e.emp_email, e.emp_img, e.emp_act, eu.nomubi FROM empresa as e 
		       INNER JOIN ubicacion as eu on e.emp_ubi=eu.codubi where 1";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function getOne(){
		$sql="SELECT e.emp_id, e.emp_nom, e.emp_desc, e.emp_nit, e.emp_resp, e.emp_razon, e.emp_dir, e.emp_ubi, e.emp_tel, e.emp_email, e.emp_img, e.emp_act, eu.nomubi, eu.codubi  FROM empresa as e 
		      INNER JOIN ubicacion as eu on e.emp_ubi=eu.codubi WHERE e.emp_id=:emp_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$emp_id = $this->getemp_id();
		$result->bindParam(':emp_id',$emp_id);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function getOnes($num){
		$sql="SELECT e.emp_id, e.emp_nom, e.emp_desc, e.emp_nit, e.emp_resp, e.emp_razon, e.emp_dir, e.emp_ubi, e.emp_tel, e.emp_email, e.emp_img, e.emp_act, eu.nomubi FROM empresa as e 
		      INNER JOIN ubicacion as eu on e.emp_ubi=eu.codubi WHERE e.emp_id=$num";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function getOneExU(){
		$sql="SELECT e.emp_nom, e.emp_desc, e.emp_nit, e.emp_resp, e.emp_razon, e.emp_dir, e.emp_ubi, e.emp_tel, e.emp_email, e.emp_img, e.emp_act, eu.emp_id, eu.usu_id FROM empresa as e 
		      INNER JOIN empxusu as eu on e.emp_id=eu.emp_id WHERE eu.usu_id=:usu_id AND e.emp_id=:emp_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$usu_id = $this->getusu_id();
		$result->bindParam(':usu_id',$usu_id);
		$emp_id = $this->getemp_id();
        $result->bindParam(':emp_id',$emp_id);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function save(){
		$sql = "INSERT INTO empresa(emp_id, emp_nom, emp_desc, emp_nit, emp_resp, emp_razon, emp_dir, emp_ubi, emp_tel, emp_img, emp_email, emp_act) VALUES (:emp_id, :emp_nom, :emp_desc, :emp_nit, :emp_resp, :emp_razon, :emp_dir, :emp_tel, :emp_img, :emp_email, :emp_act)";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $emp_id = $this->getemp_id();
        $result->bindParam(':emp_id',$emp_id);
		$emp_nom = $this->getemp_nom();
        $result->bindParam(':emp_nom',$emp_nom);
		$emp_desc = $this->getemp_desc();
        $result->bindParam(':emp_desc',$emp_desc);
		$emp_nit = $this->getemp_nit();
        $result->bindParam(':emp_nit',$emp_nit);
		$emp_resp = $this->getemp_resp();
        $result->bindParam(':emp_resp',$emp_resp);
		$emp_razon = $this->getemp_razon();
        $result->bindParam(':emp_razon',$emp_razon);
        $emp_dir = $this->getemp_dir();
        $result->bindParam(':emp_dir',$emp_dir);
		$emp_ubi = $this->getemp_ubi();
        $result->bindParam(':emp_ubi',$emp_ubi);
        $emp_tel = $this->getemp_tel();
        $result->bindParam(':emp_tel',$emp_tel);
        $emp_img = $this->getemp_img();
        $result->bindParam(':emp_img',$emp_img);
        $emp_email = $this->getemp_email();
        $result->bindParam(':emp_email',$emp_email);
		$emp_act = $this->getemp_act();
        $result->bindParam(':emp_act',$emp_act);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function edit(){
        $sql ="UPDATE empresa SET emp_nom=:emp_nom, emp_desc=:emp_desc, emp_nit=:emp_nit, emp_resp=:emp_resp, emp_razon=:emp_razon, emp_dir=:emp_dir"; 
		$emp_ubi=$this->getemp_ubi();
		if($emp_ubi) $sql .= ", emp_ubi=:emp_ubi";
		$emp_img=$this->getemp_img();
		if($emp_img) $sql .= ", emp_img=:emp_img";
		$sql .=" ,emp_email=:emp_email, emp_tel=:emp_tel, emp_act=:emp_act  WHERE emp_id=:emp_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $emp_id = $this->getemp_id();
        $result->bindParam(':emp_id',$emp_id);
		$emp_nom = $this->getemp_nom();
        $result->bindParam(':emp_nom',$emp_nom);
		$emp_desc = $this->getemp_desc();
        $result->bindParam(':emp_desc',$emp_desc);
		$emp_nit = $this->getemp_nit();
        $result->bindParam(':emp_nit',$emp_nit);
		$emp_resp = $this->getemp_resp();
        $result->bindParam(':emp_resp',$emp_resp);
		$emp_razon = $this->getemp_razon();
        $result->bindParam(':emp_razon',$emp_razon);
        $emp_dir = $this->getemp_dir();
        $result->bindParam(':emp_dir',$emp_dir);
		if($emp_ubi) $result->bindParam(':emp_ubi',$emp_ubi);
        $emp_tel = $this->getemp_tel();
        $result->bindParam(':emp_tel',$emp_tel);
        $emp_img = $this->getemp_img();
		if($emp_img)$result->bindParam(':emp_img',$emp_img);
        $emp_email = $this->getemp_email();
        $result->bindParam(':emp_email',$emp_email);
		$emp_act = $this->getemp_act();
        $result->bindParam(':emp_act',$emp_act);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function ediAct(){
		$sql = "UPDATE empresa SET emp_act=:emp_act WHERE emp_id=:emp_id;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$emp_id = $this->getemp_id();
		$result->bindParam(':emp_id',$emp_id);
		$emp_act=$this->getemp_act();
		$result->bindParam(':emp_act',$emp_act);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function getRazon(){
		$sql = "SELECT val_id, val_nom FROM valor WHERE dom_id=:dom_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$dom_id = $this->getdom_id();
		$result->bindParam(':dom_id',$dom_id);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function del(){
		$sql = "DELETE FROM empresa WHERE emp_id=:emp_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $emp_id = $this->getemp_id();
        $result->bindParam(':emp_id',$emp_id);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
}
?>