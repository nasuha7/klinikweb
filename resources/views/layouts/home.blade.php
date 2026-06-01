<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Klinik Digital')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Session data untuk JavaScript -->
    <meta name="user-login" content="{{ session()->has('is_login') ? 'true' : 'false' }}">
    <meta name="user-role" content="{{ session('role', '') }}">
    <meta name="user-name" content="{{ session('name', '') }}">
</head>
<body class="bg-gray-100">
    
    <x-navbar />
    
    <main class="min-h-screen">
        @yield('content')
    </main>
    
    <x-footer />
    
</body>
</html>