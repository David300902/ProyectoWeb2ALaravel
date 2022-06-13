@extends('main')
@section('script')
<script>
    angular
    .module('EditCriticaApp', [])
    .controller("EditCriticaController", ($scope,$http)=>{
        $scope.restaurante = {}

        $scope.addRestaurante = function(){
            $scope.restaurante.userID = Number(document.querySelector("#__").value)
            console.log($scope.restaurante);                
            $http.post("/restaurantes", $scope.restaurante).then(
                res=>{
                    window.location.href = "/restauranteslistview"
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
            Nuevo Restaurante
        </h1>
    </div>
    <form>
        <div class="form-group">
            <label for="txtFirstName">Nombre</label>
            <input id="txtFirstName" class="form-control" ng-model="restaurante.name"/>
        </div>
        <div class="form-group">
            <label for="txtNit">Descripcion</label>
            <textarea ng-model="restaurante.descripcion" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="txtBirthDate">Direccion</label>
            <input type="text" ng-model="restaurante.direccion" name="" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="txtBirthDate">Foto</label>
            <input type="text" ng-model="restaurante.foto" name="" id="" class="form-control">
        </div>
        <input type="hidden" value="{{Auth::user()->id}}" id="__">
        <button style="margin-top:20px;" ng-click="addRestaurante()" class="btn btn-success">Agregar</a>
    </form>
</div>
@stop


