@props(['pokemon'])

@php
    // The list endpoint only gives name + url; the numeric id is the last
    // segment of the url, and we use it to build the artwork sprite path.
    $id = (int) basename(rtrim($pokemon['url'], '/'));
    $sprite = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{$id}.png";
@endphp

<div class="group relative flex flex-col items-center rounded-2xl border border-slate-800 bg-slate-900 p-4 transition hover:-translate-y-1 hover:border-slate-600 hover:shadow-lg hover:shadow-black/40">
    <span class="absolute right-3 top-3 text-xs font-semibold text-slate-500">
        #{{ str_pad($id, 3, '0', STR_PAD_LEFT) }}
    </span>

    <a href="{{ route('details', $pokemon['name']) }}" class="w-full">
        <img src="{{ $sprite }}"
             alt="{{ $pokemon['name'] }}"
             loading="lazy"
             class="mx-auto h-28 w-28 object-contain drop-shadow transition group-hover:scale-110">
        <p class="mt-2 text-center font-semibold capitalize">{{ $pokemon['name'] }}</p>
    </a>

    <a href="{{ route('setStarter', $pokemon['name']) }}"
       class="mt-3 w-full rounded-lg bg-red-500 px-3 py-1.5 text-center text-sm font-medium text-white transition hover:bg-red-600">
        Choose as starter
    </a>
</div>
