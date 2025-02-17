<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            {{ __('QR Code da Saída de Estoque') }}
        </div>
    </x-slot>

    <div class="container ">
        <div class="card">
            <div class="card-header bg-success text-white text-center">
                <h3>Detalhes da Saída de Estoque</h3>
            </div>
            <div class="card-body">
                <p><strong>Cliente:</strong> {{ $saida_estoque->cliente->nome }}</p>
                <p><strong>Produto:</strong> {{ $saida_estoque->produto->nome }}</p>
                <p><strong>Quantidade:</strong> {{ $saida_estoque->quantidade }}</p>
                <p><strong>Valor Total:</strong> R$ {{ number_format($saida_estoque->valor_total, 2, ',', '.') }}</p>
                <p><strong>Data:</strong> {{ $saida_estoque->data_saida_estoque }}</p>
                <div class="card-body text-center">
                {!! $qrcode !!}
            </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('saida_estoques.create') }}" class="btn btn-primary btn-lg">
                Nova Saída de Estoque
            </a>
        </div>
    </div>
</x-app-layout>
