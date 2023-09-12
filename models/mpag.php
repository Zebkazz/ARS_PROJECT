<?php
class mpag{
    private $pag_id;
    private $pag_nom;
    private $pag_rut;
    private $pag_mos;
    private $pag_ico;
    private $pag_ord;
    private $datMenu;

    function getpag_id(){
		return $this->pag_id;
	}
    function getpag_nom(){
		return $this->pag_nom;
	}
    function getpag_rut(){
		return $this->pag_rut;
	}
    function getpag_mos(){
		return $this->pag_mos;
	}
    function getpag_ico(){
		return $this->pag_ico;
	}
    function getpag_ord(){
		return $this->pag_ord;
	}
    function getdatMenu(){
		return $this->datMenu;
	}

    function setpag_id($pag_id){
		$this->pag_id = $pag_id;
	}
    function setpag_nom($pag_nom){
		$this->pag_nom = $pag_nom;
	}
    function setpag_rut($pag_rut){
		$this->pag_rut = $pag_rut;
	}
    function setpag_mos($pag_mos){
		$this->pag_mos = $pag_mos;
	}
    function setpag_ico($pag_ico){
		$this->pag_ico = $pag_ico;
	}
    function setpag_ord($pag_ord){
		$this->pag_ord = $pag_ord;
	}
    function setdatMenu($datMenu){
		$this->datMenu = $datMenu;
	}
    function getAll(){  
        $sql="SELECT pag_id, pag_nom, pag_rut, pag_mos, pag_ord, pag_ico, datMenu FROM pagina";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();  
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch()){
            $res[]=$f;
        }
            return $res;
    }
    function getOne(){  
        $sql="SELECT pag_id, pag_nom, pag_rut, pag_mos, pag_ord, pag_ico, datMenu FROM pagina WHERE pag_id=:pag_id";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();  
        $result = $conexion->prepare($sql);
        $pag_id = $this->getpag_id();
        $result->bindParam(":pag_id", $pag_id);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch()){
            $res[]=$f;
        }
            return $res;
    }
    function save(){  
        $sql  = "INSERT INTO pagina(pag_nom, pag_rut, pag_mos, pag_ord, pag_ico, datMenu) VALUES (:pag_nom, :pag_rut, :pag_mos, :pag_ord, :pag_ico, :datMenu)";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();  
        $result = $conexion->prepare($sql);
        $pag_nom = $this->getpag_nom();
        $result->bindParam(":pag_nom",$pag_nom);
        $pag_rut = $this->getpag_rut();
        $result->bindParam(":pag_rut",$pag_rut);
        $pag_mos = $this->getpag_mos();
        $result->bindParam(":pag_mos",$pag_mos);
        $pag_ord = $this->getpag_ord();
        $result->bindParam(":pag_ord",$pag_ord);
        $pag_ico = $this->getpag_ico();
        $result->bindParam(":pag_ico",$pag_ico);
        $datMenu = $this->getdatMenu();
        $result->bindParam(":datMenu",$datMenu);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
          $res[]=$f;
        return $res;
    }   
    function edit(){
        $sql="UPDATE pagina SET pag_nom=:pag_nom,pag_rut=:pag_rut,pag_mos=:pag_mos,pag_ord=:pag_ord,pag_ico=:pag_ico,datMenu=:datMenu WHERE pag_id=:pag_id";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $result = $conexion->prepare($sql);
        $pag_id = $this->getpag_id();
        $result->bindParam(":pag_id", $pag_id);
        $pag_nom = $this->getpag_nom();
        $result->bindParam(":pag_nom",$pag_nom);
        $pag_rut = $this->getpag_rut();
        $result->bindParam(":pag_rut",$pag_rut);
        $pag_mos = $this->getpag_mos();
        $result->bindParam(":pag_mos",$pag_mos);
        $pag_ord = $this->getpag_ord();
        $result->bindParam(":pag_ord",$pag_ord);
        $pag_ico = $this->getpag_ico();
        $result->bindParam(":pag_ico",$pag_ico);
        $datMenu = $this->getdatMenu();
        $result->bindParam(":datMenu",$datMenu);
        $result->execute();
        $res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
    }
  function ediAct(){
    $sql = "UPDATE pagina SET pag_mos=:pag_mos WHERE pag_id=:pag_id;";
    $modelo = new conexion();
    $conexion = $modelo->get_conexion();
    $result = $conexion->prepare($sql);
    $pag_id = $this->getpag_id();
    $result->bindParam(':pag_id',$pag_id);
    $pag_mos=$this->getpag_mos();
    $result->bindParam(':pag_mos',$pag_mos);
    $result->execute();
    $res = NULL;
    while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
  public function delePxP($pag_id){
    $modelo = new conexion();
    $conexion = $modelo->get_conexion();
    $sql = "DELETE FROM `pagper` WHERE pag_id=:pag_id";
    $result = $conexion->prepare($sql);
    $result->bindParam(":pag_id",$pag_id);
    $result->execute();
  }
    function del(){  
        $sql="DELETE FROM pagina WHERE pag_id=:pag_id";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();  
        $result = $conexion->prepare($sql);
        $pag_id = $this->getpag_id();
		  $result->bindParam(':pag_id',$pag_id);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
			$res[]=$f;
		return $res;
    }   
  
}
?>