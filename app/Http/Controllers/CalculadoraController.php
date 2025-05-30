<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    public function index()
    {
        return view('calculadora.index');
    }

    public function calcular(Request $request)
    {
        $request->validate([
            'custo' => 'required|numeric|min:0.01',
            'margem' => 'required|numeric|min:1|max:99',
        ], [
            'custo.min' => 'O valor do custo deve ser maior que R$ 0,01.',
            'margem.max' => 'A margem de lucro deve ser menor que 100%.',
        ]);

        $custo = $request->input('custo');
        $margem = $request->input('margem');

        $precoVenda = $custo / (1 - ($margem / 100));
        $lucro = $precoVenda - $custo;

        return back()->with([
            'precoVenda' => number_format($precoVenda, 2, ',', '.'),
            'lucro' => number_format($lucro, 2, ',', '.'),
            'margem' => $margem,
            'custo' => number_format($custo, 2, ',', '.') // ✅ incluído aqui
        ]);
    }
}
