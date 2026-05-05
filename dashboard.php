<?php
session_start();
include_once "Database.php";

if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$database = new Database();
$conn = $database->getConnection();

$users_count = 0;
$products_count = 0;
$contacts_count = 0;
$db_error = "";

try {
    $users_count = $conn->query("SELECT COUNT(*) FROM useri")->fetchColumn();

    try {
        $products_count = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
    } catch (PDOException $e) {
        $products_count = 0;
    }

    try {
        $contacts_count = $conn->query("SELECT COUNT(*) FROM contact_messages")->fetchColumn();
    } catch (PDOException $e) {
        $contacts_count = 0;
    }

} catch (PDOException $e) {
    $db_error = "Gabim në databazë: " . $e->getMessage();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bellisse Admin Dashboard</title>
</head>

<body>
<?php
include_once "Header.php";
include_once "sidenav.php";
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

    .dashboard {
        max-width: 1200px;
        margin: 0 auto;
        padding: 50px 30px;
    }

    .pageHeader {
        background: linear-gradient(to right, #f5ece6, #f0dfd4);
        text-align: center;
        padding: 55px 20px;
        border-radius: 15px;
        margin-bottom: 45px;
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
        font-style: italic;
    }

    .error-box {
        background-color: #F8D7DA;
        color: #842029;
        padding: 16px;
        border-radius: 10px;
        margin-bottom: 30px;
        text-align: center;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-bottom: 45px;
    }

    .stat-card {
        background-color: #FFFFFF;
        padding: 40px 25px;
        text-align: center;
        border-radius: 15px;
        border: 1px solid #E5DAD6;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    }

    .stat-card h3 {
        color: #C89B8C;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .stat-number {
        font-size: 52px;
        font-weight: bold;
        margin: 15px 0;
        color: #2C2C2C;
    }

    .stat-card p {
        color: #777;
        font-size: 16px;
    }

    .admin-menu {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
    }

    .admin-btn {
        background-color: #2C2C2C;
        color: white;
        padding: 20px;
        text-align: center;
        border-radius: 35px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .admin-btn:hover {
        background-color: #C89B8C;
    }

    @media(max-width: 900px) {
        .stats-grid,
        .admin-menu {
            grid-template-columns: 1fr;
        }
    }
</style>

<div id="main">
    <section class="dashboard">

        <section class="pageHeader">
            <h1>Admin Dashboard</h1>
            <p>Manage Bellisse users, dresses and messages.</p>
        </section>

        <?php if(!empty($db_error)): ?>
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
            <a href="manage-users.php" class="admin-btn">Manage Users</a>
            <a href="manage-dresses.php" class="admin-btn">Manage Dresses</a>
            <a href="view-messages.php" class="admin-btn">View Messages</a>
        </div>

    </section>
</div>

<?php
include_once "Footer.php";
?>
</body>