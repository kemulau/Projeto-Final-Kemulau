<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg text-white py-3 px-4 shadow-sm" style="background-color: #ad5604;">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-box mr-2"></i> Lista de Produtos
            </h2>
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="font-weight-bold mb-0">Gerenciar Produtos</h4>
            <a href="{{ route('produtos.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Cadastrar Produto
            </a>
        </div>

        <div class="table-responsive bg-white shadow-sm p-3 rounded">
            <table class="table table-hover align-middle">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Unidade</th>
                        <th>Estoque</th>
                        <th>Valor Unitário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->categoria->nome ?? 'Sem Categoria' }}</td>
                            <td>{{ $produto->unidade->sigla ?? 'Sem Unidade' }}</td>
                            <td>{{ $produto->estoque }}</td>
                            <td>R$ {{ number_format($produto->valor_unitario, 2, ',', '.') }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-search"></i>
                                </a>
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
