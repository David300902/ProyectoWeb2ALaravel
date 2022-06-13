@extends("main")


@section('title', 'Criticos')

@section('script')

@stop

@section('content')
<style>
  body{margin-top:20px;}
.card-style1 {
    box-shadow: 0px 0px 10px 0px rgb(89 75 128 / 9%);
}
.border-0 {
    border: 0!important;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
}

section {
    padding: 120px 0;
    overflow: hidden;
    background: #fff;
}
.mb-2-3, .my-2-3 {
    margin-bottom: 2.3rem;
}

.section-title {
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 10px;
    position: relative;
    display: inline-block;
}
.text-primary {
    color: #ceaa4d !important;
}
.text-secondary {
    color: #15395A !important;
}
.font-weight-600 {
    font-weight: 600;
}
.display-26 {
    font-size: 1.3rem;
}

@media screen and (min-width: 992px){
    .p-lg-7 {
        padding: 4rem;
    }
}
@media screen and (min-width: 768px){
    .p-md-6 {
        padding: 3.5rem;
    }
}
@media screen and (min-width: 576px){
    .p-sm-2-3 {
        padding: 2.3rem;
    }
}
.p-1-9 {
    padding: 1.9rem;
}

.bg-secondary {
    background: #15395A !important;
}
@media screen and (min-width: 576px){
    .pe-sm-6, .px-sm-6 {
        padding-right: 3.5rem;
    }
}
@media screen and (min-width: 576px){
    .ps-sm-6, .px-sm-6 {
        padding-left: 3.5rem;
    }
}
.pe-1-9, .px-1-9 {
    padding-right: 1.9rem;
}
.ps-1-9, .px-1-9 {
    padding-left: 1.9rem;
}
.pb-1-9, .py-1-9 {
    padding-bottom: 1.9rem;
}
.pt-1-9, .py-1-9 {
    padding-top: 1.9rem;
}
.mb-1-9, .my-1-9 {
    margin-bottom: 1.9rem;
}
@media (min-width: 992px){
    .d-lg-inline-block {
        display: inline-block!important;
    }
}
.rounded {
    border-radius: 0.25rem!important;
}
</style>
<script>
      var app = angular.module("CriticoInfoApp", [])
      app.controller("CriticoInfoController", ($scope, $http)=>{
        $scope.critico = {}
        console.log("asdsad");
        $scope.restaurantes = []
        $scope.cardData = []
        let id = window.location.href.split('/')[4]
        $scope.getCritico = function(){
            $http
            .get('/criticos/' + id)
            .then(
                res => {
                    $scope.critico = res.data
                    $http
                    .get(`/articulos/` + id)
                    .then(
                        res2 => {
                            $scope.articulos = res2.data
                            for (const { id, restauranteId } of $scope.articulos){
                                $http
                                .get('/restaurantes/' + restauranteId)
                                .then(
                                    res3 => {
                                        $scope.cardData.push(
                                            {
                                                name : res3.data.name,
                                                id,
                                                photoUrl: res3.data.foto
                                            }
                                        )
                                    }
                                )
                            }
                        }
                    )
                }
            )
            console.log($scope.cardData);
        }
        $scope.getCritico();
      })
</script>
<div ng-app="CriticoInfoApp" ng-controller="CriticoInfoController">
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="@{{critico.foto}}" width="600px" alt="...">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0">@{{critico.firstName}} @{{critico.lastName}}</h3>
                                    <span class="text-primary">Critico</span>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Posicion:</span> Cirtico</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Experiencia:</span> 10 Years</li>
                                </ul>
                                <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                    <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div>
                    <span class="section-title text-primary mb-3 mb-sm-4">Sobre Mi</span>
                    <p>@{{critico.descripcion}}</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5">
                        <div class="mb-4 mb-sm-5">
                            <span class="section-title text-primary mb-3 mb-sm-4">Cantidad Criticas</span>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6 text-end">80</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                            </div>
                        </div>
                        <div>
                        </div>
                        <div >
                            <h1>Criticas de @{{critico.firstName}}</h1>
                        </div>
                        <div class="card text-center" ng-repeat="r in cardData">
                            <div class="card-header">
                                @{{r.name}}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><img src="@{{r.photoUrl}}" alt="no se encontro" width="150" height="100"></h5>
                                <p class="card-text"></p>
                                <a href="/articulofullview/@{{r.id}}" class="btn btn-success">Ver critica completa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@stop