<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estoque - Login</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Estilização personalizada */
        body {
            background-color:rgba(255, 94, 0, 0.27); 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .login-container img {
            width: 150px;
            margin: 0 auto 10px;
        }

        .login-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2E7D32;
            margin-bottom: 1rem;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 6px;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease-in-out;
        }

        .btn-login {
            background: #2E7D32;
            color: white;
        }

        .btn-login:hover {
            background: #1B5E20;
        }

        .btn-register {
            background:rgb(255, 145, 0);
            color: white;
        }

        .btn-register:hover {
            background: #FF8F00;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Logo -->
        <img src="{{ asset('img/logo.png') }}" alt="Logo" onerror="this.onerror=null; this.src='/fallback-logo.png'">

        <!-- Título -->
        <h2 class="text-orange-800 text-lg md:text-2xl lg:text-2xl">Bem-vindo(a) ao Sistema</h2>

        <!-- Verificação de autenticação -->
        @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-login">
                Acessar Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-login">
                Fazer Login
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-register">
                    Criar Conta
                </a>
            @endif
        @endauth
    </div>

</body>
</html>
