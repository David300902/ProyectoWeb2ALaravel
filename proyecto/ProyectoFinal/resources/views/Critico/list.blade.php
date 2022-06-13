@extends("main")


@section('title', 'Criticos')

@section('script')

<script>
    var app = angular.module("CriticoApp", [])

    app.controller("CrticoController", ($scope, $http)=>{

    $scope.criticos = {}

    $scope.getAll = function (){
        $http.get('/criticos').then(res=>{
            $scope.criticos = res.data
            $scope.criticos.forEach(a => {
                let date = a.created_at
                console.log(date);
                let diff = new Date(date).getUTCDate() - new Date().getUTCDate()
                a.date = diff<0?0:diff
            })
        })
    }
    $scope.getAll();
})

</script>
@stop
@section('content')
<div ng-app="CriticoApp" ng-controller="CrticoController" class="container">
    <div class="card text-center" ng-repeat="d in criticos">
        <div class="card-header">
        @{{d.firstName}}
            @{{d.lastName}}
        </div>
        <div class="card-body">
            <h5 class="card-title"><img src="@{{d.foto}}" alt="no se encontro" width="150" height="100"></h5>
            <p class="card-text">@{{d.descripcion}}</p>
            <a href="/critico_info_view/@{{d.id}}" class="btn btn-primary">Ver mas detalles sobre @{{d.firstName}}</a>
        </div>
        <div class="card-footer text-muted">
            Hace @{{d.date}} dias
        </div>
    </div>
</div>
@stop