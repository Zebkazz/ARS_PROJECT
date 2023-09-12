
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Accounting Record Software</title>

    <link rel="shortcut icon" href="./img/logo Redondo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="./css/inicio.css">

</head>
<body>
    <header class="mainsh">
        <?php 
        include("./views/cabe.php");
        ?>
    </header>
    <section id="bienvenido">
        <div class="bienvenido">
            <div class="bienvenido_text">
                <div class="bienvenido_bienvenido">
                    <h1>¡BIENVENIDO!</h1>
                </div>
                <h2>Somos Accounting Record Software</h2>
                <div class="flecha">
                    <a href="#proposit"><i class="fa-duotone fa-angles-down a"></i></a>
                </div>
            </div>
            <div class="menu_inicio">
                <?php 
                    include("./views/sesion/vini.php");
                    include("./views/sesion/volcon.php");
                ?>
            </div>
        </div>    
    </section>
  <!---------------------------------------------------------------Proposito-- - -------------------------------------------------------------------------------------->
  <p id="proposit"></p>
     <section id="proposito">
        <div class="container">
            <div class="text">
                <div>
                    <h1>Propósito<i class="fa-duotone fa-bullseye-arrow p" ></i></h1>
                </div>
                <h2>────────</h2>
                <p>Nuestro propósito como oraganizacion es ofrecer un software que permita 
                   realizar algunas tareas ruinarias de forma facil, agil  y sencilla de con
                   el objetivo de ahorrar tiempo y favorecer a nuestros clientes en sus pequeñas
                   o medianas empresas. Por esto queremos que los empresarios o personas naturales 
                   con nuestro proyecto <strong>ARS&copy</strong>, tengan la posibilidad
                   de registrar información oportuna y real que le aydude a gestionar los recursos  
                   con los que cuenta mediante comprobantes, registros, reportes y de poder 
                   llevar un pequeño inventario donde almacenar los registros contables recibos de 
                   factura y realizar reportes.
                </p>
            </div>
        </div>
        <div class="proposito_img">
            <img src="img/logo con texto.jpg"  alt="">
        </div>   
    </section>
<!---------------------------------------------------------------Nosotros-- - -------------------------------------------------------------------------------------->
    <section id="nosotros">
        <div class="container">
            <div class="description">
                <h1>¿Quienes Somos?</h1>
                <h2>───────────</h2>
                <p>Somos un grupo dedicados al desarrollo de software egresados del 
                   Centro De Desarrollo Agroempresarial Chía <strong>SENA</strong> con
                   el principal objetivo de ofrecer una buena calidad al usuario
                   final mediante estandares de diseño, seguridad, adaptabilidad y 
                  usabilidad que conlleven a una exelente experiencia al cliente y 
                   todo gracias a los integrantes de este grandioso proyecto.
                </p>
            </div>
            <div class="nosotros">
                <div class="d_nosotros">
                    <div class="circle">
                        <img src="img/logo redondo.png" alt="">
                        <br>
                        <h2>Sebas Castillo</h2>
                        <div class="cargo">
                            <h6>Dev Front-End Back-End</h6>
                        </div>
                    </div>
                    <p>Soy desarrollador de Back-End me encargo de la creación del código 
                       tengo conocimiento en diferentes lenguajes de programación y algunos
                       frameworks. Es el encargado del Back-end, el manejo de la base 
                       de datos en SQL y en verificar el diseño.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ----------------------------------------------------------------------Animacion------------------------------------------------------------------------------------------- -->
    <section class="empieza">
    <a href="" id="empeza"></a>
        <div class="empezar" id="empezar">
            <div class="fondo">
                 <img src="img/one1.svg" class="fondo__img" alt="">
            </div>
                <div class="empezar">
                    <h1 class="empezar__titulo">!Te damos la Bienvenida¡</h1>
                    <img src="img/sinFondo.png" alt="" class="empezar__img">
                <div class="titulo2">
                    <h2 class="empezar__titulo2">Accounting Record Software</h2>
                </div>
                <div class="boton"> 
                    <button id="anima"class="empezar__boton">Empezar <i class="a fa-duotone fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------------CONTACTO------------------------------------------------------------------------------------------- -->
    <a href="" id="contact"></a>
    <section id="contacto">
        <div class="conta">
            <div class="text">
                <h1>Contacto <i class="fa-duotone fa-id-card-clip c"></i></h1>
                <h2>─────────</h2>
                <p>Para nosotros es de vital importancias las las opiniones y dudas que 
                    surgen por este motivo te damos los medios por donde te puedes contactar
                    para asi poder ayudarte no olvides que tamnie te puedes comunicar por 
                    nuestras redes sociales, escríbenos o llámanos, estamos siempre para tí.
                </p>
                <div class="info">
                    <span>Telefono:</span>
                    <a href=""><i class="fa-duotone fa-phone"></i> +57 3144140910</a>
                    <span>Instagram:</span>
                    <a href=""><i class="fa-brands fa-instagram"></i> @accountig_record_software</a>
                    <span>Correo:</span>
                    <a href=""><i class="fa-duotone fa-envelope"></i> accountingrecordsoftware@gmail.com</a>
                    <span>Sede Administrativa:</span>
                    <a href=""><i class="fa-duotone fa-location-dot"></i> Chia Cra 5 #236-21</a>
                </div>
            </div>    
            <div class="img">
            </div>
        </div>    
    </section >
    <footer>
        <?php
            include("./views/footer.php");
        ?>
    </footer>    
</body>
    <script src="js/inicio.js"></script>
</html>
