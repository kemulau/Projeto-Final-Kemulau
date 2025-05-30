<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            <i class="fas fa-graduation-cap mr-2"></i> Tutoriais
        </div>
    </x-slot>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h2 class="h4 font-weight-bold text-orange-800 mb-3">Vídeos e Guias para te ajudar!</h2>

            <ul class="list-group">
                <li class="list-group-item">
                    <i class="fas fa-play-circle text-success mr-2"></i> Como cadastrar produtos
                    <a href="#" class="btn btn-sm btn-outline-primary float-end">Ver vídeo</a>
                </li>
                <li class="list-group-item">
                    <i class="fas fa-play-circle text-success mr-2"></i> Como usar a calculadora de lucro
                    <a href="#" class="btn btn-sm btn-outline-primary float-end">Ver vídeo</a>
                </li>
                <li class="list-group-item">
                    <i class="fas fa-play-circle text-success mr-2"></i> Finalizando pedidos e gerando relatórios
                    <a href="#" class="btn btn-sm btn-outline-primary float-end">Ver vídeo</a>
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>
