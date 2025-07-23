<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.styles')
    <title>@yield('titre')</title>
</head>
<body>
    <div class="min-h-screen bg-[#f7e3c9] flex text-[#262424] font-sans">
        @include('partials.sidebar')
        <main class="flex-1 p-8">
            @yield('produit_content')
        </main>
    </div>
</body>
</html>