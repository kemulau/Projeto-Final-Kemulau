<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<!-- ... cabeçalho e estilos mantidos ... -->

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg text-white py-3 px-4 shadow-sm" style="background-color: #ad5604;">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-truck mr-2"></i> Registrar Saída de Estoque
            </h2>
        </div>
    </x-slot>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="font-weight-bold"><i class="fas fa-boxes"></i> Venda Interna (Saída de Estoque)</h4>
            <a href="{{ route('saida_estoques.index') }}" class="btn btn-warning">
                <i class="fas fa-list"></i> Ver Saídas Registradas
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('saida_estoques.store') }}" method="POST">
                    @csrf

                    <!-- Cliente -->
                    <div class="form-group">
                        <label for="id_cliente"><i class="fas fa-user"></i> Cliente</label>
                        <select id="id_cliente" name="id_cliente" class="form-control" required>
                            <option value="" disabled selected>Selecione um cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Produto -->
                    <div class="form-group">
                        <label for="id_produto"><i class="fas fa-box"></i> Produto</label>
                        <select id="id_produto" name="id_produto" class="form-control" required onchange="atualizarDetalhesProduto()">
                            <option value="" disabled selected>Selecione um produto</option>
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
                        <input type="text" id="unidade" class="form-control bg-light" readonly placeholder="Selecione um produto">
                    </div>

                    <!-- Quantidade -->
                    <div class="form-group">
                        <label for="quantidade"><i class="fas fa-sort-numeric-up"></i> Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade" class="form-control" min="1" required>
                    </div>

                    <!-- Forma de Pagamento -->
                    <div class="form-group">
                        <label for="forma_pagamento"><i class="fas fa-credit-card"></i> Forma de Pagamento</label>
                        <select id="forma_pagamento" name="forma_pagamento" class="form-control" required>
                            <option value="" disabled selected>Selecione uma forma de pagamento</option>
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Pix">Pix</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Cartão de Débito">Cartão de Débito</option>
                        </select>
                    </div>

                    <!-- Botão -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-lg text-white" style="background-color: #ad5604;">
                            <i class="fas fa-check-circle"></i> Confirmar Venda
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para exibir unidade de medida e limitar quantidade -->
    <script>
        function atualizarDetalhesProduto() {
            const produtoSelect = document.getElementById('id_produto');
            const unidadeInput = document.getElementById('unidade');
            const quantidadeInput = document.getElementById('quantidade');

            const selected = produtoSelect.options[produtoSelect.selectedIndex];
            const estoque = selected.getAttribute('data-estoque');
            const unidade = selected.getAttribute('data-unidade');

            unidadeInput.value = unidade;
            quantidadeInput.max = estoque;
        }
    </script>
</x-app-layout>
