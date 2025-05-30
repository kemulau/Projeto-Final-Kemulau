<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg text-white py-3 px-4 shadow-sm" style="background-color: #ad5604;">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-edit mr-2"></i> Editar Produto: {{ $produto->nome }}
            </h2>
        </div>
    </x-slot>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="font-weight-bold"><i class="fas fa-box"></i> Atualizar Informações</h4>
            <a href="{{ route('produtos.index') }}" class="btn btn-warning">
                <i class="fas fa-arrow-left"></i> Voltar para Lista
            </a>
        </div>

        <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div class="form-group">
                <label for="nome"><i class="fas fa-tag"></i> Nome</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" class="form-control" required>
            </div>

            <!-- Imagem atual -->
            @if($produto->imagem)
                <div class="form-group mt-3 text-center">
                    <img src="{{ asset('img/produtos/' . $produto->imagem) }}" alt="Imagem Atual" class="img-thumbnail" style="max-width: 250px;">
                    <p class="mt-2 text-muted">Imagem atual do produto</p>
                </div>
            @endif

            <!-- Nova imagem -->
            <div class="form-group">
                <label for="imagem"><i class="fas fa-image"></i> Nova Imagem (opcional)</label>
                <input type="file" id="imagem" name="imagem" class="form-control-file">
            </div>

            <!-- Estoque -->
            <div class="form-group">
                <label for="estoque"><i class="fas fa-boxes"></i> Estoque</label>
                <input type="number" id="estoque" name="estoque" value="{{ old('estoque', $produto->estoque) }}" class="form-control" required>
            </div>

            <!-- Descrição -->
            <div class="form-group">
                <label for="descricao"><i class="fas fa-align-left"></i> Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="3" required>{{ old('descricao', $produto->descricao) }}</textarea>
            </div>

            <!-- Valor -->
            <div class="form-group">
                <label for="valor_unitario"><i class="fas fa-dollar-sign"></i> Valor Unitário</label>
                <input type="number" id="valor_unitario" name="valor_unitario" value="{{ old('valor_unitario', $produto->valor_unitario) }}" step="0.01" class="form-control" required>
            </div>

            <!-- Unidade -->
            <div class="form-group">
                <label for="id_unidade"><i class="fas fa-ruler"></i> Unidade de Medida</label>
                <select id="id_unidade" name="id_unidade" class="form-control" required>
                    @foreach($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ $unidade->id == $produto->id_unidade ? 'selected' : '' }}>
                            {{ $unidade->sigla }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Categoria -->
            <div class="form-group">
                <label for="id_categoria"><i class="fas fa-tags"></i> Categoria</label>
                <select id="id_categoria" name="id_categoria" class="form-control" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $produto->id_categoria ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botão -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-lg text-white" style="background-color: #ad5604;">
                    <i class="fas fa-save"></i> Atualizar Produto
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
