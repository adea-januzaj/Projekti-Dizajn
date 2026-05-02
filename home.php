<?php 
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bellisse</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <?php 
    include_once "Header.php";
    include_once "sidenav.php";
    ?>

    <div id="main" style="transition: margin-left .5s; padding: 20px;">
        <section class="hero" id="hero">
            <?php if(isset($_SESSION['username'])): ?>
                <h2>Welcome to Bellisse, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <?php else: ?>
                <h2>Elegance begins with the perfect dress.</h2>
            <?php endif; ?>
        </section>

        <br>

        <section class="about-preview">
            <div class="img-container">
                <img src="Foto/4.png" alt="Elegant dresses collection">
                
                <div class="text">
                    <h3>Discover your perfect dress</h3>
                    <p>
                        Bellisse is an elegant online boutique created for women who love beauty,
                        confidence and timeless style. From graceful evening dresses to feminine
                        everyday looks, every piece is chosen to make you feel special.
                    </p>
                    <a href="aboutus.php" id="learnmore">Learn more →</a>
                </div>
            </div>
        </section>

        <section class="featured">
        <h2>Featured Items</h2>
        <div class="items">
            <div class="item">
                <img src="Foto/1.png" alt="T-shirt">
                <p>Floral Dress - $60</p>
            </div>
            <div class="item">
                <img src="Foto/2.png" alt="Jacket">
                <p>Satin Dress - $80</p>
            </div>
            <div class="item">
                <img src="Foto/3.png" alt="Shoes">
                <p>Lace Dress - $140</p>
            </div>
        </div>
    </section>
    </div>
    <?php 
    include_once "Footer.php";
    ?>
</body>