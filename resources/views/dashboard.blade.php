<x-app-layout>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </head>

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header text-white text-center" style="background-color:rgb(185, 83, 0);">
                <h3>Bem-vindo(a) ao Sistema</h3>
            </div>
            <div class="card-body text-center">
                <p class="font-weight-bold text-lg">Você está logado!</p>
                <p>Aqui você pode gerenciar clientes, produtos, saídas de estoque e muito mais.</p>

                <div class="row justify-content-center mt-4">
                    <div class="col-6 col-md-3 mb-3">
                        <a href="{{ route('clientes.index') }}" class="btn w-100 text-white" style="background-color: #4CAF50;">
                            <i class="fas fa-user"></i> Clientes
                        </a>
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <a href="{{ route('produtos.index') }}" class="btn w-100 text-white" style="background-color: #2196F3;">
                            <i class="fas fa-box"></i> Produtos
                        </a>
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <a href="{{ route('saida_estoques.index') }}" class="btn w-100 text-white" style="background-color: #FF9800;">
                            <i class="fas fa-truck"></i> Saída de Estoque
                        </a>
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <a href="{{ route('relatorio.produtos') }}" class="btn w-100 text-white" style="background-color: #00ACC1;">
                            <i class="fas fa-chart-bar"></i> Relatórios
                        </a>
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <a href="{{ route('catalogo') }}" class="btn w-100 text-white" style="background-color:rgb(122, 70, 133);">
                            <i class="fas fa-store"></i> Catálogo
                        </a>
                    </div>





                    <div class="col-6 col-md-3 mb-3">
                        <a href="#" class="btn w-100 text-white" style="background-color: #795548;">
                            <i class="fas fa-calculator"></i> Precificação
                        </a>
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <a href="#" class="btn w-100 text-white" style="background-color: #455A64;">
                            <i class="fas fa-graduation-cap"></i> Tutoriais
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
