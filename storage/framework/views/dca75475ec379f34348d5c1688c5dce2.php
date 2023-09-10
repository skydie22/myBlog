<?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade modal-borderless" id="delete-post<?php echo e($p->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action=<?php echo e(route('article.delete', $p->id)); ?> method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-body">
                    <center class="mt-3">
                        <p>
                            are you sure to delete this data?
                        </p>

                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Hapus!</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\myblog\resources\views/admin/article/delete.blade.php ENDPATH**/ ?>