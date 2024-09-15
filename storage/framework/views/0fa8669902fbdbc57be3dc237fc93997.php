<ol class="breadcrumb d-md-flex d-none">
    <li class="breadcrumb-item">
        <i class="bi bi-house"></i>
        <a href="<?php echo e(url('admin')); ?>">Home</a>
    </li>
    <?php if(!empty($title)): ?>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page"><?php echo e($title); ?></li>
    <?php endif; ?>
</ol>
<?php /**PATH D:\laragon\www\DATN-WD44\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>