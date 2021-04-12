<?php $__env->startSection('welcome'); ?>

<div class="container">
    <div class="row text-center mt-5">
        <div class="title col-12 text-secondary">
            <h1>Welcome In RetajPrint WebSite </h1>
        </div>
        <div class="title col-12 text-secondary h5">
            <?php if(auth()->guard()->guest()): ?>

                <?php if(Route::has('login')): ?>
                    <p>To Make Any Operations Login from  <a class="" href="<?php echo e(url('login')); ?>">here :)</a></p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/etos/348ED4248ED3DC84/AppServ/www/Larvel/RetajPrint/resources/views/welcome.blade.php ENDPATH**/ ?>