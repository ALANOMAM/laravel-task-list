<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Dynamically set the page title --}}
    <title>@yield('title', 'Default Title')</title>

    {{-- Load compiled assets --}}
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
     {{-- Main page content --}}
    @yield('content')
</body>
</html>