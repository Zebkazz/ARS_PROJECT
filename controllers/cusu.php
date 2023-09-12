    <?php
    // ----------------------------------------------- Recibir datos metodo Post-------------------------
    $pern = isset($_POST['per_id'])? $_POST['per_id'] : NULL;
    $per_id = openCypher ('decrypt', $pern);
    LimpiarCadenaPass($usu_pas = isset($_POST['usu_pas']) ? $_POST['usu_pas']:NULL);
    $usu_id =  isset($_REQUEST['usu_id']) ? $_REQUEST['usu_id']:NULL;
    LimpiarEntradas();
    $usu_nom = isset($_POST['usu_nom']) ? $_POST['usu_nom']:NULL;
    $usu_ape = isset($_POST['usu_ape']) ? $_POST['usu_ape']:NULL;
    $emp_tema = isset($_POST['emp_tema']) ? $_POST['emp_tema']:NULL;
    $usu_act = isset($_POST['usu_act']) ? $_POST['usu_act']:2;
    $usu_ubi = isset($_POST['usu_ubi']) ? $_POST['usu_ubi']:Null;
    $usu_dir = isset($_POST['usu_dir']) ? $_POST['usu_dir']:NULL;
    $usu_ema = isset($_POST['usu_ema']) ? $_POST['usu_ema']:NULL;
    $usu_tdoc = isset($_POST['usu_tdoc']) ? $_POST['usu_tdoc']:NULL;
    $usu_ndoc = isset($_POST['usu_ndoc']) ? $_POST['usu_ndoc']:NULL;
    $usu_tel = isset($_POST['usu_tel']) ? $_POST['usu_tel']:NULL;
    $usu_fot = isset($_POST['usu_fot']) ? $_POST['usu_fot']:NULL;
    // --------------------------- Llamar funcion paera guardar foto -------------------------
    $arc = isset($_FILES['usu_fot']['name']) ? $_FILES['usu_fot']['name']:NULL;
        if($arc){
            $usu_fot = opti($_FILES['usu_fot'], $usu_ndoc, "img", "");
        }
    // --------------------------- Operacion enviada por el Post -------------------------
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
    // --------------------------- Numero de pagina -------------------------
    // echo "<br>" .$usu_ubi."-".$usu_ndoc."-".$usu_nom."-".$usu_ape."-".$per_id."-".$usu_pas."-".$usu_ema."-".$usu_fot."-".$usu_tel."-".$ope."<br>";
    // -----------------------------Consultar documento de usuario------------------------------
    $musu->setusu_ndoc($usu_ndoc);
    $musu->setusu_id($usu_id);
    $musu->setemp_id($_SESSION['emp_id']);

    $datNdoc = $musu->getNdoc(1);
    $datNdocE = $musu->getNdoc(2);

        if($ope=="save"){
            $musu->setusu_ndoc($usu_ndoc);
            $musu->setusu_tdoc($usu_tdoc);
            $musu->setusu_nom($usu_nom);
            $musu->setusu_ape($usu_ape);
            $musu->setper_id(isset($per_id) ? $per_id:$val[0]["per_id"]);
            $musu->setusu_pas($usu_pas);
            $musu->setusu_ema($usu_ema);
            $musu->setusu_act(isset($usu_act) ? $usu_act:$val[0]["usu_act"]);
            $musu->setusu_ubi($usu_ubi);
            $musu->setusu_dir($usu_dir);
            $musu->setusu_fot($usu_fot);
            $musu->setemp_tema($emp_tema);
            $musu->setusu_tel($usu_tel);
    // --------------------------- Guardar datos y empresas por usuario -------------------------
            if(!$usu_id && !isset($datNdoc[0]['usu_ndoc'])){
                $musu->save();
                $traerulid = $musu ->getIdins();
                $empusui = $musu->countemp($usu_id,1);
                $musu->delExU($traerulid['usu_id']);
                    if($traerulid['usu_id'] && $empusui){
                        foreach($empusui as $em){
                            $musu->insExU($traerulid['usu_id'],$em['emp_id'],2);
                        }
                    }
                $GLOBALS['guardar_exito']="flex";
    // --------------------------- Editar datos y empresas por usuario -------------------------
            }else if($usu_id && isset($datNdocE[0]['usu_ndoc'])==$usu_ndoc){
                $musu->edit();
                $empusui = $musu->countemp($usu_id,2);
                $musu->delExU($usu_id);
                    if($usu_id && $empusui){
                        foreach($empusui as $em){
                            $musu->insExU($usu_id,$em['emp_id'],$em['usu_act']);
                        }
                    }
                $GLOBALS['guardar_exito']="flex";
                $GLOBALS['opce']="2";
            
            }else{
                echo "<script>alert('Por favor intente con otro numero de documento o pida su administrador que lo habilite porque ya existe un usuario con esta información')</script>";
            }
        }
    
// --------------------------- Eliminar registro-------------------------
    if($ope=="eli"){
        $musu->delExU($usu_id);
        $musu->del();
    }
    
// --------------------------- Activo o desactivo -------------------------
    if($usu_act && $usu_id && $ope=="activl"){
        $musu->setusu_act($usu_act);
        $musu->ediAct();
        $GLOBALS['guardar_exito']="flex";
        $GLOBALS['opce']="2";
    }
// --------------------------- Traer todos los datos-------------------------
    $datAll = $musu->getAll();
// ---------------Traer perfil tipo de documento y color de tema-------------------------
    $datPer = $musu->getPerfil();
    $musu->setdom_id(1);
    $datTdo = $musu->getTdoc();
    $musu->setdom_id(2);
    $datColor = $musu->getTdoc();
// --------------------------- Traer datosde departamento y ciudad va con(selmun.php) -------------------------
    $dtdto = seldep();
    $datCiu = getCiu();
// --------------------------- Editar un registro-------------------------
    $val = NULL;
        if($ope=="edi" and $usu_id){
            $val = $musu->getOne();
        }    
    // --------------------------- Operacion enviada por el Post para modal -------------------------
    $pagi = isset($_POST['pagi']) ? $_POST['pagi']:NULL;
    $opera = isset($_REQUEST['opera']) ? $_REQUEST['opera']:NULL;
    // --------------------------- Insertar empxusu-------------------------
        if($opera=="InsExU"){
            $musu->delExU($usu_id);
            if($usu_id && $pagi){
                for($i=0;$i<count($pagi);$i++){
                    $musu->insExU($usu_id,$pagi[$i],$usu_act[$i]);
                }
                $GLOBALS['guardar_exito']="flex";
            }
            $usu_id="";
        }
    // --------------------------- Traer todas las empresas -------------------------
    function modal($usu_id, $usu_nom ){
        $musu = new Musu();
        $datpag = $musu->selEmp($usu_id);
        $html = '';

        $html .= '<div class="modal" id="myModal'.$usu_id.'"  role="dialog">';
            $html .= '<div class="modal-dialog">';
                $html .= '<div class="modal-content">';
                    $html .= '<form name="frm3" action="home.php?pg=1609" method="POST">';
                        $html .= '<div class="modal-header">';
                            $html .= '<h2 class="modal-title">Empresas por usuarios</h2>';
                        $html .= '</div>';
                            $html .= '<div class="modal-body">';
                                $html .= '<h5>Usuario: '.$usu_nom.'</h5>';
                                if($datpag){
                                    foreach ($datpag  as $dt) {
                                        $dtpxp = $musu->selExU($usu_id,$dt['emp_id']);
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
                                            if($dt['emp_id']==$_SESSION['emp_id'] && $_SESSION['usu_id']==$usu_id){
                                                $dis="disabled";
                                            }else{
                                                $dis="";
                                            }
                                            $html .= '<div class="form-group col-md-2" id="go1">';
                                                $html .= '<label for="usu_act">Activo</label>';
                                                $html .= '<select class="form-select" name="usu_act[]" '.$dis.' />';
                                                    $val1="";
                                                    $val2="";
                                                    if($dtpxp && $dtpxp[0]['usu_act'] == 1) {
                                                        $val1="selected";
                                                    }else  if(!$dtpxp || $dtpxp && $dtpxp[0]['usu_act'] == 2){
                                                        $val2="selected";
                                                    }; 
                                                    $html .= '<option value="1" '.$val1.' >Si</option>';
                                                    $html .= '<option value="2" '.$val2.' >No</option>';
                                                $html .= '</select>';
                                            $html .= '</div>';
                                    }
                                }
                            $html .= '<input type="hidden" name="opera" value="InsExU">';
                            $html .= '<input type="hidden" name="usu_id" value="'.$usu_id.'">';
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
        $GLOBALS['tamvaria']="480px";
        $GLOBALS['tmargenbot']="380px";
    }
        $ver = isset($_GET['ver']) ? $_GET['ver']:NULL;
        $vdpepg = isset($_GET['pg']) ? $_GET['pg']:NULL;
        echo "<div class='tit'><i id='i'class='$ico'></i><h1>$tit</h1></div>";
            if($ope=="save" && $vdpepg!=1615 ){
                botForm();
                echo mosCer($tamprin, $tmargenbot, $tamvaria);
            }else if($ver=="si"){
                botForm();
                echo mosCer($tamprin, $tmargenbot, $tamvaria);
            }else if($ver=="sis" || $ver=="sis#"){
                echo "<a href='home.php?pg=1609' class='visemp'><i class='fa-duotone fa-circle-xmark never_butt'></i></a>";
            }else if($usu_id && $ope=="edi"){
                botForm();
                echo mosCer($tamprin, $tmargenbot, $tamvaria);
            }else if($vdpepg==1615 || $_SESSION["per_id"]==3){

            }else{
                $GLOBALS['tamvariable']="480px";
                $GLOBALS['tmargenbottom']="380px";
                echo titulo($tamprinci, $tmargenbottom, $tamvariable);
            }
    ?>