

<?php $__env->startSection('title', 'Daftar Campaign'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h2 class="mb-4 fw-bold text-center">Jelajahi <span class="text-success">Campaign</span></h2>

    <form method="GET" action="<?php echo e(route('campaign.index')); ?>" class="d-flex flex-wrap justify-content-center align-items-center gap-2 mb-4">
        <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control" placeholder="Cari campaign..." style="max-width: 250px;">
        
        <select name="category" class="form-select" style="max-width: 200px;">
            <option value="">Semua Kategori</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                    <?php echo e($category->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <button class="btn btn-success" type="submit" style="min-width: 100px;">Filter</button>
        <a href="<?php echo e(route('campaign.index')); ?>" class="btn btn-outline-secondary" style="min-width: 100px;">Reset</a>
    </form>


    
    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4">
                <div class="card h-100 d-flex flex-column justify-content-between">
                    <img src="<?php echo e($campaign->thumbnail ? asset('storage/thumbnails/' . $campaign->thumbnail) : 'https://placehold.co/320x200/C4C4C4/FFF?text=No+Image'); ?>"
                         class="card-img-top" style="width:100%; height: 200px; object-fit: cover;"
                         alt="<?php echo e($campaign->title); ?>">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title fw-bold">
                            <a href="<?php echo e(route('campaign.show', $campaign->id)); ?>" class="text-dark text-decoration-none">
                                <?php echo e($campaign->title); ?>

                            </a>
                        </h5>
                        <p class="small text-muted mb-1"><strong><?php echo e($campaign->category->name ?? '-'); ?></strong></p>
                        <p class="card-text"><?php echo e(\Illuminate\Support\Str::limit($campaign->description, 100)); ?></p>
                        <p class="small text-muted">Terkumpul: <strong>Rp<?php echo e(number_format($campaign->collected_amount, 0, ',', '.')); ?></strong></p>
                        <a href="<?php echo e(route('campaign.show', $campaign->id)); ?>" class="btn btn-green mt-auto">Donasi Sekarang</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada campaign yang tersedia.</p>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="mt-4 d-flex justify-content-center">
        <?php echo e($campaigns->withQueryString()->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Herd\upjfund\resources\views/pages/campaign/index.blade.php ENDPATH**/ ?>