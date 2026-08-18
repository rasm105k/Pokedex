<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => ucfirst($pokemon->name)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(ucfirst($pokemon->name))]); ?>
    <a href="<?php echo e(url('/index')); ?>" class="mb-6 inline-flex items-center gap-1 text-sm text-slate-400 hover:text-white">
        &larr; Back to all Pokémon
    </a>

    <div class="grid gap-8 rounded-2xl border border-slate-800 bg-slate-900 p-6 md:grid-cols-2">
        <div class="flex flex-col items-center justify-center rounded-xl bg-slate-950/50 p-6">
            <div class="flex flex-wrap items-center justify-center gap-4">
                <?php if($pokemon->sprites->front_default): ?>
                    <img src="<?php echo e($pokemon->sprites->front_default); ?>" alt="<?php echo e($pokemon->name); ?> front"
                         class="h-40 w-40 object-contain [image-rendering:pixelated]">
                <?php endif; ?>
                <?php if($pokemon->sprites->back_default): ?>
                    <img src="<?php echo e($pokemon->sprites->back_default); ?>" alt="<?php echo e($pokemon->name); ?> back"
                         class="h-40 w-40 object-contain [image-rendering:pixelated]">
                <?php endif; ?>
            </div>
        </div>

        <div>
            <span class="text-sm font-semibold text-slate-500">#<?php echo e(str_pad($pokemon->id, 3, '0', STR_PAD_LEFT)); ?></span>
            <h1 class="text-3xl font-bold capitalize"><?php echo e($pokemon->name); ?></h1>

            <div class="mt-3 flex flex-wrap gap-2">
                <?php $__currentLoopData = $pokemon->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="rounded-full bg-slate-800 px-3 py-1 text-xs font-medium capitalize text-slate-200">
                        <?php echo e($t->type->name); ?>

                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <dl class="mt-6 grid grid-cols-2 gap-4 text-sm">
                <div class="rounded-lg bg-slate-950/50 p-3">
                    <dt class="text-slate-400">Height</dt>
                    <dd class="text-lg font-semibold"><?php echo e($pokemon->height / 10); ?> m</dd>
                </div>
                <div class="rounded-lg bg-slate-950/50 p-3">
                    <dt class="text-slate-400">Weight</dt>
                    <dd class="text-lg font-semibold"><?php echo e($pokemon->weight / 10); ?> kg</dd>
                </div>
            </dl>

            <a href="<?php echo e(route('setStarter', $pokemon->name)); ?>"
               class="mt-6 inline-block rounded-lg bg-red-500 px-5 py-2.5 font-medium text-white transition hover:bg-red-600">
                Choose as starter
            </a>
        </div>
    </div>

    <?php echo $__env->make('partials.myStarters', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH /Users/rbjdonor/Development/repos/Pokedex/resources/views/details.blade.php ENDPATH**/ ?>