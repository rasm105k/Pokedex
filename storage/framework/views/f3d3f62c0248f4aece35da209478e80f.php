<?php if(count($test)): ?>
    <section class="mt-10">
        <h2 class="mb-3 text-xl font-bold">My starters</h2>
        <div class="flex flex-wrap gap-3">
            <?php $__currentLoopData = $starters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $starter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="rounded-full border border-slate-700 bg-slate-800 px-4 py-1.5 text-sm font-medium capitalize">
                    <?php echo e(is_array($starter) ? $starter['name'] : $starter->name); ?>

                </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /Users/rbjdonor/Development/repos/Pokedex/resources/views/partials/myStarters.blade.php ENDPATH**/ ?>