<?php $__env->startSection('edit'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="<?php echo e(route('update',$get->id)); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="exampleInputEmail1">Customer Name</label>
                    <input name="cname" type="text" class="form-control" id="cname" value="<?php echo e($get->cname); ?>" aria-describedby="cname" placeholder="Customer Name">
                    <?php $__errorArgs = ['cname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small id="cname" class="form-text  text-danger"><?php echo e('* '.$message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Full Meter</label>
                    <input name="meter" type="number" class="form-control" value="<?php echo e($get->meter); ?>" id="meter" aria-describedby="meter" placeholder="Full meter">
                    <?php $__errorArgs = ['meter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small id="meter" class="form-text  text-danger"><?php echo e('* '.$message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-primary">Save Update</button>

            </form>
            <?php if(Session::has('success')): ?>
            <div class="alert alert-success mt-2" id="smoth"><?php echo e(Session::get('success')); ?>  <a href="<?php echo e(url('/home')); ?>">If You Want Back To DashBorad Click Me</a> </div>
            <?php endif; ?>
            <?php if(Session::has('faild')): ?>
            <div class="alert alert-danger mt-2" id="smoth"><?php echo e(Session::get('faild')); ?></div>
            <?php endif; ?>

            <p class="h3 text-center" >Last Update</p>
            <table class="table table-striped mt-5">
                <thead>
                  <tr>
                    <th scope="col">N.o</th>
                    <th scope="col">Name</th>
                    <th scope="col">Meter</th>
                    <th scope="col">Time Edit</th>
                    <th scope="col">EMP Edit</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $getlast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getlasts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th><?php echo e($getlasts->id); ?></th>
                    <td><?php echo e($getlasts->cname); ?></td>
                    <td><?php echo e($getlasts->meter); ?></td>
                    <td><?php echo e($getlasts->updated_at); ?></td>
                    <td><?php echo e($getlasts->WhoEdited); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\Laravel\RetajPrint\resources\views/edit.blade.php ENDPATH**/ ?>