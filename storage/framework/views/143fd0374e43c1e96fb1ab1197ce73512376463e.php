<?php $__env->startSection('TotalMeter'); ?>
<div class="container mt-5">
    <div class="row">
        <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Meter</th>
              </tr>
            </thead>
            <tbody>
                
                <tr>
                    <th scope="row">today</th>
                    <th scope="row"><?php echo e($data); ?></th>
                  </tr>
                
            </tbody>
          </table>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\Laravel\RetajPrint\resources\views/totalmeter.blade.php ENDPATH**/ ?>