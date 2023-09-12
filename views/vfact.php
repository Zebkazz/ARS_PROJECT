<script type="text/javascript" src="js/fact.js"></script>
<style>
    @page 
    {
        size:  auto;   /* auto es el valor inicial */
        margin: 0mm;  /* afecta el margen en la configuración de impresión */
    }
    .difumfact{
        display:none;
        backdrop-filter:blur(4px);
        width:100vw;
        height:100vh;
        position: absolute;
        z-index: 999;
        top:0px;
        right:0px;
    }
    .princi{
        min-height:700px;
    }
    thead th{
        background-color:var(--color_tabla)!important; 
        color: #fff;  
    }
    td{
        background-color:#e3e3e3!important; 
        border:#fff;
        padding:5px!important;
    }
    tr:last-child td:last-child{
        border-radius: 0px 0px 15px 0px;
    }
    .editbtnpos{
        padding:0px;
    }
    .form-control{
        height:30px;
    }
    
</style>
<?php
    echo "<div class='tit' style='justify-content: space-between;'><h2>$tit ".$datOneEmp[0]['emp_nom']."</h2></div>";
    require_once 'controllers/cfact.php';
?>

                <div class="row r1">
                    <div class="col-4">
                        <div class="form-group col-md-12" id="go1">
                            <label for="fact_vend">Vendedor</label>
                            <input type="text" class="form-control form-control-smfact_vend" name="fact_vend" value="<?= $_SESSION['usu_nom']."".$_SESSION['usu_ape']?>" required disabled/>
                        </div>
                        <div class="form-group col-md-12" id="go1">
                                <label for="emp_razon">comprador</label>
                                    <select class="form-select js-example-basic-single" name="com_nom"  style="height: 34px;">
                                                <option value="">Seleccione comprador</option>
                                                <?php if ($datAllC ) {
                                                        foreach ($datAllC  as $dtp) {
                                                ?>
                                                        <option value="<?= $dtp['com_nom']; ?>" <?php if ($val && $val[0]['com_nom'] == $dtp['com_id']) echo ' selected '; ?>>
                                                                <?= $dtp['com_nom']; ?>
                                                        </option>
                                                <?php }
                                                } ?>
                                    </select>
                        </div>
                        <div class="form-group col-md-12" id="go1">
                            <label for="usu_ape">Dirección</label>
                            <input type="text" class="form-control form-control-sm" id="usu_ape" name="usu_ape" value="" required />
                        </div>
                        <div class="form-group col-md-12" id="go1">
                            <label for="usu_ape">Ciudad</label>
                            <input type="text" class="form-control form-control-sm" id="usu_ape" name="usu_ape" value="" required />
                        </div>
                    </div>
                    <div class="col-4">
                      
                        <div class="form-group col-md-6" id="go1">
                            <label for="usu_ape">Numero de factura</label>
                            <input type="number" class="form-control form-control-sm" id="usu_ape" name="usu_ape" value="" required />
                        </div>
                        <div class="form-group col-md-6" id="go1">
                            <label for="usu_ape">Fecha</label>
                            <input type="Date" class="form-control form-control-sm" id="usu_ape" name="usu_ape" value="" required />
                        </div>
                    </div>
                    <div class="col-2">
                        <?php
                        if ($datOneEmp[0]['emp_img']) { 
                        $html='<a href="home.php?pg=1617"><img src="'.$datOneEmp[0]['emp_img'].'" alt="Logo" style="width:200px; height:200px;"></a>';
                        } else { 
                        $html.='<a href="home.php?pg=1617"><img src="./img/empresa.jpg" alt="" ></a>';
                        }
                        echo $html;
                        ?>
                    </div>
                </div>
               <br>
                <table class="table table-bordered" style="border-color:#fff;">
                    <thead class="table-success">
                      <tr style="border:none;">
                        <th id="primera_esq" scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col" class="text-end">Cantidad</th>
                        <th scope="col" class="text-end">Precio</th>
                        <th scope="col" class="text-end">Total</th>
                        <th id="segunda_esq"  scope="col" class="NoPrint">                         
                         
                        </th>
                      </tr>
                    </thead>
                    <tbody id="TBody">
                      <tr id="TRow" >
                        <th scope="row">1</th>
                        <td><input type="text" class="form-control" onchange="textC(this);" required ></td>
                        <td><input type="number" class="form-control text-end" name="qty" onchange="Calc(this);" required></td>
                        <td><input type="number" class="form-control text-end" name="rate" onchange="Calc(this);"></td>
                        <td><input type="number" class="form-control text-end" name="amt" value="0" disabled=""></td>
                        <td class="NoPrint"><button type="button" class="editbtnpos" onclick="BtnDel(this)"><i class="fa-duotone fa-circle-xmark vis bra"style="color:#FF0000;"></i></button></td>
                      </tr>
                    </tbody>
                  </table>


                  <div class="row">
                    <div class="col-8">
                      
                        <button type="button" id="btnanp" class="btn btn-primary" onclick="GetPrint(1)"><i class="fa-duotone fa-print bra"></i>Imprimir </button><br>
                        <button type="button" id="btnans" class="btn btn-primary" ><i class="fa-duotone fa-floppy-disk bra"></i>Guardar </button>

                    </div>
                    <div class="col-4">
                        <div class="form-group col-md-12" id="go1">
                            <label for="FTotal">Total</label>
                            <input type="text" class="form-control form-control-sm" id="FTotal" name="FTotal" value="" required />
                        </div>
                        <div class="form-group col-md-12" id="go1">
                            <label for="FGST">GST</label>
                            <input type="text" class="form-control form-control-sm" id="FGST" name="FGST"  onchange="GetTotal()" value="" required />
                        </div>
                        <div class="form-group col-md-12" id="go1">
                            <label for="FNet">Total a pagar</label>
                            <input type="text" class="form-control form-control-sm" id="FNet" name="FNet"  value="" required />
                        </div>


                    </div>
                </div>