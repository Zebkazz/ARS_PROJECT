<?php require_once 'controllers/cpag.php';
    function botForm(){
        $GLOBALS['tamprin']="0px";
        $GLOBALS['tamvaria']="325px";
        $GLOBALS['tmargenbot']="210px";
    }
    echo "<div class='tit'><i id='i'class='$ico'></i><h1>$tit</h1></div>";
    $ver = isset($_GET['ver']) ? $_GET['ver']:NULL;
    if($ope=="savep"){
        botForm();
        echo mosCer($tamprin, $tmargenbot, $tamvaria);
    }else if($ver=="si"){
        botForm();
        echo mosCer($tamprin, $tmargenbot, $tamvaria);
    }else if($pag_id && !$pag_mos){
        botForm();
        echo mosCer($tamprin, $tmargenbot, $tamvaria);
    }else if($pag_id==""){
        $GLOBALS['tamvariable']="325px";
        $GLOBALS['tmargenbottom']="210px";
        echo titulo($tamprinci, $tmargenbottom, $tamvariable);
    }else{}    
?>
<!------------------------------------------ Boton de ayuda en vista -------------------------------------->
<a href="javascript:document.getElementById('infovis').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1" class="inforv"><i class="fa-duotone fa-circle-info vis "></i></a>
<a href="javascript:document.getElementById('infovis').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2" class="inforv" Title="Informacion"><i class="fa-duotone fa-circle-minus vis" style="color:#f00;"></i></a>
<div id="infovis" class="infovis">En pagina puedes administrar las vistas que se muestran en el menu permitiendo su acceso o denegandolo. <div class="textayuda"><a href="videos.php?pg=<?= $pg ?>&nom=<?= $tit ?>" class="btnvideo" title="Video de Ayuda"><i class="fa-duotone fa-video vis"></i></a>Video de explicación</div></div>

<!------------------------------------------- Contenido de la vista ------------------------------------>
<div id="conta">
    <div class="inser">
        <form name="frm1" action="home.php?pg=<?= $pg; ?>" method="POST">
            <div class="row">
            <input type="hidden" class="form-control form-control-sm" id="pag_id" name="pag_id" value="<?= isset($val) ? $val[0]['pag_id'] : ''; ?>" >
                <div class="form-group col-md-6">
                    <label for="pag_nom">Nombre</label>
                    <input type="text" name="pag_nom" id="pag_nom" maxlength="70" class="form-control" required value="<?php if ($val) echo $val[0]['pag_nom']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="pag_rut">Ruta</label>
                    <input type="text" name="pag_rut" id="pag_rut" class="form-control" required value="<?php if ($val) echo $val[0]['pag_rut']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="pag_mos">Mostrar</label>
                    <select name="pag_mos" id="pag_mos" class="form-select">
                        <option value="1" <?php if ($val && $val[0][3] == 1) echo " selected "; ?>>Mostrar</option>
                        <option value="2" <?php if ($val && $val[0][3] == 2) echo " selected "; ?>>No mostrar</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="pag_ord">Ordenar</label>
                    <input type="number" name="pag_ord" id="pag_ord" class="form-control" required value="<?php if ($val) echo $val[0]['pag_ord']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="pag_ico">Icono</label>
                    <input type="text" name="pag_ico" id="pag_ico" class="form-control" value="<?php if ($val) echo $val[0]['pag_ico']; ?>">
                    <br>
                </div>
                <div class="form-group col-md-6">
                    <label for="datMenu">Clase</label>
                    <input type="text" name="datMenu" id="datMenu" class="form-control" value="<?php if ($val) echo $val[0]['datMenu']; ?>">
                    <br>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary" value="<?php if ($val[0]['pag_id']){$colr ="#85C1E9"; $no = "<i class='fa-duotone fa-pen-to-square bra'></i>Actualizar";
                        }else{ $colr ="#45B39D"; $no = "<i class='fa-duotone fa-circle-plus bra'></i>Agregar"; }?>" ><?php echo $no ?>
                    </button>
                    <a href="home.php?pg=<?=$pg?>&ver=si" class="cancel" title="Limpiar"><i class="fa-duotone fa-circle-xmark vis"></i></a>
                    <input type="hidden" name="ope" value="savep"> 
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
    <table id="tabladatos" class="table table-striped  nowrap" style="width:100%">
        <thead>
            <tr>
                <th id="primera_esq">Icono</th>
                <th>Nombre</th>
                <th>icon</th>
                <th>Ruta</th>
                <th>N°</th>
                <th>Ordenar</th>
                <th id="segunda_esq">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($datAll) {
                foreach ($datAll as $d) {
            ?>
                    <tr>
                        <td> <i class="<?= $d['pag_ico']; ?> opctabla"></i></td>
                        <td><?= $d['pag_nom']; ?></td>
                        <td><?= $d['pag_ico']; ?><br> <small>Clase: <?= $d['datMenu']; ?></small></td>
                        <td><?= $d['pag_rut']; ?></td>
                        <td><?= $d['pag_id']; ?></td>
                        <td><?= $d['pag_ord']; ?></td>
                        <td>
                        <div class="info_tabla">
                                <?php
                                 if ($d['pag_mos'] == 1) { ?>
                                    <a href="home.php?pg=<?= $pg; ?>&pag_mos=2&pag_id=<?= $d['pag_id']; ?>" title="Activo"><i class="fa-duotone fa-square-check opctabla" id="activ"></i></a>
                                <?php } else { ?>
                                    <a href="home.php?pg=<?= $pg; ?>&pag_mos=1&pag_id=<?= $d['pag_id']; ?>" title="Desactivo"><i class="fa-duotone fa-square-xmark opctabla" id="activ" style="color:#f00;"></i></a>
                                <?php } ?>

                                <a href="home.php?pg=<?= $pg; ?>&ope=editp&pag_id=<?= $d['pag_id']; ?>" title="Actualizar">
                                    <i class="fa-duotone fa-pen-to-square opctabla" id="actuli" title="Editar"></i>
                                </a><br><br>
                                <a href="home.php?pg=<?= $pg; ?>&ope=elip&pag_id=<?= $d['pag_id']; ?>" title="Eliminar" onclick="return elimi()">
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
                <th id="tercera_esq">Icono</th>
                <th>Nombre</th>
                <th>icon</th>
                <th>Ruta</th>
                <th>N°</th>
                <th>Ordenar</th>
                <th id="cuarta_esq">Opciones</th>
            </tr>
        </tfoot>
    </table>
    <br><br><br><br>
</div>
