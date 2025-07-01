

<?php $__env->startSection('title', 'Beranda - UPJfund'); ?>

<?php $__env->startSection('content'); ?>

<section class="hero-section d-flex align-items-center justify-content-center text-white text-center position-relative">
    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>

    <div class="container position-relative z-1">
        <h1 class="display-4 fw-bold">Bantu Wujudkan <span style="color: #74C69D";>Impian dan <br> Kebutuhan</span> Warga Kampus!</h1>
        <p class="lead mt-3">Mari Berkontribusi! Bantu Sesama. Wujudkan Perubahan</p>
        <div class="mt-4">
            <a href="<?php echo e(route('campaign.index')); ?>" class="btn btn-green btn-lg me-2">Mulai Donasi</a>
            <a href="<?php echo e(route('campaign.create')); ?>" class="btn btn-outline-light btn-lg">Buat Campaign</a>
        </div>
    </div>
</section>



<section class="py-5 bg-soft-green">
    <div class="container">
        <h2 class="mb-4 text-center fw-bold"><span class="text-green">Campaign</span> Populer Saat Ini</h2>
        <div class="row g-4">
            <?php $__empty_1 = true; $__currentLoopData = $popularCampaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="<?php echo e($campaign->thumbnail ? asset('storage/thumbnails/' . $campaign->thumbnail) : 'https://placehold.co/320x200/C4C4C4/FFF'); ?>" class="card-img-top" alt="Campaign image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?php echo e($campaign->title); ?></h5>
                            <p class="card-text"><?php echo e(\Illuminate\Support\Str::limit($campaign->description, 100)); ?></p>
                            <p class="small text-muted">Terkumpul: <strong>Rp<?php echo e(number_format($campaign->collected_amount, 0, ',', '.')); ?></strong></p>
                            <a href="<?php echo e(route('campaign.show', $campaign->id)); ?>" class="btn btn-green w-100">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center text-muted">Belum ada campaign populer.</p>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="py-5" style="background-color: #d6f3e4;">
    <div class="container">
        <h2 class="mb-4 text-center fw-bold">Campaign <span class="text-green">Terbaru</span></h2>

        <?php $__empty_1 = true; $__currentLoopData = $latestCampaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo e($campaign->thumbnail ? asset('storage/thumbnails/' . $campaign->thumbnail) : 'https://placehold.co/530x250/C4C4C4/FFF'); ?>" class="img-fluid w-100 h-100 rounded-start" style="object-fit: cover; max-height: 250px;" alt="Campaign">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo e($campaign->title); ?></h5>
                        <p class="card-text"><?php echo e(\Illuminate\Support\Str::limit($campaign->description, 100)); ?></p>
                        <p class="small text-muted">Terkumpul: Rp<?php echo e(number_format($campaign->collected_amount, 0, ',', '.')); ?></p>
                        <a href="<?php echo e(route('campaign.show', $campaign->id)); ?>" class="btn btn-green">Donasi Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-center text-muted">Belum ada campaign terbaru.</p>
        <?php endif; ?>

        <div class="text-center mt-3">
            <a href="<?php echo e(route('campaign.index')); ?>" class="text-success text-decoration-none fw-semibold">Lihat semua</a>
        </div>
    </div>
</section>


<section class="py-5 bg-soft-green">
    <div class="container">
        <h3 class="mb-4 fw-bold text-center">Frequently Asked Questions</h3>
        <div class="accordion accordion-flush" id="faqAccordion">
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#answer1" aria-expanded="true" aria-controls="answer1">
                        Bagaimana cara berdonasi di UPJfund?
                    </button>
                </h2>
                <div id="answer1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        1. Pilih campaign yang ingin didukung. <br>
                        2. Klik <strong>"Donasi Sekarang"</strong>. <br>
                        3. Masukkan nominal, lengkapi data, dan pilih metode pembayaran. <br>
                        4. Konfirmasi dan bagikan campaign tersebut.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faq2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer2" aria-expanded="false" aria-controls="answer2">
                        Apakah saya perlu membuat akun untuk berdonasi?
                    </button>
                </h2>
                <div id="answer2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Tidak. Anda dapat berdonasi tanpa akun. Namun, dengan akun Anda bisa melihat riwayat donasi, menyimpan campaign favorit, dan membuat campaign sendiri.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faq3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer3" aria-expanded="false" aria-controls="answer3">
                        Bagaimana cara membuat campaign baru?
                    </button>
                </h2>
                <div id="answer3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        1. Login ke akun Anda <br>
                        2. Klik tombol <strong>"Buat Campaign"</strong> di beranda <br>
                        3. Lengkapi informasi campaign: judul, deskripsi, target, thumbnail, dan tanggal <br>
                        4. Campaign Anda akan langsung tayang setelah dikirim.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faq4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer4" aria-expanded="false" aria-controls="answer4">
                        Apakah UPJfund memotong dana donasi?
                    </button>
                </h2>
                <div id="answer4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        UPJfund tidak mengambil potongan dari dana donasi. Semua donasi akan langsung masuk ke campaign terkait. Namun, biaya transaksi pihak ketiga mungkin berlaku tergantung metode pembayaran.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="py-5" style="background: linear-gradient(to right, #72d8a6, #449f76); color: white;">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="mb-3 mb-md-0">
            <h4 class="fw-bold">MULAI SEKARANG!</h4>
        </div>
        <div>
            <a href="<?php echo e(route('campaign.index')); ?>" class="btn btn-light me-2">Mulai Donasi</a>
            <a href="<?php echo e(route('campaign.create')); ?>" class="btn btn-outline-light">Buat Campaign</a>
        </div>
    </div>
</section>


<footer class="py-4 bg-dark text-white">
    <div class="container d-flex flex-wrap justify-content-between">
        <div>
            <h6>NAVIGATE</h6>
            <ul class="list-unstyled">
                <li><a href="<?php echo e(route('home')); ?>" class="text-white text-decoration-none">Home</a></li>
                <li><a href="<?php echo e(route('campaign.index')); ?>" class="text-white text-decoration-none">Campaign</a></li>
                <li><a href="<?php echo e(route('how-it-works')); ?>" class="text-white text-decoration-none">How it Works</a></li>
            </ul>
        </div>
        <div>
            <h6>TERMS & CONDITIONS</h6>
            <ul class="list-unstyled">
                <li><a href="#" class="text-white text-decoration-none">Policy</a></li>
                <li><a href="#" class="text-white text-decoration-none">Disclaimer</a></li>
            </ul>
        </div>
        <div>
            <h6>OUR OFFICE</h6>
            <p class="small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
    <div class="text-center mt-3 small">
        © 2025 UPJfund Digital Platform.
    </div>
</footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Herd\upjfund\resources\views/pages/landing.blade.php ENDPATH**/ ?>