<x-layout title="All Pokémon">
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight">Gotta catch 'em all</h1>
        <p class="mt-1 text-slate-400">Choose your starters — {{ count($pokemons) }} Pokémon available.</p>
    </div>

    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
        @foreach ($pokemons as $pokemon)
            <x-pokemon-card :pokemon="$pokemon" />
        @endforeach
    </div>
</x-layout>
