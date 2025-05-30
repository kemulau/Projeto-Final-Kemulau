<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg text-white py-3 px-4 shadow-sm" style="background-color: #ad5604;">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-truck mr-2"></i> Lista de Saídas de Estoque
            </h2>
        </div>
    </x-slot>

    <div class="container mt-4">
        <!-- Título e botão -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="font-weight-bold mb-0">Saídas de Estoque Realizadas</h4>
            <a href="{{ route('saida_estoques.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Nova Saída
            </a>
        </div>

        <!-- Tabela de Saídas Confirmadas -->
        <div class="card shadow-sm mb-5">
            <div class="card-body">
                @if($saida_estoques->isEmpty())
                    <div class="alert alert-warning text-center">
                        Nenhuma saída de estoque cadastrada.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center align-middle">
                            <thead class="thead-light bg-success text-white">
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Categoria</th>
                                    <th>Cliente</th>
                                    <th>Data</th>
                                    <th>Valor Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($saida_estoques as $saida)
                                    <tr>
                                        <td>{{ $saida->produto->nome ?? 'Produto não encontrado' }}</td>
                                        <td>{{ $saida->quantidade }}</td>
                                        <td>{{ $saida->produto->categoria->nome ?? 'Sem categoria' }}</td>
                                        <td>{{ $saida->cliente->nome ?? 'Sem cliente' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($saida->data_saida_estoque)->format('d/m/Y H:i') }}</td>
                                        <td>R$ {{ number_format($saida->valor_total, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Tabela de Saídas Pendentes -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="text-orange-700 mb-3"><i class="fas fa-clock"></i> Saídas de Estoque Pendentes</h5>

                {{-- Futuro: quando implementar status pendente no banco --}}
                <div class="alert alert-info text-center">
                    Nenhuma saída pendente no momento.
                </div>

                {{-- Exemplo de tabela para referência futura --}}
                {{-- 
                <table class="table table-bordered text-center">
                    <thead class="bg-warning text-white">
                        <tr>
                            <th>Produto</th>
                            <th>Cliente</th>
                            <th>Data Prevista</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($saidasPendentes as $pendente)
                            <tr>
                                <td>{{ $pendente->produto->nome }}</td>
                                <td>{{ $pendente->cliente->nome }}</td>
                                <td>{{ $pendente->data_prevista }}</td>
                                <td><span class="badge badge-warning">Pendente</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Finalizar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                --}}
            </div>
        </div>
    </div>
</x-app-layout>
