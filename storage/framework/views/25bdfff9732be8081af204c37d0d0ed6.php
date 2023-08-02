<?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

    <div class="login_form" style="max-width: 450px; margin: 100px auto">

        <h3>Ticket yarat</h3>
        <form action="<?php echo e(route('tickets.store')); ?>" method="post" enctype='multipart/form-data'>
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Başlıq</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                <?php if($errors->first('name')): ?> <small class="form-text text-danger"><?php echo e($errors->first('name')); ?></small> <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Ətraflı</label>
                <textarea class="form-control" name="description"></textarea>
                <?php if($errors->first('description')): ?> <small class="form-text text-danger"><?php echo e($errors->first('description')); ?></small> <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Vaciblik</label>
                <select class="form-control" name="importance" id="">
                    <option value="Az">AZ</option>
                    <option value="Çox">Çox</option>
                    <option value="Orta">Orta</option>
                </select>
                <?php if($errors->first('importance')): ?> <small class="form-text text-danger"><?php echo e($errors->first('importance')); ?></small> <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Fayl</label>
                <input type="file" name="file" class="form-control" id="exampleFormControlInput1">
                <?php if($errors->first('file')): ?> <small class="form-text text-danger"><?php echo e($errors->first('file')); ?></small> <?php endif; ?>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>


    </div>

</div>

<?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\homework\resources\views/store_ticket.blade.php ENDPATH**/ ?>