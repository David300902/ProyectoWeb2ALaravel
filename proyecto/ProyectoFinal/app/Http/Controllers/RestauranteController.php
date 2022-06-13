<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use App\Models\Articulo;
use Illuminate\Http\Request;
use DB;


class RestauranteController extends Controller
{
    public function getRestauranteByID($id){
        return Restaurante::where(["id" => $id])->first();
    }
    public function getAll()
    {
        return Restaurante::all();
    }
    //VIEWS
    public function listView()
    {
        return view("restaurantes.list");
    }

    public function getRestauranteView($id)
    {
        return view("restaurantes.completeview");
    }

    public function newView()
    {
        return view("restaurantes.new");
    }
public function editView()
{
    return view("restaurantes.edit");
}

    public function postRestaurante(Request $req)
    {
        Restaurante::create(
            [
                "name" => $req->name,
                "descripcion" => $req->descripcion,
                "direccion" => $req->direccion,
                "foto" => $req->foto,
                "userID" => $req->userID
            ]
        );
    }
    public function updateRestaurante(Request $req)
    {
        $res = Restaurante::where(["id" => $req->id])->first();
        $res->name = $req->name;
        $res->descripcion = $req->descripcion;
        $res->direccion = $req->direccion;
        $res->foto = $req->foto;

        $res->save();
    }

    public function deleteRestaurante($id)
    {
        try {
            DB::beginTransaction();
            Restaurante::where(["id" => $id])->first()->delete();
            $articulos = Articulo::where(["restauranteId" => $id])->delete();
            DB::commit();
        } catch (Exception $th) {
            DB::rollback();
            throw $th;
        }
        
    }
}
