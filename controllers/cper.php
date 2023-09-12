<?php 
    require_once 'models/mper.php';
    $mper = new mper();

    $per_id= isset($_REQUEST['per_id']) ? $_REQUEST['per_id']:NULL;
    LimpiarEntradas();
    $per_nom = isset($_POST['per_nom']) ? $_POST['per_nom']:NULL;
    $pagi = isset($_POST['pagi']) ? $_POST['pagi']:NULL;
    $opera = isset($_REQUEST['opera']) ? $_REQUEST['opera']:NULL;


    if($opera=="Insertar"){
        if($per_nom){
            $mper->ins($per_nom);
            $GLOBALS['guardar_exito']="flex";
        }
    }
//Insertar PXP
    if($opera=="InsPxP"){
        if($per_id && $pagi){
            $mper->delPXP($per_id);
            for($i=0;$i<count($pagi);$i++){
                $mper->insPxP($per_id,$pagi[$i]);
            }
        }
        $per_id="";
    }
//Actualizar
    if($opera=="Actualizar"){
        if($per_id && $per_nom){
            $mper->upd($per_id,$per_nom);
            $GLOBALS['guardar_exito']="flex";
            $GLOBALS['opce']="2";
        }
        $per_id="";
    }
//Eliminar
    if($opera=="Eliminar"){
        if($per_id){
            $mper->del($per_id);
        }
        $per_id="";
    }
//Eliminar PXP
    if($opera=="EliPxP"){
        if($per_id){
            $mper->delPXP($per_id);
        }
    }
//mostrar todos los datos
    $dat = $mper->selAll();
    $datpag = $mper->selPag();
    //$datpxp = $mper->selPxP($per_id);
    $datOne = NUll;
    if($per_id){
        $datOne = $mper->selOne($per_id);
    }

function modal($per_id, $per_nom, $pg){
    $mper = new mper();
    $datpag = $mper->selPag();
    $html = '';

    $html .= '<div class="modal" id="myModal'.$per_id.'" tabindex="-1" role="dialog">';
        $html .= '<div class="modal-dialog">';
            $html .= '<div class="modal-content">';
                $html .= '<form name="frm3" action="home.php?pg='.$pg.'" method="POST">';
                    $html .= '<div class="modal-header">';
                        $html .= '<h2 class="modal-title">Vistas por perfil</h2>';
                        $html .= '<button type="button" class="never" data-bs-dismiss="modal" aria-label="Close"><i class="fa-duotone fa-circle-xmark never_butt"></i></button>';
                    $html .= '</div>';
                    
                        $html .= '<div class="modal-body">';
                            $html .= '<h5>Perfil: '.$per_nom.'</h5>';
                            if($datpag){
                                foreach ($datpag  as $dt) {
                                    $dtpxp = $mper->selPxP($per_id,$dt['pag_id']);
                                    $html .= '<div class="dpag">';
                                        $html .= '<input type="checkbox" class="form-check-input" name="pagi[]" value="'.$dt['pag_id'].'"';
                                        if($dtpxp) $html .= " checked ";
                                        $html .= '>';
                                            $html .= "&nbsp;&nbsp;&nbsp;<div class='iconper'><i class='".$dt['pag_ico']." per'></i></div>".$dt['pag_nom'];
                                    $html .= '</div>';
                                }
                            }
                        $html .= '<input type="hidden" name="opera" value="InsPxP">';
                        $html .= '<input type="hidden" name="per_id" value="'.$per_id.'">';
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
    $GLOBALS['tamvaria']="180px";
    $GLOBALS['tmargenbot']="13px";
}
$ver = isset($_GET['ver']) ? $_GET['ver']:NULL;
echo "<div class='tit'><i id='i'class='$ico'></i><h1>$tit</h1></div>";
if($per_id){
    botForm();
    echo mosCer($tamprin, $tmargenbot, $tamvaria);
}else if($ver=="si"){
    botForm();
    echo mosCer($tamprin, $tmargenbot, $tamvaria);
}else{
    $GLOBALS['tamvariable']="180px";
    $GLOBALS['tmargenbottom']="13px";
    echo titulo($tamprinci, $tmargenbottom, $tamvariable);
}
?>