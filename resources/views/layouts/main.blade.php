<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Laravel Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="{{ url ('') }}">Meisya Qeena's Shop</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ url ('/home') }}">Home</a>
                <a class="nav-link" href="{{ url ('/produk') }}">Produk</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-light text-center py-3 mt-4">
        <small>&copy; {{ date('Y') }} Meisya Qeena 5173</small>
    </footer>
</body>
</html>
