<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .product-card {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-bottom: 1rem;
            min-height: 400px;
        }

        .catalog-img {
            width: 100%;
            height: 180px;
            object-fit: contain;
            padding: 0.5rem;
            background-color: #fff;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg d-flex align-items-center gap-2">
            <i class="fas fa-store mr-2"></i> Catálogo de Produtos
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-4 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($produtos as $produto)
                <div class="product-card">
                    <div>
                        <img 
                            src="{{ asset('img/produtos/' . $produto->imagem) }}" 
                            alt="{{ $produto->nome }}"
                            class="catalog-img"
                            onerror="this.src='https://via.placeholder.com/300x200?text=Sem+Imagem'">

                        <div class="px-3 mt-2">
                            <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $produto->nome }}</h3>
                            <p class="text-sm text-gray-600 mb-1">{{ $produto->descricao }}</p>
                            <p class="text-green-700 font-semibold mb-3">
                                R$ {{ number_format($produto->valor_unitario, 2, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('carrinho.adicionar', $produto->id) }}" class="px-3">
                        @csrf
                        <input type="hidden" name="quantidade" value="1">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-cart-plus mr-1"></i> Adicionar ao Carrinho
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
