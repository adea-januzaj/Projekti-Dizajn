<?php
session_start();
include_once "Header.php";
include_once "sidenav.php";
include_once "database.php";

$db = new Database();
$conn = $db->getConnection();

// FETCH PRODUCTS
$stmt = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    .img-wrapper {
        position: relative;
        width: 100%;
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

        <?php if (count($products) === 0): ?>
            <p style="text-align:center; width:100%;">No dresses available.</p>
        <?php endif; ?>

        <?php foreach($products as $p): ?>

        <div class="dress-card">
            <div class="img-wrapper">

                <!-- DEFAULT IMAGE -->
                <img src="uploads/<?= htmlspecialchars($p['image']) ?>" class="img-default">

                <!-- HOVER IMAGE -->
                <?php if (!empty($p['image_hover'])): ?>
                    <img src="uploads/<?= htmlspecialchars($p['image_hover']) ?>" class="img-hover">
                <?php endif; ?>

            </div>

            <div class="dress-info">
                <h3><?= htmlspecialchars($p['name']) ?></h3>
                <p>€<?= $p['price'] ?></p>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
</main>

<?php include_once "Footer.php"; ?>

</body>
</html>