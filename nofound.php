<link rel="stylesheet" href="./css/fonts.css">
<style>
    *{
        background-color: #e9e9ff;
        overflow: hidden;
    }
    .imgf{
        height: auto;
        margin: 50px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }
    img{
        width: 30vw;
        border-radius: 10%;
    }
    h1, h3{ 
        font-size: 2.5rem;
        text-align: center;
        font-family: 'nunito-900';
        color: #6c63ff;
        letter-spacing: 2px;
    }
    h3{
        font-size: 1.2rem;
        color: #000; 
        font-family: 'nunito-800';
        letter-spacing: 0px;
    }
    .bot{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        padding-bottom: 10px;
    }
    button{
        width: 200px;
        height: 50px;
        border-radius: 20px;
        background-color: #6c63ff;
        color: #f2e9ff;
        border: 0px solid;
        font-family: 'nunito-700';
        font-size: 1.3rem;
        transition: all 100ms;
    }
    .l{
        width: 300px;
    }
    .l:hover{
        width: 305px;
    }
    button:hover{
        width: 205px;
        height: 55px;
        border-radius: 20px;
        background-color: #514abd;
        border: 0px solid;
        font-size: 1.4rem;
    }

</style>
    <div class="imgf"><img src="./img/three.svg" alt="">
</div>
    <h1>ADVERTENCIA</h1>
    <h3>Se esta redirigiendo a un lugar desconocido o usted no tiene permiso para ver esta pagina, por favor contactese <br>
        con el administrador para acceder a ella.</h3>

<div class="bot">
    <button type="button" onclick="window.location='home.php?pg=999';" >Volver
    </button>
</div>
<div class="bot">
    <button class="l" type="button" onclick="window.location='views/vsal.php';" >Salir al menu principal
    </button>
</div>