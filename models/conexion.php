<?php
    class conexion{
        public function get_conexion(){
            include ("configuracion.php");
            $conexion=new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            
            return $conexion;
        }
    }
?>