<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['pokemon']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['pokemon']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    // The list endpoint only gives name + url; the numeric id is the last
    // segment of the url, and we use it to build the artwork sprite path.
    $id = (int) basename(rtrim($pokemon['url'], '/'));
    $sprite = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{$id}.png";
?>

<div class="group relative flex flex-col items-center rounded-2xl border border-slate-800 bg-slate-900 p-4 transition hover:-translate-y-1 hover:border-slate-600 hover:shadow-lg hover:shadow-black/40">
    <span class="absolute right-3 top-3 text-xs font-semibold text-slate-500">
        #<?php echo e(str_pad($id, 3, '0', STR_PAD_LEFT)); ?>

    </span>

    <a href="<?php echo e(route('details', $pokemon['name'])); ?>" class="w-full">
        <img src="<?php echo e($sprite); ?>"
             alt="<?php echo e($pokemon['name']); ?>"
             loading="lazy"
             class="mx-auto h-28 w-28 object-contain drop-shadow transition group-hover:scale-110">
        <p class="mt-2 text-center font-semibold capitalize"><?php echo e($pokemon['name']); ?></p>
    </a>

    <a href="<?php echo e(route('setStarter', $pokemon['name'])); ?>"
       class="mt-3 w-full rounded-lg bg-red-500 px-3 py-1.5 text-center text-sm font-medium text-white transition hover:bg-red-600">
        Choose as starter
    </a>
</div>
<?php /**PATH /Users/rbjdonor/Development/repos/Pokedex/resources/views/components/pokemon-card.blade.php ENDPATH**/ ?>