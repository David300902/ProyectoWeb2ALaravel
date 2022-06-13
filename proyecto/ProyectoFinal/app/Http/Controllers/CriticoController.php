<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Critico;
use App\Models\Articulo;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
class CriticoController extends Controller
{
    public function getListCritico(){
        return view('Critico.list');
    }

    public function getCrticoById($id){
        return Critico::where(["id" => $id])->first();
    }

    public function getCriticos(){
        return  Critico::all();
    }

    public function getCriticoInfoView(){
        return view('Critico.info');
    }

    public function getPerfiles(){
        return view('Critico.perfiles');
    }

    public function getCurrentUser($id)
    {
        return view("Critico.perfil");
    }

    public function getPerfil($id)
    {
        return Critico::where(["userID" => $id])->first();
    }

    public function getFullUserInfo($id)
    {
        $critico = Critico::where(["id" => $id])->first();
        $user = User::where(["id"=>$critico->userID])->first();
        return ["user"=>$user, "critico"=>$critico];
    }

    public function getEditProfileView()
    {
        return view("Critico.edit");
    }
    public function updateProfile(Request $req)
    {
        try {
            DB::beginTransaction();
            $critico = Critico::where(["id" => $req->id])->first();
            $user = User::where(["id"=>$critico->userID])->first();

            $critico->firstName = $req->firstName;
            $critico->lastName = $req->lastName;
            $critico->descripcion = $req->descripcion;
            $critico->foto = $req->foto;

            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->name = $req->name;

            $critico->save();
            $user->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

    public function deleteCritico($id)
    {
        try {
            DB::beginTransaction();
            $critico = Critico::where(["id" => $id])->first();
            $user = User::where(["id"=>$critico->userID])->first();
            $articulos = Articulo::where(["criticoId" => $critico->id]);
            $critico->delete();
            $user->delete();
            $articulos->delete();
            DB::commit();
        } catch (Exception $th) {
            DB::rollback();
        }
    }
}
