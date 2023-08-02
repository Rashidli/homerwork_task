<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
    <?php if(session('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
    <br>
    <br>
    <div class="list-group" style="max-width: 450px">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div  title="Edit" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Username: <?php echo e($user->username); ?></h5>
                    <div>
                        <a href="<?php echo e(route('edit_user', $user->id)); ?>" class="btn btn-primary">Editlə</a>
                        <a href="<?php echo e(route('delete_user', $user->id)); ?>" class="btn btn-danger">Sil</a>
                    </div>
                </div>
                <small class="text-body-secondary">Email: <?php echo e($user->email); ?></small>
                <?php if($user->is_active == true): ?>
                    <p class="mb-1">Active</p>
                <?php elseif($user->is_active == false): ?>
                    <p class="mb-1">Deactive</p>
                <?php endif; ?>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\homework\resources\views/admin/users_list.blade.php ENDPATH**/ ?>