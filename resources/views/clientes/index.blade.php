<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Arquivo CSS externo -->
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Lista de Clientes') }}
        </div>
    </x-slot>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Gerenciar Clientes</h3>
            <a href="{{ route('clientes.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Cadastrar Clientes
            </a>
        </div>

        <!-- Tabela de Clientes -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>
                            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-search"></i> Visualizar
                            </a>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i> Editar
                            </a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
