<x-layout :title="ucfirst($pokemon->name)">
    <a href="{{ url('/index') }}" class="mb-6 inline-flex items-center gap-1 text-sm text-slate-400 hover:text-white">
        &larr; Back to all Pokémon
    </a>

    <div class="grid gap-8 rounded-2xl border border-slate-800 bg-slate-900 p-6 md:grid-cols-2">
        <div class="flex flex-col items-center justify-center rounded-xl bg-slate-950/50 p-6">
            <div class="flex flex-wrap items-center justify-center gap-4">
                @if($pokemon->sprites->front_default)
                    <img src="{{ $pokemon->sprites->front_default }}" alt="{{ $pokemon->name }} front"
                         class="h-40 w-40 object-contain [image-rendering:pixelated]">
                @endif
                @if($pokemon->sprites->back_default)
                    <img src="{{ $pokemon->sprites->back_default }}" alt="{{ $pokemon->name }} back"
                         class="h-40 w-40 object-contain [image-rendering:pixelated]">
                @endif
            </div>
        </div>

        <div>
            <span class="text-sm font-semibold text-slate-500">#{{ str_pad($pokemon->id, 3, '0', STR_PAD_LEFT) }}</span>
            <h1 class="text-3xl font-bold capitalize">{{ $pokemon->name }}</h1>

            <div class="mt-3 flex flex-wrap gap-2">
                @foreach ($pokemon->types as $t)
                    <span class="rounded-full bg-slate-800 px-3 py-1 text-xs font-medium capitalize text-slate-200">
                        {{ $t->type->name }}
                    </span>
                @endforeach
            </div>

            <dl class="mt-6 grid grid-cols-2 gap-4 text-sm">
                <div class="rounded-lg bg-slate-950/50 p-3">
                    <dt class="text-slate-400">Height</dt>
                    <dd class="text-lg font-semibold">{{ $pokemon->height / 10 }} m</dd>
                </div>
                <div class="rounded-lg bg-slate-950/50 p-3">
                    <dt class="text-slate-400">Weight</dt>
                    <dd class="text-lg font-semibold">{{ $pokemon->weight / 10 }} kg</dd>
                </div>
            </dl>

            <a href="{{ route('setStarter', $pokemon->name) }}"
               class="mt-6 inline-block rounded-lg bg-red-500 px-5 py-2.5 font-medium text-white transition hover:bg-red-600">
                Choose as starter
            </a>
        </div>
    </div>

    @include('partials.myStarters')
</x-layout>
