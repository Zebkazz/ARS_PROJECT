<?php
require_once 'models/mval.php';

$mval = new mval();
LimpiarEntradas();
$val_id =isset($_REQUEST['val_id']) ? $_REQUEST['val_id']:NULL;
$val_nom=isset($_POST['val_nom']) ? $_POST['val_nom']:NULL;
$dom_id=isset($_POST['dom_id']) ? $_POST['dom_id']:NULL;
$val_par=isset($_POST['val_par']) ? $_POST['val_par']:NULL;
$val_act=isset($_REQUEST['val_act']) ? $_REQUEST['val_act']:NULL;
$ope =isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
$datOne = NULL;

$mval->setVal_id($val_id);

if($ope=="save"){
    $mval->setVal_nom($val_nom);
    $mval->setDom_id($dom_id);
    $mval->setVal_par($val_par);
    $mval->setVal_act($val_act);
    if(!$val_id){
        $mval->save();
        $GLOBALS['guardar_exito']="flex";
    }else{
        $mval->edit();
        $GLOBALS['guardar_exito']="flex";
        $GLOBALS['opce']="2";
    }
}
if($ope=="eli"){
    $mval->del();
}

if($val_act && $val_id){
	$mval->setVal_act($val_act);
	$mval->ediAct();
}

$datAll = $mval->getAll();
$datDom = $mval->getDom();
$datOne = $mval->getOne();
$val = NULL;

if($ope=="edi"){
    $val = $mval->getOne();
}
function botForm(){
    $GLOBALS['tamprin']="0px";
    $GLOBALS['tamvaria']="250px";
    $GLOBALS['tmargenbot']="135px";
}
    $ver = isset($_GET['ver']) ? $_GET['ver']:NULL;
    echo "<div class='tit'><i id='i'class='$ico'></i><h1>$tit</h1></div>";
    if($ope=="save"){
        botForm();
        echo mosCer($tamprin, $tmargenbot, $tamvaria);
    }else if($ver=="si"){
        botForm();
        echo mosCer($tamprin, $tmargenbot, $tamvaria);
    }else if($val_id && !$val_act){
        botForm();
        echo mosCer($tamprin, $tmargenbot, $tamvaria);
    }else {
        $GLOBALS['tamvariable']="250px";
        $GLOBALS['tmargenbottom']="135px";
        echo titulo($tamprinci, $tmargenbottom, $tamvariable);
    } 

?>