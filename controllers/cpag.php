<?php
    require_once 'models/mpag.php';
    $mpag = new mpag();
    $pag_rut = isset($_POST['pag_rut']) ? $_POST['pag_rut']:NULL;
    LimpiarEntradas();
    $pag_id = isset($_REQUEST['pag_id']) ? $_REQUEST['pag_id']:NULL;
    $pag_nom = isset($_POST['pag_nom']) ? $_POST['pag_nom']:NULL;
    $pag_mos = isset($_REQUEST['pag_mos']) ? $_REQUEST['pag_mos']:NULL;
    $pag_ord = isset($_POST['pag_ord']) ? $_POST['pag_ord']:NULL;
    $pag_ico = isset($_POST['pag_ico']) ? $_POST['pag_ico']:NULL;
    $datMenu = isset($_POST['datMenu']) ? $_POST['datMenu']:NULL;

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
    $mpag->setpag_id($pag_id);
    if($ope=="savep"){
        $mpag->setpag_nom($pag_nom); 
        $mpag->setpag_rut($pag_rut); 
        $mpag->setpag_mos($pag_mos);
        $mpag->setpag_ord($pag_ord); 
        $mpag->setpag_ico($pag_ico); 
        $mpag->setdatMenu($datMenu);
        if(!$pag_id){
            $mpag->save();
                $GLOBALS['guardar_exito']="flex";
        }else{
            $mpag->edit();
            $GLOBALS['guardar_exito']="flex";
            $GLOBALS['opce']="2";
        }
    }
    if($ope=="elip"){
        if($pag_id){
            $mpag->delePxP($pag_id);
            $mpag->del();
        }
    } 
    if($pag_mos && $pag_id){
        $mpag->setpag_mos($pag_mos);
        $mpag->ediAct();
    } 
    $datAll = $mpag->getAll();
    $val = NULL;

    if($ope=="editp" && $pag_id){
        $val = $mpag->getOne();
    }
?>

