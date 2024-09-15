<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container card mt-3">
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
    <div class="text-center mt-3">
        <h4 class="text-shadow">Quản lý tài khoản người dùng</h4>
    </div>
    <div class="text-end mb-3 ">
        <form action="">
            <input type="search" name="search" id="" class="  " value="<?php echo e(request('search')); ?>">
         <button class="btn btn-secondary" type="submit">tìm kiếm</button>
        </form>
    </div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Avatar</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->ten); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e(ucfirst($user->vai_tro)); ?></td>
                <td>
                    <?php if($user->anh_dai_dien): ?>
                        <img src="<?php echo e(asset('storage/' . $user->anh_dai_dien)); ?>" alt="Avatar" width="50">
                    <?php else: ?>
                        No Avatar
                    <?php endif; ?>
                </td>
                <td><div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="thaotac_tk" data-bs-toggle="dropdown" aria-expanded="false">
                      Thao tác
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="thaotac_tk">
                      <li><a class="dropdown-item btn btn-warning" href="<?php echo e(route('admin.users.show',$user->id)); ?>">xem chi tiết</a></li>
                      <li>
                        <form action="<?php echo e(route('admin.users.destroy',$user->id)); ?>" method="post" onsubmit="return confirm('ban chắc chắn xóa khong?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger " type="submit">Xóa tài khoản</button>
                        </form>
                      </li>

                    </ul>
                  </div>

                    
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
    <div>
        <?php echo e($users->links('pagination::bootstrap-5')); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\i-Zone\resources\views/admins/taikhoans/index.blade.php ENDPATH**/ ?>