<?php
  require_once('controllers/optimg.php');

  $tiin = '<div class="inivideo"><h1 class="tiu"><i id="vimi" class="fa-duotone fa-house-chimney"></i> Bienvenido </h1><div class="textayudaini"><a href="videos.php?pg=999&nom=Menu de incio" class="btnvideo" title="Video de Ayuda"><i class="fa-duotone fa-video vis"></i></a></div></div>';
  $tiin .= '<h6 class="tiup">';
  $tiin .= $_SESSION["per_nom"]; 
  $tiin .= '<h6 class="tiup" style="color:'.$col.';">'.$conxinf.'</h6>'; 
  $tiin .= '</h6><div class="cont">';
  $tiin .= '<img id="img_vini" src="img/two.svg" alt="">';
  $tifi = '<h1 class="tiu_footer">¿No sabes por donde empezar?</h1>';
  $tifi .= '<h6 class="tex_foor">En este menu encontraras las opciones rapidas sobre las funcionalidades del software que te guiaran ';
  $tifi .= 'para que le saques el maximo provecho y puedas familiarizarte con el entorno del mismo para esto puedes';
  $tifi .= 'seguir la recomendacion de abajo o puedes ver el manual de uso.</h6>';
  $tifi .= '<div class="ini_footer">';
  $tifi .= '<i class="fa-duotone fa-circle-question vi"></i>';
  $tifi .= '<div><h6>Has click sobre estos y iconos tendras informacion sobre el funcionamiento de software en cada una de sus apartados.</h6>';
  $tifi .= '</div></div>';

if ($_SESSION['per_id'] == 1) {    echo $tiin;?>
    <!-- -----------------------------------------------Inicio de administrador---------------------------------- -->
        <div class="caja">
            <h1><i class="fa-duotone fa-receipt fa-bea ca"></i> Facturar</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info" class="info">Para iniciar el registro de las facturas aqui puede crear una y empezar a facturar porductos</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1601">
                    <div class="buini"><i class="fa-duotone fa-cart-shopping oini"></i> Vender</div>
                </a>
                <a href="home.php?pg=1602">
                    <div class="buini"><i class="fa-duotone fa-bags-shopping oini"></i> Comprar</div>
                </a>
                <a href="home.php?pg=1603">
                    <div class="buini"><i class="fa-duotone fa-memo-pad oini"></i> Detalle</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-square-plus ca"></i> Productos</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info1').style.display='flex';document.getElementById('inf4').style.display='flex';document.getElementById('inf3').style.display='none';void 0" Title="Informacion" id="inf3"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info1').style.display='none';document.getElementById('inf4').style.display='none';document.getElementById('inf3').style.display='flex';void 0" id="inf4"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info1" class="info">Para registrar un nuevo producto solo seleccione el boton nuevo para
                    registrar los productos que se veran reflejados en el inventario.
                </p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1623&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-cart-circle-plus oini"></i> Nuevo</div>
                </a>
                <a href="home.php?pg=1623">
                    <div class="buini"><i class="fa-duotone fa-pallet-boxes oini"></i> Ver productos</div>
                </a>
                <a href="home.php?pg=1623">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-cart-flatbed-boxes ca"></i> Inventario</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info2').style.display='flex';document.getElementById('inf6').style.display='flex';document.getElementById('inf5').style.display='none';void 0" Title="Informacion" id="inf5"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info2').style.display='none';document.getElementById('inf6').style.display='none';document.getElementById('inf5').style.display='flex';void 0" id="inf6"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info2" class="info">Aqui puede ver un registro total de los inventarios que lleva cada empresa.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1621">
                    <div class="buini"><i class="fa-duotone fa-garage oini"></i> Detalle</div>
                </a>
                <a href="home.php?pg=1621">
                    <div class="buini"><i class="fa-duotone fa-print-magnifying-glass oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-user-tie ca"></i> Clientes</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info3').style.display='flex';document.getElementById('inf8').style.display='flex';document.getElementById('inf7').style.display='none';void 0" Title="Informacion" id="inf7"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info3').style.display='none';document.getElementById('inf8').style.display='none';document.getElementById('inf7').style.display='flex';void 0" id="inf8"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info3" class="info">Aqui puedes crear agregar un nuevo cliente administrar los existentes y obtener un registro de todos ellos.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1630&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Registrar</div>
                </a>
                <a href="home.php?pg=1630">
                    <div class="buini"><i class="fa-duotone fa-users oini"></i> Ver clientes</div>
                </a>
                <a href="home.php?pg=1630">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-box-open ca"></i> Proveedores</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info4').style.display='flex';document.getElementById('inf10').style.display='flex';document.getElementById('inf9').style.display='none';void 0" Title="Informacion" id="inf9"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info4').style.display='none';document.getElementById('inf10').style.display='none';document.getElementById('inf9').style.display='flex';void 0" id="inf10"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info4" class="info">En este apartado se almacenan los datos de los proveedores con los que comercializa para tener siempre el contacto.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1625&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-box-open-full oini"></i> Registrar</div>
                </a>
                <a href="home.php?pg=1625">
                    <div class="buini"><i class="fa-duotone fa-images-user oini"></i> Ver proveedores</div>
                </a>
                <a href="home.php?pg=1625">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-sliders ca"></i> Perfil</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info5').style.display='flex';document.getElementById('inf12').style.display='flex';document.getElementById('inf11').style.display='none';void 0" Title="Informacion" id="inf11"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info5').style.display='none';document.getElementById('inf12').style.display='none';document.getElementById('inf11').style.display='flex';void 0" id="inf12"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info5" class="info">Estas son las opciones que tiene cada perfil como lo son las paginas que puede ver y las que tiene activas.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1605">
                    <div class="buini"><i class="fa-duotone fa-address-card oini"></i> Perfiles</div>
                </a>
                <a href="home.php?pg=1605&col=col">
                    <div class="buini"><i class="fa-duotone fa-clipboard-list-check oini"></i> Administrar</div>
                </a>
                <a href="home.php?pg=1613">
                    <div class="buini"><i class="fa-duotone fa-copy oini"></i> Ver Paginas</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-box-archive ca"></i> Valor</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info6').style.display='flex';document.getElementById('inf14').style.display='flex';document.getElementById('inf13').style.display='none';void 0" Title="Informacion" id="inf13"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info6').style.display='none';document.getElementById('inf14').style.display='none';document.getElementById('inf13').style.display='flex';void 0" id="inf14"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info6" class="info">Con valor puedes guardar datos dependiendo de u dominio que lo clasifica de formas separadas dependiendo del registro.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1611&ver=si&col=col">
                    <div class="buini"><i class="fa-duotone fa-box-circle-check oini"></i> Nuevo</div>
                </a>
                <a href="home.php?pg=1611">
                    <div class="buini"><i class="fa-duotone fa-boxes-stacked oini"></i> Ver registros</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-circle-d ca"></i> Dominio</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info7').style.display='flex';document.getElementById('inf16').style.display='flex';document.getElementById('inf15').style.display='none';void 0" Title="Informacion" id="inf15"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info7').style.display='none';document.getElementById('inf16').style.display='none';document.getElementById('inf15').style.display='flex';void 0" id="inf16"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info7" class="info">En esta secion se almacenan los dominios pertenecientes al valor el cual ayuda a guardar datos que se repiten varias partes.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1607&ver=si&col=col">
                    <div class="buini"><i class="fa-duotone fa-circle-dot oini"></i> Nuevo</div>
                </a>
                <a href="home.php?pg=1607">
                    <div class="buini"><i class="fa-duotone fa-pager oini"></i> Ver registros</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-circle-user ca"></i> Usuario</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info9').style.display='flex';document.getElementById('inf20').style.display='flex';document.getElementById('inf19').style.display='none';void 0" Title="Informacion" id="inf19"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info9').style.display='none';document.getElementById('inf20').style.display='none';document.getElementById('inf19').style.display='flex';void 0" id="inf20"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info9" class="info">En esta parte puede ver los usuarios y datos personales de la cuenta que tiene la sesion activa.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1609&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Registrar</div>
                </a>
                <a href="home.php?pg=1609">
                    <div class="buini"><i class="fa-duotone fa-users-medical oini"></i> Ver usuarios</div>
                </a>
                <a href="home.php?pg=1615&ver=sis">
                    <div class="buini"><i class="fa-duotone fa-image-polaroid-user oini"></i> Datos personales</div>
                </a>
            </div>
        </div>
    </div>
<?php  echo $tifi;   } else if ($_SESSION['per_id'] == 2){    echo $tiin;?>
    <!-------------------------------------------------Inicio de Empresa---------------------------------- -->
        <div class="caja">
            <h1><i class="fa-duotone fa-receipt ca"></i> Facturar</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info" class="info">Para iniciar el registro de las facturas aqui puede crear una y empezar a facturar porductos</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1601">
                    <div class="buini"><i class="fa-duotone fa-cart-shopping oini"></i> Vender</div>
                </a>
                <a href="home.php?pg=1602">
                    <div class="buini"><i class="fa-duotone fa-bags-shopping oini"></i> Comprar</div>
                </a>
                <a href="home.php?pg=1603">
                    <div class="buini"><i class="fa-duotone fa-memo-pad oini"></i> Detalle</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-square-plus ca"></i> Productos</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info1').style.display='flex';document.getElementById('inf4').style.display='flex';document.getElementById('inf3').style.display='none';void 0" Title="Informacion" id="inf3"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info1').style.display='none';document.getElementById('inf4').style.display='none';document.getElementById('inf3').style.display='flex';void 0" id="inf4"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info1" class="info">Para registrar un nuevo producto solo seleccione el boton nuevo para
                    registrar los productos que se veran reflejados en el inventario.
                </p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1623&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-cart-circle-plus oini"></i> Nuevo</div>
                </a>
                <a href="home.php?pg=1623">
                    <div class="buini"><i class="fa-duotone fa-pallet-boxes oini"></i> Ver productos</div>
                </a>
                <a href="home.php?pg=1623">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-cart-flatbed-boxes ca"></i> Inventario</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info2').style.display='flex';document.getElementById('inf6').style.display='flex';document.getElementById('inf5').style.display='none';void 0" Title="Informacion" id="inf5"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info2').style.display='none';document.getElementById('inf6').style.display='none';document.getElementById('inf5').style.display='flex';void 0" id="inf6"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info2" class="info">Aqui puede ver un registro total de los inventarios que lleva cada empresa.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1621">
                    <div class="buini"><i class="fa-duotone fa-garage oini"></i> Detalle</div>
                </a>
                <a href="home.php?pg=1621">
                    <div class="buini"><i class="fa-duotone fa-print-magnifying-glass oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-circle-user ca"></i> Clientes</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info3').style.display='flex';document.getElementById('inf8').style.display='flex';document.getElementById('inf7').style.display='none';void 0" Title="Informacion" id="inf7"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info3').style.display='none';document.getElementById('inf8').style.display='none';document.getElementById('inf7').style.display='flex';void 0" id="inf8"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info3" class="info">Aqui puedes crear agregar un nuevo cliente administrar los existentes y obtener un registro de todos ellos.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1630&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Registrar</div>
                </a>
                <a href="home.php?pg=1630">
                    <div class="buini"><i class="fa-duotone fa-users-medical oini"></i> Ver clientes</div>
                </a>
                <a href="home.php?pg=1630">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-box-open ca"></i> Proveedores</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info4').style.display='flex';document.getElementById('inf10').style.display='flex';document.getElementById('inf9').style.display='none';void 0" Title="Informacion" id="inf9"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info4').style.display='none';document.getElementById('inf10').style.display='none';document.getElementById('inf9').style.display='flex';void 0" id="inf10"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info4" class="info">En este apartado se almacenan los datos de los proveedores con los que comercializa para tener siempre el contacto.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1625&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-box-open-full oini"></i> Registrar</div>
                </a>
                <a href="home.php?pg=1625">
                    <div class="buini"><i class="fa-duotone fa-images-user oini"></i> Ver proveedores</div>
                </a>
                <a href="home.php?pg=1625">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-sliders ca"></i> Perfil</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info5').style.display='flex';document.getElementById('inf12').style.display='flex';document.getElementById('inf11').style.display='none';void 0" Title="Informacion" id="inf11"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info5').style.display='none';document.getElementById('inf12').style.display='none';document.getElementById('inf11').style.display='flex';void 0" id="inf12"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info5" class="info">Estas son las opciones que tiene cada perfil como lo son las paginas que puede ver y las que tiene activas.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1605">
                    <div class="buini"><i class="fa-duotone fa-address-card oini"></i> Perfiles</div>
                </a>
                <a href="home.php?pg=1605&col=col">
                    <div class="buini"><i class="fa-duotone fa-clipboard-list-check oini"></i> Administrar</div>
                </a>
                <a href="home.php?pg=1613">
                    <div class="buini"><i class="fa-duotone fa-copy oini"></i> Ver Paginas</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-circle-user ca"></i> Usuario</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info9').style.display='flex';document.getElementById('inf20').style.display='flex';document.getElementById('inf19').style.display='none';void 0" Title="Informacion" id="inf19"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info9').style.display='none';document.getElementById('inf20').style.display='none';document.getElementById('inf19').style.display='flex';void 0" id="inf20"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info9" class="info">En esta parte puede ver los usuarios y datos personales de la cuenta que tiene la sesion activa.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1609&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Registrar</div>
                </a>
                <a href="home.php?pg=1609">
                    <div class="buini"><i class="fa-duotone fa-users-medical oini"></i> Ver usuarios</div>
                </a>
                <a href="home.php?pg=1615&ver=sis">
                    <div class="buini"><i class="fa-duotone fa-image-polaroid-user oini"></i> Datos personales</div>
                </a>
            </div>
        </div>
    </div>
<?php echo $tifi;     } else if ($_SESSION['per_id'] == 3){          echo $tiin;?>
    <!-------------------------------------------------Inicio de Empleado------------------------------------>
    <div class="caja">
            <h1><i class="fa-duotone fa-receipt ca"></i> Facturar</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info" class="info">Para iniciar el registro de las facturas aqui puede crear una y empezar a facturar porductos</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1601">
                    <div class="buini"><i class="fa-duotone fa-cart-shopping oini"></i> Vender</div>
                </a>
                <a href="home.php?pg=1602">
                    <div class="buini"><i class="fa-duotone fa-bags-shopping oini"></i> Comprar</div>
                </a>
                <a href="home.php?pg=1603">
                    <div class="buini"><i class="fa-duotone fa-memo-pad oini"></i> Detalle</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-square-plus ca"></i> Productos</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info1').style.display='flex';document.getElementById('inf4').style.display='flex';document.getElementById('inf3').style.display='none';void 0" Title="Informacion" id="inf3"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info1').style.display='none';document.getElementById('inf4').style.display='none';document.getElementById('inf3').style.display='flex';void 0" id="inf4"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info1" class="info">Para registrar un nuevo producto solo seleccione el boton nuevo para
                    registrar los productos que se veran reflejados en el inventario.
                </p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1623&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-cart-circle-plus oini"></i> Nuevo</div>
                </a>
                <a href="home.php?pg=1623">
                    <div class="buini"><i class="fa-duotone fa-pallet-boxes oini"></i> Ver productos</div>
                </a>
                <a href="home.php?pg=1623">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-cart-flatbed-boxes ca"></i> Inventario</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info2').style.display='flex';document.getElementById('inf6').style.display='flex';document.getElementById('inf5').style.display='none';void 0" Title="Informacion" id="inf5"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info2').style.display='none';document.getElementById('inf6').style.display='none';document.getElementById('inf5').style.display='flex';void 0" id="inf6"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info2" class="info">Aqui puede ver un registro total de los inventarios que lleva cada empresa.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1621">
                    <div class="buini"><i class="fa-duotone fa-garage oini"></i> Detalle</div>
                </a>
                <a href="home.php?pg=1621">
                    <div class="buini"><i class="fa-duotone fa-print-magnifying-glass oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-circle-user ca"></i> Clientes</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info3').style.display='flex';document.getElementById('inf8').style.display='flex';document.getElementById('inf7').style.display='none';void 0" Title="Informacion" id="inf7"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info3').style.display='none';document.getElementById('inf8').style.display='none';document.getElementById('inf7').style.display='flex';void 0" id="inf8"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info3" class="info">Aqui puedes crear agregar un nuevo cliente administrar los existentes y obtener un registro de todos ellos.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1630&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Registrar</div>
                </a>
                <a href="home.php?pg=1630">
                    <div class="buini"><i class="fa-duotone fa-users-medical oini"></i> Ver clientes</div>
                </a>
                <a href="home.php?pg=1630">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-box-open ca"></i> Proveedores</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info4').style.display='flex';document.getElementById('inf10').style.display='flex';document.getElementById('inf9').style.display='none';void 0" Title="Informacion" id="inf9"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info4').style.display='none';document.getElementById('inf10').style.display='none';document.getElementById('inf9').style.display='flex';void 0" id="inf10"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info4" class="info">En este apartado se almacenan los datos de los proveedores con los que comercializa para tener siempre el contacto.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1625&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-box-open-full oini"></i> Registrar</div>
                </a>
                <a href="home.php?pg=1625">
                    <div class="buini"><i class="fa-duotone fa-images-user oini"></i> Ver proveedores</div>
                </a>
                <a href="home.php?pg=1625">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
<?php echo $tifi;     } else if ($_SESSION['per_id'] == 4){          echo $tiin;?>
    <!-------------------------------------------------Inicio de Visitante------------------------------------>
       
    <div class="caja">
            <h1><i class="fa-duotone fa-user ca"></i> Datos personales</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info5').style.display='flex';document.getElementById('inf12').style.display='flex';document.getElementById('inf11').style.display='none';void 0" Title="Informacion" id="inf11"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info5').style.display='none';document.getElementById('inf12').style.display='none';document.getElementById('inf11').style.display='flex';void 0" id="inf12"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info5" class="info">Esta es una vista de la interfaz que compone nuestro sistema para iniciar con nosotros contacta con el administardor o si perdiste acceso contacta con la empresa encargada</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1615">
                    <div class="buini"><i class="fa-duotone fa-square-user oini"></i>Informacion de Usuario</div>
                </a>
                <a href="./vinfoper.php">
                    <div class="buini"><i class="fa-duotone fa-circle-info oini"></i>Como empezar</div>
                </a>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br>
<?php echo $tifi;}