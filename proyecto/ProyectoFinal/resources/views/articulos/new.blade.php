@extends('main')
@section('script')

<script>
    angular
    .module('EditCriticaApp', [])
    .controller("EditCriticaController", ($scope,$http)=>{
        $scope.critica = {}
        $http.get("/restaurantes").then(res => $scope.res = res.data)

        $scope.postArticulo = function(){
            $scope.critica.restauranteId = $scope.res.find(a => a.name == $scope.critica.restaurante).id
            $scope.critica.criticoId = Number(window.location.href.split('=')[1])
            $http.post("/articulo", $scope.critica).then(
                res=>{
                    window.location.href = "/"
                }
            )
        }
    })
</script>

@stop
@section('content')
<div ng-app="EditCriticaApp" ng-controller="EditCriticaController">
    <div>
        <h1>
            Nueva Critica
        </h1>
    </div>
    <form>
        <div class="form-group">
            <label for="txtFirstName">Titulo</label>
            <input id="txtFirstName" class="form-control" ng-model="critica.Titulo" />
        </div>
        <div class="form-group">
            <label for="txtNit">Contenido</label>
            <textarea ng-model="critica.contenido" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="txtBirthDate">Restaurante</label>
            <select class="form-select" name="" id="" ng-model="critica.restaurante">
                <option ng-repeat = "r in res" value="@{{r.name}}" class="form-control">@{{r.name}}</option>
            </select>
        </div>
        <button style="margin-top:20px;" ng-click="postArticulo()" class="btn btn-success">Agregar</a>
    </form>
</div>
@stop



