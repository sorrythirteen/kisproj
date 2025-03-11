<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumber Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Lumber Management</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('suppliers.index') }}">Suppliers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contracts.index') }}">Contracts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('materials.index') }}">Materials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('accounting_entries.index') }}">Accounting Entries</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
