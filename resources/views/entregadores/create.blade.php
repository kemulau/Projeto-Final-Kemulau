<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Arquivo CSS externo -->
</head>
<x-app-layout>
    <div class="max-w-3xl mx-auto mt-8 bg-white p-6 rounded shadow">
        <div class="header-bg">Cadastrar Entregador</div>

        <form action="{{ route('entregadores.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="form-group">
                <label class="block font-medium text-gray-700">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="block font-medium text-gray-700">Telefone</label>
                <input type="text" name="telefone" class="form-control" required>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('entregadores.index') }}" class="btn btn-primary mr-4">Cancelar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
</x-app-layout>
