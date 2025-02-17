<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Cadastro de Unidade de Medida') }}
        </div>
    </x-slot>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Nova Unidade de Medida</h3>
            <a href="{{ route('unidades.index') }}"><button class="btn btn-primary btn-lg">Listar Unidades</button></a>
        </div>

        <form action="{{ route('unidades.store') }}" method="POST" id="formCadastro">
            @csrf

            <div class="form-container">
                <!-- Sigla -->
                <div class="form-group">
                    <label for="sigla">Sigla</label>
                    <input type="text" id="sigla" name="sigla" class="form-control" required>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="descricao" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
                </div><!-- Botão de Submit -->
            </div>
        </form>
    </div>
</x-app-layout>
