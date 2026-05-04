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

