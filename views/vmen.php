<section id="menu" class="menu">
    <div class="menu_cabe">
        <a id="boton_menu"><i class="fa-duotone fa-bars t"></i></a>
        <h1>Menu</h1>
    </div>
    <div class="menu_usu">
        <div class="menu_img">
            <div class="img_circle">
                <div class="img_circle2">
                    <?php
                    foreach($datOneUsu as $datU){
                        if ($datU['usu_fot']) {
                    ?>
                        <a href="home.php?pg=1615" title="Datos personales"><img src="<?=$datU['usu_fot']?>" alt=""></a>
                    <?php } else { ?>
                        <a href="home.php?pg=1615" title="Datos personales"><img src="./img/perfil.jpg" alt=""></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="menu_ajuste">
                <h1><?= $datU['usu_nom']." ".$datU['usu_ape'];?></h1>
                <h4><?= $datU['per_nom'];
                }?></h4>
            <div class=menu_per>
                <div><a href="home.php?pg=1615" title="Datos personales"><i class="fa-duotone fa-user-gear u" id="ususett"></i></a></div>
                <div><a href="home.php?pg=1627&ver=si" title="Configuración"><i class="fa-duotone fa-sliders u" id="setti"></i></a></div>
                <div><a href="./views/vsal.php" title="Cerrar sesión"><i class="fa-duotone fa-power-off u" id="off"></i></a></div>
            </div>
        </div>
    </div>
    <div class="menu_opciones">
        <?php
        if ($result) {
            foreach ($result as $f) {
                if ($f['pag_mos'] == 2) {
                } else {
        ?>
                    <a href="home.php?pg=<?= $f['pag_id']; ?>" class="<?= $f['datMenu'] ?>" title="<?= $f['pag_nom'] ?>">
                        <i class="<?= $f['pag_ico'] ?> m"></i><?= $f['pag_nom'] ?>
                    </a>
        <?php
                }
            }
        }
        ?>
        <a href="./views/vsal.php" title="Salir"><i class="fa-duotone fa-power-off m" id="off"></i>Salir</a>
    </div>
    <div class="menu_footer">
    <h6><?php echo $datOneEmp[0]['emp_nom']; ?></h6>
        <small>
            <?php echo $datOneEmp[0]['emp_desc']; ?>
        </small>
    </div>
    <div class="menu_lateral">
        <div id="boton_menu1"><i class="fa-duotone fa-bars tl"></i></div>
        <?php
        if ($result) {
            foreach ($result as $f) {
                if ($f['pag_mos'] == 2) {
                } else {
        ?>
                    <a href="home.php?pg=<?= $f['pag_id']; ?>">
                        <div title="<?= $f['pag_nom'] ?>" id="<?= $f['datMenu'] ?>">
                            <i class="<?= $f['pag_ico'] ?> l"></i>
                        </div>
                    </a>
        <?php
                }
            }
        }
        ?>
        <a href="./views/vsal.php" class="lt" title="Salir"><i class="fa-duotone fa-power-off off l"></i></a>
    </div>
</section>

<?php
require_once('controllers/cpag.php');
    foreach ($datAll as $dt) {
        $sel = $dt['datMenu'];
        $nu = $dt['pag_id'];
        echo "<script>
                if($nu==$min){
                    $('#$sel').addClass('selectd');
                    $('.$sel').addClass('select');
                }
            </script>";
        }
?>