<?php

namespace App\Http\Controllers;

use App\Services\UsuariosService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $usuariosService;

    public function __construct(UsuariosService $usuariosService)
    {
        $this->usuariosService = $usuariosService;
    }

    public function getAll()
    {
        return response()->json($this->usuariosService->getAll());
    }

    public function getPorId($id)
    {
               return response()->json($this->usuariosService->getPorId($id), 201);
    }

    public function post(Request $request)
    {

        $usuario = $this->usuariosService->post($request);
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $usuario = $this->usuariosService->update($request, $id);
        return response()->json($usuario, 201);
    }

    public function delete($id)
    {
        return response()->json($this->usuariosService->delete($id), 201);
    }
}
