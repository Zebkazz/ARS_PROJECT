<?php
require_once 'controllers/cval.php';
?>
<a href="javascript:document.getElementById('infovis').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1" class="inforv"><i class="fa-duotone fa-circle-info vis "></i></a>
<a href="javascript:document.getElementById('infovis').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2" class="inforv" Title="Informacion"><i class="fa-duotone fa-circle-minus vis" style="color:#f00;"></i></a>
<div id="infovis" class="infovis">El valor nos permite gurdar datos referentes al campo de un domino guardado para agregar parametros que se pueden usar en valor. <div class="textayuda"><a href="videos.php?pg=<?= $pg ?>&nom=<?= $tit ?>" class="btnvideo" title="Video de Ayuda"><i class="fa-duotone fa-video vis"></i></a>Video de explicación</div></div>

<div id="conta">
    <div class="inser">
        <form class="m.tb-40" name="frm1" action="home.php?pg=<?=$pg;?>" method="POST">
            <div class="row r1">
                <input type="hidden" name="val_id" id="val_id" class="form-control" value="<?= isset($val) ? $val[0]['val_id'] : ''; ?>">
                <div class="form-group col-md-6">
                    <label for="val_nom">Nombre Valor</label>
                    <?php $col = isset($_GET['col']) ? $_GET['col']:NULL; if($col=="col"){ indicar(); }?>
                    <input type="text" name="val_nom" id="val_nom" class="form-control colrs" value="<?= isset($val) ? $val[0]['val_nom'] : ''; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="dom_id">Dominio</label>
                    <select name="dom_id" id="dom_id" class="form-select">
                        <?php
                            if($datDom){
                                foreach($datDom AS $dd){
                        ?>
                                    <option value="<?=$dd['dom_id'];?>" >
                                        <?=$dd['dom_nom'];?>
                                    </option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="val_par">Parametros</label>
                    <input type="text" name="val_par" id="val_par" class="form-control" value="<?= isset($val) ? $val[0]['val_par'] : ''; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="val_act">Activo</label>
                    <select name="val_act" id="val_act" class="form-select">
                    <option value="1" <?php if ($val && $val[0]['val_act'] == 1) ?>>Si</option>
                        <option value="2" <?php if ($val && $val[0]['val_act'] == 2) ?>>No</option>
                    </select> 
                </div>
                <div class="form-group col-md-6">
                    <br>
                    <button type="submit" class="btn btn-primary" value="<?php if ($val[0]['val_id']){$colr ="#85C1E9"; $no = "<i class='fa-duotone fa-pen-to-square bra'></i>Actualizar";
                        }else{ $colr ="#45B39D"; $no = "<i class='fa-duotone fa-circle-plus bra'></i>Agregar"; }?>" ><?php echo $no?>
                    </button>
                    <a href="home.php?pg=<?=$pg?>&ver=si" class="cancel"><i class="fa-duotone fa-circle-xmark vis"></i></a>
                    <input type="hidden" class="btn btn-primary" name="ope" value="save">
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
<table id="tabladatos" class="table table-striped " style="width:100%">
    <thead>
        <tr>
        <th id="primera_esq">N°</th>
        <th >Valor</th>
        <th >Parametros</th>
        <th>Dominio</th>
        <th id="segunda_esq">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($datAll){
                foreach($datAll AS $d){
        ?>
                    <tr>
                        <td>
                            <?= $d['val_id'];?>
                        </td>
                        <td>
                          <?=$d['val_nom'];?>                   
                        </td>
                        <td>
                          <?=$d['val_par'];?>
                        </td>
                        <td>
                            <?=$d['dom_nom'];?>
                        </td>
                        <td style="text-align:center;">
                        <span style="opacity: 0;">
                            <?= $d['val_act']; ?><br>
                        </span>
                        <div class="info_tabla">
                                <?php if ($d['val_act'] == 1) { ?>
                                   <a href="home.php?pg=<?= $pg; ?>&val_act=2&val_id=<?= $d['val_id']; ?>" title="Activo"><i class="fa-duotone fa-square-check opctabla" id="activ"></i></a>
                                <?php } else { ?>
                                   <a href="home.php?pg=<?= $pg; ?>&val_act=1&val_id=<?= $d['val_id']; ?>" title="Desactivo"><i class="fa-duotone fa-square-xmark opctabla" style="color:#f00;"></i></a>
                                <?php } ?>
                                    <a href="home.php?pg=<?= $pg; ?>&ope=edi&val_id=<?= $d['val_id']; ?>" title="Actualizar">
                                    <i class="fa-duotone fa-pen-to-square opctabla" id="actuli" title="Editar"></i>
                                </a><br><br>
                                    <a href="home.php?pg=<?= $pg; ?>&ope=eli&val_id=<?= $d['val_id']; ?>" title="Eliminar" onclick="return elimi()">
                                        <i class="fa-duotone fa-trash-can-xmark opctabla" id="elim" title="Eliminar"></i>
                                    </a>
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
            <th id="tercera_esq">N°</th>
            <th>Valor</th>
            <th >Parametros</th>
            <th>Dominio</th>
            <th id="cuarta_esq">Opciones</th>
            
        </tr>
    </tfoot>
</table>
</div>