@props(['title' => 'Pokédex'])

<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased">
    <header class="sticky top-0 z-10 border-b border-slate-800 bg-slate-900/80 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center gap-3 px-4 py-4">
            <a href="{{ url('/index') }}" class="flex items-center gap-2 font-bold tracking-tight">
                <span class="grid h-7 w-7 place-items-center rounded-full bg-red-500 ring-2 ring-slate-100">
                    <span class="h-2 w-2 rounded-full bg-slate-100"></span>
                </span>
                <span class="text-lg">Pokédex</span>
            </a>
            <nav class="ml-auto flex items-center gap-4 text-sm text-slate-300">
                <a href="{{ url('/index') }}" class="hover:text-white">All Pokémon</a>
                <a href="{{ route('getMyStarters') }}" class="hover:text-white">My starters</a>
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8">
        {{ $slot }}
    </main>
</body>
</html>
