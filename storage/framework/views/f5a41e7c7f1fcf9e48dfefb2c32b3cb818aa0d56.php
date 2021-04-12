<?php $__env->startSection('Comment'); ?>

<div class="container mt-5">
    <div class="row">
      <div class="col-12">

        <div class=" h4 hide" role="alert" style="display: none"></div>

       <form id="form">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="exampleInputEmail1">New Comment</label>
            <input name="newcomment" type="text" class="form-control" id="newcomment"  aria-describedby="newcomment" placeholder="Type Comment Here">
            <?php $__errorArgs = ['newcomment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small id="newcomment" class="form-text  text-danger"><?php echo e('* '.$message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button id='saveComment' type="submit" class="btn btn-sm btn-primary">Save Comment</button>
       </form>
      </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('AddCommentScript'); ?>
<script>

$('#saveComment').click(function(event){
    // Stop the browser from submitting the form.
    event.preventDefault();

    var formData = new FormData($('#form')[0]);

            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('StoreComment')); ?>",
                data : formData,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                            $('.hide').html(data.MSG).addClass('text-success').slideDown(200).delay(2000).slideUp(200
                        ,function () {
                            $('input[name="newcomment"]').val("")
                            $('.hide').removeClass("text-success")
                        });
                },error:function(data){
                    var errors = data.responseJSON;
                        $('.hide').html(errors.message).addClass('text-danger').slideDown(300).delay(3000).slideUp(300
                    ,function () {
                        $('input[name="newcomment"]')
                        $('.hide').removeClass("text-danger")
                    });
                }
            });

});



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\Laravel\RetajPrint\resources\views/NewComment.blade.php ENDPATH**/ ?>