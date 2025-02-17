<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            Detalhes do Produto: {{ $produto->nome }}
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="font-weight-bold">Detalhes do Produto</h3>
            <a href="{{ route('produtos.index') }}" class="btn btn-success">
                <i class="fas fa-arrow-left"></i> Voltar para a Lista
            </a>
        </div>

        <!-- Exibindo os detalhes do produto -->
        <div class="form-container">
            <div class="row">
                <!-- Exibição da Imagem do Produto -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset('img/produtos/' . ($produto->imagem ?? 'no-image.png')) }}" 
                         class="img-fluid rounded shadow" 
                         alt="Imagem do Produto" 
                         style="max-width: 100%; height: auto; border: 2px solid #ddd;">
                </div>

                <!-- Informações do Produto -->
                <div class="col-md-8">
                    <h5><strong>Nome:</strong> {{ $produto->nome }}</h5>
                    <p><strong>Estoque:</strong> {{ $produto->estoque }}</p>
                    <p><strong>Descrição:</strong> {{ $produto->descricao ?? 'Não disponível' }}</p>
                    <p><strong>Valor Unitário:</strong> R$ {{ number_format($produto->valor_unitario, 2, ',', '.') }}</p>
                    <p><strong>Unidade de Medida:</strong> {{ $produto->unidade->sigla ?? 'N/A' }}</p>
                    <p><strong>Categoria:</strong> {{ $produto->categoria->nome ?? 'N/A' }}</p>

                    <div class="mt-4">
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-lg">
                            <i class="fas fa-pencil-alt"></i> Editar
                        </a>
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline-block;">
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
    </div>
</x-app-layout>
