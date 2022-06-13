<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Restaurante;
use App\Models\Critico;

class ArticuloController extends Controller
{
    public function getByCriticoId($id){
        return ["articulos" => Articulo::where(["criticoId" => $id])];
    }

    public function getArticulos(){
        return Articulo::all();
    }

    public function getArticuloById($id)
    {
        return Articulo::where(["id" => $id])->first();
    }

    public function getArticulosByCriticoID($id){
        return Articulo::where(['criticoId' => intval($id)])->get();
    }
    public function getArticulosByRestauranteID($id){
        return Articulo::where(['restauranteId' => intval($id)])->get();
    }
    //VIEWS

    public function getArticuloView($id)
    {
        $art = Articulo::where(["id" => $id])->first();
        $data = [
            "articulo"=> $art,
            "critico"=>Critico::where(["id"=>$art["criticoId"]])->first(),
            "restaurante"=>Restaurante::where(["id"=>$art["restauranteId"]])->first()
        ]; 
        return view("articulos.completeview", ["data" => $data]);
    }

    public function newView()
    {
        return view("articulos.new");
    }
    public function editView()
    {
        return view("articulos.edit");
    }

    public function postArticulo(Request $req)
    {
        Articulo::create([
            "Titulo" => $req->Titulo,
            "contenido" => $req->contenido,
            "restauranteId" => $req->restauranteId,
            "criticoId" => $req->criticoId
        ]);
    }

    public function updateArticulo(Request $req)
    {
        $articulo = Articulo::where(["id"=>$req->id])->first();
        $articulo->Titulo = $req->Titulo;
        $articulo->contenido = $req->contenido;
        $articulo->restauranteId = $req->restauranteId;
        $articulo->save();
    }

    public function deleteArticulo($id)
    {
        Articulo::where(["id" => $id])->first()->delete();
    }
}
