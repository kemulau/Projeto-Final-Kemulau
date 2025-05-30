<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg text-white py-3 px-4 shadow-sm" style="background-color: #ad5604;">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-user mr-2"></i> Lista de Clientes
            </h2>
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="font-weight-bold mb-0">Gerenciar Clientes</h4>
            <a href="{{ route('clientes.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Cadastrar Cliente
            </a>
        </div>

        <div class="table-responsive shadow-sm rounded bg-white p-3">
            <table class="table table-hover align-middle">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th style="width: 200px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
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
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Deseja realmente excluir este cliente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Nenhum cliente cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
