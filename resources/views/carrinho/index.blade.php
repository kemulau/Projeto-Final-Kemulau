<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .carrinho-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 6px;
            margin-right: 10px;
        }
    </style>
    <style>
    .btn-laranja {
        background-color: #e67e22; /* Laranja queimado */
        color: white;
        border: none;
    }

    .btn-laranja:hover {
        background-color: #cf711c;
    }
</style>

</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg text-white py-3 px-4 shadow-sm" style="background-color: #ad5604;">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-shopping-cart mr-2"></i> Meu Carrinho
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow rounded">
        @if (count($carrinho) > 0)
            <ul class="list-group mb-4">
                @foreach ($carrinho as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            @if(isset($item->imagem))
                                <img src="{{ asset('img/produtos/' . $item->imagem) }}" class="carrinho-img" alt="Imagem do produto">
                            @endif
                            <div>
                                <strong>{{ $item->nome }}</strong><br>
                                <small>{{ $item->quantidade }}x R$ {{ number_format($item->preco, 2, ',', '.') }}</small>
                            </div>
                        </div>
                        <span class="text-dark">R$ {{ number_format($item->subtotal, 2, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="d-flex justify-content-between align-items-center">
                <strong>Total:</strong>
                <span class="text-orange-00 font-bold">R$ {{ number_format($total, 2, ',', '.') }}</span>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-laranja btn-lg" data-toggle="modal" data-target="#finalizarModal">
                    <i class="fas fa-check-circle"></i> Finalizar Compra
                </button>
            </div>
        @else
            <p class="text-muted text-center">Seu carrinho está vazio.</p>
        @endif
    </div>

    <!-- Modal de Finalização -->
    <div class="modal fade" id="finalizarModal" tabindex="-1" aria-labelledby="finalizarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('carrinho.finalizar') }}" method="POST">
                    @csrf
                    <div class="modal-header btn-laranja text-white">
                        <h5 class="modal-title" id="finalizarModalLabel">Finalizar Compra</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nome"><i class="fas fa-user"></i> Seu Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="whatsapp"><i class="fas fa-phone"></i> WhatsApp</label>
                            <input type="text" id="whatsapp" name="whatsapp" class="form-control" placeholder="(99) 99999-9999" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo_entrega"><i class="fas fa-truck"></i> Tipo de Entrega</label>
                            <select name="tipo_entrega" id="tipo_entrega" class="form-control">
                                <option value="retirada">Retirada no local</option>
                                <option value="entrega">Entrega em domicílio</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fab fa-whatsapp"></i> Enviar Pedido pelo WhatsApp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para abrir modal automaticamente após finalizar -->
    @if(session('success'))
        <script>
            window.onload = function () {
                $('#finalizarModal').modal('show');
            }
        </script>
    @endif

    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>
