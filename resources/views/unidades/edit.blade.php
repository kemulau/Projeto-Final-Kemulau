<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="\js\cep.js"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Editar Unidade de Medida') }}
        </div>
    </x-slot>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Editar Unidade de Medida</h3>
            <a href="{{ route('unidades.index') }}">
                <button class="btn btn-success btn-lg">
                    <i class="fas fa-arrow-left"></i> Voltar
                </button>
            </a>
        </div>

        <form action="{{ route('unidades.update', $unidade) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-container">
                <!-- Sigla -->
                <div class="form-group">
                    <label for="sigla">Sigla</label>
                    <input type="text" id="sigla" name="sigla" class="form-control" value="{{ $unidade->sigla }}" required>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" class="form-control" required>{{ $unidade->descricao }}</textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-save"></i> Atualizar
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
