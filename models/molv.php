<?php
class Molv{
    private $usu_ema;
    private $usu_fecholv;
    private $googleid;

    function getUsu_id(){
        return $this->usu_id;
    } 
    function getUsu_ema(){
        return $this->usu_ema;
    }
    function getUsu_colv(){
        return $this->usu_colv;
    } 
    function getUsu_fecholv(){
        return $this->usu_fecholv;
    }  
    function getGoogleid(){
        return $this->googleid;
    }     

    function setUsu_id($usu_id){
        $this->usu_id = $usu_id;
    }
    function setUsu_ema($usu_ema){
        $this->usu_ema = $usu_ema;
    }
    function setUsu_colv($usu_colv){
        $this->usu_colv = $usu_colv;
    }
    function setUsu_fecholv($usu_fecholv){
                $this->usu_fecholvb = $usu_fecholv;
    }
    function setgGoogleid($googleid){
        $this->googleid = $googleid;
    }


    function getDat(){
        $sql = "SELECT usu_id,  usu_nom, usu_ape FROM usuario WHERE usu_ema=:usu_ema";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $usu_ema = $this->getUsu_ema();
        $result->bindParam('usu_ema',$usu_ema);
        $result->execute();
        $res = NULL;
        while($f = $result->fetch())
            $res[]=$f;
        return $res;
    }
    function updDat(){
        $sql = "UPDATE `usuario` SET usu_colv=:usu_colv, usu_fecholv=:usu_fecholv, googleid=:googleid WHERE usu_id=:usu_id";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $usu_id = $this->getUsu_id();
        $result->bindParam('usu_id',$usu_id);
        $usu_colv = $this->getUsu_colv();
        $result->bindParam('usu_colv',$usu_colv);
        $usu_fecholv = $this->getUsu_fecholv(); 
        $result->bindParam('usu_fecholv',$usu_fecholv); 
        $googleid = $this->getGoogleid();
        $result->bindParam('googleid',$googleid);
        $result->execute();
    }
}

?>