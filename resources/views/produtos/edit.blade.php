<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            Editar Produto: {{$produto->nome}}
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Editar Produto</h3>
            <a href="{{ route('produtos.index') }}" class="btn btn-success">
                <i class="fas fa-arrow-left"></i> Voltar para a Lista
            </a>
        </div>

        <!-- Formulário de Edição -->
        <div class="form-container">
            <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nome" class="form-label"><strong>Nome:</strong></label>
                    <input type="text" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" class="form-control" required>

                    <label for="estoque" class="form-label mt-3"><strong>Estoque:</strong></label>
                    <input type="number" id="estoque" name="estoque" value="{{ old('estoque', $produto->estoque) }}" class="form-control" required>

                    <label for="descricao" class="form-label mt-3"><strong>Descrição:</strong></label>
                    <textarea id="descricao" name="descricao" class="form-control" rows="3">{{ old('descricao', $produto->descricao) }}</textarea>

                    <label for="valor_unitario" class="form-label mt-3"><strong>Valor Unitário:</strong></label>
                    <input type="text" id="valor_unitario" name="valor_unitario" value="{{ old('valor_unitario', $produto->valor_unitario) }}" class="form-control" required>

                    <label for="unidade_id" class="form-label mt-3"><strong>Unidade de Medida:</strong></label>
                    <select id="unidade_id" name="unidade_id" class="form-control" required>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ $unidade->id == $produto->unidade_id ? 'selected' : '' }}>
                                {{ $unidade->sigla }}
                            </option>
                        @endforeach
                    </select>

                    <label for="categoria_id" class="form-label mt-3"><strong>Categoria:</strong></label>
                    <select id="categoria_id" name="categoria_id" class="form-control" required>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $categoria->id == $produto->categoria_id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning btn-lg">
                        <i class="fas fa-save"></i> Atualizar Produto
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
