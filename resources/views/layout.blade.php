
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Inventory System</a>

        <div class="navbar-nav">
            <a class="nav-link" href="/products">Produk</a>
            <a class="nav-link" href="/stocks">Stok</a>
            <a class="nav-link" href="/transactions">Transaksi</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer class="text-center mt-5 mb-3">
    <p>© 2026 Inventory System</p>
</footer>

</body>
</html>
