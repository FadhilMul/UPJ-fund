<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">
        <a class="navbar-brand fw-bold" style="color: #74C69D" href="<?php echo e(route('home')); ?>">UPJ<span>fund</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="navbar-nav gap-4">
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('campaign.index')); ?>">Campaign</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('how-it-works')); ?>">How it works</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('about')); ?>">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('contact')); ?>">Contact</a></li>
            </ul>
        </div>

        <div class="d-flex gap-2 align-items-center">
            <?php if(auth()->guard()->check()): ?>
                <div class="dropdown">
                    <a class="btn btn-outline-light dropdown-toggle btn-sm" href="#" role="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> <?php echo e(Auth::user()->name); ?>

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfile">
                        <li><a class="dropdown-item" href="<?php echo e(route('profile.show')); ?>">Profil Saya</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                        <?php if(Auth::user()->is_admin): ?>
                            <li><a class="dropdown-item text-success" href="<?php echo e(route('admin.dashboard')); ?>">Dashboard Admin</a></li>
                        <?php endif; ?>
                        <li>
                            <form action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="<?php echo e(route('login.form')); ?>" class="btn btn-outline-light btn-sm">Login</a>
                <a href="<?php echo e(route('register.form')); ?>" class="btn btn-success btn-sm">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav><?php /**PATH C:\Herd\upjfund\resources\views/partials/navbar.blade.php ENDPATH**/ ?>