<?php
session_start();
include_once "Header.php";
include_once "sidenav.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bellisse Collections</title>

<style>


* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {
    font-family: 'Playfair Display', serif;
    background: #f8f3ef;
    color: #2c2c2c;
}


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


<section class="collection">
    <h2>Royal Lace</h2>

    <div class="slider">
        <button class="arrow left">&#10094;</button>

        <div class="slides">
            <div class="card">
                <img src="Foto/3.png">
                <h3>Elara</h3>
                <p>Silk Corset Gown</p>
                <br>
            </div>

            <div class="card">
                <img src="Foto/25.png">
                <h3>Roselle</h3>
                <p>Floral Embellished Lace</p>
               
            </div>

            <div class="card">
                <img src="Foto/11.png">
                <h3>Virelle</h3>
                <p>Minimal Satin Cut</p>
           
            </div>

            <div class="card">
                <img src="Foto/15.png">
                <h3>Lumina</h3>
                <p>Draped Evening Dress</p>
               
            </div>

            <div class="card">
                <img src="Foto/10.png">
                <h3>Velina</h3>
                <p>Sheer Subtle Lace </p>
                
            </div>

            <div class="card">
                <img src="Foto/9.png">
                <h3>Noelle</h3>
                <p>Light Fluid Lace</p>
               
            </div>

            <div class="card">
                <img src="Foto/24.png">
                <h3>Evania</h3>
                <p>Vintage Modern Cut</p>
              
            </div>

            <div class="card">
                <img src="Foto/27.png">
                <h3>Almira</h3>
                <p>Intricate Refinished Lace</p>
              
            </div>
        </div>

        <button class="arrow right">&#10095;</button>
    </div>
</section>


<section class="collection">
    <h2>Soft Romance</h2>

    <div class="slider">
        <button class="arrow left">&#10094;</button>

        <div class="slides">
            <div class="card">
                <img src="Foto/32.png">
                <h3>Amoura</h3>
                <p>Soft Red Flow</p>
                <br>
            </div>

            <div class="card">
                <img src="Foto/33.png">
                <h3>Serene</h3>
                <p>Light Elegance</p>
               
            </div>

            <div class="card">
                <img src="Foto/34.png">
                <h3>Floria</h3>
                <p>Silhouette Detail</p>
                
            </div>
           
            <div class="card">
                <img src="Foto/35.png">
                <h3>Aveline</h3>
                <p>Floral Lace Detail</p>
              
            </div>
            <div class="card">
                <img src="Foto/36.png">
                <h3>Ismera</h3>
                <p>Fiery Grace</p>
               
            </div>
            <div class="card">
                <img src="Foto/37.png">
                <h3>Calira</h3>
                <p>Soft Confidence</p>
                
            </div>
            <div class="card">
                <img src="Foto/38.png">
                <h3>Mirelle</h3>
                <p>Ivory Lace Feel</p>
               
            </div>
            <div class="card">
                <img src="Foto/39.png">
                <h3>Rosie</h3>
                <p>Bold Feminine Look</p>
              
            </div>
            <div class="card">
                <img src="Foto/14.png">
                <h3>Zarela</h3>
                <p>Satin Soft Pearl</p>
               
            </div>

        </div>

        <button class="arrow right">&#10095;</button>
    </div>
</section>


<section class="collection">
    <h2>Floral Luxe</h2>

    <div class="slider">
        <button class="arrow left">&#10094;</button>

        <div class="slides">
            <div class="card">
                <img src="Foto/17.png">
                <h3>Florielle</h3>
                <p>Soft Bloom Elegance</p>
                <br>
            </div>

            <div class="card">
                <img src="Foto/7.png">
                <h3>Petalia</h3>
                <p>Wild Floral Grace</p>
            </div>

            <div class="card">
                <img src="Foto/30.png">
                <h3>Blooma</h3>
                <p>Floral Dream Essence</p>
            </div>

            <div class="card">
                <img src="Foto/29.png">
                <h3>Rosina</h3>
                <p>Garden Muse Beauty</p>
            </div>

            <div class="card">
                <img src="Foto/28.png">
                <h3>Fleuria</h3>
                <p>Delicate Blossom Glow</p>
            </div>

            <div class="card">
                <img src="Foto/1.png">
                <h3>Liora</h3>
                <p>Romantic Petal Charm</p>
            </div>

            <div class="card">
                <img src="Foto/31.png">
                <h3>Fiora</h3>
                <p>Floral Fantasy</p>
            </div>
        </div>
    
        <button class="arrow right">&#10095;</button>
    </div>
</section>


<section class="collection">
    <h2>Best Sellers</h2>

    <div class="slider">
        <button class="arrow left">&#10094;</button>

        <div class="slides">
            <div class="card">
                <img src="Foto/5.png">
                <h3>Liora</h3>
                <p>Timeless Ivory Elegance</p>
                <br>
            </div>

            <div class="card">
                <img src="Foto/6.png">
                <h3>Velisse</h3>
                <p>Golden Glow Confidence</p>
            </div>

            <div class="card">
                <img src="Foto/18.png">
                <h3>Noira</h3>
                <p>Soft Glam Statement</p>
            </div>

            <div class="card">
                <img src="Foto/8.png">
                <h3>Celina</h3>
                <p>Ocean Muse Elegance</p>
            </div>

            <div class="card">
                <img src="Foto/21.png">
                <h3>Virelle</h3>
                <p>Pure Icon Energy</p>
            </div>

            <div class="card">
                <img src="Foto/9.png">
                <h3>Velora</h3>
                <p>Playful Chic Vibes</p>
            </div>

            <div class="card">
                <img src="Foto/19.png">
                <h3>Celisse</h3>
                <p>Modern Sculpted Style</p>
            </div>

            <div class="card">
                <img src="Foto/20.png">
                <h3>Noira</h3>
                <p>Midnight Power Look</p>
            </div>

            <div class="card">
                <img src="Foto/26.png">
                <h3>Serelle</h3>
                <p>Blush Confidence Glow</p>
            </div>

            <div class="card">
                <img src="Foto/13.png">
                <h3>Aloura</h3>
                <p>Cool Chic Essence</p>
            </div>
        </div>

        <button class="arrow right">&#10095;</button>
    </div>
</section>

<script>


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


const sections = document.querySelectorAll('.collection');

function showSections() {
    sections.forEach(section => {
        const top = section.getBoundingClientRect().top;

        if (top < window.innerHeight - 100) {
            section.classList.add('show');
        }
    });
}


showSections();

window.addEventListener('scroll', showSections);

</script>
    <?php 
    include_once "Footer.php";
    ?>
</body>
</html>

