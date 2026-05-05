<?php
session_start();
include_once "Header.php";
include_once "sidenav.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dresses - Bellisse</title>

<style>
    body {
        margin: 0;
        font-family: 'Playfair Display', serif;
        background-color: #FAF7F5;
        color: #2C2C2C;
    }

    .dresses-page {
        padding: 40px 20px;
    }

    .pageHeader {
        background: linear-gradient(to right, #f5ece6, #f0dfd4);
        text-align: center;
        padding: 50px 20px;
        border-radius: 15px;
        margin-bottom: 70px;
    }

    .pageHeader h1 {
        font-size: 42px;
        letter-spacing: 3px;
        margin: 0;
        color: #8c5c4a;
    }

    .pageHeader p {
        font-size: 18px;
        color: #6F5C55;
        margin-top: 15px;
    }

    .dresses-grid {
        display: grid;
        grid-template-columns: repeat(3, 300px);
        gap: 90px 80px;
        justify-content: center;
    }

    .dress-card {
        width: 300px;
        background-color: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        transition: 0.3s ease;
    }

    .dress-card:hover {
        transform: translateY(-8px);
    }

    .dress-card img {
        width: 100%;
        height: auto;
        display: block;
    }
    .img-wrapper {
    position: relative;
    width: 100%;
    height: auto;
    }

    .img-wrapper img {
    width: 100%;
    display: block;
    transition: opacity 0.4s ease;
    }

    .img-hover {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    }

    .dress-card:hover .img-hover {
    opacity: 1;
    }

    .dress-card:hover .img-default {
    opacity: 0;
    }

    .dress-info {
        padding: 18px 20px 22px;
    }

    .dress-info h3 {
        font-size: 22px;
        margin: 0 0 8px;
    }

    .dress-info p {
        font-size: 17px;
        color: #B88A7A;
        font-weight: bold;
        margin: 0;
    }

    @media(max-width: 950px) {
        .dresses-grid {
            grid-template-columns: repeat(2, 300px);
        }
    }

    @media(max-width: 600px) {
        .dresses-grid {
            grid-template-columns: 1fr;
        }

        .dress-card {
            width: 90%;
            margin: 0 auto;
        }
    }
</style>
</head>

<body>

<main class="dresses-page">
    <section class="pageHeader">
        <h1>Dresses</h1>
        <p>Discover elegant dresses made for every beautiful moment.</p>
    </section>

    <div class="dresses-grid">

       <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/5.png" class="img-default">
        <img src="Foto/5.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Elara</h3>
        <p>€120</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/6.png" class="img-default">
        <img src="Foto/6.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Roselle</h3>
        <p>€150</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/7.png" class="img-default">
        <img src="Foto/7.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Virelle</h3>
        <p>€110</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/8.png" class="img-default">
        <img src="Foto/8.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Lumina</h3>
        <p>€135</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/9.png" class="img-default">
        <img src="Foto/9.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Velina</h3>
        <p>€95</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/10.png" class="img-default">
        <img src="Foto/10.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Noelle</h3>
        <p>€105</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/11.png" class="img-default">
        <img src="Foto/11.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Amoura</h3>
        <p>€140</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/12.png" class="img-default">
        <img src="Foto/12.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Serene</h3>
        <p>€125</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/13.png" class="img-default">
        <img src="Foto/13.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Aveline</h3>
        <p>€160</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/14.png" class="img-default">
        <img src="Foto/14.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Ismera</h3>
        <p>€130</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/15.png" class="img-default">
        <img src="Foto/15.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Calira</h3>
        <p>€145</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/16.png" class="img-default">
        <img src="Foto/16.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Mirelle</h3>
        <p>€155</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/17.png" class="img-default">
        <img src="Foto/17.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Florielle</h3>
        <p>€118</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/18.png" class="img-default">
        <img src="Foto/18.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Petalia</h3>
        <p>€128</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/19.png" class="img-default">
        <img src="Foto/19.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Rosina</h3>
        <p>€100</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/20.png" class="img-default">
        <img src="Foto/20.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Velora</h3>
        <p>€170</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/21.png" class="img-default">
        <img src="Foto/21.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Celisse</h3>
        <p>€165</p>
    </div>
    </div>

        <div class="dress-card">
    <div class="img-wrapper">
        <img src="Foto/22.png" class="img-default">
        <img src="Foto/22.1.png" class="img-hover">
    </div>
    <div class="dress-info">
        <h3>Noira</h3>
        <p>€180</p>
    </div>
    </div>

    </div>
</main>

<?php include_once "Footer.php"; ?>

</body>
</html>