<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="\js\cep.js"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            <h2>
                <i class="fas fa-pencil-alt"></i> Editar Cliente: {{ $cliente->nome }}
            </h2>
        </div>
    </x-slot>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Editar Cliente</h3>
            <a href="{{ route('clientes.index') }}">
                <!-- Alteração para o botão seguir o padrão -->
                <button class="btn btn-success btn-lg">Voltar</button>
            </a>
        </div>

        <!-- Formulário de Edição -->
        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-container">
                <!-- Nome -->
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" value="{{ $cliente->nome }}" required>
                </div>

                <!-- CPF -->
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" class="form-control" value="{{ $cliente->cpf }}" required>
                </div>

                <!-- Telefone -->
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" class="form-control" value="{{ $cliente->telefone }}" required>
                </div>

                <!-- E-mail -->
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $cliente->email }}" required>
                </div>

                <!-- Endereço -->
                <h3 class="font-weight-bold mt-4 mb-4">Endereço</h3>

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" class="form-control" value="{{ $cliente->cep }}" required>
                </div>

                <div class="form-group">
                    <label for="rua">Rua</label>
                    <input type="text" id="rua" name="rua" class="form-control" value="{{ $cliente->rua }}" required>
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" class="form-control" value="{{ $cliente->bairro }}" required>
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" class="form-control" value="{{ $cliente->cidade }}" required>
                </div>

                <div class="form-group">
                    <label for="uf">UF</label>
                    <input type="text" id="uf" name="uf" class="form-control" value="{{ $cliente->uf }}" required>
                </div>

                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" id="complemento" name="complemento" class="form-control" value="{{ $cliente->complemento }}" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
