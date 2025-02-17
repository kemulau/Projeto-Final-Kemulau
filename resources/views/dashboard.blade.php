<x-app-layout>

    <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white text-center">
                <h3>Bem-vindo ao Sistema</h3>
            </div>
            <div class="card-body text-center">
                <p class="font-weight-bold text-lg">Você está logado!</p>
                <p>Aqui você pode gerenciar clientes, produtos e saídas de estoque.</p>

                <div class="d-flex justify-content-center mt-4">
                    <a href="{{ route('clientes.index') }}" class="btn btn-success mx-2">
                        <i class="fas fa-user"></i> Clientes
                    </a>
                    <a href="{{ route('produtos.index') }}" class="btn btn-primary mx-2">
                        <i class="fas fa-box"></i> Produtos
                    </a>
                    <a href="{{ route('saida_estoques.index') }}" class="btn btn-warning mx-2">
                        <i class="fas fa-truck"></i> Saída de Estoque
                    </a>
                    <a href="{{ route('relatorio.produtos') }}" class="btn btn-info mx-2">
                        <i class="fas fa-chart-bar"></i> Relatórios
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
