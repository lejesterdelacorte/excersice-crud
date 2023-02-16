<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function index(){
        return view('usuarios.showUser', [
            'users' => Usuario::all(),
        ]);
    }

    public function store(Request $request){
        $lastIdArr = DB::select('SELECT ID FROM usuarios ORDER BY ID DESC LIMIT 1');
        $lastId = $lastIdArr[0]->ID;
        $validated = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|integer'
        ]);
        Usuario::create([
            'ID'=> $lastId+=1,
            'NOMBRE'=> $request->get('name'),
            'EDAD'=> $request->get('age'),
            'SEXO'=>$request->get('gender'),
            'ROLID'=>$request->get('role')
        ]);
        //REUTILIZAR EL CODIGO
        return self::redirectMainPage();
    }

    public function create() {
        //RETURN VIEW A LA VISTA PARA CARGAR EL USUARIO
        return view('usuarios.createUser', [
            'roles'=> Rol::all()
        ]);
    }

    public function show($id) {
        //RETURN VIEW A LA VISTA CON EL USUARIO DESEADO (REVISAR QUE LLEGA)
        $userSearch = Usuario::where('id', $id)->get();
        return response()->json([
            'usuarios' => $userSearch
        ]);
    }

    public function update(Request $request, $id) {
        //UPDATE DE USUARIO DESEADO
        $validated = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|integer'
        ]);
        $user = Usuario::where('id', $id)->update([
            'NOMBRE'=>$request->get('name'),
            'EDAD'=>$request->get('age'),
            'SEXO'=>$request->get('gender'),
            'ROLID'=>$request->get('role'),
        ]);
        //RETORNAR LA VISTA
        return self::redirectMainPage();
    }
    
    public function edit($id) {
        //RETORNAR VISTA PARA EDITAR USUARIO
        $userToEdit = Usuario::where('id', $id)->first();
        return view('usuarios.editUser', [
            'usuario'=> $userToEdit,
            'roles'=> Rol::all()
        ]);
    }

    public function destroy($id) {
        //HACER COMPROBACION
       Usuario::where('id', $id)->delete();
       return self::redirectMainPage();
    }

    private static function redirectMainPage(){
        return redirect()->route('usuarios.index', [
            'users' => Usuario::all()
        ]);
    }

    public function sendData(){
        $users = DB::select('SELECT COUNT(*) as personas FROM usuarios GROUP BY SEXO');
        $users = [$users[0], $users[1]];
        return response()->json(json_encode($users));
    }
}
