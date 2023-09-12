<?php require_once 'controllers/cdom.php';?>
<!------------------------------------------ Boton de ayuda en vista -------------------------------------->
<a href="javascript:document.getElementById('infovis').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1" class="inforv"><i class="fa-duotone fa-circle-info vis "></i></a>
<a href="javascript:document.getElementById('infovis').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2" class="inforv" Title="Informacion"><i class="fa-duotone fa-circle-minus vis" style="color:#f00;"></i></a>
<div id="infovis" class="infovis">Aqui en dominio se encuentran los campos donde se almacenan los datos de valor para dividirlos por seciones.<div class="textayuda"><a href="videos.php?pg=<?= $pg ?>&nom=<?= $tit ?>" class="btnvideo" title="Video de Ayuda"><i class="fa-duotone fa-video vis"></i></a>Video de explicación</div></div>
<!------------------------------------------- Contenido de la vista ------------------------------------>
<div id="conta">
    <div class="inser">
        <form class="m-tb-40" action="home.php?pg=<?=$pg?>&ver=si" method="POST">
            <div class="row">
                <input type="hidden" name="dom_id" id="dom_id" value="<?=isset($datOne) ? $datOne[0]['dom_id']:''; ?>">
                <div class="form-group col-md-10" >
                    <?php $col = isset($_GET['col']) ? $_GET['col']:NULL; if($col=="col"){ indicar(); }?>
                    <label for="dom_nom">Nombre Dominio</label>
                    <input type="text" name="dom_nom" id="dom_nom" class="form-control colrs" value="<?=isset($datOne) ? $datOne[0]['dom_nom']:''; ?>" required >
                </div>
                <div class = "form-group col-md-6">
                        <br>
                        <button type="submit" class="btn btn-primary" value="<?php if ($datOne){$colr ="#85C1E9"; $no = "<i class='fa-duotone fa-pen-to-square bra'></i>Actualizar";
                                }else{ $colr ="#45B39D"; $no = "<i class='fa-duotone fa-circle-plus bra'></i> Registrar"; }?>" ><?php echo $no ?>
                        </button>
                        <style>:root{--col_hover:<?=$colr?>;}.btn:hover{background-color: var(--col_hover);color: #fff;}.btn:hover .bra{color: #fff;}</style>
                        <input type="hidden" class="btn btn-primary" value="save" name="ope" />
                        <a href="home.php?pg=<?=$pg?>&ver=si" class="cancel"><i class="fa-duotone fa-circle-xmark vis"></i></a>
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
                <th id="primera_esq">ID</th>
                <th>Nombre</th>
                <th id="segunda_esq">Opciones</th>
            </tr>
        </thead>
            <tbody>
            <?php
            if($datTdo){
                foreach($datTdo AS $dtp){
            ?>
            <tr>
                <td>
                    <?=$dtp['dom_id'];?>
                </td>
                <td>
                    <?=$dtp['dom_nom'];?>
                </td>
                <td style="text-align: right;">
                    <div class="info_tabla">
                        <a href="home.php?pg=<?= $pg; ?>&ope=edit&dom_id=<?= $dtp['dom_id']; ?>" title="Actualizar">
                            <i class="fa-duotone fa-pen-to-square opctabla" id="actuli" title="Editar"></i>
                        </a><br><br>
                             <a href="home.php?pg=<?= $pg; ?>&ope=elimin&dom_id=<?= $dtp['dom_id']; ?>" title="Eliminar" onclick="return elimi()">
                                <i class="fa-duotone fa-trash-can-xmark opctabla" id="elim" title="Eliminar"></i>
                            </a>
                    </div>
                </td>
            <?php
                }
            }
            ?>
            </tr>
            </tbody>
        <tfoot>
            <tr>
                <th id="tercera_esq">ID</th>
                <th>Nombre</th>
                <th id="cuarta_esq">Opciones</th>
            </tr>
        </tfoot>
    </table>
    </div>