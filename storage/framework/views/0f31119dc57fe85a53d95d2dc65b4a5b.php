<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
    <?php if(session('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

    <br>
    <div class="list-group" style="max-width: 450px">
        <?php $__currentLoopData = $user->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="list-group-item list-group-item-action">
    <a href="<?php echo e(route('ticket.messages.admin',$ticket->id)); ?>" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo e($ticket->name); ?></h5>
            <small class="text-body-secondary"><?php echo e($ticket->created_at); ?></small>

        </div>
        <p class="mb-1">Vaciblik: <?php echo e($ticket->importance); ?></p>
        File:
        <a target="_blank" href="<?php echo e(asset($ticket->file)); ?>">File</a>
    </a>
</div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\homework\resources\views/admin/user-tickets.blade.php ENDPATH**/ ?>