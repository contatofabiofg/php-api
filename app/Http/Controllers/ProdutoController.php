<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProdutoController extends Controller
{
    public function getAll() {

        $produto = new ProdutoService();
        return response()->json($produto->getAll());
    }

    public function store(Request $request): JsonResponse {
        $produto = Produto::create([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'estoque' => $request->input('estoque')
        ]);

        return response()->json($produto, 201);
    }

    public function show($id) {
        return Produto::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return response()->json($produto, 200);
    }

    public function destroy($id) {
        Produto::destroy($id);

        return response()->json(null, 204);
    }
}

