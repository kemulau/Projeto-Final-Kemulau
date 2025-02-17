<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Registrar Saída de Estoque') }}
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Registrar Saída de Estoque</h3>
            <a href="{{ route('saida_estoques.index') }}">
                <button class="btn btn-success btn-lg">
                    <i class="fas fa-list"></i> Listar Saídas de Estoque
                </button>
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('saida_estoques.store') }}" method="POST">
                    @csrf
                    <div class="form-container">
                        
                        <!-- Cliente -->
                        <div class="form-group">
                            <label for="id_cliente"><i class="fas fa-user"></i> Cliente</label>
                            <select id="id_cliente" name="id_cliente" class="form-control" required>
                                <option value="" disabled selected>Selecione um Cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Produto -->
                        <div class="form-group">
                            <label for="id_produto"><i class="fas fa-box"></i> Produto</label>
                            <select id="id_produto" name="id_produto" class="form-control" required onchange="atualizarDetalhesProduto()">
                                <option value="" disabled selected>Selecione um Produto</option>
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}" 
                                            data-estoque="{{ $produto->estoque }}"
                                            data-unidade="{{ $produto->unidade->nome ?? 'N/A' }}">
                                        {{ $produto->nome }} (Estoque: {{ $produto->estoque }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Unidade de Medida -->
                        <div class="form-group">
                            <label for="unidade"><i class="fas fa-ruler"></i> Unidade de Medida</label>
                            <input type="text" id="unidade" class="form-control" disabled placeholder="Selecione um produto">
                        </div>

                        <!-- Quantidade -->
                        <div class="form-group">
                            <label for="quantidade"><i class="fas fa-sort-numeric-up"></i> Quantidade</label>
                            <input type="number" id="quantidade" name="quantidade" class="form-control" min="1" required>
                        </div>

                        <!-- Botão de Submit -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-check"></i> Confirmar Saída de Estoque
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para atualizar os detalhes do produto selecionado -->
    <script>
        function atualizarDetalhesProduto() {
            var produtoSelecionado = document.getElementById('id_produto');
            var quantidadeInput = document.getElementById('quantidade');
            var unidadeInput = document.getElementById('unidade');

            if (produtoSelecionado.value) {
                var estoqueMaximo = produtoSelecionado.options[produtoSelecionado.selectedIndex].getAttribute('data-estoque');
                var unidadeMedida = produtoSelecionado.options[produtoSelecionado.selectedIndex].getAttribute('data-unidade');

                quantidadeInput.max = estoqueMaximo;
                unidadeInput.value = unidadeMedida;
            }
        }
    </script>
</x-app-layout>
