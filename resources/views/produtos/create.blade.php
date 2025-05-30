<head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="\js\cep.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg text-white py-3 px-4 shadow-sm" style="background-color: #ad5604;">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-box-open mr-2"></i> Cadastro de Produtos
            </h2>
        </div>
    </x-slot>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="font-weight-bold"><i class="fas fa-plus-circle"></i> Cadastrar Novo Produto</h4>
            <a href="{{ route('produtos.index') }}" class="btn btn-warning">
                <i class="fas fa-list"></i> Listar Produtos
            </a>
        </div>

        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nome -->
            <div class="form-group">
                <label for="nome"><i class="fas fa-tag"></i> Nome do Produto</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <!-- Imagem -->
            <div class="form-group">
                <label for="imagem"><i class="fas fa-image"></i> Imagem do Produto</label>
                <input type="file" id="imagem" name="imagem" class="form-control-file" required>
                <small class="form-text text-muted">A imagem será salva automaticamente com o nome gerado.</small>
            </div>

            <!-- Estoque -->
            <div class="form-group">
                <label for="estoque"><i class="fas fa-boxes"></i> Quantidade em Estoque</label>
                <input type="number" id="estoque" name="estoque" class="form-control" min="0" required>
            </div>

            <!-- Descrição -->
            <div class="form-group">
                <label for="descricao"><i class="fas fa-align-left"></i> Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="3" required></textarea>
            </div>

            <!-- Valor -->
            <div class="form-group">
                <label for="valor_unitario"><i class="fas fa-dollar-sign"></i> Valor Unitário</label>
                <input type="number" id="valor_unitario" name="valor_unitario" class="form-control" step="0.01" min="0.01" required>
            </div>

            <!-- Unidade -->
            <div class="form-group">
                <label for="id_unidade"><i class="fas fa-ruler"></i> Unidade de Medida</label>
                <select id="id_unidade" name="id_unidade" class="form-control" required>
                    @foreach($unidades as $unidade)
                        <option value="{{ $unidade->id }}">{{ $unidade->sigla }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Categoria -->
            <div class="form-group">
                <label for="id_categoria"><i class="fas fa-tags"></i> Categoria</label>
                <select id="id_categoria" name="id_categoria" class="form-control" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botão -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-lg text-white" style="background-color: #ad5604;">
                    <i class="fas fa-check-circle"></i> Cadastrar Produto
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
