<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased">
        <div class="container mx-auto">
            <header class="flex justify-between items-center p-4 shadow-md rounded-lg">
                <div class="logo">
                    <img src="{{ asset('images/Logo.png') }}" alt="">
                </div>
                <nav class="flex space-x-3 bg-red-600">
                    <a href="#">Новости</a>
                    <a href="#">Видео</a>
                    <a href="#">Виды уток</a>
                    <a href="#">История уток</a>                    
                </nav>
                <button class="py-2 px-3 bg-orange-brand text-white-brand">Связаться с нами</button>
            </header>
            <main>
                <section>

                </section>
                <section>

                </section>
            </main>
            <footer>

            </footer>
        </div>
    </body>
</html>
