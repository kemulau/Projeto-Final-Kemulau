<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="\js\cep.js"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Editar Categoria de Produtos') }}
        </div>
    </x-slot>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Editar Categoria</h3>
            <a href="{{ route('categorias.index') }}">
                <button class="btn btn-success btn-lg">Voltar</button>
            </a>
        </div>

        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-container">
                <!-- Nome -->
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" class="form-control" required>{{ $categoria->descricao }}</textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Atualizar</button>
                </div>

            </div>
        </form>
    </div>
</x-app-layout>
