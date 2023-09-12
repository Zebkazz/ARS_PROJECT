/*------------------------------------------ Selector de menu ------------------------------------------*/
if(window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
  }
let seleccion = [".opc",".opc1",".opc2",".opc3"];
function sel(val) {
    for (n = 0; n < 4; n++) {var opcion = document.querySelector(seleccion[n]);
        opcion.classList.remove("opc_move");}
    if (val == "opc") {var opcion = document.querySelector(".opc");
        opcion.classList.add("opc_move");
    }else if (val == "opc1") {var opcion = document.querySelector(".opc1");
        opcion.classList.add("opc_move");
    }else if (val == "opc2") {var opcion = document.querySelector(".opc2");
        opcion.classList.add("opc_move");
    }else if (val == "opc3") {var opcion = document.querySelector(".opc3");
        opcion.classList.add("opc_move");
    }
}

/*-------------------------------------- Cambio inicio de sesion ---------------------------------------*/
// document.getElementById('ini__ini').onclick=ocultar;
// document.getElementById('ini__inise').onclick=ocultar;
document.getElementById('ini__inis').onclick=ocultar;
function ocultar(){
    document.getElementById('ini').style.display="flex";
    document.getElementById('olvcon').style.display="none";
}
document.getElementById('olv__con').onclick=ocultar2;
function ocultar2(){
    document.getElementById('ini').style.display="none";
    document.getElementById('olvcon').style.display="flex";
}
/*-------------------------------------- Menu Responsive ---------------------------------------*/
document.getElementById('mains').onclick=mostrar;
    var mains = document.querySelector('.mainsh');
    var infoalert = document.querySelector('.alert-warning');
    var infoalert2 = document.querySelector('.alert-warning2');
    var infoalert3 = document.querySelector('.alert-warning3');

function mostrar(){
    mains.classList.toggle('mainsh_move');
    if(infoalert){
        infoalert.classList.toggle('alert-warning_move');
    }else if(infoalert2){
        infoalert2.classList.toggle('alert-warning_move2');
    }else if(infoalert3){
        infoalert3.classList.toggle('alert-warning_move3');
    }else{
        
    }
}
// -------------------------------------------Inicio empresa-------------------------------
var valinem = document.getElementById('mosempin');
if(valinem){
    setTimeout(anin, 800)
    function anin(){
        document.getElementById("ini").style.height="370px";
        document.getElementById("ini").style.transition="All 1000ms"; 
        document.getElementById("mostsivl").style.height="65px"; 
        document.getElementById("mostsivl").style.transition="All 1000ms"; 
        setTimeout(fininic, 30000)
        function fininic(){
            window.location.href='index.php';
        }
    }
}

/*--------------------------------------------------- Empezar ------------------------------------------*/
document.getElementById("anima").addEventListener("click", anima);
    var fondo = document.querySelector(".fondo");
    var titulo1 = document.querySelector(".empezar__titulo");
    var titulo2 = document.querySelector(".empezar__titulo2");
    var img =document.querySelector(".empezar__img");
    var boton = document.querySelector(".empezar__boton");
function anima(){
    animacion1();
    function animacion(){
        window.location.href='index.php';
    }
    setTimeout(animacion,3500);
}
function animacion1(){
    fondo.classList.remove("fondo");
    fondo.classList.add("fondo_move");
    titulo1.classList.remove("empezar__titulo");
    titulo1.classList.add("empezar__titulo_move");
    img.classList.remove("empezar__img");
    img.classList.add("empezar__img_move");
    titulo2.classList.remove("empezar__titulo2");
    titulo2.classList.add("empezar__titulo2_move");
    boton.classList.remove("empezar__boton");
    boton.classList.add("empezar__boton_move");
}

