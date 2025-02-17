<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function produtosComESemEstoque()
    {
        $produtosComEstoque = Produto::where('estoque', '>', 0)->with(['categoria'])->get();
        $produtosSemEstoque = Produto::where('estoque', '<=', 0)->with(['categoria'])->get();

        return view('relatorios.relatorio_produtos', compact('produtosComEstoque', 'produtosSemEstoque'));
    }
}
