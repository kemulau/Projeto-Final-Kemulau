<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Cliente;
use App\Models\SaidaEstoque;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SaidaEstoqueController extends Controller
{
    public function index()
    {
        // Buscando os relacionamentos necessários
        $saida_estoques = SaidaEstoque::with(['produto.unidade', 'produto.categoria', 'cliente'])->get();
        
        return view('saida_estoques.index', compact('saida_estoques'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::where('estoque', '>', 0)->get();
        
        return view('saida_estoques.create', compact('clientes', 'produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id',
            'id_produto' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $produto = Produto::findOrFail($request->id_produto);

        if ($produto->estoque < $request->quantidade) {
            return redirect()->back()->withErrors(['quantidade' => 'Estoque insuficiente para esta saída.']);
        }

        $valorTotal = $produto->valor_unitario * $request->quantidade;

        $saida_estoque = SaidaEstoque::create([
            'id_cliente' => $request->id_cliente,
            'id_produto' => $request->id_produto,
            'quantidade' => $request->quantidade,
            'data_saida_estoque' => now(),
            'valor_total' => $valorTotal,
        ]);

        $produto->decrement('estoque', $request->quantidade);

        $qrcode = QrCode::size(200)->generate(route('saida_estoques.index'));

        return view('saida_estoques.qrcode', compact('qrcode', 'saida_estoque'));
    }
}
