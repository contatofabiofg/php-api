<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\UsuariosService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Listar todos os usuários
    public function getAll() {
        $usuariosService = new UsuariosService();

        return Usuario::all();
    }

    // Criar um novo usuário
    public function store(Request $request) {
        $usuario = Usuario::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'senha' => bcrypt($request->input('senha'))
        ]);

        return response()->json($usuario, 201);
    }

    // Buscar um usuário pelo ID
    public function show($id) {
        return Usuario::findOrFail($id);
    }

    // Atualizar um usuário
    public function update(Request $request, $id) {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }

    // Excluir um usuário
    public function destroy($id) {
        Usuario::destroy($id);

        return response()->json(null, 204);
    }
}

