<?php 
require_once 'controllers/cusu.php'; 
?>      
        <table style="width:100%;">
                <tbody>
                <tr>
                <td> 
                <div class="unopersonal">
                        <div class="info_empresa" id="infoper"><br>
                                <?php if ($datOneUsu[0]['usu_fot']) { ?>
                                        <img src="<?=$datOneUsu[0]['usu_fot']; ?> "class="logo_emp">
                                <?php } else { ?>
                                        <img src="./img/perfil.jpg" class="logo_emp" alt="">
                                <?php } ?>
                        </div>
                        <div class="info_emp" id="infoper">
                        <h1>Datos de Usuario</h1>
                                <h2><?php echo $datOneEmp[0]['emp_nom']; ?></h2>
                                <small>
                                <strong>Nombre: <?=$datOneUsu[0]['usu_nom']; ?></strong> <br>
                                <strong>Apellidos: <?=$datOneUsu[0]['usu_ape']; ?></strong> <br>
                                <strong>Perfil: <?=$datOneUsu[0]['per_nom']; ?></strong> <br>
                                <strong>Número de documento: <?=$datOneUsu[0]['usu_ndoc']; ?></strong> <br>
                                <strong>E-mail: <?= $datOneUsu[0]['usu_ema']; ?></strong> <br>
                                <strong>Ubicación: <?= $datOneUsu[0]['nomubi']; ?>, <?= $datOneUsu[0]['usu_dir']; ?></strong> <br>
                                <?php if ($datOneUsu[0]['usu_tel']) { ?>
                                        <strong>Teléfono: <?= $datOneUsu[0]['usu_tel']; ?></strong><br>
                                <?php } ?>
                                </small>
                        </div>
                </div>
                </td> 
        </tr>
        </tbody>  
        </table>
         <div class="inser">
                <form class="m.tb-40" action="#" method="POST" enctype="multipart/form-data">
                        <div class="row r1">
                                <input type="hidden" class="form-control form-control-sm" id="usu_id" name="usu_id" value="<?= isset($datOneUsu) ? $datOneUsu[0]['usu_id'] : ''; ?>" />
                                <input type="hidden" class="form-control form-control-sm" id="per_id" name="per_id" value="<?php echo openCypher ('encrypt', isset($datOneUsu) ? $datOneUsu[0]['per_id'] : ''); ?>" />
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_nom">Nombre</label>
                                        <?php $col = isset($_GET['col']) ? $_GET['col']:NULL; if($col=="col"){ indicar(); }?>
                                        <input type="text" class="form-control form-control-sm colrs" id="usu_nom" name="usu_nom" value="<?= isset($datOneUsu) ? $datOneUsu[0]['usu_nom'] : ''; ?>" required />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_ape">Apellido</label>
                                        <input type="text" class="form-control form-control-sm" id="usu_ape" name="usu_ape" value="<?= isset($datOneUsu) ? $datOneUsu[0]['usu_ape'] : ''; ?>" required />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_ndoc">Numero de documento</label>
                                        <input type="number" class="form-control form-control-sm" id="usu_ndoc" name="usu_ndoc" value="<?= isset($datOneUsu) ? $datOneUsu[0]['usu_ndoc'] : ''; ?>" required />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_tdoc">Tipo de Documento</label>
                                        <select class="form-select" style="height: 34px;" id="usu_tdoc" name="usu_tdoc">
                                                <?php if ($datTdo) {
                                                        foreach ($datTdo as $dtp) {
                                                ?>
                                                        <option value="<?= $dtp['val_id']; ?>" <?php if ($datOneUsu && $datOneUsu[0]['usu_tdoc'] == $dtp['val_id']) echo ' selected '; ?>>
                                                                <?= $dtp['val_nom']; ?>
                                                        </option>
                                                <?php }
                                                } ?>
                                        </select>
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="emp_tema">Color de Interfaz</label>
                                        <select class="form-select" style="height: 34px;" id="emp_tema" name="emp_tema">
                                                <?php if ($datColor) {
                                                        foreach ($datColor as $dtp) {
                                                ?>
                                                        <option value="<?= $dtp['val_nom']; ?>" <?php if ($datOneUsu && $datOneUsu[0]['emp_tema'] == $dtp['val_nom']) echo ' selected '; ?>>
                                                                <?= $dtp['val_nom']; ?>
                                                        </option>
                                                <?php }
                                                } ?>
                                        </select>
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_ema">Correo electronico</label>
                                        <input type="email" class="form-control form-control-sm" id="usu_ema" name="usu_ema" value="<?= isset($datOneUsu) ? $datOneUsu[0]['usu_ema'] : ''; ?>" required />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                    <label for="usu_dir">Dirección</label>
                                    <input type="text" class="form-control form-control-sm" id="usu_dir" name="usu_dir" value="<?=isset($datOneUsu) ? $datOneUsu[0]['usu_dir'] : ''; ?>" required />
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
                                        <label for="usu_pas">Contraseña</label><br>
                                        <!-- <small><span>No puede poner eso</span></small> -->
                                        <input type="password" class="form-control form-control-sm" id="usu_pas" name="usu_pas" />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_fot">Foto</label>
                                        <input type="file" class="form-control form-control-sm" id="usu_fot" name="usu_fot" value="<?= isset($datOneUsu) ? $datOneUsu[0]['usu_fot'] : ''; ?>" />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_tel">Celular</label>
                                        <input type="number" class="form-control form-control-sm" id="usu_tel" name="usu_tel" value="<?= isset($datOneUsu) ? $datOneUsu[0]['usu_tel'] : ''; ?>" />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <span style="margin:15px; color: var(--color_tit);"><small>*Doble click en el boton "Actualizar" para guardar cambios*</small></span>
                                        <button type="submit" class="btn btn-primary" value="<?php if ($datOneUsu[0]['usu_id']){$colr ="#85C1E9"; $no = "<i class='fa-duotone fa-pen-to-square bra'></i>Actualizar";
                                                }else{ $colr ="#45B39D"; $no = "<i class='fa-duotone fa-circle-plus bra'></i>Agregar"; }?>" ><?php echo $no ?>
                                        </button>
                                        <input type="hidden" class="btn btn-primary" value="save" name="ope" />
                                        <style>:root{--col_hover:<?=$colr?>;}.btn:hover{background-color: var(--col_hover);color: #fff;}.btn:hover .bra{color: #fff;}</style>

                                </div>
                        </div>
                </form>
        </div>
        <style>
                .princi{
                        overflow:hidden;
                }
        </style>

        <br><br><br>
