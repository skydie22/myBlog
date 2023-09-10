<?php $__env->startSection('head'); ?>
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add New Article</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('article.store')); ?>" method="POST" enctype="multipart/form-data" id="formW">
                <div class="row">
                    <div class="col-7">

                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label for="basicInput">Title</label>
                            <input type="text" name="judul" required class="form-control" id="basicInput"
                                placeholder="Enter title" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="basicInput">Description</label>
                            <textarea class="form-control mb-3" id="editor" rows="10" name="deskripsi" required>
                        </textarea>
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="form-group mb-3">
                            <label for="basicInput">Category</label>
                            <select class="form-select" name="kategori_id" aria-label="Default select example">
                                <option selected>Select Option</option>
                                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="basicInput">Featured Image</label>
                            <input type="file" id="selectImage"  accept="img/*" onchange="showPreview(event)" class="form-control" name="foto">
                            <img id="preview" src="#" width="250px" height="200px" class="mt-3" style="display:none;"/>

                        </div>





                        <button type="submit" class="btn btn-primary mt-3">Save</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
      selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
                console.log('berhasil')
            }
        }
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\myblog\resources\views/admin/article/store.blade.php ENDPATH**/ ?>