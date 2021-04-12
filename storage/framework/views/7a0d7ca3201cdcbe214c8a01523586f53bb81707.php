<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retaj</title>

    
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/CustomJs.js')); ?>"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery-ui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/CustomeCss.css')); ?>">

</head>

<body>



    <nav class="navbar navbar-expand-lg   navbar-dark bg-dark " >
        <div class="container">
      <a class="navbar-brand" href="<?php echo e(url('home')); ?>">Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('Orders/AddView')); ?>">Add Order <i class="fa fa-plus"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('Orders/All')); ?>">All Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('Orders/RecycleBin')); ?>">RecycleBin <i class="fa fa-trash"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('Comment/NewComment')); ?>">Add Comment <i class="far fa-sticky-note"></i></a>
            </li>

        </ul>
        <div class="form-inline my-2 my-lg-0">

          <ul class="navbar-nav ml-auto">
            <?php if(auth()->guard()->guest()): ?>
            <?php if(Route::has('login')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                </li>
            <?php endif; ?>

            <?php if(Route::has('register')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                </li>
            <?php endif; ?>
        <?php else: ?>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <?php echo e(Auth::user()->name); ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
                        <?php echo e(__('Logout')); ?>

                    </a>

                    <a href="<?php echo e(url('/')); ?>" class="dropdown-item"><i class="fas fa-globe"></i> VistWebSite </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </li>
        <?php endif; ?>
        </ul>
    </div>

      </div>

        </div>
    </nav>

    <div class="space mt-5 w-100"></div>


    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->yieldContent('welcome'); ?>
    <?php echo $__env->yieldContent('addOrder'); ?>
    <?php echo $__env->yieldContent('viewAllData'); ?>
    <?php echo $__env->yieldContent('edit'); ?>
    <?php echo $__env->yieldContent('orderDeleted'); ?>
    <?php echo $__env->yieldContent('TotalMeter'); ?>
    <?php echo $__env->yieldContent('Comment'); ?>
    <?php echo $__env->yieldContent('index'); ?>
    <?php echo $__env->yieldContent('AddCommentScript'); ?>
    <?php echo $__env->yieldContent('AddOrderScript'); ?>
    <?php echo $__env->yieldContent('AdminScripts'); ?>
    <?php echo $__env->yieldContent('test'); ?>
</body>
</html>
<?php /**PATH C:\AppServ\www\Laravel\RetajPrint\resources\views/layouts/master.blade.php ENDPATH**/ ?>