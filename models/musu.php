<?php
class Musu{
//Atributos
	private $emp_id;

	private $usu_id;
	private $usu_ndoc;
	private $usu_tdoc;
	private $usu_nom;
	private $usu_ape;
	private $per_id;
	private $emp_tema;
	private $usu_pas;
	private $usu_ema;
	private $usu_act;
	private $usu_dir;
	private $usu_ubi;
	private $usu_fot;
	private $usu_tel;

	private $dom_id;
// Métodos Get devuelven datos
	function getemp_id(){
		return $this->emp_id;
	}

	function getusu_id(){
		return $this->usu_id;
	}
	function getusu_ndoc(){
		return $this->usu_ndoc;
	}
	function getusu_tdoc(){
		return $this->usu_tdoc;
	}
	function getusu_nom(){
		return $this->usu_nom;
	}
	function getemp_tema(){
		return $this->emp_tema;
	}
	function getusu_ape(){
		return $this->usu_ape;
	}
	function getper_id(){
		return $this->per_id;
	}
	function getusu_pas(){
		return $this->usu_pas;
	}
	function getusu_ema(){
		return $this->usu_ema;
	}
	function getusu_act(){
		return $this->usu_act;
	}
	function getusu_dir(){
		return $this->usu_dir;
	}
	function getusu_ubi(){
		return $this->usu_ubi;
	}
	function getusu_fot(){
		return $this->usu_fot;
	}
	function getusu_tel(){
		return $this->usu_tel;
	}
	function getdom_id(){
		return $this->dom_id;
	}

//Métodos Set guardan datos
	function setemp_id($emp_id){
		$this->emp_id = $emp_id;
	}

	function setusu_id($usu_id){
		$this->usu_id = $usu_id;
	}
	function setusu_ndoc($usu_ndoc){
		$this->usu_ndoc = $usu_ndoc;
	}
	function setusu_tdoc($usu_tdoc){
		$this->usu_tdoc = $usu_tdoc;
	}
	function setusu_nom($usu_nom){
		$this->usu_nom = $usu_nom;
	}
	function setusu_ape($usu_ape){
		$this->usu_ape = $usu_ape;
	}
	function setper_id($per_id){
		$this->per_id = $per_id;
	}
	function setemp_tema($emp_tema){
		$this->emp_tema = $emp_tema;
	}
	function setusu_pas($usu_pas){
		$this->usu_pas = $usu_pas;
	}
	function setusu_ema($usu_ema){
		$this->usu_ema = $usu_ema;
	}
	function setusu_act($usu_act){
		$this->usu_act = $usu_act;
	}
	function setusu_dir($usu_dir){
		$this->usu_dir = $usu_dir;
	}
	function setusu_ubi($usu_ubi){
		$this->usu_ubi = $usu_ubi;
	}
	function setusu_fot($usu_fot){
		$this->usu_fot = $usu_fot;
	}
	function setusu_tel($usu_tel){
		$this->usu_tel = $usu_tel;
	}
	function setdom_id($dom_id){
		$this->dom_id = $dom_id;
	}
// -------------------------------------Traer Datos por empresa-----------------------------
	function getAll(){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		// -------------------------------------Traer Datos otros perfiles-----------------------------
		if($_SESSION['per_id']!=1){
		$sql = "SELECT u.usu_id, u.usu_ndoc, u.usu_tdoc, u.usu_nom, u.usu_ape, u.per_id, p.per_nom, u.emp_tema, v.val_nom, v.val_id, u.usu_ema, eu.usu_act, ub.nomubi, u.usu_dir, u.usu_fot, u.usu_tel FROM usuario AS u 
				INNER JOIN perfil AS p ON u.per_id=p.per_id 
				INNER JOIN valor AS v ON u.usu_tdoc=v.val_id 
				INNER JOIN empxusu AS eu ON eu.usu_id=u.usu_id 
				INNER JOIN ubicacion AS ub ON ub.codubi=u.usu_ubi 
				INNER JOIN empresa AS e ON eu.emp_id=e.emp_id WHERE e.emp_id=:emp_id AND p.per_id!=1";
			$result = $conexion->prepare($sql);
			$emp_id = $this->getemp_id();
			$result->bindParam(':emp_id',$emp_id);
		// -------------------------------------Traer Datos Admin-----------------------------
		}else if($_SESSION['per_id']==1){
			$sql ="SELECT u.usu_id, u.usu_ndoc, u.usu_tdoc, u.usu_nom, u.usu_ape, u.per_id, p.per_nom, u.emp_tema, v.val_nom, v.val_id, u.usu_ema,  ub.nomubi, u.usu_dir, u.usu_fot, u.usu_tel FROM usuario AS u 
				INNER JOIN perfil AS p ON u.per_id=p.per_id 
				INNER JOIN valor AS v ON u.usu_tdoc=v.val_id
				INNER JOIN ubicacion AS ub ON ub.codubi=u.usu_ubi WHERE 1;";
			$result = $conexion->prepare($sql);
		}
		
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
// -------------------------------------Traer Dato unico usuario-----------------------------
	function getOne(){
		$sql = "SELECT u.usu_id, u.usu_ndoc, u.usu_tdoc, u.usu_nom, u.usu_ape, u.per_id, p.per_nom, u.emp_tema, v.val_nom, v.val_id, u.usu_ema, eu.usu_act, ub.nomubi, u.usu_dir, u.usu_fot, u.usu_tel FROM usuario AS u 
				INNER JOIN perfil AS p ON u.per_id=p.per_id 
				INNER JOIN valor AS v ON u.usu_tdoc=v.val_id 
				INNER JOIN empxusu AS eu ON eu.usu_id=u.usu_id 
				INNER JOIN ubicacion AS ub ON ub.codubi=u.usu_ubi 
				INNER JOIN empresa AS e ON eu.emp_id=e.emp_id WHERE e.emp_id=:emp_id AND u.usu_id=:usu_id";
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
// -------------------------------------Traer ultimo ID insertado-----------------------------
	function getIdins(){
		$sql="SELECT MAX( usu_id ) as usu_id FROM usuario";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetch();
		return $res;
	}
	function countemp($usu_id, $ope){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		if($ope==1){
			$sql="SELECT emp_id from empresa WHERE 1";
			$result = $conexion->prepare($sql);
		}else{
			$sql="SELECT e.emp_id, eu.usu_act FROM empxusu as eu 
				INNER JOIN empresa as e on e.emp_id=eu.emp_id 
				WHERE eu.usu_id=:usu_id";
				$result = $conexion->prepare($sql);
				$result->bindParam(':usu_id',$usu_id);
		}
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	
// -------------------------------------Traer tema del usuario-----------------------------
	function getTema(){
		$sql="SELECT emp_tema FROM usuario WHERE usu_id=:usu_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$usu_id = $this->getusu_id();
		$result->bindParam(':usu_id',$usu_id);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
//----------------------------------Traer documento del usuario y validarlo---------------------------
	function getNdoc($num){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		if($num==1){
			$sql="SELECT usu_ndoc FROM usuario WHERE usu_ndoc=:usu_ndoc";
			$result = $conexion->prepare($sql);
		}else{
			$sql="SELECT usu_ndoc FROM usuario WHERE usu_ndoc=:usu_ndoc and usu_id=:usu_id";
			$result = $conexion->prepare($sql);
			$usu_id = $this->getusu_id();
			$result->bindParam(':usu_id',$usu_id);
		}
		$usu_ndoc = $this->getusu_ndoc();
		$result->bindParam(':usu_ndoc',$usu_ndoc);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	
// -------------------------------------Guardar Datos----------------------------
	function save(){
		$sql = "INSERT INTO usuario(usu_ndoc, usu_tdoc, usu_nom, usu_ape, per_id, emp_tema, usu_pas, usu_ema, usu_dir, usu_ubi, usu_fot, usu_tel) 
		VALUES (:usu_ndoc, :usu_tdoc, :usu_nom, :usu_ape, :per_id, :emp_tema, :usu_pas, :usu_ema, :usu_dir, :usu_ubi, :usu_fot, :usu_tel)";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$usu_ndoc=$this->getusu_ndoc();
		$result->bindParam(':usu_ndoc',$usu_ndoc);
		$usu_tdoc=$this->getusu_tdoc();
		$result->bindParam(':usu_tdoc',$usu_tdoc);
		$usu_nom=$this->getusu_nom();
		$result->bindParam(':usu_nom',$usu_nom);
		$usu_ape=$this->getusu_ape();
		$result->bindParam(':usu_ape',$usu_ape);
		$emp_tema=$this->getemp_tema();
		$result->bindParam(':emp_tema',$emp_tema);
		$per_id=$this->getper_id();
		$result->bindParam(':per_id',$per_id);
		$usu_pas=$this->getusu_pas();
		$pas = sha1(md5("GruDFG¿.,lZebkazz//{".$usu_pas));
		$result->bindParam(':usu_pas',$pas);
		$usu_ema=$this->getusu_ema();
		$result->bindParam(':usu_ema',$usu_ema);
		$usu_dir=$this->getusu_dir();
		$result->bindParam(':usu_dir',$usu_dir);
		$usu_ubi=$this->getusu_ubi();
		$result->bindParam(':usu_ubi',$usu_ubi);
		$usu_fot=$this->getusu_fot();
		$result->bindParam(':usu_fot',$usu_fot);
		$usu_tel=$this->getusu_tel();
		$result->bindParam(':usu_tel',$usu_tel);
			// echo $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
//-------------------------------------Actualizar datos-----------------------------
	function edit(){
		$sql = "UPDATE usuario SET usu_ndoc=:usu_ndoc, usu_tdoc=:usu_tdoc, usu_nom=:usu_nom, usu_ape=:usu_ape, usu_dir=:usu_dir";
		$usu_ubi=$this->getusu_ubi();
		if($usu_ubi) $sql .= ", usu_ubi=:usu_ubi";
		$usu_pas=$this->getusu_pas();
		if($usu_pas) $sql .= ", usu_pas=:usu_pas";
		$usu_fot=$this->getusu_fot();
		if($usu_fot) $sql .= ", usu_fot=:usu_fot";
		$sql .= ", per_id=:per_id, emp_tema=:emp_tema, usu_ema=:usu_ema, usu_tel=:usu_tel ";
		$sql .= " WHERE usu_id=:usu_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$usu_id = $this->getusu_id();
		$result->bindParam(':usu_id',$usu_id);
		$usu_ndoc = $this->getusu_ndoc();
		$result->bindParam(':usu_ndoc',$usu_ndoc);
		$usu_tdoc = $this->getusu_tdoc();
		$result->bindParam(':usu_tdoc',$usu_tdoc);
		$usu_nom = $this->getusu_nom();
		$result->bindParam(':usu_nom',$usu_nom);
		$emp_tema=$this->getemp_tema();
		$result->bindParam(':emp_tema',$emp_tema);
		$usu_ape = $this->getusu_ape();
		$result->bindParam(':usu_ape',$usu_ape);
		if($this->getusu_pas()){
			$usu_pas = $this->getusu_pas();
			$pas = sha1(md5("GruDFG¿.,lZebkazz//{".$usu_pas));
			$result->bindParam(':usu_pas',$pas);
		}
		$per_id = $this->getper_id();
		$result->bindParam(':per_id',$per_id);
		$usu_ema = $this->getusu_ema();
		$result->bindParam(':usu_ema',$usu_ema);
		$usu_dir=$this->getusu_dir();
		$result->bindParam(':usu_dir',$usu_dir);
		if($usu_ubi) $result->bindParam(':usu_ubi',$usu_ubi);
		if($usu_fot) $result->bindParam(':usu_fot',$usu_fot);
		$usu_tel = $this->getusu_tel();
		$result->bindParam(':usu_tel',$usu_tel);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
// -------------------------------------Activo o inactivo-----------------------------
	function ediAct(){
		$sql = "UPDATE empxusu SET usu_act=:usu_act WHERE usu_id=:usu_id AND emp_id=:emp_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$usu_id = $this->getusu_id();
		$result->bindParam(':usu_id',$usu_id);
		$usu_act=$this->getusu_act();
		$result->bindParam(':usu_act',$usu_act);
		$emp_id=$this->getemp_id();
		$result->bindParam(':emp_id',$emp_id);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
// -------------------------------------Eliminar registro-----------------------------
	function del(){
		$sql = "DELETE FROM usuario WHERE usu_id=:usu_id";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$usu_id = $this->getusu_id();
		$result->bindParam(':usu_id',$usu_id);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
// -------------------------------------Traer Perfil-----------------------------
	function getPerfil(){
		$sql = "SELECT per_id, per_nom FROM perfil";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
// -------------------------------------Traer tipo de documento-----------------------------
	function getTdoc(){
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

// ------------------------------------------Traer Empresas------------------------------------
	function selEmp($usu_id){
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
			$sql="SELECT e.emp_id, e.emp_nom, e.emp_img, eu.usu_id FROM empresa as e
				INNER JOIN empxusu as eu on eu.emp_id=e.emp_id WHERE eu.usu_id=:usu_id AND e.emp_id=$num";
				$result = $conexion->prepare($sql);
				$result->bindParam(":usu_id",$usu_id);
		}
		$result->execute();
		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}
// ----------------------------------------Traer Empresas por usuario activo---------------------------------
	function selExU($usu_id,$emp_id){
		$resultado = NULL;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql = "SELECT emp_id, usu_act FROM empxusu WHERE usu_id=:usu_id AND emp_id=:emp_id";
		$result = $conexion->prepare($sql);
		$result->bindParam(":usu_id",$usu_id);
		$result->bindParam(":emp_id",$emp_id);
		$result->execute();
		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}
// ------------------------------------------Eliminar empresa por usuario------------------------------
	function delExU($usu_id){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql = "DELETE FROM empxusu WHERE usu_id=:usu_id";
		$result = $conexion->prepare($sql);
		$result->bindParam(":usu_id",$usu_id);
		$result->execute();
	}
// ------------------------------------------Insertar Empresas por usuario-------------------------
	function insExU($usu_id,$emp_id,$usu_act){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql = "INSERT INTO empxusu (emp_id,usu_id,usu_act) VALUES (:emp_id,:usu_id,:usu_act);";
		$result = $conexion->prepare($sql);
		$result->bindParam(":usu_id",$usu_id);
		$result->bindParam(":emp_id",$emp_id);
		$result->bindParam(":usu_act",$usu_act);
		$result->execute();
	}
}
?>