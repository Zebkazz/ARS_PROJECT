<?php 
require_once 'controllers/cemp.php';
if($ver=="si" || $_SESSION['per_id'] == 2){?>
        <table style="width:100%;">
            <tbody>
                <tr>
                    <td> 
                        <div class="unopersonal">
                            <div class="info_empresa"><br>
                                    <?php if ($datOnes[0]['emp_img']) { ?>
                                            <img src="<?=$datOnes[0]['emp_img']; ?> "class="logo_emp">
                                    <?php } else { ?>
                                            <img src="./img/empresa.jpg" class="logo_emp" alt="">
                                    <?php } ?>
                            </div>
                            <div class="info_emp" id="infoper">
                                <h1>Datos de Empresa</h1>
                                    <h2><?= $datOnes[0]['emp_nom'] ?></h2>
                                        <small>
                                            <strong>Numero de Nit: <?=$datOnes[0]['emp_nit']; ?></strong> <br>
                                            <strong>Razon Social: <?=$datOnes[0]['emp_razon']; ?></strong> <br>
                                            <strong>Dirreccion: <?=$datOnes[0]['emp_dir']; ?></strong> <br>
                                            <strong>E-mail: <?= $datOnes[0]['emp_email']; ?></strong> <br>
                                            <strong>Responsable: <?= $datOnes[0]['emp_resp']; ?></strong> <br>
                                            <?php if ($datOnes[0]['emp_tel']) { ?>
                                                    <strong>Teléfono: <?= $datOnes[0]['emp_tel']; ?></strong><br>
                                            <?php } ?>
                                            <p>Descripcion: <?= $datOnes[0]['emp_desc']; ?></p> <br>
                                        </small>
                            </div>
                        </div>
                    </td> 
                </tr>
            </tbody>
        </table>
<div class="inser">
        <form class="m.tb-40" action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="emp_act" name="emp_act" value="<?= isset($datOnes) ? $datOnes[0]['emp_act'] : ''; ?>" />
            <div class="row r1">
                <input type="hidden" class="form-control form-control-sm" id="emp_id" name="emp_id" value="<?php echo openCypher ('encrypt', isset($datOnes) ? $datOnes[0]['emp_id'] : ''); ?>" />
                <div class="form-group col-md-6" id="go1">
                        <label for="ema_nom">Nombre de Empresa</label>
                        <input type="text" class="form-control form-control-sm" id="emp_nom" name="emp_nom" value="<?= isset($datOnes) ? $datOnes[0]['emp_nom'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_nit">Numero de Nit</label>
                        <input type="number" class="form-control form-control-sm" id="emp_nit" name="emp_nit" value="<?= isset($datOnes) ? $datOnes[0]['emp_nit'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_des">Descripcion</label>
                        <textarea class="form-control form-control-sm" style="border-color: #888888; border-radius: 10px;" name="emp_desc" id="emp_desc" cols="8" rows="2"><?php echo isset($datOnes) ? $datOnes[0]['emp_desc'] : ''; ?></textarea>
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_resp">Nombre responsable</label>
                        <input type="text" class="form-control form-control-sm" id="emp_resp" name="emp_resp" value="<?= isset($datOnes) ? $datOnes[0]['emp_resp'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_razon">Razon social</label>
                            <select class="form-select" style="height: 34px;" id="emp_razon" name="emp_razon">
                                    <?php if ($datRazon) {
                                            foreach ($datRazon as $dtp) {
                                    ?>
                                            <option value="<?= $dtp['val_nom']; ?>" <?php if ($datOnes && $datOnes[0]['emp_razon'] == $dtp['val_id']) echo ' selected '; ?>>
                                                    <?= $dtp['val_nom']; ?>
                                            </option>
                                    <?php }
                                    } ?>
                        </select>
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_dir">Direccion</label>
                        <input type="text" class="form-control form-control-sm" id="emp_dir" name="emp_dir" value="<?= isset($datOnes) ? $datOnes[0]['emp_dir'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_tel">Telefono</label>
                        <input type="number" class="form-control form-control-sm" id="emp_tel" name="emp_tel" value="<?= isset($datOnes) ? $datOnes[0]['emp_tel'] : ''; ?>" />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_email">Correo electronico</label>
                        <input type="email" class="form-control form-control-sm" id="emp_email" name="emp_email" value="<?= isset($datOnes) ? $datOnes[0]['emp_email'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="depto">Departamento</label>
                        <select name="depa" id="depto"  class="form-select" onChange="javascript:recCiudad(this.value);">>
                                <option value="0">Elija...</option>
                        <?php if ($dtdto){
                                foreach ($dtdto AS $d){
                                ?>
                                <option value="<?=$d['codubi']?>" <?php if($datCiu && $datCiu[0]["codubi"]==$d['codubi']) echo('selected');?>><?=$d['nomubi']?></option>
                        <?php }}?>
                        </select>
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="exampleInputEmail1">Municipio</label>
                        <div id="reloadMun"> 
                        <select name="emp_ubi" id="emp_ubi"  class="form-select">
                        <option value="0">Elija...</option>
                        <?php
                        if($dtcc){?>
                                <option value="<?=$dtcc[0]['codubi'];?>" selected ><?=$dtcc[0]['nomubi'];?></option>;
                                <?php }?>
                        </select>
                        </div>
                </div>  
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_img">Logotipo</label>
                        <input type="file" class="form-control form-control-sm" id="emp_img" name="emp_img" value="img/<?= isset($datOnes) ? $datOnes[0]['emp_img'] : ''; ?>" />
                                </div>
                <div class="form-group col-md-6" id="go1">
                        <br>
                        <button type="submit" class="btn btn-primary" value="<?php if ($datOnes[0]['emp_id']){$colr ="#85C1E9"; $no = "<i class='fa-duotone fa-pen-to-square bra'></i>Actualizar";
                                }else{ $colr ="#45B39D"; $no = "<i class='fa-duotone fa-circle-plus bra'></i>Agregar"; }?>" ><?php echo $no ?>
                        </button>
                        <a href="home.php?pg=<?=$pg?>&ver=mo" class="cancel"><i class="fa-duotone fa-circle-xmark vis"></i></a>
                        <input type="hidden" class="btn btn-primary" value="save" name="ope" />
                        <style>:root{--col_hover:<?=$colr?>;}.btn:hover{background-color: var(--col_hover);color: #fff;}.btn:hover .bra{color: #fff;}</style>
                </div>
            </div>
        </form>
</div>
<?php } else if($_SESSION['per_id'] == 1 ){?>
<a href="javascript:document.getElementById('infovis').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1" class="inforv"><i class="fa-duotone fa-circle-info vis "></i></a>
<a href="javascript:document.getElementById('infovis').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2" class="inforv" Title="Informacion"><i class="fa-duotone fa-circle-minus vis" style="color:#f00;"></i></a>
<p id="infovis" class="infovis">Aqui puedes adminstrar las empresas, crearlas, desactivarlas y borrarlas solo si la empresa no tiene ningun registro guardado. <a href="videos.php?pg=<?= $pg ?>&nom=<?= $tit ?>" class="btnvideo" title="Video de Ayuda"><i class="fa-duotone fa-video vis"></i></a></p>
<div id="conta" class="conta">
    <div class="inser">
        <form class="m.tb-40" action="#" method="POST" enctype="multipart/form-data">
            <div class="row r1">
                <input type="hidden" class="form-control form-control-sm" id="emp_id" name="emp_id" value="<?php echo openCypher ('encrypt', isset($val) ? $val[0]['emp_id'] : ''); ?>" />
                <div class="form-group col-md-6" id="go1">
                        <label for="ema_nom">Nombre de Empresa</label>
                        <input type="text" class="form-control form-control-sm" id="emp_nom" name="emp_nom" value="<?= isset($val) ? $val[0]['emp_nom'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_nit">Numero de Nit</label>
                        <input type="number" class="form-control form-control-sm" id="emp_nit" name="emp_nit" value="<?= isset($val) ? $val[0]['emp_nit'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_des">Descripcion</label>
                        <textarea class="form-control form-control-sm" style="border-color: #888888; border-radius: 10px;" name="emp_desc" id="emp_desc" cols="8" rows="2"><?php echo isset($val) ? $val[0]['emp_desc'] : ''; ?></textarea>
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_resp">Nombre responsable</label>
                        <input type="text" class="form-control form-control-sm" id="emp_resp" name="emp_resp" value="<?= isset($val) ? $val[0]['emp_resp'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_razon">Razon social</label>
                            <select class="form-select" style="height: 34px;" id="emp_razon" name="emp_razon">
                                    <?php if ($datRazon) {
                                            foreach ($datRazon as $dtp) {
                                    ?>
                                            <option value="<?= $dtp['val_nom']; ?>" <?php if ($val && $val[0]['emp_razon'] == $dtp['val_id']) echo ' selected '; ?>>
                                                    <?= $dtp['val_nom']; ?>
                                            </option>
                                    <?php }
                                    } ?>
                        </select>
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_dir">Direccion</label>
                        <input type="text" class="form-control form-control-sm" id="emp_dir" name="emp_dir" value="<?= isset($val) ? $val[0]['emp_dir'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_tel">Telefono</label>
                        <input type="number" class="form-control form-control-sm" id="emp_tel" name="emp_tel" value="<?= isset($val) ? $val[0]['emp_tel'] : ''; ?>" />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_email">Correo electronico</label>
                        <input type="email" class="form-control form-control-sm" id="emp_email" name="emp_email" value="<?= isset($val) ? $val[0]['emp_email'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="depto">Departamento</label>
                        <select name="depa" id="depto"  class="form-select" onChange="javascript:recCiudad(this.value);">>
                                <option value="0">Elija...</option>
                        <?php if ($dtdto){
                                foreach ($dtdto AS $d){
                                ?>
                                <option value="<?=$d['codubi']?>" <?php if($datCiu && $datCiu[0]["codubi"]==$d['codubi']) echo('selected');?>><?=$d['nomubi']?></option>
                        <?php }}?>
                        </select>
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="exampleInputEmail1">Municipio</label>
                        <div id="reloadMun"> 
                        <select name="usu_ubi" id="usu_ubi"  class="form-select">
                        <option value="0">Elija...</option>
                        <?php
                        if($dtcc){?>
                                <option value="<?=$dtcc[0]['codubi'];?>" selected ><?=$dtcc[0]['nomubi'];?></option>;
                                <?php }?>
                        </select>
                        </div>
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_act">Activo</label>
                        <select class="form-select" id="emp_act" name="emp_act" >
                            <option value="1" <?php if ($val && $val[0]['emp_act'] == 1) echo "selected"; ?>" >Si</option>
                            <option value="2" <?php if ($val && $val[0]['emp_act'] == 2) echo "selected"; ?>" >No</option>
                        </select>
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_img">Logotipo</label>
                        <input type="file" class="form-control form-control-sm" id="emp_img" name="emp_img" value="img/<?= isset($val) ? $val[0]['emp_img'] : ''; ?>" />
                                </div>
                <div class="form-group col-md-6" id="go1">
                        <br>
                        <button type="submit" class="btn btn-primary" value="<?php if ($val[0]['emp_id']){$colr ="#85C1E9"; $no = "<i class='fa-duotone fa-pen-to-square bra'></i>Actualizar";
                                }else{ $colr ="#45B39D"; $no = "<i class='fa-duotone fa-circle-plus bra'></i>Agregar"; }?>" ><?php echo $no ?>
                        </button>
                        <a href="home.php?pg=<?=$pg?>&ver=mo" class="cancel"><i class="fa-duotone fa-circle-xmark vis"></i></a>
                        <input type="hidden" class="btn btn-primary" value="save" name="ope" />
                        <style>:root{--col_hover:<?=$colr?>;}.btn:hover{background-color: var(--col_hover);color: #fff;}.btn:hover .bra{color: #fff;}</style>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="example">
        <h6 class="dt-acciones">Acciones:</h6>
        <div class="buscarDatos">
                <i class="fa-duotone fa-magnifying-glass"></i>
        </div>
        <table id="tabladatos" class="table table-striped" style="width:100%;">
            <thead>
                <tr>
                    <th id="primera_esq">Logo</th>
                    <th>Empresa</th>
                    <th>Nit</th>
                    <th>Responsable</th>
                    <th>Descripcion</th>
                    <th>Contacto</th>
                    <th>Correo</th>
                    <th id="segunda_esq">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($datAll) {
                        foreach ($datAll  as $dtA ) {
                ?>
                <tr>
                    <td> 
                        <div class="txtfot1">
                            <?php if ($dtA['emp_img']) { ?>
                                    <img src="<?= $dtA['emp_img']; ?>">
                            <?php } else { ?>
                                    <img src="img/empresa.jpg" alt="">
                            <?php } ?>
                        </div>
                    </td>
                    <td><?= $dtA['emp_nom'] ?></td>
                    <td><?= $dtA['emp_nit'] ?><br>Razon Social: <?=$dtA['emp_razon']; ?></td>
                    <td><?=$dtA['emp_resp']; ?></td>
                    <td><?=$dtA['emp_desc']; ?></td>
                    <td>Ubicacion: <?=$dtA['nomubi']; ?> <br> Direccion: <?=$dtA['emp_dir']; ?> <br> Telefono: <?=$dtA['emp_tel']; ?></td>
                    <td><?=$dtA['emp_email']; ?></td>
                    <td style="text-align:center;">
                        <div class="info_tabla">
                                <form action="" method="POST">
                                    <?php if ($dtA['emp_act'] == 1) { ?>
                                        <button class="editbtnpos" type="submit" title="Activo">
                                            <input type="hidden" name="emp_act" value="2">
                                            <input type="hidden" name="emp_id" value="<?php echo openCypher ('encrypt', $dtA['emp_id']);?>">
                                            <i class="fa-duotone fa-square-check opctabla" id="activ" ></i>
                                        </button>
                                    <?php }else{ ?>
                                        <button class="editbtnpos" type="submit" title="Desactivo" >
                                            <input type="hidden" name="emp_act" value="1">
                                            <input type="hidden" name="emp_id" value="<?php echo openCypher ('encrypt', $dtA['emp_id']);?>">
                                            <i class="fa-duotone fa-square-xmark opctabla" style="color:#f00;"></i>
                                        </button>
                                    <?php } ?>
                                </form>
                                <form action="" method="POST">
                                    <button class="editbtnpos" type="submit" title="Actualizar">
                                            <input type="hidden" name="ope" value="edi">
                                            <input type="hidden" name="emp_id" value="<?php echo openCypher ('encrypt', $dtA['emp_id']);?>">
                                            <i class="fa-duotone fa-pen-to-square opctabla" id="actuli" title="Editar"></i>
                                    </button>
                                </form>
                            </div>
                     </td>
                     </tr>
                        <?php }}?>
                </tbody>
                <tfoot>
                    <tr>
                        <th id="tercera_esq">Logo</th>
                            <th>Empresa</th>
                            <th>Nit</th>
                            <th>Responsable</th>
                            <th>Descripcion</th>
                            <th>Contacto</th>
                            <th>Correo</th>
                        <th id="cuarta_esq">Opciones</th>
                    </tr>
                </tfoot>
        </table>
</div>
<?php }