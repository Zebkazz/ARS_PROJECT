<?php
    class Mval{

        private $val_id;
        private $val_nom;
        private $dom_id;
        private $val_par;
        private $val_act;

        function getVal_id(){
            return $this->val_id;
        }
        function getVal_nom(){
            return $this->val_nom;
        }
        function getDom_id(){
            return $this->dom_id;
        }
        function getVal_par(){
            return $this->val_par;
        }
        function getVal_act(){
            return $this->val_act;
        }

        function setVal_id($val_id){
            $this->val_id = $val_id;
        }
        function setVal_nom($val_nom){
            $this->val_nom = $val_nom;
        }
        function setDom_id($dom_id){
            $this->dom_id = $dom_id;
        }
        function setVal_par($val_par){
            $this->val_par = $val_par;
        }
        function setVal_act($val_act){
            $this->val_act = $val_act;
        }

        public function getAll(){
            $resultado = null;
            $modelo =new conexion();
            $conexion = $modelo->get_conexion();
            $sql =" SELECT v.val_id, v.val_nom, v.dom_id, d.dom_nom, v.val_par, v.val_act FROM valor AS v INNER JOIN dominio AS d ON v.dom_id=d.dom_id";
            $result = $conexion->prepare($sql);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function getOne(){
            $resultado = null;
            $modelo =new conexion();
            $conexion = $modelo->get_conexion();
            $sql =" SELECT v.val_id, v.val_nom, v.dom_id, d.dom_nom, v.val_par, v.val_act FROM valor AS v INNER JOIN dominio AS d ON v.dom_id=d.dom_id WHERE val_id=:val_id";
            $result = $conexion->prepare($sql);
            $val_id = $this->getVal_id();
            $result->bindParam(":val_id",$val_id);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function save(){
            $modelo =new conexion();
            $conexion = $modelo->get_conexion();
            $sql ="INSERT INTO valor(val_id, val_nom, dom_id, val_par, val_act) VALUES (:val_id, :val_nom, :dom_id, :val_par, :val_act)";
            $result = $conexion->prepare($sql);

            $val_id = $this->getVal_id();
            $result->bindParam(":val_id",$val_id);
            $val_nom = $this->getVal_nom();
            $result->bindParam(":val_nom",$val_nom);
            $dom_id = $this->getDom_id();
            $result->bindParam(":dom_id",$dom_id);
            $val_par = $this->getVal_par();
            $result->bindParam(":val_par",$val_par);
            $val_act = $this->getVal_act();
            $result->bindParam(":val_act",$val_act);
            $result->execute(); 
        }

        public function edit(){
            $modelo =new conexion();
            $conexion = $modelo->get_conexion();
            $sql ="UPDATE valor SET val_id=:val_id,val_nom=:val_nom,dom_id=:dom_id,val_par=:val_par,val_act=:val_act WHERE val_id=:val_id";
            $result = $conexion->prepare($sql);

            $val_id = $this->getVal_id();
            $result->bindParam(":val_id",$val_id);
            $val_nom = $this->getVal_nom();
            $result->bindParam(":val_nom",$val_nom);
            $dom_id = $this->getDom_id();
            $result->bindParam(":dom_id",$dom_id);
            $val_par = $this->getVal_par();
            $result->bindParam(":val_par",$val_par);
            $val_act = $this->getVal_act();
            $result->bindParam(":val_act",$val_act);

            $result->execute();
        }
        public function del(){
            $modelo =new conexion();
            $conexion = $modelo->get_conexion();
            $sql ="DELETE FROM valor WHERE val_id=:val_id";
            $result = $conexion->prepare($sql);
            $val_id = $this->getVal_id();
            $result->bindParam(":val_id",$val_id);
            $result->execute();
        }

        public function getDom(){
            $resultado = null;
            $modelo =new conexion();
            $conexion = $modelo->get_conexion();
            $sql =" SELECT dom_id, dom_nom FROM dominio";
            $result = $conexion->prepare($sql);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        function ediAct(){
            $sql = "UPDATE valor SET val_act=:val_act WHERE val_id=:val_id;";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $val_id = $this->getVal_id();
            $result->bindParam(':val_id',$val_id);
            $val_act=$this->getVal_act();
            $result->bindParam(':val_act',$val_act);
            $result->execute();
            $res = NULL;
            while($f=$result->fetch())
                $res[]=$f;
            return $res;
        }
    }
?>