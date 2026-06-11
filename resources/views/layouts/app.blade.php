<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Gerenciador de Livros')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #fdfdfd 0%, #000000 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px solid #000000;
            padding-bottom: 20px;
        }

        h1 {
            color: #333;
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            font-size: 1em;
        }

        nav {
            margin: 20px 0;
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }

        a, button {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #000000;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn:hover {
            background: #000000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }

        .btn-danger {
            background: #ff1900;
        }

        .btn-danger:hover {
            background: #ff1900;
        }

        .btn-secondary {
            background: #000000;
        }

        .btn-secondary:hover {
            background: #37f2ff;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            transition: border 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #000000;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 1.8em;
            }

            .container {
                padding: 20px;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #000000;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
        }

        .status-disponivel {
            background: #d4edda;
            color: #155724;
        }

        .status-emprestado {
            background: #fff3cd;
            color: #856404;
        }

        .status-reservado {
            background: #d1ecf1;
            color: #0c5460;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .actions form {
            display: inline;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .empty-state svg {
            width: 60px;
            height: 60px;
            margin-bottom: 20px;
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Gerenciador de Livros</h1>
            <p class="subtitle">Faça o cadastro do seu livro</p>
        </header>

        @if (session('sucesso'))
            <div class="alert alert-success">
                <strong>✓</strong> {{ session('sucesso') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>✗</strong>
                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('conteudo')
    </div>
</body>
</html>