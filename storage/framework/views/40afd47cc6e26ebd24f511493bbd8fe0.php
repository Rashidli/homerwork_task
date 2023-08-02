<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

    <?php if(session('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
        <br>
        <br>
    <h3>Permission elave et</h3>
        <form action="<?php echo e(route('create_permission')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="text" placeholder="name" name="name">
            <br>
            <br>
            <input type="text" placeholder="slug" name="slug">
            <br><br>
            <button>Submit</button>
            <br>
            <br>
        </form>
    <ul>
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>name: <?php echo e($permission->name); ?> <br> slug: <?php echo e($permission->slug); ?> </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

</div>

<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\homework\resources\views/admin/permissions.blade.php ENDPATH**/ ?>