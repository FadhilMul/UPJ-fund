

<?php $__env->startSection('title', 'Buat Campaign'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h2 class="mb-4">Buat Campaign Baru</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($err); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('campaign.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Campaign</label>
            <input type="text" class="form-control" id="title" name="title" required value="<?php echo e(old('title')); ?>">
        </div>

        
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Campaign</label>
            <textarea class="form-control" id="description" name="description" rows="6" required><?php echo e(old('description')); ?></textarea>
        </div>

        
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail Campaign (upload gambar)</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" required>
        </div>

        
        <div class="mb-3">
            <label for="target_amount" class="form-label">Target Donasi (Rp)</label>
            <input type="number" class="form-control" id="target_amount" name="target_amount" required value="<?php echo e(old('target_amount')); ?>">
        </div>

        
        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required value="<?php echo e(old('start_date')); ?>">
        </div>

        
        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Berakhir</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required value="<?php echo e(old('end_date')); ?>">
        </div>

        <button type="submit" class="btn btn-green">Buat Campaign</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Herd\upjfund\resources\views/pages/campaign/create.blade.php ENDPATH**/ ?>