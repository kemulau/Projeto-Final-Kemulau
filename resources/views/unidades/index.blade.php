<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg text-white py-3 px-4 shadow-sm" style="background-color: #ad5604;">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-balance-scale mr-2"></i> Lista de Unidades de Medida
            </h2>
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="font-weight-bold mb-0">Gerenciar Unidades</h4>
            <a href="{{ route('unidades.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Cadastrar Unidade
            </a>
        </div>

        <div class="table-responsive bg-white shadow-sm p-3 rounded">
            <table class="table table-hover align-middle">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Sigla</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($unidades as $unidade)
                        <tr>
                            <td>{{ $unidade->id }}</td>
                            <td>{{ $unidade->sigla }}</td>
                            <td>{{ $unidade->descricao }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('unidades.edit', $unidade->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('unidades.destroy', $unidade->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza que deseja excluir esta unidade?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Nenhuma unidade cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
