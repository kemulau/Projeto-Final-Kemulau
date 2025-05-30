<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<x-app-layout>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Relatório de Produtos:</h3>
            <a href="{{ route('dashboard') }}">
                <button class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-arrow-left"></i> Voltar
                </button>
            </a>
        </div>

        <!-- Gráfico de Produtos em Estoque -->
        <div class="card shadow-sm mb-4 border-top border-3 border-warning">
            <div class="card-body">
                <h4 class="text-warning mb-4"><i class="fas fa-chart-bar"></i> Gráfico de Produtos em Estoque</h4>
                <div class="chart-container">
                    <canvas id="estoqueChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Tabela de Produtos com Estoque -->
        <div class="card shadow-sm mb-4 border-top border-3 border-success">
            <div class="card-body">
                <h4 class="text-success mb-3"><i class="fas fa-check-circle"></i> Produtos com Estoque</h4>
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

        <!-- Gráfico de Pizza: Proporção de Estoque -->
        <div class="card shadow-sm mb-4 border-top border-3 border-primary">
            <div class="card-body">
                <h4 class="text-primary mb-3"><i class="fas fa-chart-pie"></i> Proporção de Estoque</h4>
                <div class="chart-container">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Tabela de Produtos sem Estoque -->
        <div class="card shadow-sm border-top border-3 border-danger">
            <div class="card-body">
                <h4 class="text-danger mb-3"><i class="fas fa-times-circle"></i> Produtos sem Estoque</h4>
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

    <style>
        .chart-container {
            width: 100%;
            max-width: 500px;
            margin: auto;
        }

        canvas {
            width: 100% !important;
            height: auto !important;
        }
    </style>

    <script>
        const ctx = document.getElementById('estoqueChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($produtosComEstoque->pluck('nome')),
                datasets: [{
                    label: 'Quantidade em Estoque',
                    data: @json($produtosComEstoque->pluck('estoque')),
                    backgroundColor: 'rgba(255, 140, 0, 0.8)', // Laranja
                    borderColor: 'rgba(255, 87, 34, 1)',
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
            backgroundColor: ['#4CAF50', '#F44336'], // Verde e Vermelho
            borderColor: ['#388E3C', '#D32F2F'],      // Bordas mais escuras
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                labels: {
                    color: '#333',
                    font: {
                        size: 14
                    }
                }
            }
        }
    }
});
    </script>
</x-app-layout>
