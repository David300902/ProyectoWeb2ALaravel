@extends("main")


@section('title', 'Criticos')



@section('content')
<style>
    body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
}


 
h6 {
    font-size: 14px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}



</style>
<script>
    var app = angular.module("CriticoApp2", [])
    app.controller("CrticoController2", ($scope, $http)=>{
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
<div ng-app="CriticoApp2" ng-controller="CrticoController2" >
    <div class="card user-card-full" ng-repeat="i in criticos">
        <div class="row m-l-0 m-r-0">
            <div class="col-sm-4 bg-c-lite-green user-profile">
                <div class="card-block text-center text-white">
                    <div class="m-b-25">
                        <img src="@{{i.foto}}" width="220px"  class="img-radius" alt="User-Profile-Image">
                    </div>
                    <h6 class="f-w-600">@{{i.firstName}}</h6>
                    <p>Critico</p>
                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card-block">
                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Descripcion</h6>
                    <div class="row">
                        <h6>@{{i.descripcion}}</h6>
                    </div>
                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Perfil</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Ver Perfil</p>
                            <a href="/critico_info_view/@{{i.id}}" class="btn btn-primary"> @{{i.firstName}}</a>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Actualizado hace</p>
                            <h6 class="text-muted f-w-400">@{{i.date}} Dias</h6>
                        </div>
                    </div>
                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

@stop