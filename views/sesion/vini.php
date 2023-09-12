<?php
    include "./models/ctrlm.php";
function erroraute(){
	$error = isset($_GET['error']) ? $_GET['error']:NULL;
	if($error=="1"){
            $txt = '<div id="alert_error" class="alert-warning" role="alert">';
            $txt .= 'Los campos de usuario y contraseña no pueden ir vacios, por favor ingrese su usuario para acceder';
            $txt .= '</div>';
            $txt .='<script>document.getElementById("alert_error").style.top="110px"; document.getElementById("alert_error").style.height="135px"; document.getElementById("alert_error").style.transition="All 1000ms";  </script>';
		echo $txt;
	}else if($error=="2"){
            $txt = '<div id="alert_error" class="alert-warning" role="alert">';
            $txt .= 'Este numero de documento no se encuentra registrado por favor verifique los datos o contactese con su administrador';
            $txt .= '</div>';
            $txt .='<script>document.getElementById("alert_error").style.top="110px"; document.getElementById("alert_error").style.height="135px"; document.getElementById("alert_error").style.transition="All 1000ms";  </script>';
        echo $txt;
    }else if($error=="3"){
            $txt = '<div id="alert_error2" class="alert-warning2" role="alert">';
            $txt .= 'La contraseña es incorrecta, por favor vuelva a escribirla, e intente nuevamente';
            $txt .= '</div>';
            $txt .='<script>document.getElementById("alert_error2").style.top="110px"; document.getElementById("alert_error2").style.height="135px"; document.getElementById("alert_error2").style.transition="All 1000ms";  </script>';
        echo $txt;
	}else if($error=="4"){
            $txt = '<div id="alert_error3"class="alert-warning3" role="alert">';
            $txt .= 'Este usuario se encuentra desactivo por favor comuniquese con su administrador';
            $txt .= '</div>';
            $txt .='<script>document.getElementById("alert_error3").style.top="110px"; document.getElementById("alert_error3").style.height="135px"; document.getElementById("alert_error3").style.transition="All 2000ms";  </script>';
        echo $txt;
    }else if($error=="5"){
            $txt = '<div id="alert_error3"class="alert-warning3" role="alert">';
            $txt .= 'La empresa a la que se encuentra asociado este usuario esta deshabilitada por favor comuniquese con su administrador';
            $txt .= '</div>';
            $txt .='<script>document.getElementById("alert_error3").style.top="110px"; document.getElementById("alert_error3").style.height="135px"; document.getElementById("alert_error3").style.transition="All 2000ms";  </script>';
        echo $txt;
    }else if($error=="6"){
            $txt = '<div id="alert_error3"class="alert-warning3" role="alert">';
            $txt .= 'No se ha podido validar sus credenciales por favor intentelo nuevamente mas tarde';
            $txt .= '</div>';
            $txt .='<script>document.getElementById("alert_error3").style.top="110px"; document.getElementById("alert_error3").style.height="135px"; document.getElementById("alert_error3").style.transition="All 2000ms";  </script>';
        echo $txt;
    }
}  
?>
<a href="inicio" name="inicio"></a>
    <div id="ini" class="ini">
    <?php erroraute(); ?>
        <div class="ini__menu">
        <h1 class="ini__tit"><i class="fa-duotone fa-user"></i> Inicio de sesion</h1>
        <form  class="ini__form" method="post" action="index.php" tabindex="500" name="consulema">
                <div class="ini__user">
                    <label for="user">N° documento</label>
                    <input  class="form-control" type="text" id="valemas" name="valemas" value="<?= isset($valemai) ? $valemai: ''; ?>" required />
                </div>
                <div class="ini__user">
                    <label for="pass">Contraseña</label>
                    <input class="form-control" type="password" name="pas" value="<?= isset($valcon) ? $valcon: ''; ?>" required />
                </div>
                <input type="hidden" name="ope" value="preg_ema">
            </form>
            <form  class="ini__form" method="post" action="#" tabindex="500" name="signinform">
                <?php if($valemai && $valcon){ ?>
                    <input type="hidden" class="form-control" name="usu" value="<?= isset($valemai) ? $valemai: ''; ?>">
                    <input type="hidden" class="form-control" name="pas" value="<?= isset($valcon) ? $valcon: ''; ?>">
                        <div class="ini__user" id="mostsivl">
                            <label id="info_emp" >
                                <div>
                                    <a href="javascript:document.getElementById('infoin').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1"><i class="fa-duotone fa-circle-question vi"></i>&nbsp;</a>
                                    <a href="javascript:document.getElementById('infoin').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i>&nbsp;</a>
                                    <p id="infoin" class="infoin">Selecione la empresa en a la que pertenece ya que no sera habilitado para el ingreso en una empresa a la cual no pertenezca.</p>
                                </div>
                            Empresa</label>
                                    <select class="form-control" style="height:34px;" id="emp_id" name="emp_id">
                                        <?php 
                                        $val=NULL;
                                        $datEmp = traeremp($valemai);
                                        
                                        if ($datEmp) {
                                                foreach ($datEmp as $dte) {
                                        ?>
                                                <option value="<?= $dte['emp_id']; ?>" <?php if ($val && $val[0]['emp_id'] == $dte['emp_id']) echo ' selected '; ?>>
                                                        <?= $dte['emp_nom']; ?>
                                                </option>
                                        <?php  }
                                        } ?>
                                </select>
                        </div>
                        <?php  } ?>
                        <div class="ini__boton"><br>
                            <a class="olv" id="olv__con">¿Olvido su contrasena?</a>
                            <div>
                                <?php if(!$valemai && !$valcon){ ?>
                                <button class="botones" id="val_ema" value="login" >Iniciar</button>
                                <?php }else if($valemai && $valcon){ ?>
                                    <button type="submit" id="mosempin" class="botones" value="login" >Iniciar</button>
                                <?php  } ?>
                                <script>
                                    var valin= document.getElementById('val_ema');
                                    if(valin){
                                        document.addEventListener('keydown', (event) => {
                                            if (event.which === 13) {
                                                enviar_formulario();
                                        }
                                        }, false);
                                        document.getElementById('val_ema').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            enviar_formulario();
                                        })
                                        function enviar_formulario() {
                                            miCampoTexto = document.getElementById("valemas").value;
                                            if (miCampoTexto.length == 0) {
                                            alert("Diliegencie los campos de Usuario y contraseña para poder ingresar estos no pueden ir vacios, vuelva a intentarlo")
                                            }else{
                                                document.consulema.submit();
                                            }
                                        }
                                    }
                                    var valin2= document.getElementById('mosempin');
                                    if(valin2){
                                        document.addEventListener('keydown', (event) => {
                                            if (event.which === 13) {
                                                enviar_formulario2();
                                        }
                                        }, false);
                                        function enviar_formulario2() {
                                                document.signinform.submit();
                                        }
                                    }
                                </script> 
                            </div>
                </form>
                </div>
            </div>
    </div>
