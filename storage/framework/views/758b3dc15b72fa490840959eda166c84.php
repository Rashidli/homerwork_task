<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Homework</title>
</head>
<body>


<?php if(Auth::guard('web')->user()): ?>
    <header>
        <div class="container">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand"><?php echo e(Auth::guard('web')->user()->username); ?></a>
                    <a href="<?php echo e(route('user_logout')); ?>">Çıxış edin</a>
                </div>
            </nav>
        </div>
    </header>
    <br>
<?php endif; ?>
<?php /**PATH D:\homework\resources\views/includes/header.blade.php ENDPATH**/ ?>