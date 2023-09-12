<?php 
require_once 'controllers/ccom.php';
?>
<a href="javascript:document.getElementById('infovis').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1" class="inforv"><i class="fa-duotone fa-circle-info vis "></i></a>
<a href="javascript:document.getElementById('infovis').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2" class="inforv" Title="Informacion"><i class="fa-duotone fa-circle-minus vis" style="color:#f00;"></i></a>
<p id="infovis" class="infovis">Aqui puedes adminstrar las empresas, crearlas, desactivarlas y borrarlas solo si la empresa no tiene ningun registro guardado. <a href="videos.php?pg=<?= $pg ?>&nom=<?= $tit ?>" class="btnvideo" title="Video de Ayuda"><i class="fa-duotone fa-video vis"></i></a></p>
<div id="conta" class="conta">
    <div class="inser">
        <form class="m.tb-40" action="#" method="POST" enctype="multipart/form-data">
            <div class="row r1">
                <input type="hidden" class="form-control form-control-sm" id="com_id" name="com_id" value="<?= isset($val) ? $val[0]['com_id'] : ''; ?>" />
                <input type="hidden" class="form-control form-control-sm" id="com_tipó" name="com_tipo" value="<?= isset($val) ? $val[0]['com_tipo'] : 'P'; ?>" >
                <div class="form-group col-md-6" id="go1">
                        <label for="ema_nom">Nombre proveedor</label>
                        <input type="text" class="form-control form-control-sm" id="com_nom" name="com_nom" value="<?= isset($val) ? $val[0]['com_nom'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_nit">Numero de Nit</label>
                        <input type="number" class="form-control form-control-sm" id="com_ndoc" name="com_ndoc" value="<?= isset($val) ? $val[0]['com_ndoc'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_tel">Telefono</label>
                        <input type="number" class="form-control form-control-sm" id="com_tel" name="com_tel" value="<?= isset($val) ? $val[0]['com_tel'] : ''; ?>" />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <label for="emp_email">Correo electronico</label>
                        <input type="email" class="form-control form-control-sm" id="com_ema" name="com_ema" value="<?= isset($val) ? $val[0]['com_ema'] : ''; ?>" required />
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
                        <label for="emp_dir">Direccion</label>
                        <input type="text" class="form-control form-control-sm" id="com_dir" name="com_dir" value="<?= isset($val) ? $val[0]['com_dir'] : ''; ?>" required />
                </div>
                <div class="form-group col-md-6" id="go1">
                        <br>
                        <button type="submit" class="btn btn-primary" value="<?php if ($val[0]['com_id']){$colr ="#85C1E9"; $no = "<i class='fa-duotone fa-pen-to-square bra'></i>Actualizar";
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
                    <th id="primera_esq">Nombre</th>
                    <th>Identificaion</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Ubicación</th>
                    <th id="segunda_esq">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($datAllP) {
                        foreach ($datAllP  as $dtA ) {
                ?>
                <tr>
                    <td><?= $dtA['com_nom'] ?></td>
                    <td><?= $dtA['com_ndoc'] ?></td>
                    <td><?=$dtA['com_tel']; ?></td>
                    <td><?=$dtA['com_ema']; ?></td>
                    <td>Dirección: <?=$dtA['com_dir']; ?> </td>
                    <td>Ubicación: <?=$dtA['nomubi']; ?></td>
                    <td style="text-align:center;">
                        <div class="info_tabla">
                                <?php if($_SESSION['per_id']==1){?>
                                <i class="fa-duotone fa-boxes-stacked opctabla" data-bs-toggle="modal" data-bs-target="#myModal<?=$dtA['com_id'];?>" style="z-index:1500;" title="Ver Proveedores"></i>
                                <?php echo modalC($dtA['com_id'], $dtA['com_nom']);  }?>
                                <form action="" method="POST">
                                    <?php if($_SESSION['per_id']!=1 ){
                                     if ($dtA['com_act'] == 1) { ?>
                                        <button class="editbtnpos" type="submit" title="Activo">
                                            <input type="hidden" name="ope" value="activl">
                                            <input type="hidden" name="com_act" value="2">
                                            <input type="hidden" name="com_id" value="<?=$dtA['com_id'];?>">
                                            <i class="fa-duotone fa-square-check opctabla" id="activ" ></i>
                                        </button>
                                    <?php }else{ ?>
                                        <button class="editbtnpos" type="submit" title="Desactivo" >
                                            <input type="hidden" name="ope" value="activl">
                                            <input type="hidden" name="com_act" value="1">
                                            <input type="hidden" name="com_id" value="<?= $dtA['com_id'];?>">
                                            <i class="fa-duotone fa-square-xmark opctabla" style="color:#f00;"></i>
                                        </button>
                                    <?php } }?>
                                </form>
                                <form action="" method="POST">
                                    <button class="editbtnpos" type="submit" title="Actualizar">
                                            <input type="hidden" name="ope" value="edi">
                                            <input type="hidden" name="com_id" value="<?= $dtA['com_id'];?>">
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
                        <th id="tercera_esq">Nombre</th>
                        <th>Identificaion</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Dirección</th>
                        <th id="cuarta_esq">Opciones</th>
                    </tr>
                </tfoot>
        </table>
</div>