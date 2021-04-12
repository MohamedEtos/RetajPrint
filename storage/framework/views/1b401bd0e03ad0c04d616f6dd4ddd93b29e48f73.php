<?php $__env->startSection('addOrder'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <form id="addOrder">
                <?php echo csrf_field(); ?>
                
                <div class="text-success smoth mt-3 " id="Success" ></div>
                

                <div class="form-group">
                    <label for="exampleInputEmail1">Customer Name</label>
                    <input list="brow" name="cname" class="form-control">
                    <datalist id="brow">
                        <?php $__currentLoopData = $comeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->cname); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </datalist>
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
                    <input name="meter" type="number" class="form-control" id="meter" aria-describedby="meter" placeholder="Full meter">
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

                <button type="submit" id="SubmitFormAddOrder" class="btn btn-primary btn_smoth">Save Data</button>

            </form>

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('AddOrderScript'); ?>
<script>
        $("#SubmitFormAddOrder").click(function(e){
            e.preventDefault();


            var formData = new FormData($('#addOrder')[0]);

            $.ajax({
                type: "POST",
                url: "<?php echo e(route('AddOrders')); ?>",
                data : formData,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                    $("#Success").html(data.MSG).slideDown("fast").delay(2000).slideUp("fast");
                    $("input[name=meter]").val("").attr("placeholder","If you Want Add More Order To This Customer Type Here");
                },error: function(){

                }
            });

        });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\Larvel\RetajPrint\resources\views/addorder.blade.php ENDPATH**/ ?>