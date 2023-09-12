<?php 
    class mper{
        public function selAll(){
            $resultado = NULL;
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT p.per_id, p.per_nom, g.pag_nom FROM perfil AS p LEFT JOIN pagina AS g ON p.per_id=g.pag_id ";
            $result = $conexion->prepare($sql);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function selOne($per_id){
            $resultado = NULL;
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT per_id, per_nom  FROM perfil WHERE per_id=:per_id";
            $result = $conexion->prepare($sql);
            $result->bindParam(":per_id",$per_id);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function ins($per_nom){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO perfil(per_nom) VALUES (:per_nom)";
            $result = $conexion->prepare($sql);
            $result->bindParam(":per_nom",$per_nom);
            $result->execute();
        }
        public function upd($per_id,$per_nom){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "UPDATE perfil SET per_nom=:per_nom WHERE per_id=:per_id";
            //echo $sql."<br>";
            //echo "'".$per_id."','".$per_nom."','".$."'";
            $result = $conexion->prepare($sql);
            $result->bindParam(":per_id",$per_id);
            $result->bindParam(":per_nom",$per_nom);
            $result->execute();
        }
        public function del($per_id){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "DELETE FROM perfil WHERE per_id=:per_id";
            $result = $conexion->prepare($sql);
            $result->bindParam(":per_id",$per_id);
            $result->execute();
        }
        public function selPag(){
            $resultado = NULL;
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT pag_id, pag_nom, pag_ico FROM pagina";
            $result = $conexion->prepare($sql);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function selPxP($per_id,$pag_id){
            $resultado = NULL;
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT pag_id FROM pagper WHERE per_id=:per_id AND pag_id=:pag_id";
            $result = $conexion->prepare($sql);
            $result->bindParam(":per_id",$per_id);
            $result->bindParam(":pag_id",$pag_id);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function delPXP($per_id){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "DELETE FROM pagper WHERE per_id=:per_id";
            $result = $conexion->prepare($sql);
            $result->bindParam(":per_id",$per_id);
            $result->execute();
        }
        public function insPxP($per_id,$pag_id){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO pagper (pag_id,per_id) VALUES (:pag_id,:per_id);";
            $result = $conexion->prepare($sql);
            $result->bindParam(":per_id",$per_id);
            $result->bindParam(":pag_id",$pag_id);
            $result->execute();
        }
        
        // public function delePxP($pag_id){
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $sql = "DELETE FROM `pagper` WHERE pag_id=:pag_id";
        //     $result = $conexion->prepare($sql);
        //     $result->bindParam(":pag_id",$pag_id);
        //     $result->execute();
        // }
    }

    


?>