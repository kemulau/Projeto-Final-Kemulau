<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Compra;
use App\Models\CompraItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CatalogoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('catalogo.index', compact('produtos'));
    }

public function adicionar(Request $request, Produto $produto)
{
    $carrinho = session()->get('carrinho', []);

    $quantidade = $request->input('quantidade', 1);

    // Se já existe, soma
    if (isset($carrinho[$produto->id])) {
        $carrinho[$produto->id] += $quantidade;
    } else {
        $carrinho[$produto->id] = $quantidade;
    }

    session(['carrinho' => $carrinho]);

    return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
}

}
