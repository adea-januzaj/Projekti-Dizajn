<?php
include_once "Header.php";
include_once "sidenav.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bellisse Collections</title>

<style>

/* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* BODY */
body {
    font-family: 'Playfair Display', serif;
    background: #f8f3ef;
    color: #2c2c2c;
}

/* COLLECTION */
.collection {
    padding: 100px 60px;
    opacity: 0;
    transform: translateY(60px);
    transition: 1s ease;
}

.collection.show {
    opacity: 1;
    transform: translateY(0);
}

.collection h2 {
    font-size: 32px;
    margin-bottom: 40px;
    color: #b88a7a;
    letter-spacing: 3px;
}

/* SLIDER */
.slider {
    position: relative;
    display: flex;
    align-items: center;
}

.slides {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    gap: 25px;
    padding: 10px;
}

.slides::-webkit-scrollbar {
    display: none;
}

/* CARD */
.card {
    min-width: 260px;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    transition: 0.4s ease;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.card:hover {
    transform: translateY(-12px) scale(1.02);
}

.card img {
    width: 100%;
    height: 380px;
    object-fit: cover;
}

.card h3 {
    margin: 12px;
    font-size: 18px;
}

.card p {
    margin: 0 12px;
    font-size: 14px;
    color: #777;
}

.card span {
    display: block;
    margin: 12px;
    color: #b88a7a;
    font-weight: bold;
}

/* ARROWS */
.arrow {
    position: absolute;
    background: rgba(255,255,255,0.8);
    border: none;
    font-size: 28px;
    cursor: pointer;
    padding: 12px;
    z-index: 2;
    transition: 0.3s;
    border-radius: 50%;
}

.arrow:hover {
    background: #b88a7a;
    color: white;
}

.left { left: -10px; }
.right { right: -10px; }

/* RESPONSIVE */
@media(max-width:768px){
    .collection {
        padding: 60px 20px;
    }

    .card {
        min-width: 200px;
    }

    .card img {
        height: 300px;
    }
}

</style>
</head>

<body>

<!-- COLLECTION 1 -->
<section class="collection">
    <h2>Evening Elegance</h2>

    <div class="slider">
        <button class="arrow left">&#10094;</button>

        <div class="slides">
            <div class="card">
                <img src="uploads/dress1.jpg">
                <h3>Elara</h3>
                <p>Silk Corset Gown</p>
                <span>€120</span>
            </div>

            <div class="card">
                <img src="uploads/dress2.jpg">
                <h3>Roselle</h3>
                <p>Floral Embellished Dress</p>
                <span>€150</span>
            </div>

            <div class="card">
                <img src="uploads/dress3.jpg">
                <h3>Virelle</h3>
                <p>Minimal Satin Cut</p>
                <span>€110</span>
            </div>

            <div class="card">
                <img src="uploads/dress4.jpg">
                <h3>Lumina</h3>
                <p>Draped Evening Dress</p>
                <span>€135</span>
            </div>
        </div>

        <button class="arrow right">&#10095;</button>
    </div>
</section>

<!-- COLLECTION 2 -->
<section class="collection">
    <h2>Soft Romance</h2>

    <div class="slider">
        <button class="arrow left">&#10094;</button>

        <div class="slides">
            <div class="card">
                <img src="uploads/dress5.jpg">
                <h3>Amoura</h3>
                <p>Soft Pink Flow</p>
                <span>€140</span>
            </div>

            <div class="card">
                <img src="uploads/dress6.jpg">
                <h3>Serene</h3>
                <p>Light Silk Elegance</p>
                <span>€125</span>
            </div>

            <div class="card">
                <img src="uploads/dress7.jpg">
                <h3>Floria</h3>
                <p>Floral Lace Detail</p>
                <span>€160</span>
            </div>
        </div>

        <button class="arrow right">&#10095;</button>
    </div>
</section>

<!-- COLLECTION 3 -->
<section class="collection">
    <h2>Modern Muse</h2>

    <div class="slider">
        <button class="arrow left">&#10094;</button>

        <div class="slides">
            <div class="card">
                <img src="uploads/dress8.jpg">
                <h3>Noirelle</h3>
                <p>Bold Black Statement</p>
                <span>€180</span>
            </div>

            <div class="card">
                <img src="uploads/dress9.jpg">
                <h3>Velisse</h3>
                <p>Structured Corset Fit</p>
                <span>€155</span>
            </div>

            <div class="card">
                <img src="uploads/dress10.jpg">
                <h3>Ivoree</h3>
                <p>Classic Ivory Look</p>
                <span>€130</span>
            </div>
        </div>

        <button class="arrow right">&#10095;</button>
    </div>
</section>

<script>

// SLIDER
document.querySelectorAll('.slider').forEach(slider => {
    const slides = slider.querySelector('.slides');
    const left = slider.querySelector('.left');
    const right = slider.querySelector('.right');

    left.addEventListener('click', () => {
        slides.scrollBy({ left: -320, behavior: 'smooth' });
    });

    right.addEventListener('click', () => {
        slides.scrollBy({ left: 320, behavior: 'smooth' });
    });
});

// ANIMATION FIX
const sections = document.querySelectorAll('.collection');

function showSections() {
    sections.forEach(section => {
        const top = section.getBoundingClientRect().top;

        if (top < window.innerHeight - 100) {
            section.classList.add('show');
        }
    });
}

// SHFAQ DIREKT (fix problemi yt)
showSections();

window.addEventListener('scroll', showSections);

</script>
    <?php 
    include_once "Footer.php";
    ?>
</body>
</html>

