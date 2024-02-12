<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Monitoring EPSS</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header style="height: 59px; background-color: #FFFFFF;">
        @include('partials.navbar')
    </header>

    @yield('content')

    <footer id="hubungi-kami" style="height: 229px; background-color: #263238;">
        @include('partials.footer')
    </footer>

    
</body>
</html>
