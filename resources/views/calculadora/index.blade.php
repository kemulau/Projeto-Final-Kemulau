<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            <i class="fas fa-calculator mr-2"></i> Calculadora de Lucro
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-6 border-t-8 border-orange-700">
            <h2 class="text-2xl font-bold text-center text-orange-700 mb-6">Calculadora de Lucro</h2>

            <form action="{{ route('calculadora.calcular') }}" method="POST">
                @csrf

                <!-- Custo do Produto -->
                <div class="mb-4">
                    <label for="custo" class="block text-gray-700 font-semibold">Custo do produto (R$):</label>
                    <input type="number" name="custo" id="custo"
                           step="0.01" min="0.01"
                           value="{{ old('custo') }}"
                           class="w-full mt-1 p-2 border rounded focus:ring focus:ring-orange-300" required>
                    @error('custo')
                        <span class="text-red-600 text-sm mt-1 block">O valor do custo deve ser maior que R$ 0,01.</span>
                    @enderror
                </div>

                <!-- Margem de Lucro -->
                <div class="mb-4">
                    <label for="margem" class="block text-gray-700 font-semibold">Margem de lucro (%):</label>
                    <input type="number" name="margem" id="margem"
                           step="0.01" max="99.99"
                           value="{{ old('margem') }}"
                           class="w-full mt-1 p-2 border rounded focus:ring focus:ring-orange-300" required>
                    @error('margem')
                        <span class="text-red-600 text-sm mt-1 block">A margem de lucro deve ser menor que 100%.</span>
                    @enderror
                </div>

                <!-- Botão Calcular -->
                <button type="submit"
                        class="w-full bg-orange-700 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded transition">
                    Calcular Preço de Venda
                </button>
            </form>

            <!-- Resultado -->
            @if(session('precoVenda'))
                <div class="mt-6 bg-orange-50 border border-orange-200 rounded p-4">
                    <p class="text-sm text-gray-700">
                        🧾 <strong>Você informou:</strong> Custo: <strong>R$ {{ session('custo') }}</strong>,
                        Margem: <strong>{{ session('margem') }}%</strong>
                    </p>
                    <p class="text-lg font-semibold text-orange-800 mt-2">
                        💰 Preço de venda sugerido: R$ {{ session('precoVenda') }}
                    </p>
                    <p class="text-sm text-gray-600">
                        📈 Lucro estimado: R$ {{ session('lucro') }} ({{ session('margem') }}% sobre a venda)
                    </p>
                </div>
            @endif

            <!-- Mensagens gerais de erro -->
            @if($errors->any())
                <div class="mt-4 text-red-600 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
