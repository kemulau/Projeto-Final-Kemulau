<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('Lista de Produtos') }}
        </div>
    </x-slot>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Gerenciar Produtos</h3>
            <a href="{{ route('produtos.create') }}">
                <button class="btn btn-success btn-lg">
                    <i class="fas fa-plus"></i> Cadastrar Produto
                </button>
            </a>
        </div>

        <!-- Tabela de Produtos -->
        <table class="table table-bordered">
            <thead class="bg-success text-white">
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
                        <td class="text-center">
                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-search"></i> Visualizar
                            </a>
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i> Editar
                            </a>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Excluir
                                </button>
                            </form>
                            <a href="{{ route('saida_estoques.create', ['id_produto' => $produto->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-shopping-cart"></i> Vender
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>