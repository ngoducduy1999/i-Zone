<?php $__env->startSection('title', 'Danh sách banner'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Danh sách banner</h4>
            </div>

        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger" role="alert"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Danh sách banner</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Banner</th>
                                    <th>Banner</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($banner->id); ?></td>
                                        <td><?php echo e($banner->ten_banner); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset($banner->anh_banner)); ?>" alt="<?php echo e($banner->ten_banner); ?>"
                                                width="200px">
                                        </td>
                                        <td>
                                            <?php if($banner->trang_thai == 1): ?>
                                                <span class="badge badge-success bg-success">Hoạt động</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger bg-danger">Ngừng hoạt động</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="card-body">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Thao tác<i
                                                            class="mdi mdi-chevron-down"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('admin.banners.show', $banner->id)); ?>">Xem</a>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('admin.banners.edit', $banner->id)); ?>">Sửa</a>
                                                        <?php if($banner->trang_thai == 1): ?>
                                                            <form
                                                                action="<?php echo e(route('admin.banners.onOffBanner', $banner->id)); ?>"
                                                                method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('post'); ?>
                                                                <button class="dropdown-item" href="#">Ngừng hoạt
                                                                    động</button>
                                                            </form>
                                                        <?php else: ?>
                                                            <form
                                                                action="<?php echo e(route('admin.banners.onOffBanner', $banner->id)); ?>"
                                                                method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('post'); ?>
                                                                <button class="dropdown-item" href="#">Hoạt
                                                                    động</button>
                                                            </form>
                                                        <?php endif; ?>
                                                        <form action="<?php echo e(route('admin.banners.destroy', $banner->id)); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <button class="dropdown-item" onclick="return confirm('Xóa banner?')">Xóa</button>
                                                        </form>
                                                    </div>
                                                </div>


                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>





    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\i-Zone\resources\views/admins/banners/index.blade.php ENDPATH**/ ?>