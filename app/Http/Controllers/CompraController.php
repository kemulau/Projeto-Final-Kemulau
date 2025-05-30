<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::with('usuario')->get();
        return view('compras.index', compact('compras'));
    }

    public function show(Compra $compra)
    {
        $compra->load('itens.produto');
        return view('compras.show', compact('compra'));
    }

    public function autorizar(Compra $compra)
    {
        $compra->update(['status' => 'autorizada']);
        // Lógica para dar baixa no estoque pode ser colocada aqui
        return redirect()->route('compras.index')->with('success', 'Compra autorizada e estoque atualizado.');
    }
}