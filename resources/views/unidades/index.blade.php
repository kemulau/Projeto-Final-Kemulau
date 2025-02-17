<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Lista de Unidades de Medida') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="font-weight-bold">Gerenciar Unidades de Medida</h3>
                    <a href="{{ route('unidades.create') }}">
                        <button class="btn btn-success"><i class="fas fa-plus"></i> Cadastrar Unidade</button>
                    </a>
                </div>

                <table class="table table-bordered table-hover text-center">
                    <thead class="bg-green-800 text-white">
                        <tr>
                            <th>#</th>
                            <th>Sigla</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($unidades as $unidade)
                            <tr>
                                <td>{{ $unidade->id }}</td>
                                <td>{{ $unidade->sigla }}</td>
                                <td>{{ $unidade->descricao }}</td>
                                <td>
                                    <a href="{{ route('unidades.edit', $unidade->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </a>
                                    <form action="{{ route('unidades.destroy', $unidade->id) }}" method="POST" class="d-inline-block">
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
        </div>
    </div>
</x-app-layout>
