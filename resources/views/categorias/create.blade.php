<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Cadastro de Categoria de Produtos') }}
        </div>
    </x-slot>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Nova Categoria</h3>
            <a href="{{ route('categorias.index') }}"><button class="btn btn-primary btn-lg">Listar Categorias</button></a>
        </div>

        <form action="{{ route('categorias.store') }}" method="POST" id="formCadastro">
            @csrf

            <div class="form-container">
                <!-- Nome -->
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" class="form-control" rows="4" maxlength="255" required></textarea>
                    <p id="contador" style="text-align: right; color: #555;">0 / 255</p>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
                </div><!-- Botão de Submit -->
            </div>
        </form>
    </div>
</x-app-layout>

<script>
    // Atualiza o contador de caracteres do textarea
    document.getElementById('descricao').addEventListener('input', function () {
        var maxLength = this.getAttribute("maxlength");
        var currentLength = this.value.length;
        document.getElementById('contador').innerText = currentLength + " / " + maxLength;
    });
</script>
