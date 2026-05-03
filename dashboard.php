<?php
session_start();
include_once 'Database.php';
include_once 'config.php';

if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$database = new Database();
$conn = $database->getConnection();

try {
    $users_count = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();
    $products_count = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
    $contacts_count = $conn->query("SELECT COUNT(*) FROM contact_messages")->fetchColumn();
} catch(PDOException $e) {
    $users_count = 0;
    $products_count = 0;
    $contacts_count = 0;
    $db_error = "Gabim në databazë: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Bellisse Admin Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: 'Playfair Display', serif;
            background-color: #FAF7F5;
            color: #2C2C2C;
        }

        header {
            background-color: #F3E8E6;
            padding: 25px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #E5DAD6;
        }

        .brand {
            font-size: 30px;
            letter-spacing: 3px;
            font-weight: bold;
        }

        .admin-welcome {
            font-size: 15px;
        }

        .admin-welcome a {
            color: #C89B8C;
            text-decoration: none;
            font-weight: bold;
        }

        .admin-welcome a:hover {
            color: #2C2C2C;
        }

        .dashboard {
            padding: 60px 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            font-size: 42px;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .subtitle {
            color: #A67C6D;
            margin-bottom: 40px;
            font-style: italic;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 50px;
        }

        .stat-card {
            background: #FFFFFF;
            padding: 35px;
            border-radius: 15px;
            text-align: center;
            border: 1px solid #E5DAD6;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        }

        .stat-card h3 {
            font-size: 22px;
            color: #C89B8C;
        }

        .stat-number {
            font-size: 50px;
            color: #2C2C2C;
            font-weight: bold;
            margin: 15px 0;
        }

        .stat-card p {
            color: #777;
        }

        .admin-menu {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .admin-btn {
            background: #2C2C2C;
            padding: 22px;
            text-align: center;
            border-radius: 30px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
            font-weight: bold;
        }

        .admin-btn:hover {
            background: #C89B8C;
        }

        .error-box {
            background: #F8D7DA;
            color: #842029;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        @media(max-width: 900px) {
            .stats-grid,
            .admin-menu {
                grid-template-columns: 1fr;
            }

            header {
                padding: 20px;
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="brand">BELLISSE</div>

    <div class="admin-welcome">
        <?php 
        if(isset($_SESSION['name']) && isset($_SESSION['surname'])) {
            echo htmlspecialchars($_SESSION['name'] . ' ' . $_SESSION['surname']);
        } else {
            echo 'Admin';
        }
        ?>
        |
        <a href="logout.php">Logout</a>
    </div>
</header>

<section class="dashboard">
    <h1>Admin Dashboard</h1>
    <p class="subtitle">Manage Bellisse users, dresses and messages.</p>

    <?php if(isset($db_error)): ?>
        <div class="error-box">
            <?php echo htmlspecialchars($db_error); ?>
        </div>
    <?php endif; ?>

    <div class="stats-grid">
        <div class="stat-card">
            <h3>Users</h3>
            <div class="stat-number"><?php echo $users_count; ?></div>
            <p>Registered users</p>
        </div>

        <div class="stat-card">
            <h3>Dresses</h3>
            <div class="stat-number"><?php echo $products_count; ?></div>
            <p>Available dresses</p>
        </div>

        <div class="stat-card">
            <h3>Messages</h3>
            <div class="stat-number"><?php echo $contacts_count; ?></div>
            <p>Contact form messages</p>
        </div>
    </div>

    <div class="admin-menu">
        <a href="manage-products.php" class="admin-btn">Manage Dresses</a>
        <a href="manage-users.php" class="admin-btn">Manage Users</a>
        <a href="view-contacts.php" class="admin-btn">View Messages</a>
        <a href="home.php" class="admin-btn">Home</a>
    </div>
</section>

</body>
</html>