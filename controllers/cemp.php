<?php
 require_once 'models/memp.php';
 $memp = new Memp();

$empn = isset($_POST['emp_id'])? $_POST['emp_id'] : NULL;
$emp_id = openCypher ('decrypt', $empn );
LimpiarEntradas();
$emp_nom = isset($_POST['emp_nom'])? $_POST['emp_nom'] : NULL;
$emp_desc = isset($_POST['emp_desc'])? $_POST['emp_desc'] : NULL;
$emp_nit = isset($_POST['emp_nit'])? $_POST['emp_nit'] : NULL;
$emp_resp = isset($_POST['emp_resp'])? $_POST['emp_resp'] : NULL;
$emp_razon = isset($_POST['emp_razon'])? $_POST['emp_razon'] : NULL;
$emp_dir = isset($_POST['emp_dir'])? $_POST['emp_dir'] : NULL;
$emp_ubi = isset($_POST['usu_ubi'])? $_POST['usu_ubi'] : NULL;
$emp_tel = isset($_POST['emp_tel'])? $_POST['emp_tel'] : NULL;
$emp_email = isset($_POST['emp_email'])? $_POST['emp_email'] : NULL;
$emp_img = isset($_POST['emp_img'])? $_POST['emp_img'] : NULL;
$emp_act = isset($_REQUEST['emp_act'])? $_REQUEST['emp_act'] : NULL;

$arc = isset($_FILES['emp_img']['name']) ? $_FILES['emp_img']['name']:NULL;
if($arc){
	$emp_img = opti($_FILES['emp_img'], $emp_id, "img", "");
}
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
$memp->setemp_id($emp_id);

if($ope=="save"){
    $memp->setemp_nom($emp_nom);
    $memp->setemp_desc($emp_desc);
    $memp->setemp_nit($emp_nit);
    $memp->setemp_resp($emp_resp);
    $memp->setemp_razon($emp_razon);
    $memp->setemp_dir($emp_dir);
    $memp->setemp_ubi($emp_ubi);
    $memp->setemp_tel($emp_tel);
    $memp->setemp_email($emp_email);
    $memp->setemp_img($emp_img);
    $memp->setemp_act(isset($emp_act) ? $emp_act:$val[0]["emp_act"]);
    if(!$emp_id){
        $memp->save();
        $GLOBALS['guardar_exito']="flex";
    }else{
        $memp->edit();
        $GLOBALS['guardar_exito']="flex";
        $GLOBALS['opce']="2";
    }
}
$memp->setdom_id(3);
$datRazon = $memp->getRazon();
if($emp_act && $emp_id){
	$memp->setemp_act($emp_act);
	$memp->ediAct();
}
$val = null;
if($ope=="edi" && $emp_id){
    $val = $memp->getOne();
}
$datAll = $memp->getAll();
$datOnes = $memp->getOnes($_SESSION['emp_id']);
$dtdto = seldep();
$datCiu = getCiu();


function botForm(){
    $GLOBALS['tamprin']="0px";
    $GLOBALS['tamvaria']="490px";
    $GLOBALS['tmargenbot']="340px";
}

    $ver = isset($_GET['ver']) ? $_GET['ver']:NULL;
    echo "<div class='tit'><i id='i'class='$ico'></i><h1>$tit</h1></div>";
if($ope=="save" && $_SESSION['per_id']==1){
    botForm();
    echo mosCer($tamprin, $tmargenbot, $tamvaria);
}else if($ver=="mo"){
    botForm();
    echo mosCer($tamprin, $tmargenbot, $tamvaria);
}else if($emp_id && !$emp_act && !$ver){
    botForm();
    echo mosCer($tamprin, $tmargenbot, $tamvaria);
}else if($ver=="si" || $ver=="si#"){
    echo "<a href='home.php?pg=1627' class='visemp'><i class='fa-duotone fa-circle-xmark never_butt'></i></a>";
}else if($_SESSION['per_id'] == 2){
    echo "<a href='home.php?pg=999' class='visemp'><i class='fa-duotone fa-circle-xmark never_butt'></i></a>";
}else{
    $GLOBALS['tamvariable']="490px";
    $GLOBALS['tmargenbottom']="340px";
    echo titulo($tamprinci, $tmargenbottom, $tamvariable);
}
?>