<!-- resources/views/admin/brands/trash.blade.php -->



<?php $__env->startSection('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3>Thùng Rác</h3>
        <a href="<?php echo e(route('brands.index')); ?>" class="btn btn-primary mb-3">Quay lại danh sách</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên thương hiệu</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->index + 1); ?></td>
                        <td><?php echo e($brand->name); ?></td>
                        <td><?php echo e($brand->description); ?></td>
                        <td>
                            <!-- Khôi phục -->
                            <form action="<?php echo e(route('brands.restore', $brand->id)); ?>" method="POST"
                                style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit" class="btn btn-success">Khôi phục</button>
                            </form>
                            <!-- Xóa vĩnh viễn -->
                            <form action="<?php echo e(route('brands.delete-permanently', $brand->id)); ?>" method="POST"
                                style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger delete-btn">Xóa vĩnh viễn</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.all.min.js"></script>

    <script>
        // Xác nhận khi xóa brand
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    position: "top",
                    title: 'Bạn có chắc muốn xóa',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có',
                    cancelButtonText: 'Hủy',
                    timerProgressBar: true, // Hiển thị thanh thời gian
                    timer: 3500

                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>

    <?php if(session('restore')): ?>
        <script>
            Swal.fire({
                position: "top",
                icon: "success",
                title: "Khôi phục thành công",
                showConfirmButton: false,
                timerProgressBar: true, // Hiển thị thanh thời gian
                timer: 1500
            });
        </script>
    <?php endif; ?>


    <?php if(session('deletePermanently')): ?>
        <script>
            Swal.fire({
                position: "top",
                icon: "success",
                title: "Đã xóa vĩnh viễn",
                showConfirmButton: false,
                timerProgressBar: true, // Hiển thị thanh thời gian
                timer: 1500
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\DATN-WD44\resources\views/admin/brands/trash.blade.php ENDPATH**/ ?>