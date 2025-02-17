<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Lista de Saída de Estoques') }}
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Saídas de Estoque</h3>
            <a href="{{ route('saida_estoques.create') }}">
                <button class="btn btn-success btn-lg">
                    <i class="fas fa-plus-circle"></i> Cadastrar Saída de Estoque
                </button>
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                
                @if($saida_estoques->isEmpty())
                    <div class="alert alert-warning text-center">
                        Nenhuma saída de estoque cadastrada.
                    </div>
                @else
                    <table class="table table-bordered table-hover text-center">
                        <thead class="bg-success text-white">
                            <tr>
                                <th>Nome do Produto</th>
                                <th>Quantidade</th>
                                <th>Categoria</th>
                                <th>Cliente</th>
                                <th>Data da Saída</th>
                                <th>Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($saida_estoques as $saida)
                                <tr>
                                    <td>{{ $saida->produto->nome ?? 'Produto não encontrado' }}</td>
                                    <td>{{ $saida->quantidade }}</td>
                                    <td>{{ $saida->produto->categoria->nome ?? 'Categoria não encontrada' }}</td>
                                    <td>{{ $saida->cliente->nome ?? 'Cliente não encontrado' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($saida->data_saida_estoque)->format('d/m/Y H:i') }}</td>
                                    <td>R$ {{ number_format($saida->valor_total, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
