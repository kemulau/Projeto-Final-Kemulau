<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            Detalhes do Cliente: {{$cliente->nome}}
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Detalhes do Cliente</h3>
            <a href="{{ route('clientes.index') }}" class="btn btn-success">
                <i class="fas fa-arrow-left"></i> Voltar para a Lista
            </a>
        </div>

        <!-- Exibindo os detalhes do cliente -->
        <div class="form-container">
            <div class="mb-4">
                <h5><strong>Nome:</strong> {{ $cliente->nome }}</h5>
                <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
                <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
                <p><strong>E-mail:</strong> {{ $cliente->email }}</p>

                <h5 class="mt-4"><strong>Endereço</strong></h5>
                <p><strong>CEP:</strong> {{ $cliente->cep }}</p>
                <p><strong>Rua:</strong> {{ $cliente->rua }}</p>
                <p><strong>Bairro:</strong> {{ $cliente->bairro }}</p>
                <p><strong>Cidade:</strong> {{ $cliente->cidade }}</p>
                <p><strong>UF:</strong> {{ $cliente->uf }}</p>
                <p><strong>Complemento:</strong> {{ $cliente->complemento }}</p>

                <div class="mt-4">
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-lg">
                        <i class="fas fa-pencil-alt"></i> Editar
                    </a>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
