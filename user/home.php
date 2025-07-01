<?php include('session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home2.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,200,0,0" />
    <!-- Linking Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</head>
<body class="wrapper">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo"><img src="../img/seedstead.png" alt=""></div>
            <ul class="nav-links">
                <?php include 'navbar.php'; ?> 
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="slider-container">
            <!-- Slider List Items -->
            <div class="slider-wrapper swiper-wrapper">
                <div class="slider-item swiper-slide">
                    <div class="slide-content">
                        <h3 class="slide-subtitle">Experience</h3>
                        <h2 class="slide-title">THE FUTURE OF GARDENING</h2>
                        <p class="slide-description">Discover a world of innovative solutions for your home garden, from high-quality seeds to advanced growing systems.</p>
                        <a href="product_user.php" class="slide-button"><span>SEE PRODUCT</span></a>
                    </div>
                </div>
                <div class="slider-item swiper-slide">
                    <div class="slide-content">
                        <h3 class="slide-subtitle">Gardening for Tomorrow</h3>
                        <h2 class="slide-title">GROW SMARTER WITH OUR SPECIAL SEEDS & SPROUTS</h2>
                        <p class="slide-description">Find the best seeds and sprouts, chosen to grow well in your garden.</p>
                        <a href="product_user.php" class="slide-button"><span>See Product</span></a>
                    </div>
                </div>
                <div class="slider-item swiper-slide">
                    <div class="slide-content">
                        <h3 class="slide-subtitle">Grow Smarter, Grow More</h3>
                        <h2 class="slide-title">BEGIN YOUR SUCCESSFUL GARDEN WITH OUR SPECIAL SEEDS</h2>
                        <p class="slide-description">From careful selection to modern growing insights, we ensure our seeds and sprouts give you the freshest and easiest harvests.</p>
                        <a href="product_user.php" class="slide-button"><span>See Product</span></a>
                    </div>
                </div>
            </div>
            <!-- Slider Pagination -->
            <div class="slider-controls">
                <ul class="slider-pagination">
                    <div class="slider-indicator"></div>
                    <li class="slider-tab current">First</li>
                    <li class="slider-tab">Second</li>
                    <li class="slider-tab">Third</li>
                </ul>
            </div>
            <!-- Slider Navigations (Prev/Next) -->
            <div class="slider-navigations">
                <button id="slide-prev" class="material-symbols-rounded">arrow_left_alt</button>
                <button id="slide-next" class="material-symbols-rounded">arrow_right_alt</button>
            </div>
        </div>
        <!-- Linking Swiper Script -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- Linking Custom Script -->
        <script src="../slider.js"></script>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-text">
                <h1>Discover<br>The Future Of<br>Gardening<br>With Our<br>Unique Seeds</h1>
                <p>Explore a world of vibrant possibilities with our curated selection of plant seeds, perfect for every green thumb.</p>
            </div>
            <div class="hero-image">
                <img src="../img/seeds-in-hands.png" alt="Gardening">
            </div>
        </section>

        <!-- Promo Section -->
        <section class="promo">
    <div class="promo-image-card">
        <img src="../img/gardening-activity.jpg" alt="Gardening tools">
    </div>
    <div class="promo-right-box">
        <p class="promo-label"><b>THE FUTURE OF GARDENING</b></p>
        <h2 class="promo-title">Explore Our Seed Collection</h2>
        <a href="product_user.php" class="btn promo-btn">shop now</a>
    </div>
</section>


    </main>

    <!-- Footer -->
    <footer>
        <p>© 2025 Seedstead | All Rights Reserved</p>
    </footer>
</body>
</html>
