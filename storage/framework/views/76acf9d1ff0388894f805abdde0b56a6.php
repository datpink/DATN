<!-- resources/views/admin/comments/index.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3>Danh sách bình luận</h3>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Người dùng</th>
                    <th>Bài viết</th>
                    <th>Nội dung</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->index + 1); ?></td>
                        <td><?php echo e($comment->user->name ?? ''); ?></td>
                        <td><?php echo e($comment->post->title ?? ''); ?></td>
                        <td><?php echo e($comment->content); ?></td>
                        <td>
                            <form action="<?php echo e(route('comments.destroy', $comment->id)); ?>" method="POST"
                                style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger delete-btn">Xóa</button>
                            </form>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#responseModal"
                                data-id="<?php echo e($comment->id); ?>" data-user="<?php echo e($comment->user->name ?? ''); ?>"
                                data-content="<?php echo e($comment->content); ?>">Phản
                                hồi</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-lg shadow-lg">
                <div class="modal-header border-b-2 p-4">
                    <h5 class="modal-title text-lg font-semibold" id="responseModalLabel">Phản hồi bình luận</h5>
                    <button type="button" class="close rounded hover:bg-gray-200" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form id="responseForm" action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="commentId" name="comment_id">
                        <div class="flex flex-col space-y-4">
                            <div class="form-group flex items-center">
                                <label for="user" class="mr-2 font-medium">Người dùng:</label>
                                <input type="text" class="form-control flex-1 border-gray-300 rounded" id="user"
                                    readonly>
                            </div>
                            <div class="form-group flex items-center">
                                <label for="content" class="mr-2 font-medium">Nội dung bình luận:</label>
                                <input type="text" class="form-control flex-1 border-gray-300 rounded" id="content"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label for="response" class="font-medium">Phản hồi:</label>
                            <textarea class="form-control border-gray-300 rounded" id="response" name="response" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Gửi phản hồi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.all.min.js"></script>

    <script>
        $('#responseModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var commentId = button.data('id'); // Extract info from data-* attributes
            var userName = button.data('user');
            var commentContent = button.data('content');

            var modal = $(this);
            modal.find('#commentId').val(commentId);
            modal.find('#user').val(userName);
            modal.find('#content').val(commentContent);
            modal.find('#responseForm').attr('action', '/comments/respond/' + commentId);
        });

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

    
    <?php if(session()->has('respond')): ?>
        <script>
            Swal.fire({
                position: "top",
                icon: "warning",
                title: "Phản hồi ?",
                text:'Có quần què gì đâu mà phản với chả hồi?',
                showConfirmButton: false,
                timerProgressBar: true, // Hiển thị thanh thời gian
                timer: 3500
            });
        </script>
    <?php endif; ?>


    
    <?php if(session()->has('destroyComment')): ?>
        <script>
            Swal.fire({
                position: "top",
                icon: "success",
                title: "Xóa thành công",
                showConfirmButton: false,
                timerProgressBar: true, // Hiển thị thanh thời gian
                timer: 1500
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\DATN-WD44\resources\views/admin/comments/list.blade.php ENDPATH**/ ?>