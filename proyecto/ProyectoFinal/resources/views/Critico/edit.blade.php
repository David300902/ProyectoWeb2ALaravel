@extends('main')
@section('script')
<script>
    angular.module('EditCriticoApp', [])
    .controller("EditCriticoController", ($scope,$http)=>{
        let id = window.location.href.split("=")[1]
        $http.get("/perfilcomplete/"+id).then(
            res => {
                $scope.critico = {}
                Object.getOwnPropertyNames(res.data.critico).forEach(a => {
                    $scope.critico[a] = res.data.critico[a]
                })
                Object.getOwnPropertyNames(res.data.user).forEach(a => {
                    if (a == "id"){
                        $scope.critico["userID"] = res.data.user[a]
                    }else{
                        $scope.critico[a] = res.data.user[a]
                    }
                })
                console.log($scope.critico);
            }
        )
        $scope.updateProfile = function () {
            $http.put("/perfil", $scope.critico).then(res => {
                window.location.href = "/perfilview/" + $scope.critico.userID
            })
        }
    })
</script>
@stop
@section('content')
<div ng-app="EditCriticoApp" ng-controller="EditCriticoController">
    <div>
        <h1>
            Editar Perfil de @{{critico.firstName}}
        </h1>
    </div>
    <form>
        <div class="form-group">
            <label for="txtFirstName">Nombre</label>
            <input id="txtFirstName" class="form-control" ng-model="critico.firstName" />
        </div>
        <div class="form-group">
            <label for="txtLastName">Apellido</label>
            <input ng-model="critico.lastName" id="txtLastName" class="form-control" />
        </div>
        <div class="form-group">
            <label for="txtNit">Descripcion</label>
            <textarea ng-model="critico.descripcion" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="txtBirthDate">Foto</label>
            <input id="txtBirthDate" class="form-control" ng-model="critico.foto" type="text" name="birthDate"/>
        </div>
        <div>
            <h1>
                Datos de usuario
            </h1>
        </div>

        <div class="form-group">
            <label for="txtUsername">Username</label>
            <input id="txtUsername" class="form-control" ng-model="critico.name" />
        </div>
        <div class="form-group">
            <label for="txtEmail">Email</label>
            <input id="txtEmail" class="form-control" ng-model="critico.email" />
        </div>
        <div class="form-group">
            <label for="txtPassword">Password</label>
            <input id="txtPassword" class="form-control" type="password" ng-model="critico.password" />
        </div>
        <button style="margin-top:20px;" ng-click="updateProfile()" class="btn btn-success">Actualizar</a>
    </form>
</div>

@stop