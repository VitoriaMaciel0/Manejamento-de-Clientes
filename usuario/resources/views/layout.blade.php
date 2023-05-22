<!-- resources/views/layouts/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bemol</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
        }
        header {
            background-color: blue;
            padding: 20px;
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: blue;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <!-- Seu cabeçalho aqui -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Seu rodapé aqui -->
    </footer>
</body>
</html>
