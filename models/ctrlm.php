<?php
	require_once('conexion.php');
	$usu = isset($_POST['usu']) ? $_POST['usu']:NULL;
	$pas = isset($_POST['pas']) ? $_POST['pas']:NULL;
	$valep = isset($_POST['valemas']) ? $_POST['valemas']:NULL;
	$emp = isset($_POST['emp_id']) ? $_POST['emp_id']:NULL;
	$ope = isset($_POST['ope']) ? $_POST['ope']:NULL;
	$valcon="";
	$valemai="";

	if($ope=="preg_ema"){
		$correo = valemp($valep);
		$actUsu = valActUsu($valep);
		$actEmp = valActEmp($valep);
			if($correo){
				$pasi = sha1(md5('GruDFG¿.,lZebkazz//{'.$pas));
					if($pasi==$correo['usu_pas']){
						$valemai = $correo['usu_ndoc'];
						$valcon= $correo['usu_pas'];
					}else{
						echo "<script>window.location='index.php?error=3'</script>";
					}
			}else{
				echo "<script>window.location='index.php?error=2'</script>";
			}
		if(!$actUsu){
			echo "<script>window.location='index.php?error=4'</script>";
		}
		if(!$actEmp){
			echo "<script>window.location='index.php?error=5'</script>";
		}

	}
	if($usu AND $pas AND $emp){
		validar($usu, $pas, $emp);
	}
	function validar($usu, $pas, $emp){
		$res = ingr($usu, $pas, $emp);
		$res = isset($res) ? $res:NULL;
		if($res){
				session_start();
				$_SESSION['usu_id'] = $res[0]["usu_id"];
				$_SESSION['usu_nom'] = $res[0]["usu_nom"];
				$_SESSION['usu_ape'] = $res[0]["usu_ape"];
				$_SESSION['per_id'] = $res[0]["per_id"];
				$_SESSION['usu_act'] = $res[0]["usu_act"];
				$_SESSION['per_nom'] = $res[0]["per_nom"];
				$_SESSION['usu_fot'] = $res[0]["usu_fot"];
				$_SESSION['emp_id'] = $res[0]["emp_id"];
				$_SESSION['aut'] = 'Gru"@~"¿.,ÑZebkazz//{';
				echo "<script>window.location='home.php?pg=999'</script>";
			}else{
				echo "<script>window.location='index.php?error=6'</script>";
			}
	}
	// -----------------------------Verificar datos ingresados usuario, contraseña y empresa segundo login--------------------------
	function ingr($usu, $pas, $emp){
		$sql = "SELECT u.usu_id, u.usu_nom, u.usu_ape, u.per_id, p.per_nom, u.usu_fot, e.emp_id, eu.usu_act FROM usuario AS u 
				INNER JOIN perfil AS p ON u.per_id=p.per_id 
				INNER JOIN empxusu AS eu ON eu.usu_id=u.usu_id 
				INNER JOIN empresa AS e ON eu.emp_id=e.emp_id 
				WHERE eu.usu_act=1 AND e.emp_id=:emp AND u.usu_pas=:pas AND u.usu_ndoc=:usu;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->bindParam(':usu',$usu);
		$result->bindParam(':pas',$pas);
		$result->bindParam(':emp',$emp);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	// -----------------------------Traer empresas al login--------------------------
	function traeremp($usu){
		$sql = "SELECT e.emp_id, e.emp_nom FROM empresa as e 
				INNER JOIN empxusu AS eu ON eu.emp_id=e.emp_id
				INNER JOIN usuario AS u ON eu.usu_id=u.usu_id
				WHERE e.emp_act=1 AND eu.usu_act=1 AND u.usu_ndoc=:usu;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->bindParam(':usu',$usu);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	// -----------------------------Verificar datos ingresados usuario y contraseña primer login--------------------------
	function valemp($usu){
		$sql = "SELECT u.usu_ndoc, u.usu_pas FROM usuario as u 
				INNER JOIN empxusu AS eu ON eu.usu_id=u.usu_id 
				INNER JOIN empresa AS e ON e.emp_id=eu.emp_id
				WHERE u.usu_ndoc=:usu";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->bindParam(':usu',$usu);
		$result->execute();
		$res= $result->fetch();
		return $res;
	}
	function valActUsu($usu){
		$sql = "SELECT eu.usu_act FROM usuario as u 
				INNER JOIN empxusu AS eu ON eu.usu_id=u.usu_id 
				INNER JOIN empresa AS e ON e.emp_id=eu.emp_id 
				WHERE eu.usu_act=1 AND u.usu_ndoc=:usu";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->bindParam(':usu',$usu);
		$result->execute();
		$res= $result->fetch();
		return $res;
	}
	function valActEmp($usu){
		$sql = "SELECT e.emp_act FROM empresa as e 
				INNER JOIN empxusu AS eu ON eu.emp_id=e.emp_id 
				INNER JOIN usuario AS u ON eu.usu_id=u.usu_id 
				WHERE e.emp_act=1 AND u.usu_ndoc=:usu";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->bindParam(':usu',$usu);
		$result->execute();
		$res= $result->fetch();
		return $res;
	}
	
?>
 