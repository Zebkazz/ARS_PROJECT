<?php
    $men = new traerMenu();
    $men->setper_id($_SESSION['per_id']);
    $result = $men->menu();

    function validar($pag_id){
        $men = new traerMenu();     
        $men->setpag_id($pag_id);
        $men->setpag_mos(2);
        $men->setper_id($_SESSION['per_id']);
        $result = $men->getVal();
        return $result;
    }
    $mpagi = new mpag();
    $dat = $mpagi->getAll();

    $dire = validar($pg);
    $min=$pg;
    if ($dire) {
        $ico = $dire[0]['pag_ico'];
        $tit = $dire[0]['pag_nom'];
        require_once($dire[0]['pag_rut']);
    }else{
        echo "<script>window.location='home.php?pg=999';</script>";
    }
    //------------------------------Funcion mostar plantilla Registro Guardado
    guardaexit($guardar_exito,$opce);
   
?>