@extends("main")


@section('title', 'Index')

@section('content')

<style>
    .img-div {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .inicia {
        display: flex;
        flex-direction: row;
        font-size: 24pt;
        color: black;
        background-color: white;
        justify-content: space-evenly;
        height: 300px;
        width: 100%;
        border-radius: 20px;
        background-color: rgba(221, 192, 255, 0.37);
    }
    .inicia a {
        height: 100px;
        margin-top: 105px;
    }
    .inicia h1 {
        margin-top: 120px;
    }
    h1 {
        font-size: 1.5em;
    }
    .btn-c {
        width: 24%;
        font-size: 1.5em;
    }
    #banner {
        background: url(https://img.freepik.com/foto-gratis/fondo-bloques-voronoi-extruido-azul-abstracto-muro-corporativo-limpio-luz-minima-ilustracion-superficie-geometrica-3d-desplazamiento-elementos-poligonales_1217-2510.jpg);
        height: 250px;
        color: white;
        font-size: 100px;
        text-align: center;
        padding: 35px;
        border-radius: 0 0 20px 20px;
    }
    .cuerpo-cajas {
        display: flex;
        flex-direction: column;
        font-size: 24pt;
        color: black;
        background-color: rgba(255, 255, 255, 0.274);
        justify-content: space-evenly;
        width: 98%;
        margin: 0 0 0 1%;
    }
    #caja-inicio {
        border-radius: 20px 20px 0 0;
        display: flex;
        flex-direction: row;
        height: 500px;
    }
    #caja-inicio img{
        width: 30%;
        height: 300px;
        margin-top: 100px;
    }
    #caja-media {
        flex-direction: column;
        font-size: 28px;
        font-weight: bold;
        align-items: center;
        color: black;
        height: 600px;
    }
    #caja-media .carta-i{
        width: 70%;
        text-align: center;
        
    }
    .carta-cartas{
        width:100%;
        display: flex;
        flex-direction: row;
        font-weight: lighter;
        text-align: center;
        justify-content: space-evenly;
    }
    .carta {
        margin: 25px;
        padding: 20px;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.137);
        box-shadow: 10px 10px rgba(0, 0, 0, 0.781);
    }
    #caja-fin {
        border-radius: 0 0 20px 20px;
        align-items: center;
        height: 400px;
    }
    #caja-fin p {
        width: 85%;
        border: 2px solid black;
        border-radius: 20px;
        padding: 20px;

    }
    .carta-views 
    {
        --w: calc(100%/3 - 20px);
        border-style: solid;
        width: var(--w);
        text-align: center;
        padding: 20px;
        border-width: 4px;
        border-radius: 20px;
        transition: all 0.6s;
        border-color: green;
        cursor: pointer;
        background: linear-gradient(45deg, green 30%, yellow 70%);

    }
    
    .carta-views:hover{
        width: calc(var(--w) + 50px);
        margin: 0px 50px;
    }


</style>

<div id="banner">
    Criticas
</div>

<div class="inicia">
    <h1>Sin cuenta registrate</h1>
    <a class="btn btn-danger btn-c" href="/register">Empezar</a>
</div>

<div class="cuerpo-cajas" id="caja-inicio">
    <img src="https://blogely.com/wp-content/uploads/brizy/imgs/Business-grow-221x196x0x13x221x170x1625646776.png" alt="">
    <img src="https://blogely.com/wp-content/uploads/2020/06/4-2marketing-expert.svg" alt="">
    <img src="https://blogely.com/wp-content/uploads/2020/06/12-collaboration-2.svg" alt="">
</div>

<div class="cuerpo-cajas" id="caja-media">
    <div class="carta-i">
        <p>Ver</p>
    </div>
    <div class="carta-cartas">
        <div class="carta-views">
            Cricticos
        </div>
        <div class="carta-views">
            Restaurantes
        </div>
        <div class="carta-views">
            Articulos
        </div>
    </div>
</div>

<div class="cuerpo-cajas" id="caja-fin">
    <p></p>
</div>

<script>
    document.querySelector("#btnEmpezar").addEventListener("click", () => {
        window.location.href = "/login";
    })
</script>

@stop