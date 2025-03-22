<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Global Styles */
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        /* Navbar (Black) */
        .navbar {
            background: #212529 !important;
            padding: 14px 0;
        }
        .navbar-brand {
            font-size: 1.6rem;
            font-weight: bold;
            color: #fff !important;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
            padding: 8px 15px;
            transition: 0.3s;
        }
        .navbar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        /* Main Content */
        .content-container {
            min-height: 80vh;
            padding-top: 30px;
        }

        /* Footer (Black) */
        footer {
            background: #212529;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 0.9rem;
        }
        footer p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('orders.index') }}">📦 Order Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.create') }}">Create Order</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container content-container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Order Management System. Designed by Deep Shah 🚀</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
