<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('auth.partials.styles')
    <title>@yield('titre')</title>
</head>
<body>
    
    <div class="w-max-screen h-screen flex flex-col">
        @yield('auth-form')
    </div>
</body>
</html>