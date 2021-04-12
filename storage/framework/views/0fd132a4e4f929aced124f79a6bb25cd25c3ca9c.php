<?php $__env->startSection('viewAllData'); ?>
    <div class="container">
        <div class="row">
            <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Meter</th>
                    <th scope="col">EMP</th>
                    <th scope="col">Created At <i class="far fa-calendar-alt"></i></th>
                    <th scope="col">Last Update <i class="far fa-calendar-alt"></i></th>
                    <th scope="col">WhoEdited <i class="fas fa-user"></i></th>
                    <th scope="col">Opraction <i class="fas fa-edit"></i></th>
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
                        <?php if($data->created_at == $data->updated_at): ?>
                        <td>--</td>
                        <?php else: ?>
                        <td><?php echo e($data->updated_at); ?></td>
                        <?php endif; ?>
                        <td><?php echo e($data->WhoEdited); ?></td>
                        <td>
                            <form action="<?php echo e(route('delete',$data->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <a href="<?php echo e(url('Orders/edit/'.$data->id)); ?>" class="col-5 btn btn-sm btn-info">Edit <i class="fa fa-edit"></i></a>
                                <button type="submit" class=" col-5 btn btn-sm btn-danger">Delete <i class="float-right fa fa-trash"></i></button>
                            </form>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mohamed Mahrous\Desktop\RetajPrint\resources\views/allDataView.blade.php ENDPATH**/ ?>