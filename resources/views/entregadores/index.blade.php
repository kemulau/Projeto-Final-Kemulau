<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg text-white py-3 px-4 shadow-sm" style="background-color: #ad5604;">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-motorcycle mr-2"></i> Lista de Entregadores
            </h2>
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="font-weight-bold mb-0">Gerenciar Entregadores</h4>
            <a href="{{ route('entregadores.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Novo Entregador
            </a>
        </div>

        <div class="table-responsive shadow-sm rounded bg-white p-3">
            <table class="table table-hover align-middle">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th style="width: 200px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($entregadores as $entregador)
                        <tr>
                            <td>{{ $entregador->nome }}</td>
                            <td>{{ $entregador->telefone }}</td>
                            <td>
                                <a href="{{ route('entregadores.edit', $entregador) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i> Editar
                                </a>
                                <form action="{{ route('entregadores.destroy', $entregador) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Deseja excluir este entregador?')">
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
                            <td colspan="3" class="text-center text-muted">Nenhum entregador cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
