<?php
 require_once 'models/mcom.php';
 $mcom = new Mcom();

$com_id= isset($_REQUEST['com_id'])? $_REQUEST['com_id'] : NULL;
LimpiarEntradas();
$com_nom = isset($_POST['com_nom'])? $_POST['com_nom'] : NULL;
$com_ndoc = isset($_POST['com_ndoc'])? $_POST['com_ndoc'] : NULL;
$com_tel = isset($_POST['com_tel'])? $_POST['com_tel'] : NULL;
$com_ubi = isset($_POST['usu_ubi'])? $_POST['usu_ubi'] : NULL;
$com_dir = isset($_POST['com_dir'])? $_POST['com_dir'] : NULL;
$com_ema = isset($_POST['com_ema'])? $_POST['com_ema'] : NULL;
$com_act = isset($_POST['com_act'])? $_POST['com_act'] : 2;
$com_tipo = isset($_POST['com_tipo'])? $_POST['com_tipo'] : NULL;

$ope = isset($_POST['ope']) ? $_POST['ope']:NULL;

$mcom->setcom_id($com_id);
$mcom->setemp_id($_SESSION['emp_id']);


if($ope=="save"){
    $mcom->setcom_nom($com_nom);
    $mcom->setcom_ndoc($com_ndoc);
    $mcom->setcom_tel($com_tel);
    $mcom->setcom_ubi($com_ubi);
    $mcom->setcom_dir($com_dir);
    $mcom->setcom_ema($com_ema);
    $mcom->setcom_act(isset($com_act) ? $com_act:$val[0]["com_act"]);
    $mcom->setcom_tipo($com_tipo);

    if(!$com_id){
        $mcom->save();
        $traerulid = $mcom ->getIdins();
        $empusui = $mcom->countemp($com_id,1);
        $mcom->delExU($traerulid['com_id']);
            if($traerulid['com_id'] && $empusui){
                foreach($empusui as $em){
                    $mcom->insExU($traerulid['com_id'],$em['emp_id'],0);
                }
            }
        $GLOBALS['guardar_exito']="flex";
    }else{
        $mcom->edit();
        $empusui = $mcom->countemp($com_id,2);
        $mcom->delExU($com_id);
        if($com_id && $empusui){
            foreach($empusui as $em){
                $mcom->insExU($com_id,$em['emp_id'],$em['com_act']);
            }
        }
        $GLOBALS['guardar_exito']="flex";
        $GLOBALS['opce']="2";
    }
}
// echo "<br>" .$com_act."-".$com_id."-".$ope;

// --------------------------- Activo o desactivo -------------------------
if($ope=="activl"){
    $mcom->setcom_act($com_act);
    $mcom->ediAct();
    $GLOBALS['guardar_exito']="flex";
    $GLOBALS['opce']="2";
}
$val = null;
if($ope=="edi" && $com_id){
    $val = $mcom->getOne();
}
$datAllC = $mcom->getAll(1);
$datAllP = $mcom->getAll(2);
$dtdto = seldep();
$datCiu = getCiu();






  // --------------------------- Operacion enviada por el Post para modal -------------------------
  $pagi = isset($_POST['pagi']) ? $_POST['pagi']:NULL;
  $opera = isset($_REQUEST['opera']) ? $_REQUEST['opera']:NULL;
  // --------------------------- Insertar empxusu-------------------------
      if($opera=="InsExU"){
          $mcom->delExU($com_id);
          if($com_id && $pagi){
              for($i=0;$i<count($pagi);$i++){
                  $mcom->insExU($com_id,$pagi[$i],$com_act[$i]);
              }
              $GLOBALS['guardar_exito']="flex";
          }
          $com_id="";
      }
  // --------------------------- Traer todas las empresas -------------------------
  function modalC($com_id, $com_nom ){
      $mcom = new Mcom();
      $datpag = $mcom->selEmp($com_id);
      $html = '';

      $html .= '<div class="modal" id="myModal'.$com_id.'"  role="dialog">';
          $html .= '<div class="modal-dialog">';
              $html .= '<div class="modal-content">';
                  $html .= '<form name="frm3" action="" method="POST">';
                      $html .= '<div class="modal-header">';
                          $html .= '<h2 class="modal-title">Empresas por Clientes</h2>';
                      $html .= '</div>';
                          $html .= '<div class="modal-body">';
                              $html .= '<h5>Clientes: '.$com_nom.'</h5>';
                              if($datpag){
                                  foreach ($datpag  as $dt) {
                                      $dtpxp = $mcom->selExU($com_id,$dt['emp_id']);
                                      // ----------------------------- id de Empresa ------------------------
                                      $html .= '<div class="dpag" style="padding: 5px 0px 5px 0px;">';
                                          $html .= '<input type="hidden" name="pagi[]" value="'.$dt['emp_id'].'">';
                                              if($dt['emp_img']){
                                                  $imge = $dt['emp_img'];
                                              }else{
                                                  $imge = "img/empresa.jpg";
                                              }
                                              $html .= "<div class='iconper'><img src='".$imge."' style='width:30px; height:30px; border:1px solid #0008;'></div>".$dt['emp_nom'];
                                      $html .= '</div>';
                                      // -----------------------------Activo desactivo por empresa ------------------------
                                          $html .= '<div class="form-group col-md-3" id="go1">';
                                              $html .= '<label for="com_act">Activo</label>';
                                              $html .= '<select class="form-select" name="com_act[]" />';
                                                  $val1="";
                                                  $val2="";
                                                  $val3="";
                                                  if($dtpxp && $dtpxp[0]['com_act'] == 1) {
                                                      $val1="selected";
                                                  }else  if(
                                                    $dtpxp && $dtpxp[0]['com_act'] == 0){
                                                    $val3="selected";
                                                  }else  if(!$dtpxp || $dtpxp && $dtpxp[0]['com_act'] == 2){
                                                      $val2="selected";
                                                  }; 
                                                  $html .= '<option value="1" '.$val1.' >Si</option>';
                                                  $html .= '<option value="2" '.$val2.' >No</option>';
                                                  $html .= '<option value="0" '.$val3.' >N/A</option>';
                                              $html .= '</select>';
                                          $html .= '</div>';
                                  }
                              }
                          $html .= '<input type="hidden" name="opera" value="InsExU">';
                          $html .= '<input type="hidden" name="com_id" value="'.$com_id.'">';
                          $html .= '</div>';
                      $html .= '<div class="modal-footer">';
                          $html .= '<button type="submit" class="btnmogu" value="Guardar"><i class="fa-duotone fa-floppy-disk bomo"></i> Guardar</button>';
                          $html .= '<button type="button" class="btnmoca" data-bs-dismiss="modal"><i class="fa-duotone fa-rectangle-xmark bomo"></i> Cancelar</button>';
                      $html .= '</div>';
                  $html .= '</form>';
              $html .= '</div>';
          $html .= '</div>';
      $html .= '</div>';
      return $html;
  }



function botForm(){
    $GLOBALS['tamprin']="0px";
    $GLOBALS['tamvaria']="350px";
    $GLOBALS['tmargenbot']="300px";
}

    $ver = isset($_GET['ver']) ? $_GET['ver']:NULL;
    echo "<div class='tit'><i id='i'class='$ico'></i><h1>$tit</h1></div>";
if($ope=="save"){
    botForm();
    echo mosCer($tamprin, $tmargenbot, $tamvaria);
}else if($ver=="si"){
    botForm();
    echo mosCer($tamprin, $tmargenbot, $tamvaria);
}else if($com_id && $ope=="edi"){
    botForm();
    echo mosCer($tamprin, $tmargenbot, $tamvaria);
}else{
    $GLOBALS['tamvariable']="350px";
    $GLOBALS['tmargenbottom']="300px";
    echo titulo($tamprinci, $tmargenbottom, $tamvariable);
}
?>