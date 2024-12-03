<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">
    <link rel="stylesheet" href="<?php echo e(asset('css/partial.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 

    <link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">


    <meta property="og:title" content="MSOS: All-in-One Student Organizational System for Attendance, News & Online Shopping">


    <meta name="description" 
    content="Streamline your student organization with MSOS, the ultimate multifunctional student organizational system.
     MSOS offers an attendance tracker, a bulletin board for announcements, and an integrated online shop—everything you need to manage and engage your organization in one platform.">
</head>
<body>
    <!-- user header -->
   
        
    <?php echo $__env->make('includers.login_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="main_center">
    <main>

    <!-- <section class="hero">
        <div class="hero-content">
            <img src="/images/AOClogo.png" alt="alliance of coders">
            <h1>Welcome to MSOS</h1>
            <p>The Multifunctional Student <br class="hide"> Organizational System <br> 💙 were your needs are the priority 💙</p>
            <a href="#explore" class="hero-button">Explore Now</a>
        </div>
    </section> -->

    <section class="hero-section">
        <!-- Text Content -->
        <div class="hero-content">
            <h1>Welcome to <br> <span>MSOS DIGITAL SHOP</span></h1>
            <p>The Multifunctional Student Organizational System where your needs are the priority!!!
                <br> Discover the best tools and services designed to make your life easier. Join us to explore a world of possibilities.</p>
            <a href="<?php echo e(url('dashboard')); ?>">Get Started</a>
        </div>

        <!-- Hero Image -->
        <div class="hero-image">
            <img src="/images/download2.png" alt="Hero Image">
        </div>
    </section>
        <!-- Section 1 -->
         <br>
        <section class="grid-section " id="explore">
            <h2>More Sites</h2>
            <div class="grid-container">
                
                <a href="<?php echo e(url('https://attendance.msoshub.com/dashboard')); ?>">
                    <img src="<?php echo e(asset('/images/attendance.png')); ?>" alt="Image 1">
                    <p><i class="fa-solid fa-clipboard-user"></i> Attendance System</p>
                </a>

                <a href="<?php echo e(url('/dashboard')); ?>">
                    <img src="<?php echo e(asset('/images/MSOS.png')); ?>" alt="Image 1">
                    <p><i class="fa-solid fa-shop"></i> Organization Shop</p>
                </a>

                <a href="<?php echo e(url('https://bulletin.msoshub.com/dashboard')); ?>">
                    <img src="<?php echo e(asset('/images/online.png')); ?>" alt="Image 1">
                    <p><i class="fa-solid fa-clipboard-user"></i> Online Bulletin</p>
                </a>
              

                
            </div> 
        </section>

        <!-- Section 2 -->
        

    

    </main>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LARAVEL\msos3\resources\views/home/index.blade.php ENDPATH**/ ?>