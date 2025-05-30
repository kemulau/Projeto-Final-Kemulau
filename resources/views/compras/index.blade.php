<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg text-white py-3 px-4 shadow-sm" style="background-color: #ad5604;">
            <h2 class="mb-0 text-xl font-weight-bold">
                <i class="fas fa-shopping-basket mr-2"></i> Minhas Compras
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @foreach ($compras as $compra)
                <div class="bg-white p-4 rounded shadow text-dark">
                    <h3 class="text-lg font-semibold">
                        Compra #{{ $compra->id }} - {{ $compra->created_at->format('d/m/Y H:i') }}
                    </h3>
                    <ul class="mt-2 text-sm">
                        @foreach ($compra->itens as $item)
                            <li>
                                {{ $item->produto->nome }} - {{ $item->quantidade }} un.
                            </li>
                        @endforeach
                    </ul>
                    <p class="mt-2 font-weight-bold">
                        Total: R$ {{ number_format($compra->total, 2, ',', '.') }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
