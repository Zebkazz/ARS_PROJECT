<?php
include ('models/mpag.php');
include ('models/mmen.php');
include ('models/musu.php');
include ('models/memp.php');
    $musu= new musu();
    $memp= new Memp();
    $mpagi= new mpag();
    // ------------------------------Captura el valor de la variable get-----------------------
    $pag = isset($_GET['pg']) ? $_GET['pg'] : 999;
    // ----------------------------------Variable de tamaño inicializadora de formularios----------------------------
     $GLOBALS['tamprinci']="0px";
    // ----------------------------------Variable Indicador de registro guardado----------------------------
     $GLOBALS['guardar_exito']="none";
     $GLOBALS['opce']="1";
    // ----------------------------------Selector de tema mediante la eleccion de la empresa----------------------------
    $musu->setusu_id($_SESSION['usu_id']);
    $musu->setemp_id($_SESSION['emp_id']);
    $memp->setusu_id($_SESSION['usu_id']);
    $memp->setemp_id($_SESSION['emp_id']);
        $datOneUsu = $musu->getOne();
        $datOneEmp = $memp->getOneExU();

    $color = $musu->getTema();
    if($tema = $color[0]['emp_tema']==""){
        $tema="Por defecto";
    }else{
        $tema = $color[0]['emp_tema'];
    }
    
     // ---------------------------Validacion de datos empresa para pestaña----------------------
     function valida($pag_id){
        $men = new traerMenu();     
        $men->setpag_id($pag_id);
        $men->setper_id($_SESSION['per_id']);
        $result = $men->getVal($_SESSION['usu_id']);
        return $result;
    }
    $dir = valida($pag);
    
    if($datOneUsu[0]['usu_act']==2){
        echo "<script>alert('Su usuario fue desactivado por su empresa, por favor contacte con ellos para su reactivacion.')</script>";
        echo "<script>window.location='views/vsal.php';</script>";
    }
    if($datOneEmp[0]['emp_act']==2){
        echo "<script>alert('La empresa fue desactivada por su administardor, por favor contacte con el para su reactivacion.')</script>";
        echo "<script>window.location='views/vsal.php';</script>";
    }
    if($datOneEmp==NULL){
        echo "<script>window.location='views/vsal.php';</script>";
    }else if($datOneEmp==false || $dir==false){
        echo "<script>window.location='nofound.php';</script>";
    }else{
        $nomEmp = $datOneEmp[0]['emp_nom'];
        $ico = $datOneEmp[0]['emp_img'];
        $titlep = $dir[0]['pag_nom'];
        if($pag==999){
            $titlepag = $nomEmp;
        }else{
            $titlepag = $titlep;
        }
    }    
    // ----------------------------------Indicador campo parpadeante----------------------------
    function indicar(){
        ?>
        <style>
            .colrs{animation-duration: 1.1s;animation-iteration-count: 2; 
                background-color: #000;
            animation-name: one;color: #000;}@keyframes one{0%{background-color: #ffffff;}
            50%{background-color: #919191;}100%{background-color: #ffffff;}}
        </style>
    <?php
    }
    function indicarPer(){
        ?>
        <style>
            .per{animation-duration: 1.1s;animation-iteration-count: 2;
            animation-name: one;}@keyframes one{0%{color: #919191;}
            50%{color: var(--color_iconOs)}100%{color: #919191;}}
        </style>
    <?php
    }
    // ----------------------------------Plantilla Guardar y actualiar registro----------------------------
    function guardaexit($guardar_exito,$opec){
        if($opec==2){ 
            $col_fon="#85C1E9";
            $col_ico="#2a799f";
            $icon_form="fa-duotone fa-file-check fa-bounce saveico";
        }else if($opec==1){
            $col_fon="#7ce77c";
            $col_ico="#3f933f";
            $icon_form="fa-duotone fa-floppy-disk-pen fa-bounce saveico";
        }else{
            $col_fon="#7ce77c";
            $col_ico="#3f933f";
            $icon_form="fa-duotone fa-floppy-disk-pen fa-bounce saveico";
        }
    ?>
        <style>
        #guardado_dat{
            display: <?=$guardar_exito?>;
            position: fixed;
            z-index: 500;
            bottom: 0px;
            left: 50px;
            margin: 30px;
            width: 300px;
            height: 50px;
            box-shadow: 4px 4px 10px black;
            background-color: <?= $col_fon?>;
            border-radius: 10px 10px 10px 30px;
            padding: 10px;
            animation-fill-mode:forwards;
            transform: translate(0px, 15px);
            animation-duration: 5s;
            animation-name: ocultarexito;
        }
        @keyframes ocultarexito{
            0%{
                opacity: 0%;
            }
            30%{
                opacity: 100%;
                transform: translate(0px, 15px);
            }65%{
                transform: translate(0px, 15px);
            }
            100%{
                transform: translate(0px, 150px);
            }
        }
        .plantilla_dat{
            padding-left: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        h6 {
            margin-bottom: 0px;
        }
        .saveico{
            color: <?= $col_ico?>;
            font-size: 2rem;
            padding-right: 10px;
        }
        </style>
        <div id="guardado_dat">
            <div class="plantilla_dat">      
                <i class="<?=$icon_form?>"></i>
                <?php if($opec==2){ ?>
                    <h6>Datos actualizados con exito</h6>
                    <?php }else{?>
                    <h6>Registro guardado con exito</h6>
                <?php }?>
            </div>
        </div>
    <?php
}
    // ---------------------------------- Encriptador----------------------------
    function openCypher ($action, $string){
        $myKey = 'oW%c76+jb2';
        $myIV = 'A)2!u467a^';
        $encrypt_method = 'AES-256-CBC';
        $secret_key = hash('sha512',$myKey);
        $secret_iv = substr(hash('sha512',$myIV),0,16);
            if ( $action && ($action == 'encrypt' || $action == 'decrypt') && $string ){
                if ( $action == 'encrypt' ){
                    $output = openssl_encrypt($string, $encrypt_method, $secret_key, 0, $secret_iv);
                    // $output = urlencode($output);
                };
                if ( $action == 'decrypt' ){
                    $output = openssl_decrypt($string, $encrypt_method, $secret_key, 0, $secret_iv);
                };
                if ( $action == 'decryptURL' ){
                    $stri= urldecode($string);
                    $output = openssl_decrypt($stri, $encrypt_method, $secret_key, 0, $secret_iv);
                };
        }else{
            $output=null;
        };
        return $output;
    };

/*--------------------------------- Limpieza de una cadena de texto ----------------------------------------*/
            function LimpiarCadena($cadena){ 
                $patron = array('/<script><\/script>/', '/\//', '/\$/', '/\\\\/');
                $cadena = preg_replace($patron, '', $cadena);
                //$cadena = htmlspecialchars($cadena);
                return $cadena;
            }

	/** Limpieza de parámetros de entrada */     
	function LimpiarEntradas(){
		if (isset($_POST)) {
			foreach ($_POST as $key => $value) {
				$_POST[$key] = LimpiarCadena($value);
			}
		}
	}
            function LimpiarCadenaPass($cadena){ 
                $patron = array('/<script><\/script>/');
                $cadena = preg_replace($patron, '', $cadena);
                $cadena = htmlspecialchars($cadena);
                return $cadena;
            }
//------------------------------ llamar ubicacion ------------------------------
include "./models/mglobal.php";
// ----------------------------- Validador de datos----------------------------------------

    function ValidaEntradas(){
        if (isset($_POST)) {
            foreach ($_POST as $key => $value) {
                $_POST[$key] = valdatos($value);
            }
        }
    }
    // Arrays para guardar mensajes y errores:
    function valdatos($value){
     $aErrores = array();
     $aMensajes = array();
     $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
        // Comprobar si se ha enviado el formulario:
    if( !empty($_POST) ){
         if( isset($_POST['txtNombre']) && isset($_POST['txtApellidos']) ){
             if( empty($_POST['txtNombre']) )
                $aErrores[] = "Debe especificar el nombre";
            else{
                if( preg_match($patron_texto, $_POST['txtNombre']) )
                    $aMensajes[] = "Nombre: [".$_POST['txtNombre']."]";
                else
                    $aErrores[] = "El nombre sólo puede contener letras y espacios";
            }
            if( empty($_POST['txtApellidos']) )
                $aErrores[] = "Debe especificar los apellidos";
            else{
                if( preg_match($patron_texto, $_POST['txtApellidos']) )
                    $aMensajes[] = "Apellidos: [".$_POST['txtApellidos']."]";
                else
                    $aErrores[] = "Los apellidos sólo pueden contener letras y espacios";
            }
        }else{
            echo "<p>Por favor diligencia los campos requeridos.</p>";
        }
        // Si han habido errores se muestran, sino se mostrán los mensajes
         if( count($aErrores) > 0 )
        {
            echo "<p>ERRORES ENCONTRADOS:</p>";
            // Mostrar los errores:
            for( $contador=0; $contador < count($aErrores); $contador++ )
                echo $aErrores[$contador]."<br/>";
        }
        else
        {
            // Mostrar los mensajes:
            for( $contador=0; $contador < count($aMensajes); $contador++ )
                echo $aMensajes[$contador]."<br/>";
        }
    }
    else
    {
        echo "<p>No se ha enviado el formulario.</p>";
    }
    echo "<p><a href='03_form3.html'>Haz clic aquí para volver al formulario</a></p>";
}
?>
    
    