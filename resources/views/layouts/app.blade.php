<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Buku Tamu')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div style="display: flex; min-height: 100vh;">
        <!-- Sidebar -->
        <div style="width: 200px; background-color: #333; color: #fff; padding: 20px;">
            <h2 style="text-align: center;">Buku Tamu</h2>
        </div>

        <!-- Main Content -->
        <div style="flex-grow: 1; padding: 20px;">
            <!-- Top Bar -->
            <div style="background-color: #ddd; padding: 10px; display: flex; justify-content: flex-end; align-items: center;">
                <!-- Dashboard Link -->
                <a href="{{ route('bukutamu.index') }}" class="btn btn-link" style="color: #333; text-decoration: none; margin-right: 10px;">Dashboard</a>

                <!-- Logout Form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-link" style="color: #333; text-decoration: none;">Logout</button>
                </form>
            </div>

            <!-- Content -->
            <div style="padding: 20px;">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
