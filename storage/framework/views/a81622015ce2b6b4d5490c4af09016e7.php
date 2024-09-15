<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container card m-3">
<div class="mt-3 text-center">
    <h4>Chi Tiết Tài Khoản</h4>
</div>
<div>
    <div class="row">
        <div class="col-6">
            <form action="">
                <div class="mb-3">
                    <label for="" class="form-label">Tên tài khoản:</label>
                    <input type="text" class="form-control" value="<?php echo e($user->ten); ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email:</label>
                    <input type="email" class="form-control" value="<?php echo e($user->email); ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mật Khẩu:</label>
                    <input type="password" class="form-control" value="<?php echo e($user->mat_khau); ?>" disabled>
                </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Số điện thoại:</label>
                    <input type="text" class="form-control" value="<?php echo e($user->so_dien_thoai); ?>" disabled>
                </div>
            </form>
        </div>
        <div class="col-6">
            <form action="">
                <div class="mb-3">
                    <label for="" class="form-label">Ảnh đại diện:</label>
                    <img src="<?php echo e(Storage::url($user->anh_dai_dien)); ?>" alt="ảnh đại diện" width="80px" class="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Vai trò:</label>
                    <input type="text" class="form-control" value="<?php echo e($user->vai_tro); ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">ngày sinh:</label>
                    <input type="text" class="form-control" value="<?php echo e($user->ngay_sinh); ?>" disabled>
                </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" value="<?php echo e($user->dia_chi); ?>" disabled>
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="text-center mb-3">
        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-secondary">Quay lại</a>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\i-Zone\resources\views/admins/taikhoans/show.blade.php ENDPATH**/ ?>