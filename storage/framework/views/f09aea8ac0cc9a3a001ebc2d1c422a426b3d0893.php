<?php $__env->startSection('content'); ?>
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Cars
            </h1>
        </div>

        <?php if(Auth::user()): ?>
            <div class="pt-10">
                <a 
                    href="cars/create"
                    class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Add a new car &rarr;
                </a>
            </div>
            <?php else: ?>
                <p class="py-12 italic">
                    Please login to add a new car.
                </p>
        <?php endif; ?>

        <div class="w-5/6 py-10">
            <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="m-auto">
                    <?php if(isset(Auth::user()->id) && Auth::user()->id == $car->user_id): ?>
                        <div class="float-right">
                            <a 
                                class="border-b-2 pb-2 border-dotted italic text-green-500"
                                href="cars/<?php echo e($car->id); ?>/edit">
                                Edit &rarr;
                            </a>

                            <form action="/cars/<?php echo e($car->id); ?>" class="pt-3" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button 
                                    type="submit"
                                    class="border-b-2 pb-2 border-dotted italic text-red-500">
                                        Delete &rarr;
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>

                    <img 
                        src="<?php echo e(asset('images/'. $car->image_path)); ?>"
                        class="w-40 mb-8 shadow-xl" 
                    />
                    <span 
                    class="uppercase text-blue-500 font-bold text-xs italic">
                        Founded: <?php echo e($car->founded); ?>

                    </span>

                    <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                        <a href="/cars/<?php echo e($car->id); ?>">
                            <?php echo e($car->name); ?>

                        </a>
                    </h2>

                    <p class="text-lg text-gray-700 py-6">
                        <?php echo e($car->description); ?>

                    </p>

                    <hr class="mt-4 mb-8">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php echo e($cars->links()); ?>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\izzat\Downloads\laravel8-for-beginners-main\resources\views/cars/index.blade.php ENDPATH**/ ?>