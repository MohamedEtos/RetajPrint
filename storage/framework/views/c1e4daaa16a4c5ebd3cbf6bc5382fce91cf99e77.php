<?php $__env->startSection('content'); ?>


<div class="container main_dash mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="total members">
                <h6><?php echo e($countCustomers); ?></h6>
                <i class=" fa fa-users user_icon"></i>
                <h6>Number Of Clients </h6>
                <a href="<?php echo e(url('Orders/All')); ?>" class="text-reset">
                    <div class="footer_panel">
                        more info <i class="fas fa-arrow-alt-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-md-3">
            <div class="total pending">
                <h6><?php echo e($countOrders); ?></h6>
                <i class="fas fa-chart-line user_icon"></i>
                <h6>Printed Orders</h6>
                <a href="<?php echo e(url('Orders/All')); ?>" class="text-reset">
                    <div class="footer_panel">
                        more info <i class="fas fa-arrow-alt-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="total item">
                <h6><?php echo e($countMeter); ?> </h6>
                <i class="fas fa-ruler user_icon"></i>
                <h6>Total Meter Printing</h6>
                <a href="<?php echo e(url('Orders/totalmeter')); ?>" class="text-reset">
                    <div class="footer_panel">
                        more info <i class="fas fa-arrow-alt-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="total comments">
                <h6><?php echo e($countDeleted); ?></h6>
                <i class=" fa  fa-trash user_icon"></i>
                <h6>Total Orders Deleted</h6>
                    <a href="<?php echo e(url('Orders/RecycleBin')); ?>" class="text-reset">

                    <div class="footer_panel">
                            more info <i class="fas fa-arrow-alt-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default lastes lastes_sky">
                <div class="panel-heading panel-h">
                    <i class="fa fa-users"></i>
                    <span class="h5">Lastes Orders</span>
                    <span id="Success" class="text-danger" ></span>
                    <span class="plus toggle fa-pull-right">
                        <i class="fa fa-minus"></i>
                    </span>
                </div>
                <div class="panel-body panel-b">

                    <div class="hide" >
                    <?php $__currentLoopData = $AllTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row rowID<?php echo e($Customer->id); ?>">
                            <div class="col-md-6  text-left mb-1 testt">
                                <span href="<?php echo e(url('Orders/edit/'.$Customer->id)); ?>" class="text-reset cname"><?php echo e($Customer->cname); ?></span> <br>
                                <input type="hidden" class="meter" value="<?php echo e($Customer->meter); ?>" name="" id="">
                            </div>
                            <div class="col-md-6  text-right mb-1">
                                
                                    <a  href="<?php echo e(url('Orders/edit/'.$Customer->id)); ?>" class='text-reset mr-2 edit'><i class="fa fa-edit icon_scale"></i></a>
                                    <a  order_id="<?php echo e($Customer->id); ?>" class='text-reset mr-2 Delete'><i class="fa fa-trash icon_scale text-danger"></i></a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
            <div class="panel panel-default lastes lastes_yeallo">
                <div class="panel-heading panel-h">
                    <span class="plus toggle fa-pull-right">
                        <i class="fa fa-minus  "></i>


                    </span>
                    <i class="fas fa-chart-line"></i>
                    <span>Today</span>
                </div>
                <div class="panel-body panel-b">
                    <div class="row mb-1">
                        <div class="col-6 ">
                            <span><a href="<?php echo e(url('Orders/totalmeter')); ?>" class="text-reset h5"></span>
                                Printed Today
                            </a>
                        </div>
                        <div class=" col-6 mt-2 h5">
                            <?php echo e($today); ?> Meters
                        </div>
                    </div>


                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="panel panel-default lastes lastes_red">
                <div class="panel-heading panel-h">
                    <span class="plus toggle fa-pull-right">
                        <i class="fa fa-minus  "></i>
                    </span>
                    <i class="fa fa-comment"></i>
                    <span>Lastest Note From EMP</span>
                </div>
                <div class="panel-body panel-b">
                    <div class="row mb-1">
                        <?php $__currentLoopData = $LastComment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $LastComments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-3 last_users_comment_div">
                            <i class="fa fa-user"></i>
                            <span class="last_users_comment">
                                <?php echo e($LastComments->EmpCommet); ?>

                            </span>
                        </div>
                        <div class="col-9 last_comment_div">
                            <div class="arrors_comment"></div>
                            <p class="last_comment">
                                <?php echo e($LastComments->comment); ?>

                            </p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<?php $__env->stopSection(); ?>
<?php $__env->startSection('AdminScripts'); ?>
    <script>
        $(".Delete").click(function(e){
            e.preventDefault()

            // var formData = new FormData($('#form')[0]);
            // var orderid = $('#Delete').attr('order_id');
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('delete')); ?>",
                data: {
                    '_token':"<?php echo e(csrf_token()); ?>",
                    'id':$(this).attr('order_id')
                },
                success: function (data) {
                    $(".rowID" + data.id).slideUp(300);
                },errors:function(){
                }
            });

        })


    // $(".edit_name").html($(".cname").val());
    $(".edit").click(function(){
        $(".edit_name").val($(".cname").html());
        $(".edit_meter").val($(".meter").val())
    })



    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\Laravel\RetajPrint\resources\views//home.blade.php ENDPATH**/ ?>