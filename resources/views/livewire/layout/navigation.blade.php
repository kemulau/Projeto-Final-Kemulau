<nav class="bg-green-700 text-white border-b border-green-800 shadow-md w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center space-x-6">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Minha Logo" class="h-10 w-auto">
                    </a>
                </div>

                <!-- Links de Navegação -->
                <div class="hidden sm:flex space-x-6">
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-green-300 px-3 py-2 rounded-md flex items-center">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                    <a href="{{ route('clientes.index') }}" class="text-white hover:text-green-300 px-3 py-2 rounded-md flex items-center">
                        <i class="fas fa-user mr-2"></i> Clientes
                    </a>
                    <a href="{{ route('categorias.index') }}" class="text-white hover:text-green-300 px-3 py-2 rounded-md flex items-center">
                        <i class="fas fa-tags mr-2"></i> Categorias
                    </a>
                    <a href="{{ route('produtos.index') }}" class="text-white hover:text-green-300 px-3 py-2 rounded-md flex items-center">
                        <i class="fas fa-box mr-2"></i> Produtos
                    </a>
                    <a href="{{ route('unidades.index') }}" class="text-white hover:text-green-300 px-3 py-2 rounded-md flex items-center">
                        <i class="fas fa-balance-scale mr-2"></i> {{ __('Unidade de Medida') }}
                    </a>
                    <a href="{{ route('saida_estoques.index') }}" class="text-white hover:text-green-300 px-3 py-2 rounded-md flex items-center">
                        <i class="fas fa-truck mr-2"></i> Saída de Estoque
                    </a>
                    <a href="{{ route('relatorio.produtos') }}" class="text-white hover:text-green-300 px-3 py-2 rounded-md flex items-center">
                        <i class="fas fa-chart-bar mr-2"></i> Relatório de Produtos
                    </a>
                </div>
            </div>

            <!-- Dropdown do Usuário -->
            <div class="relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-800 hover:bg-green-900 focus:outline-none transition ease-in-out duration-150 flex items-center">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="fill-current h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')">
                            <i class="fas fa-user-circle"></i> Perfil
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-white bg-green-700 hover:bg-green-800 rounded-md transition">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
