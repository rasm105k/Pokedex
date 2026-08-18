<x-layout title="My starters">
    <div class="mb-6 flex items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold">My starters</h1>
            <p class="mt-1 text-sm text-slate-400">Pokémon saved in your local database.</p>
        </div>
        <a href="{{ url('/index') }}" class="text-sm text-slate-400 hover:text-white">
            &larr; Back to Pokédex
        </a>
    </div>

    @if ($starters->isEmpty())
        <div class="rounded-xl border border-slate-800 bg-slate-900 p-6 text-slate-400">
            You have not selected any starters yet.
        </div>
    @else
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($starters as $starter)
                <a href="{{ route('details', $starter->name) }}"
                   class="flex items-center gap-4 rounded-xl border border-slate-800 bg-slate-900 p-4 transition hover:border-slate-700 hover:bg-slate-800/80">
                    @if ($starter->sprite_url)
                        <img src="{{ $starter->sprite_url }}" alt="{{ $starter->name }}"
                             class="h-20 w-20 object-contain [image-rendering:pixelated]">
                    @endif
                    <div>
                        <div class="text-xs font-semibold text-slate-500">#{{ str_pad($starter->pokeapi_id, 3, '0', STR_PAD_LEFT) }}</div>
                        <div class="text-lg font-semibold capitalize">{{ $starter->name }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</x-layout>
