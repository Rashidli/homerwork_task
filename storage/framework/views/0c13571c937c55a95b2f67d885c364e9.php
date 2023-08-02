<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
    <?php if(session('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
        <br>
        <br>
        <h3>Admin elave et</h3>
        <form action="<?php echo e(route('create_admin')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="text" placeholder="name" name="name">
            <br>
            <br>
            <input type="email" placeholder="email" name="email">
            <br>
            <br>
            <input type="password" placeholder="password" name="password">
            <br>
            <br>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label for=""><?php echo e($role->name); ?></label>
                <input type="checkbox" name="roles[]" value="<?php echo e($role->id); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br>
            <br>
            <button>Submit</button>
            <br>
            <br>
        </form>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <th scope="row"><?php echo e($admin->id); ?></th>
                    <td><?php echo e($admin->name); ?></td>
                    <td><?php echo e($admin->email); ?></td>
                    <td><?php $__currentLoopData = $admin->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($role->name); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                    <td><a href="<?php echo e(route('edit_admin', $admin->id)); ?>">Edit</a></td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </tbody>
        </table>
    <br>
    <div class="list-group" style="max-width: 450px">

    </div>
</div>

<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\homework\resources\views/admin/admin_list.blade.php ENDPATH**/ ?>