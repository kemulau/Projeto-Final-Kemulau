<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Compra;
use App\Models\CompraItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\WhatsAppService;

class CarrinhoController extends Controller
{
    // Mostra os produtos adicionados no carrinho
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        $produtos = Produto::find(array_keys($carrinho));

        $itens = [];
        $total = 0;

        foreach ($produtos as $produto) {
            $quantidade = $carrinho[$produto->id];
            $subtotal = $quantidade * $produto->valor_unitario;

            $itens[] = (object) [
                'nome' => $produto->nome,
                'quantidade' => $quantidade,
                'preco' => $produto->valor_unitario,
                'subtotal' => $subtotal,
                'imagem' => $produto->imagem ?? 'nulo.jpg',
            ];

            $total += $subtotal;
        }

        return view('carrinho.index', [
            'carrinho' => $itens,
            'total' => $total,
        ]);
    }

    // Adiciona um produto ao carrinho
    public function adicionar(Request $request, Produto $produto)
    {
        $quantidade = $request->input('quantidade', 1);

        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$produto->id])) {
            $carrinho[$produto->id] += $quantidade;
        } else {
            $carrinho[$produto->id] = $quantidade;
        }

        session(['carrinho' => $carrinho]);

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    // Finaliza a compra, envia mensagem e zera carrinho
    public function finalizar(Request $request, WhatsAppService $whatsapp)
    {
        $carrinho = session('carrinho', []);

        if (empty($carrinho)) {
            return redirect()->back()->with('error', 'Carrinho vazio.');
        }

        $nome = $request->input('nome');
        $telefone = $request->input('whatsapp');
        $tipoEntrega = $request->input('tipo_entrega', 'retirada');

        $compra = Compra::create([
            'user_id' => Auth::id(),
            'total' => 0,
            'status' => 'pendente',
            'tipo_entrega' => $tipoEntrega,
        ]);

        $total = 0;
        $mensagem = "🛒 Pedido de $nome\n";
        $mensagem .= "Tipo de entrega: $tipoEntrega\n";

        foreach ($carrinho as $produtoId => $quantidade) {
            $produto = Produto::find($produtoId);
            if (!$produto) continue;

            CompraItem::create([
                'compra_id' => $compra->id,
                'produto_id' => $produtoId,
                'quantidade' => $quantidade,
                'preco_unitario' => $produto->valor_unitario
            ]);

            $mensagem .= "- {$produto->nome} ({$quantidade}x R$ " . number_format($produto->valor_unitario, 2, ',', '.') . ")\n";
            $total += $produto->valor_unitario * $quantidade;
        }

        $mensagem .= "\nTotal: R$ " . number_format($total, 2, ',', '.');
        $compra->update(['total' => $total]);

        // Enviar WhatsApp
        $whatsapp->enviarMensagem($telefone, $mensagem);

        session()->forget('carrinho');

        return redirect()->route('carrinho.index')->with('success', 'Pedido enviado pelo WhatsApp!');
    }
}
