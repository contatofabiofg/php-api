<?php

namespace App\Services;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class UsuariosService
{
    public function getAll(): Collection
    {
        return Usuario::get();
    }

    public function getPorId($id)
    {
        return Usuario::findOrFail($id);
    }

    public function post($request)
    {
        $uuid = Str::uuid();

        $usuario = Usuario::create([
            'id' => $uuid,
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'senha' => bcrypt($request->input('senha'))
        ]);

        return $usuario;
    }

    public function update($request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return $usuario;
    }

    public function delete($id)
    {
        Usuario::destroy($id);

        return response()->json(null, 204);
    }
}
