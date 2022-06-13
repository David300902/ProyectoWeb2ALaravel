@extends("main")
@section("title", "Ciritca")

@section("script")
<script>
    angular
    .module("ArticleView", [])
    .controller("ArticleViewController", ($scope, $http)=>{
        $scope.adata = {}
        let id = window.location.href.split('=')[1]
        $scope.del = function (id) {
            alert(id)
        }
    })
</script>
@stop 
@section("content")
<div class="bg-primary">
    <h1 style="text-align: center; color:white;font-weight: normal;">
        Critica
    </h1>
</div>
<div ng-app = "ArticleView" ng-controller = "ArticleViewController" style="margin-top: 10%;">
    <div class="container" style="border: 1px dashed rgb(66, 133, 244);">
        <h1 style="text-align: center;">
            {{$data["articulo"]["Titulo"]}}
        </h1>
            <div class="m-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <h2 class="card-title" style="text-align: center;">
                                    <p class="card-text">
                                        Restaurante {{$data['restaurante']['name']}}
                                    </p>
                                </h2>
                                <img  class="img-center" src="{{$data['restaurante']['foto']}}" alt="Sin foto" width="100%" height="50%">
                                <div>
                                    <p class="card-text">
                                    {{$data['articulo']['contenido']}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div style="display: flex;align-items: center;justify-content: center;">
                                <img  class="img-center" src="{{$data['critico']['foto']}}" alt="Sin foto" width="20%" height="20%">
                            </div>
                            <div  style="display: flex;align-items: center;justify-content: center;">
                                <h4 >Critica Por {{$data['critico']['firstName']}} {{$data['critico']['lastName']}} <a href="/critico_info_view/{{$data['critico']['id']}}" >Ver mas detalles sobre {{$data['critico']['firstName']}}</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@stop 