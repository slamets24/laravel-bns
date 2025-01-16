<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="shortcut icon" href="{{ asset('img/logo2.jpg') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 1rem;
        }

        .pagination a {
            margin: 0 0.25rem;
            padding: 0.5rem 0.75rem;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            text-decoration: none;
            color: #333;
        }

        .pagination a.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination a:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
    <title>BNS | @yield('title', '')</title>
</head>

<body class="flex flex-col min-h-screen">
    <x-partials.visitor.navbar />
    <main class="flex-1">
        @yield('content')
    </main>
    <x-partials.visitor.footer />
</body>

</html>
