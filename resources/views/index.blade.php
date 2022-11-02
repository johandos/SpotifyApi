<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Api all music</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 text-gray-700">
        <div class="container mx-auto px-4">
            <h1 class="text-center p-4 text-3xl">Api all music</h1>
            <a class="mb-6 inline-flex justify-center rounded-lg text-sm font-semibold py-3 px-4 bg-white/0 text-slate-900 ring-1 ring-slate-900/10 hover:bg-white/25 hover:ring-slate-900/15 " href="/documentation">
                <span>Conectar con Spotify <span aria-hidden="true" class="text-black/25 sm:inline">→</span></span>
            </a>
            <h2>Mis Album favoritos</h2>
            <div class="grid grid-cols-3 my-10">
                @foreach($favoriteList as $favorite)
                    <div class="bg-white hover:bg-blue-100 border border-gray-200 p-5">
                        <h2 class="font-bold text-lg mb-4">{{ $favorite->name }}</h2>
                        <p class="text-xs">{{ $favorite->excerpt }}</p>
                        <p class="text-xs text-right">{{ $favorite->published_at }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mb-10">
                {{$favoriteList->links()}}
            </div>
        </div>
    </body>
</html>
