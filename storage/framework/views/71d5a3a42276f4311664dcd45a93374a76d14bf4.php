<?php $__env->startSection('test'); ?>
<form action="<?php echo e(url('CA')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="age">
    <input type="submit">

</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\Larvel\RetajPrint\resources\views/test.blade.php ENDPATH**/ ?>