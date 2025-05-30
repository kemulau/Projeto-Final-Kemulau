<nav class="navbar bg-orange-800 text-white px-4 py-2">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between">

        <!-- Logo e botão mobile -->
        <div class="w-full flex justify-between items-center md:w-auto">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-orange-900">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16 w-auto object-contain">
            </a>
            <button class="md:hidden text-white text-2xl" onclick="toggleMenu()">☰</button>
        </div>

        <!-- Links de navegação -->
        <div id="mobileNav"
            class="nav-links flex-col md:flex md:flex-row gap-2 md:gap-4 px-4 py-2 md:px-0 md:py-0 w-full md:w-auto md:items-center hidden md:flex">
            <a href="{{ route('clientes.index') }}"><i class="fas fa-user"></i> Clientes</a>
            <a href="{{ route('entregadores.index') }}"><i class="fas fa-motorcycle"></i> Entregadores</a>
            <a href="{{ route('categorias.index') }}"><i class="fas fa-tags"></i> Categorias</a>
            <a href="{{ route('produtos.index') }}"><i class="fas fa-box"></i> Produtos</a>
            <a href="{{ route('unidades.index') }}"><i class="fas fa-balance-scale"></i> Unidade de Medida</a>
            <a href="{{ route('saida_estoques.index') }}"><i class="fas fa-truck"></i> Saída de Estoque</a>
            <a href="{{ route('relatorio.produtos') }}"><i class="fas fa-chart-bar"></i> Relatório</a>
            <a href="{{ route('calculadora.index') }}"><i class="fas fa-calculator"></i> Precificação</a>
            <a href="{{ route('tutoriais.index') }}"><i class="fas fa-graduation-cap"></i> Tutoriais</a>

        </div>

        <!-- Dropdown usuário -->
        <div class="relative mt-2 md:mt-0">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="px-4 py-2 bg-orange-900 hover:bg-orange-700 text-white rounded flex items-center">
                        {{ Auth::user()->name }}
                        <svg class="h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 
                                     01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <!-- Link Perfil -->
                    <a href="{{ route('profile') }}" class="w-full text-left px-4 py-2 text-sm flex items-center gap-2"
                        style="color: #4a2e14 !important;">
                        <i class="fas fa-user-circle" style="color: #4a2e14 !important;"></i> Perfil
                    </a>

                    <!-- Botão Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm flex items-center gap-2 hover:text-white hover:bg-orange-800 transition"
                            style="color: #4a2e14 !important;">
                            <i class="fas fa-sign-out-alt" style="color: #4a2e14 !important;"></i> Sair
                        </button>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>

<script>
    function toggleMenu() {
        const nav = document.getElementById("mobileNav");
        if (window.innerWidth < 768) {
            nav.classList.toggle("hidden");
        }
    }
</script>