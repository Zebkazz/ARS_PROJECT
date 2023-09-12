<?php 
class Mdom{
    private $dom_id;
    private $dom_nom;
    //metods get
    function getdom_id(){
        return $this->dom_id;
    }
    function getdom_nom(){
        return $this->dom_nom;
    }
    //metods set
    function setdom_id($dom_id){
        $this->dom_id = $dom_id;
    }
    function setdom_nom($dom_nom){
        $this->dom_nom = $dom_nom;
    }
    function getAll(){
        $sql = "SELECT dom_id, dom_nom FROM dominio";
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
        $sql = "SELECT dom_id, dom_nom FROM dominio WHERE dom_id=:dom_id";
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
    function save(){
        $sql= "INSERT INTO dominio(dom_nom) VALUES (:dom_nom)";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $dom_nom=$this->getdom_nom();
		$result->bindParam(':dom_nom',$dom_nom);
        $result->execute();
    }

    function edit(){
        $sql= "UPDATE dominio SET dom_nom=:dom_nom WHERE dom_id=:dom_id";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $dom_id = $this->getdom_id();
        $result->bindParam(':dom_id',$dom_id);
        $dom_nom=$this->getdom_nom();
        $result->bindParam(':dom_nom',$dom_nom);
        $result->execute();
    }
    function del(){
        $sql= "DELETE FROM dominio WHERE dom_id=:dom_id";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $dom_id = $this->getdom_id();
        $result->bindParam(':dom_id',$dom_id);
        $result->execute();
        $res=NULL;
        while($f=$result->fetch())
			$res[]=$f;
		return $res;
    }
    
}
?>