<?php require_once 'controllers/cper.php'; 
?>
    <a href="javascript:document.getElementById('infovis').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1" class="inforv"><i class="fa-duotone fa-circle-info vis "></i></a>
    <a href="javascript:document.getElementById('infovis').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2" class="inforv" Title="Informacion"><i class="fa-duotone fa-circle-minus vis" style="color:#f00;"></i></a>
    <div id="infovis" class="infovis">En este apartado se pueden administrar las paginas o vistas habilitadas que un perfil puede ver o las que no pueda.<div class="textayuda"><a href="videos.php?pg=<?= $pg ?>&nom=<?= $tit ?>" class="btnvideo" title="Video de Ayuda"><i class="fa-duotone fa-video vis"></i></a>Video de explicación</div></div>
    <div id="conta">
        <div class="inser">
            <form name="frm1" action="home.php?pg=<?=$pg;?>" method="POST">
                <div class="row" style="margin-bottom: 50px">
                    <div class = "form-group col-md-10">
                        <label for="per_nom">Nombre de perfil</label>
                        <input type="text" name="per_nom" id="per_nom" maxlength="70" class="form-control" required value="<?php if ($datOne) echo $datOne[0]['per_nom']; ?>">
                    </div>
                    <div class = "form-group col-md-6">
                        <br>
                        <button type="submit" class="btn btn-primary" value="<?php if ($datOne){$colr ="#85C1E9"; $no = "<i class='fa-duotone fa-pen-to-square bra'></i>Actualizar";
                                }else{ $colr ="#45B39D"; $no = "<i class='fa-duotone fa-circle-plus bra'></i>Agregar"; }?>" ><?php echo $no ?>
                        </button>
                        <a href="home.php?pg=<?=$pg?>&ver=si" class="cancel"><i class="fa-duotone fa-circle-xmark vis"></i></a>
                        <style>:root{--col_hover:<?=$colr?>;}.btn:hover{background-color: var(--col_hover);color: #fff;}.btn:hover .bra{color: #fff;}</style>
                        <input type="hidden" name="per_id" id="per_id" value="<?php echo openCypher ('encrypt', isset($datOne) ? $datOne[0]['per_id'] : ''); ?>">
                        <input type="hidden" name="opera" value="<?php if($datOne) echo "Actualizar"; else echo "Insertar"; ?>">
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
                <th id="primera_esq">Id</th>
                <th>Nombre</th>
                <th id="segunda_esq">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($dat){
                    foreach($dat AS $d){
                        if($_SESSION['per_id']==1){
            ?>
                    <tr>
                        <td><?=$d['per_id'];?></td>
                        <td>
                            <?=$d['per_nom'];?>
                            <br>
                            <small><?=$d['pag_nom'];?></small>
                        </td>
                        <td>
                        <div class="info_tabla">
                            <?php $col = isset($_GET['col']) ? $_GET['col']:NULL; if($col=="col"){indicarPer();}?>
                            <i class="fa-duotone fa-memo-pad opctabla per" data-bs-toggle="modal" data-bs-target="#myModal<?= $d['per_id'];?>" title="Ver Páginas"></i>
                            <?php echo modal($d['per_id'], $d['per_nom'], $pg); ?>
                            
                            <form action="" method="POST">
                                <button class="editbtnpos" type="submit" title="Actualizar">
                                    <input type="hidden" name="ope" value="edi">
                                    <input type="hidden" name="per_id" value="<?php echo openCypher ('encrypt', $d['per_id']);?>">
                                    <i class="fa-duotone fa-pen-to-square opctabla" id="actuli" title="Editar"></i>
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
            <?php
                    }else if($d['per_id']!=1){
                        ?>
                    <tr>
                        <td></td>
                        <td>
                            <?=$d['per_nom'];?>
                            <br>
                            <small><?=$d['pag_nom'];?></small>
                        </td>
                        <td>
                        <div class="info_tabla">
                            <?php $col = isset($_GET['col']) ? $_GET['col']:NULL; if($col=="col"){indicarPer();}?>
                            <i class="fa-duotone fa-memo-pad opctabla per" data-bs-toggle="modal" data-bs-target="#myModal<?=$d['per_id'];?>" title="Ver Páginas"></i>
                            <?php echo modal($d['per_id'], $d['per_nom'], $pg); ?>
                            <br><br>
                            <a href="home.php?pg=<?=$pg;?>&per_id=<?=$d['per_id'];?>" title="Actualizar">
                                <i class="fa-duotone fa-pen-to-square opctabla"></i>
                            </a>
                        </div>
                        </td>
                    </tr>
            <?php
                    }
                }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th id="tercera_esq">Id</th>
                <th>Nombre</th>
                <th id="cuarta_esq">Opciones</th>
            </tr>
        </tfoot>
    </table>
    </div>
</div>
