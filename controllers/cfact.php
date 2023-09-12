<?php
 require_once 'models/mfact.php';
 $mfact = new Mfact();
 $mfact->setemp_id($_SESSION['emp_id']);
 $val=null;
 $val = $mfact->getOne();
$datAllC = $mfact->getAll(1);
$datAllP = $mfact->getAll(2);

?>