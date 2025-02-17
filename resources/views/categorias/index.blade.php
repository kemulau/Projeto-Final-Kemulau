<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Arquivo CSS externo -->
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Lista de Categorias de Produtos') }}
        </div>
    </x-slot>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Gerenciar Categorias</h3>
            <a href="{{ route('categorias.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Cadastrar Categoria
            </a>
        </div>

        <!-- Tabela de Categorias -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th class="descricao-col">Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nome }}</td>
                        <td class="descricao-col">{{ $categoria->descricao }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i> Editar
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline-block;">
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
