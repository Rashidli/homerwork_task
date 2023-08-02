<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

    <?php if(session('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
    <br>
    <br>
    <h3>Role elave et</h3>
    <form action="<?php echo e(route('create_role')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="text" placeholder="name" name="name">
        <br>
        <br>
        <input type="text" placeholder="slug" name="slug">
        <br>
        <br>
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label for=""><?php echo e($permission->name); ?></label>
            <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br>
        <br>
        <button>Submit</button>
        <br>
        <br>
    </form>
    <ul>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>name: <?php echo e($role->name); ?> <br> slug: <?php echo e($role->slug); ?> <br> permissions: <br> <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($p->name); ?><br> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  <a href="<?php echo e(route('edit_role', $role->id)); ?>">Edit</a> </li>
            <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

</div>

<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\homework\resources\views/admin/roles.blade.php ENDPATH**/ ?>