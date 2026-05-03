<?php 
session_start();
include "Header.php";
include "sidenav.php";
?>

<style>
    body {
        margin: 0;
        font-family: 'Playfair Display', serif;
        background-color: #FAF7F5;
        color: #2C2C2C;
    }

    #main {
        transition: margin-left .5s;
        padding: 20px;
    }

    .pageHeader {
        background-color: #F3E8E6;
        text-align: center;
        padding: 70px 20px;
        border-radius: 15px;
        margin-bottom: 40px;
    }

    .pageHeader h2 {
        font-size: 42px;
        letter-spacing: 3px;
        margin: 0;
        color: #2C2C2C;
    }

    .pageHeader p {
        font-size: 18px;
        color: #A67C6D;
        margin-top: 15px;
        font-style: italic;
    }

    .aboutContent {
        display: flex;
        justify-content: center;
        padding: 30px 20px 70px;
    }

    .aboutText {
        max-width: 850px;
        background-color: #FFFFFF;
        padding: 50px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .aboutText h3 {
        font-size: 26px;
        color: #C89B8C;
        margin-top: 25px;
        margin-bottom: 10px;
    }

    .aboutText h3:first-child {
        margin-top: 0;
    }

    .aboutText p {
        font-size: 17px;
        line-height: 1.8;
        color: #444;
    }

    .aboutText ul {
        padding-left: 20px;
        margin-top: 15px;
    }

    .aboutText li {
        font-size: 17px;
        margin-bottom: 12px;
        color: #444;
    }
</style>

<div id="main">
    <section class="pageHeader">
        <h2>About Bellisse</h2>
        <p>Elegance, beauty and confidence in every dress.</p>
    </section>

    <section class="aboutContent">
        <div class="aboutText">
            <h3>Who we are</h3>
            <p>
                Bellisse is an elegant online boutique created for women who love
                feminine style, timeless beauty and confidence. Our collection is
                focused on carefully selected dresses for special moments,
                summer days and elegant evenings.
            </p>

            <h3>Why we exist</h3>
            <p>
                We believe that the perfect dress can make every woman feel beautiful,
                confident and special. Bellisse was created to offer graceful dresses
                that combine elegance, comfort and modern style.
            </p>

            <h3>Our values</h3>
            <ul>
                <li>Elegance in every detail</li>
                <li>Quality and comfort</li>
                <li>Feminine and timeless style</li>
            </ul>
        </div>
    </section>
</div>

<?php 
include "Footer.php";
?>