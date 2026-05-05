<?php
session_start();
include_once "Database.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();

// DELETE PRODUCT
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: manage-products.php");
    exit();
}

// FETCH PRODUCTS
$stmt = $conn->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include "Header.php"; include "sidenav.php"; ?>

<style>
body { font-family: 'Playfair Display', serif; background:#FAF7F5; }

.container {
    max-width: 1100px;
    margin: auto;
    padding: 40px;
}

h1 {
    text-align:center;
    color:#8c5c4a;
    margin-bottom:30px;
}

table {
    width:100%;
    border-collapse: collapse;
    background:white;
    border-radius:10px;
    overflow:hidden;
}

th, td {
    padding:15px;
    text-align:center;
}

th {
    background:#f0dfd4;
}

tr:nth-child(even) {
    background:#fafafa;
}

.btn-delete {
    background:#2C2C2C;
    color:white;
    padding:8px 14px;
    border-radius:20px;
    text-decoration:none;
}

.btn-delete:hover {
    background:#C89B8C;
}
</style>

<div class="container">
    <h1>Manage Dresses</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php foreach($products as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= $p['price'] ?> €</td>
            <td>
                <a class="btn-delete" href="?delete=<?= $p['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include "Footer.php"; ?>