<?php
include "controllers/cusu.php";
?>
<a href="javascript:document.getElementById('infovis').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1" class="inforv"><i class="fa-duotone fa-circle-info vis "></i></a>
<a href="javascript:document.getElementById('infovis').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2" class="inforv" Title="Informacion"><i class="fa-duotone fa-circle-minus vis" style="color:#f00;"></i></a>
<div id="infovis" class="infovis">Desde aqui puedes administrar los usuarios registrados con opciones como actualizar desactivar ingreso o eliminadolos. <div class="textayuda"><a href="videos.php?pg=<?= $pg ?>&nom=<?= $tit ?>" class="btnvideo" title="Video de Ayuda"><i class="fa-duotone fa-video vis"></i></a>Video de explicación</div></div>
<div id="conta">
        <div class="inser">
                <form class="m.tb-40" action="#" method="POST" enctype="multipart/form-data">
                        <div class="row r1">
                                <input type="hidden" class="form-control form-control-sm" id="usu_id" name="usu_id" value="<?= isset($val) ? $val[0]['usu_id'] : ''; ?>" />
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_nom">Nombre</label>
                                        <?php $col = isset($_GET['col']) ? $_GET['col']:NULL; if($col=="col"){ indicar(); }?>
                                        <input type="text" class="form-control form-control-sm colrs" id="usu_nom" name="usu_nom" value="<?= isset($val) ? $val[0]['usu_nom'] : ''; ?>" required />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_ape">Apellido</label>
                                        <input type="text" class="form-control form-control-sm" id="usu_ape" name="usu_ape" value="<?= isset($val) ? $val[0]['usu_ape'] : ''; ?>" required />
                                </div>
                                <?php if($val){?>
                                        <input type="hidden" class="form-control form-control-sm" id="usu_ndoc" name="usu_ndoc" value="<?= isset($val) ? $val[0]['usu_ndoc'] : ''; ?>" />
                                <?php }else {?>
                                        <div class="form-group col-md-6" id="go1">
                                                <label for="usu_ndoc">Numero de documento</label>
                                                <input type="number" class="form-control form-control-sm" id="usu_ndoc" name="usu_ndoc" value="<?= isset($val) ? $val[0]['usu_ndoc'] : ''; ?>" required />
                                        </div>
                                <?php }?>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_tdoc">Tipo de Documento</label>
                                        <select class="form-select" style="height: 34px;" id="usu_tdoc" name="usu_tdoc">
                                                <?php if ($datTdo) {
                                                        foreach ($datTdo as $dtp) {
                                                ?>
                                                        <option value="<?= $dtp['val_id']; ?>" <?php if ($val && $val[0]['usu_tdoc'] == $dtp['val_id']) echo ' selected '; ?>>
                                                                <?= $dtp['val_nom']; ?>
                                                        </option>
                                                <?php }
                                                } ?>
                                        </select>
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="per_id">Perfil </label>
                                        <select class="form-select" style="height:34px;" id="per_id" name="per_id">
                                                <?php if ($datPer) {
                                                        foreach ($datPer as $dtp) {
                                                                if($_SESSION['per_id']==1){
                                                ?>
                                                        <option value="<?php echo openCypher ('encrypt', $dtp['per_id']);?>" <?php if ($val && $val[0]['per_id'] == $dtp['per_id']) echo 'selected'; ?>>
                                                                <?= $dtp['per_nom']; ?>
                                                        </option>
                                                <?php }else if($dtp['per_id']!=1 && $dtp['per_id']!=2){
                                                        ?>
                                                        <option value="<?php echo openCypher ('encrypt', $dtp['per_id']);?>" <?php if ($val && $val[0]['per_id'] == $dtp['per_id']) echo 'selected'; ?>>
                                                                <?= $dtp['per_nom']; ?>
                                                        </option>
                                                <?php 
                                                }}
                                                } ?>
                                        </select>
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="emp_tema">Color de Interfaz</label>
                                        <select class="form-select" style="height: 34px;" id="emp_tema" name="emp_tema">
                                                <?php if ($datColor) {
                                                        foreach ($datColor as $dtp) {
                                                ?>
                                                        <option value="<?= $dtp['val_nom']; ?>" <?php if ($val && $val[0]['emp_tema'] == $dtp['val_nom']) echo ' selected '; ?>>
                                                                <?= $dtp['val_nom']; ?>
                                                        </option>
                                                <?php }
                                                } ?>
                                        </select>
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_ema">Correo electronico</label>
                                        <input type="email" class="form-control form-control-sm" id="usu_ema" name="usu_ema" value="<?= isset($val) ? $val[0]['usu_ema'] : ''; ?>" required />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                    <label for="usu_dir">Dirección</label>
                                    <input type="text" class="form-control form-control-sm" id="usu_dir" name="usu_dir" value="<?=isset($val) ? $val[0]['usu_dir'] : ''; ?>" required />
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
                                        <input type="file" class="form-control form-control-sm" id="usu_fot" name="usu_fot" value="<?= isset($val) ? $val[0]['usu_fot'] : ''; ?>" />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <label for="usu_tel">Celular</label>
                                        <input type="number" class="form-control form-control-sm" id="usu_tel" name="usu_tel" value="<?= isset($val) ? $val[0]['usu_tel'] : ''; ?>" />
                                </div>
                                <div class="form-group col-md-6" id="go1">
                                        <br>
                                        <button type="submit" class="btn btn-primary" value="<?php if ($val[0]['usu_id']){$colr ="#85C1E9"; $no = "<i class='fa-duotone fa-pen-to-square bra'></i>Actualizar";
                                                }else{ $colr ="#45B39D"; $no = "<i class='fa-duotone fa-circle-plus bra'></i>Agregar"; }?>" ><?php echo $no ?>
                                        </button>
                                        <a href="home.php?pg=<?=$pg?>&ver=si" class="cancel" title="Limpiar"><i class="fa-duotone fa-circle-xmark vis"></i></a>
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
        <table id="tabladatos" class="table table-striped " style="width:100%;">
                <thead>
                    <tr>
                        <th id="primera_esq">Foto</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Contacto</th>
                            <th>Perfil</th>
                            <th>Tema</th>
                        <th id="segunda_esq">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        if ($datAll) {
                                foreach ($datAll as $dtA) {
                                                
                        ?>
                        <tr>
                            <td>
                                <div class="txtfot1">
                                        <?php if ($dtA['usu_fot']) { ?>
                                                <img src="<?= $dtA['usu_fot']; ?>" class="foto">
                                        <?php } else { ?>
                                                <img src="img/perfil.jpg" class="foto">
                                        <?php } ?>
                                </div>
                            </td>
                            <td><?= $dtA['usu_nom'] . " " . $dtA['usu_ape']; ?></td>
                            <td>Documento: <?= $dtA['val_nom'];?><br>N° de documento: <?= $dtA['usu_ndoc'];?></td>
                            <td>Correo: <?= $dtA['usu_ema'] ?><br> Telefono: <?= $dtA['usu_tel'] ?><br> Ciudad: <?= $dtA['nomubi'] ?><br> Dirección: <?= $dtA['usu_dir'] ?></td>
                            <td><?= $dtA['per_nom']; ?></td>
                            <td><?= $dtA['emp_tema']; ?></td>
                            <td style="text-align:center;">
                                <div class="info_tabla">
                                    <?php if($_SESSION['per_id']==1){?>
                                    <i class="fa-duotone fa-industry-windows opctabla" data-bs-toggle="modal" data-bs-target="#myModal<?=$dtA['usu_id'];?>" style="z-index:1500;" title="Ver Empresas"></i>
                                    <?php echo modal($dtA['usu_id'], $dtA['usu_nom']."".$dtA['usu_ape']);  }?>
                                    <form action="" method="POST">
                                        <?php if($_SESSION['per_id']!=1 && $dtA['usu_id']!=$_SESSION['usu_id']){
                                                if ($dtA['usu_act'] == 1) { ?>
                                            <button class="editbtnpos" type="submit" title="Activo">
                                                <input type="hidden" name="ope" value="activl">
                                                <input type="hidden" name="usu_act" value="2">
                                                <input type="hidden" name="usu_id" value="<?=$dtA['usu_id'];?>">
                                                <i class="fa-duotone fa-square-check opctabla" id="activ" ></i>
                                            </button>
                                        <?php }else{ ?>
                                            <button class="editbtnpos" type="submit" title="Desactivo" >
                                                <input type="hidden" name="ope" value="activl">
                                                <input type="hidden" name="usu_act" value="1">
                                                <input type="hidden" name="usu_id" value="<?=$dtA['usu_id'];?>">
                                                <i class="fa-duotone fa-square-xmark opctabla" style="color:#f00;"></i>
                                            </button>
                                        <?php } 
                                        }?>
                                    </form>
                                    <form action="" method="POST">
                                        <button class="editbtnpos" type="submit" title="Actualizar">
                                            <input type="hidden" name="ope" value="edi">
                                            <input type="hidden" name="usu_id" value="<?=$dtA['usu_id'];?>">
                                            <i class="fa-duotone fa-pen-to-square opctabla" id="actuli" title="Editar"></i>
                                        </button>
                                    </form>
                                    <?php if($dtA['usu_id']!=$_SESSION['usu_id']){?>
                                        <form action="" method="POST">
                                                <button class="editbtnpos" type="submit" title="Eliminar" onclick="return elimi()">
                                                <input type="hidden" name="ope" value="eli">
                                                <input type="hidden" name="usu_id" value="<?=$dtA['usu_id'];?>">
                                                <i class="fa-duotone fa-trash-can-xmark opctabla" id="actuli" title="Eliminar"></i>
                                                </button>
                                        </form>
                                    <?php }?>
                                </div>
                            </td>
                        </tr>
                                <?php
                            } 
                          }  
                        ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th id="tercera_esq">Logo</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Contacto</th>
                            <th>Perfil</th>
                            <th>Tema</th>
                        <th id="cuarta_esq">Opciones</th>
                    </tr>
                </tfoot>
        </table>
        <br>
</div>