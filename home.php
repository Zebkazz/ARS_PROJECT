<?php require_once('models/conexion.php'); ?>
<?php require_once("models/seguridad.php");?>
<?php  require_once 'controllers/titpag.php';?>
<!DOCTYPE html>
    <html lang="es" data-theme="<?=$tema?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="shortcut icon" href="<?=$ico?>" type="image/x-icon">
        <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/buttons.bootstrap5.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="css/responsive.bootstrap5.min.css">
        <link rel="stylesheet" href="css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/select2.min.css">
        <link rel="stylesheet" href="css/theme.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/fonts.css"> 
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/tabla.css">


        <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="js/select2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="js/responsive.bootstrap5.min.js"></script>
        <script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript" src="js/jszip.min.js"></script>
        <script type="text/javascript" src="js/pdfmake.min.js"></script>
        <script type="text/javascript" src="js/vfs_fonts.js"></script>
        <script type="text/javascript" src="js/buttons.html5.min.js"></script>
        
        
    <title><?=$titlepag?></title>
</head>
<body>
    <section id="body" class="body">
        <?php include ('controllers/optimg.php'); ?>
        <!-- ----------------------- Traer numero de pagina controlador-------------------- -->
        <?php $pg = isset($_GET['pg']) ? $_GET['pg'] : false; ?>
        <?php $ope = isset($_GET['ope']) ? $_GET['ope'] : false; ?>
        <?php require_once("views/header.php"); ?>
        <section class="princi">
            <?php require_once('controllers/cmen.php');?>
        </section>
    </section>
    <?php include "views/vmen.php";?>
    
</body>
<div class="difumfact"></div>
<script type="text/javascript" src="js/menu.js"></script>
</html>