<?php $__env->startSection('orderDeleted'); ?>
<div class="container mt-5">
    <div class="row">
        <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Meter</th>
                <th scope="col">EMP</th>
                <th scope="col">Created At</th>
                <th scope="col">Last Update</th>
                <th scope="col">WhoDelete</th>
                <th scope="col">Opraction</th>
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $comeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($data->id); ?></th>
                    <td><?php echo e($data->cname); ?></td>
                    <td><?php echo e($data->meter); ?></td>
                    <td><?php echo e($data->EMP); ?></td>
                    <td><?php echo e($data->created_at); ?></td>
                    <td><?php echo e($data->updated_at); ?></td>
                    <td><?php echo e($data->WhoDelete); ?></td>
                    <td>
                        <form action="<?php echo e(url('Orders/restore/'.$data->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            
                            <button type="submit" class=" btn btn-sm btn-info">Restore <i class="fas fa-trash-restore"></i></button>
                        </form>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\Laravel\RetajPrint\resources\views/RecycleBin.blade.php ENDPATH**/ ?>