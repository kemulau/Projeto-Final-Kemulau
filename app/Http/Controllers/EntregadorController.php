<?php 
namespace App\Http\Controllers;

use App\Models\Entregador;
use Illuminate\Http\Request;

class EntregadorController extends Controller
{
    public function index()
    {
        $entregadores = Entregador::all();
        return view('entregadores.index', compact('entregadores'));
    }

    public function create()
    {
        return view('entregadores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required'
        ]);

        Entregador::create($request->all());

        return redirect()->route('entregadores.index')->with('success', 'Entregador cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $entregador = Entregador::findOrFail($id);
        return view('entregadores.edit', compact('entregador'));
    }

    public function update(Request $request, $id)
    {
        $entregador = Entregador::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'telefone' => 'required'
        ]);

        $entregador->update($request->all());

        return redirect()->route('entregadores.index')->with('success', 'Entregador atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $entregador = Entregador::findOrFail($id);
        $entregador->delete();

        return redirect()->route('entregadores.index')->with('success', 'Entregador removido com sucesso!');
    }
}
