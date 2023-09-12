<header id="esquina">
    <div class="header_container">
        <div class="header_titulo">
            <a id="boton_menu2"><i class="fa-duotone fa-bars t"></i></a>
            <div class="header_text" title="<?php echo $datOneEmp[0]['emp_nom']; ?>">
                    <?php if ($datOneEmp[0]['emp_img']) { ?>
                        <a href="home.php?pg=1617"><img src="<?=$datOneEmp[0]['emp_img']; ?>" alt="Logo"></a>
                    <?php } else { ?>
                        <a href="home.php?pg=1617"><img src="./img/empresa.jpg" alt=""></a>
                    <?php } ?>
                <h1><?php echo $datOneEmp[0]['emp_nom']; ?></h1>
            </div>
            <div class="header_datos" id="header_datos">
                <div class="menu_img">
                    <div class="img_circle">
                        <div class="img_circle2">
                        <?php
                        foreach($datOneUsu as $datU){
                            if($datU['usu_fot']){
                            ?>
                                <a href="home.php?pg=1615"><img src="<?=$datU['usu_fot']?>" alt=""></a>
                            <?php }else{ ?>
                                <a href="home.php?pg=1615"><img src="./img/perfil.jpg" alt=""></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="header_usu">
                    <h1><?= $datU['usu_nom']." ".$datU['usu_ape'] ?></h1>
                    <h4><?php echo $datOneEmp[0]['emp_nom'];}?></h4>
                        <!-- <h6 class="est"><i class="fa-duotone fa-circle"></i> <?=$conx?></h6> -->
                </div>
                
            </div>
        </div>
        <div class="header_icon">
            <a href="./views/vsal.php" title="Salir"><i class="fa-duotone fa-power-off r off"></i></a>
        </div>
        <a href="./views/vsal.php" class="header_salir" title="Salir"><i class="fa-duotone fa-power-off t off"></i></a>
    </div>
</header>