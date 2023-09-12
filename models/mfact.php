<?php
class Mfact{
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
	    if($num==1){
			$sql= "SELECT c.com_id , c.com_nom , c.com_ndoc , c.com_tel , c.com_ema , c.com_dir , c.com_ubi, c.com_tipo, u.nomubi, ec.com_act FROM comercio as c 
				INNER JOIN ubicacion as u on c.com_ubi=u.codubi 
				INNER JOIN empxcom as ec on c.com_id=ec.com_id 
				INNER JOIN empresa as e on e.emp_id=ec.emp_id WHERE ec.emp_id=e.emp_id and c.com_tipo='C' and ec.com_act=1";
		}else if($num==2){
			$sql= "SELECT c.com_id , c.com_nom , c.com_ndoc , c.com_tel , c.com_ema , c.com_dir , c.com_ubi, c.com_tipo, u.nomubi, ec.com_act FROM comercio as c 
				INNER JOIN ubicacion as u on c.com_ubi=u.codubi 
				INNER JOIN empxcom as ec on c.com_id=ec.com_id 
				INNER JOIN empresa as e on e.emp_id=ec.emp_id WHERE ec.emp_id=e.emp_id and c.com_tipo='P' and ec.com_act=1";
				
		}
		$result = $conexion->prepare($sql);
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
			INNER JOIN empresa as e on e.emp_id=ec.emp_id WHERE c.com_nom=:com_nom AND e.emp_id=:emp_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$com_nom = $this->getcom_id();
		$result->bindParam(':com_nom',$com_nom);
		$emp_id = $this->getemp_id();
		$result->bindParam(':emp_id',$emp_id);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
}