<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="\js\cep.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Cadastro de Produtos') }}
        </div>
    </x-slot>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Cadastrar Produto</h3>
            <a href="{{ route('produtos.index') }}">
                <button class="btn btn-primary btn-lg">Listar Produtos</button>
            </a>
        </div>

        <form action="{{ route('produtos.store') }}" method="POST" id="formCadastro" enctype="multipart/form-data">
            @csrf

            <div class="form-container">
                <!-- Nome do Produto -->
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>

                <!-- Imagem do Produto -->
                <div class="form-group">
                    <label for="imagem">Imagem do Produto</label>
                    <img id="imagemPreview" src="#" alt="Imagem do Produto" style="max-width: 350px; display: none; margin-top: 10px; margin: 0 auto;">
                    <input type="file" id="imagem" name="imagem" class="form-control-file" onchange="ImagemPreview(event)" required>
                </div>

                <!-- Quantidade em Estoque -->
                <div class="form-group">
                    <label for="estoque">Quantidade em Estoque</label>
                    <input type="number" id="estoque" name="estoque" class="form-control" required>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" class="form-control" required></textarea>
                </div>

                <!-- Valor Unitário -->
                <div class="form-group">
                    <label for="valor_unitario">Valor Unitário</label>
                    <input type="number" id="valor_unitario" name="valor_unitario" class="form-control" step="0.01" required>
                </div>

                <!-- Unidade de Medida -->
                <div class="form-group">
                    <label for="id_unidade">Unidade de Medida</label>
                    <select id="id_unidade" name="id_unidade" class="form-control" required>
                        @foreach($unidades as $unidade)
                            <option value="{{ $unidade->id }}">{{ $unidade->sigla }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Categoria -->
                <div class="form-group">
                    <label for="id_categoria">Categoria</label>
                    <select id="id_categoria" name="id_categoria" class="form-control" required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botão de Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>

<script>
    function ImagemPreview(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagemPreview');
            output.src = reader.result;
            output.style.display = 'block';  // Exibe a imagem
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
