<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('SaidaEstoque Confirmada') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Detalhes da SaidaEstoque</h3>
                    <p>Cliente: {{ $saida_estoque->cliente->nome }}</p>
                    <p>Produto: {{ $saida_estoque->produto->nome }}</p>
                    <p>Quantidade: {{ $saida_estoque->quantidade }}</p>
                    <p>Valor Total: R$ {{ number_format($saida_estoque->valor_total, 2, ',', '.') }}</p>
                    <p>Data: {{ $saida_estoque->data_saida_estoque }}</p>

                    <h3 class="mt-4 text-lg font-semibold">QR Code da SaidaEstoque</h3>
                    <div class="mt-4">
                        {!! $qrCode !!}
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('saida_estoques.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Nova SaidaEstoque
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

