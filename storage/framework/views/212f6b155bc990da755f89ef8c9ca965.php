<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'UPJfund'); ?></title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    
    <style>
        body { 
            font-family: 'DM Sans', sans-serif; 
            background-color: #F1FAEF; 
        }

        .bg-soft-green { 
            background-color: #F1FAEF; 
        }

        .btn-green { 
            background-color: #74C69D; 
            color: #fff; 
        }

        .btn-green:hover { 
            background-color: #5faf87; 
            color: #fff; 
        }

        .text-green {
            color: #74C69D !important;
        }

        .hero-section {
            background: url('/images/hero.jpeg') no-repeat center center;
            background-size: cover;
            min-height: 100vh;
            position: relative;
        }

        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .z-1 {
            z-index: 1;
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php /**PATH C:\Herd\upjfund\resources\views/layouts/app.blade.php ENDPATH**/ ?>