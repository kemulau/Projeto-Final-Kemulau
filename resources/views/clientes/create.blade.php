<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="\js\cep.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .btn-laranja {
            background-color: #e67e22;
            color: white;
            border: none;
        }
        .btn-laranja:hover {
            background-color: #cf711c;
        }
        .header-bg {
            background-color: #ad5604;
            padding: 1rem 2rem;
            color: white;
        }
        h3.section-title {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: bold;
            color: #ad5604;
            text-align: center;
        }
    </style>
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg shadow-sm">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-user-plus mr-2"></i> Cadastro de Clientes
            </h2>
        </div>
    </x-slot>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="font-weight-bold mb-0">Cadastrar Novo Cliente</h4>
            <a href="{{ route('clientes.index') }}" class="btn btn-warning">
                <i class="fas fa-list"></i> Listar Clientes
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('clientes.store') }}" method="POST" id="formCadastro">
                    @csrf

                    <h3 class="section-title">Dados Pessoais</h3>

                    <div class="form-group">
                        <label for="nome"><i class="fas fa-user"></i> Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="cpf"><i class="fas fa-id-card"></i> CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone"><i class="fas fa-phone"></i> Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <h3 class="section-title">Endereço</h3>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="cep"><i class="fas fa-map-pin"></i> CEP</label>
                            <input name="cep" type="text" id="cep" class="form-control" maxlength="9" onblur="pesquisacep(this.value);">
                        </div>
                        <div class="col-md-6">
                            <label for="cidade"><i class="fas fa-city"></i> Cidade</label>
                            <input type="text" id="cidade" name="cidade" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="uf"><i class="fas fa-flag"></i> UF</label>
                            <input type="text" id="uf" name="uf" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-9">
                            <label for="rua"><i class="fas fa-road"></i> Rua</label>
                            <input type="text" id="rua" name="rua" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="numero"><i class="fas fa-hashtag"></i> Nº</label>
                            <input type="text" id="numero" name="numero" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="bairro"><i class="fas fa-map"></i> Bairro</label>
                            <input type="text" id="bairro" name="bairro" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="complemento"><i class="fas fa-info-circle"></i> Complemento</label>
                            <input type="text" id="complemento" name="complemento" class="form-control">
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-laranja btn-lg">
                            <i class="fas fa-save"></i> Cadastrar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
