<nav class="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="<?php echo e(route('admin.index')); ?>" class="logo">
            <img src="<?php echo e(asset('theme/admin/assets/images/images.png')); ?>" alt="Admin Dashboards" width="150px">
        </a>
    </div>

    <div class="sidebar-menu">
        <div class="sidebarMenuScroll">
            <ul>
                <li class="active">
                    <a href="<?php echo e(route('admin.index')); ?>">
                        <i class="bi bi-house"></i>
                        <span class="menu-text">Dashboards</span>
                    </a>

                </li>

                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="bi bi-window-split"></i>
                        <span class="menu-text">Quản lý Đơn Hàng</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="<?php echo e(route('orders.index')); ?>">Danh sách đơn hàng</a>
                            </li>

                        </ul>
                    </div>
                </li>
                

            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\laragon\www\DATN\resources\views/admin/layouts/menu.blade.php ENDPATH**/ ?>