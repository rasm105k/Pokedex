@if (count($starters))
    <section class="mt-10">
        <h2 class="mb-3 text-xl font-bold">My starters</h2>
        <div class="flex flex-wrap gap-3">
            @foreach ($starters as $starter)
                <span class="rounded-full border border-slate-700 bg-slate-800 px-4 py-1.5 text-sm font-medium capitalize">
                    {{ is_array($starter) ? $starter['name'] : $starter->name }}
                </span>
            @endforeach
        </div>
    </section>
@endif
