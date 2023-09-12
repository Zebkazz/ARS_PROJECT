<?php 
include("models/mdom.php");

$mdom = new Mdom();
LimpiarEntradas();
$dom_id =isset($_REQUEST['dom_id']) ? $_REQUEST['dom_id']:NULL;
$dom_nom=isset($_POST['dom_nom']) ? $_POST['dom_nom']:NULL;
$ope =isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

$mdom ->setdom_id($dom_id);

if($ope=="save"){
    $mdom->setdom_nom($dom_nom);
    if(!$dom_id){
        $mdom->save();
        $GLOBALS['guardar_exito']="flex";
    }else{
        $mdom->edit();
        $GLOBALS['guardar_exito']="flex";
        $GLOBALS['opce']="2";
    }
}
if($ope=="elimin"){	
    $mdom->del();
}
$datTdo = $mdom->getAll();
$datOne = NULL;

if($ope=="edit" && $dom_id){
    $datOne = $mdom->getOne();
}

function botForm(){
    $GLOBALS['tamprin']="0px";
    $GLOBALS['tamvaria']="180px";
    $GLOBALS['tmargenbot']="40px";
}
    $ver = isset($_GET['ver']) ? $_GET['ver']:NULL;
    echo "<div class='tit'><i id='i'class='$ico'></i><h1>$tit</h1></div>";
    if($ope=="save"){
        botForm();
        echo mosCer($tamprin, $tmargenbot, $tamvaria);
    }else if($ver=="si"){
        botForm();
        echo mosCer($tamprin, $tmargenbot, $tamvaria);
    }else if($dom_id){
        botForm();
        echo mosCer($tamprin, $tmargenbot, $tamvaria);
    }else{
        $GLOBALS['tamvariable']="180px";
        $GLOBALS['tmargenbottom']="40px";
        echo titulo($tamprinci, $tmargenbottom, $tamvariable);
    }
?>