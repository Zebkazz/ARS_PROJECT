<?php
require_once ("../models/conexion.php");
include ("../models/molv.php");
include ("../sendemail.php");
include ("../models/configuracion.php");
date_default_timezone_set('America/Bogota');

$molv = new Molv();

$usu_ema = isset($_POST['usu_ema']) ? $_POST['usu_ema']:NULL;
$usu_fecholv = date('Y-m-d H:i:s');
$pass = genPass(15);

$molv->setUsu_ema($usu_ema);
$dat = $molv->getDat();

if(isset($dat)){
    // formas para llamar datos
    // echo $dat[0]['usu_id'];
    // $dat[0][0];
    $molv->setUsu_id($dat[0]['usu_id']);
    $molv->setUsu_fecholv($usu_fecholv);
    $molv->setUsu_colv($pass);
    $molv->updDat();

    $mail_ema = $email;
    $mail_upa = $psem;
    // $mail_addAddress = $usu_ema;
    $template = "../tempmail.html";
    $mail_sfe = $usu_ema;
    $mail_name = $dat[0]['usu_nom']." ".$dat[0]['usu_ape'];
    $txt_mess = "Si solictaste un restablecimiento de contraseña, ".$dat[0]['usu_nom']."
                    has clic en el botón que aparece a continuación. Si no solicitaste 
                    ignora este correo electrónico";
    $txt_link = $rut."rec.php?usu_id".$dat[0]['usu_id']."&clv".$pass;
    $mail_asun = "Solicitud para restablecer contraseña";

    sendemail($mail_ema, $mail_upa, $mail_sfe, $mail_name, $txt_link, $txt_mess, $mail_asun, $template);

}

function genPass($lenght){
    $key = "";
    $pattern= "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $max = strlen($pattern)-1;
    for($i = 0; $i < $lenght; $i++){
        $key .= substr($pattern, mt_rand(0,$max), 1);
    }
    $key = sha1(md5($key));
    return $key;
}
?>