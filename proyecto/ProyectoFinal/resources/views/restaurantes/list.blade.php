@extends("main")
@section('title', 'Restaurantes')
@section('script')
<script>
    var app = angular.module("RestauranteApp", [])
    app.controller("RestauranteController", ($scope, $http)=>{
    $scope.restaurantes = {}
    $scope.getAll = function (){
        $http.get('/restaurantes').then(res=>{
            $scope.restaurantes = res.data
        })
    }
    $scope.deleteRestaurante = function (id) {
        $http.delete("/restaurantes/" + id).then(
            res => {
                $scope.getAll();
            }
        )
    }
    $scope.getAll();
})
</script>
@stop
@section('content')
<div ng-app="RestauranteApp" ng-controller="RestauranteController" class="container">
    <div class="text-center bg-primary" style="color:white; font-weigth: normal;">
        <h1>
            Restaurantes
        </h1>
    </div>
    @if (Auth::check() && Auth::user()->name == "jugg")
    <div>
        <a href="/restaurantenewview">Añadir Restaurante</a>
    </div>
    @endif
    <div class="card text-center" ng-repeat="r in restaurantes">
        <div class="card-header">
            @{{r.name}}
        </div>
        <div class="card-body">
            <h5 class="card-title"><img src="@{{r.foto}}" alt="no se encontro" width="150" height="100"></h5>
            <p class="card-text">@{{r.descripcion}}</p>
            @if (Auth::check() && Auth::user()->name == "jugg")
            <a href="/restauranteeditview?id=@{{r.id}}" class="btn btn-info">Editar</a>
            <button ng-click = "deleteRestaurante(r.id)" class="btn btn-danger">Eliminar</button>
            @endif
            <a href="/restaurante/@{{r.id}}" class="btn btn-success">Ver mas detalles sobre @{{r.name}}</a>
        </div>
    </div>
</div>
@stop