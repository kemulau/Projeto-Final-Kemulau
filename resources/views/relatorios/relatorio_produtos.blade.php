<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Importando Chart.js -->
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Relatório de Produtos') }}
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Relatório de Produtos</h3>
            <a href="{{ route('dashboard') }}">
                <button class="btn btn-primary btn-lg">
                    <i class="fas fa-arrow-left"></i> Voltar
                </button>
            </a>
        </div>

        <!-- Gráfico de Produtos em Estoque -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h3 class="text-success"><i class="fas fa-box"></i> Gráfico de Produtos em Estoque</h3>
                <div class="chart-container">
                    <canvas id="estoqueChart"></canvas> <!-- Área do Gráfico -->
                </div>
            </div>
        </div>

        <!-- Tabela de Produtos com Estoque -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h3 class="text-success"><i class="fas fa-box"></i> Produtos com Estoque</h3>
                @if($produtosComEstoque->isEmpty())
                    <div class="alert alert-warning">Nenhum produto com estoque disponível.</div>
                @else
                    <table class="table table-bordered table-hover text-center">
                        <thead class="bg-success text-white">
                            <tr>
                                <th>Nome do Produto</th>
                                <th>Categoria</th>
                                <th>Estoque</th>
                                <th>Valor Unitário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtosComEstoque as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->categoria->nome ?? 'Sem categoria' }}</td>
                                    <td>{{ $produto->estoque }}</td>
                                    <td>R$ {{ number_format($produto->valor_unitario, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- Gráfico de Pizza: Produtos com e sem estoque -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h3 class="text-danger"><i class="fas fa-chart-pie"></i> Proporção de Estoque</h3>
                <div class="chart-container">
                    <canvas id="pieChart"></canvas> <!-- Área do Gráfico -->
                </div>
            </div>
        </div>

        <!-- Tabela de Produtos sem Estoque -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="text-danger"><i class="fas fa-exclamation-triangle"></i> Produtos sem Estoque</h3>
                @if($produtosSemEstoque->isEmpty())
                    <div class="alert alert-success">Todos os produtos têm estoque!</div>
                @else
                    <table class="table table-bordered table-hover text-center">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th>Nome do Produto</th>
                                <th>Categoria</th>
                                <th>Estoque</th>
                                <th>Valor Unitário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtosSemEstoque as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->categoria->nome ?? 'Sem categoria' }}</td>
                                    <td>Sem estoque</td>
                                    <td>R$ {{ number_format($produto->valor_unitario, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

    </div>

    <!-- Estilos para ajustar os gráficos -->
    <style>
        .chart-container {
            width: 100%;
            max-width: 500px; /* Tamanho máximo */
            margin: auto;
        }

        canvas {
            width: 100% !important;
            height: auto !important;
        }
    </style>

    <!-- Scripts para gerar os gráficos -->
    <script>
        // Gráfico de Barras - Quantidade de cada produto em estoque
        const ctx = document.getElementById('estoqueChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($produtosComEstoque->pluck('nome')), // Pegando nomes dos produtos
                datasets: [{
                    label: 'Quantidade em Estoque',
                    data: @json($produtosComEstoque->pluck('estoque')), // Pegando quantidades
                    backgroundColor: 'rgba(46, 125, 50, 0.8)', // Verde
                    borderColor: 'rgba(46, 125, 50, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de Pizza - Proporção de Produtos com e sem estoque
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Com Estoque', 'Sem Estoque'],
                datasets: [{
                    data: [
                        {{ count($produtosComEstoque) }},
                        {{ count($produtosSemEstoque) }}
                    ],
                    backgroundColor: ['#2E7D32', '#D32F2F'], // Verde e Vermelho
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</x-app-layout>
