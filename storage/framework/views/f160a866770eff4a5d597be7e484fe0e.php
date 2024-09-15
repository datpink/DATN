

<?php $__env->startSection('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <nav class="mb-3" aria-label="breadcrumb">

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item active"><a href="/brands">Trang chủ</a></li>

                <li class="breadcrumb-item">Cập nhật thương hiệu</li>

            </ol>

        </nav>
        <h4 class="mb-3">Cập nhật thương hiệu</h4>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('brands.update', $brand->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group mb-3">
                <label for="name">Brand Name:</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?php echo e(old('name', $brand->name)); ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo e(old('description', $brand->description)); ?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Brand</button>
            <a href="<?php echo e(route('brands.index')); ?>" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.all.min.js"></script>

    <?php if(session('update')): ?>
        <script>
            Swal.fire({
                position: "top",
                icon: "success",
                title: "Cập nhật thành công",
                showConfirmButton: false,
                timerProgressBar: true, // Hiển thị thanh thời gian
                timer: 1500
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\DATN-WD44\resources\views/admin/brands/edit.blade.php ENDPATH**/ ?>