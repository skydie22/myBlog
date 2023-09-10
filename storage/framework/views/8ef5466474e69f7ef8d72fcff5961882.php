<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Article</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                        <a href="<?php echo e(route('article.create')); ?>" class="btn btn-primary">Add Article</a>

                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Desc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($p->judul); ?></td>
                                    
                                    <td><?php echo e(Str::limit(strip_tags($p->deskripsi), 50)); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('article.update', $p->id)); ?>" class="btn btn-success">update</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-post<?php echo e($p->id); ?>">delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <?php echo $__env->make('admin.article.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\myblog\resources\views/admin/article/index.blade.php ENDPATH**/ ?>