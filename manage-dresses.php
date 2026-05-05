<?php
session_start();
include_once "database.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();



if (isset($_POST['add'])) {

    
    if (!empty($_SESSION['last_submit']) && time() - $_SESSION['last_submit'] < 2) {
        exit("Wait before submitting again.");
    }
    $_SESSION['last_submit'] = time();

    $name = $_POST['name'];
    $price = $_POST['price'];

    
    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    
    $image = time() . "_" . $_FILES['image']['name'];
    $tmp1 = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp1, "uploads/" . $image);

    
    $image_hover = "";
    if (!empty($_FILES['image_hover']['name'])) {
        $image_hover = time() . "_hover_" . $_FILES['image_hover']['name'];
        $tmp2 = $_FILES['image_hover']['tmp_name'];
        move_uploaded_file($tmp2, "uploads/" . $image_hover);
    }

    $stmt = $conn->prepare("
        INSERT INTO products (name, price, image, image_hover)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->execute([$name, $price, $image, $image_hover]);

    header("Location: manage-dresses.php");
    exit();
}



if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {

    $id = $_GET['delete'];

    
    $stmt = $conn->prepare("SELECT image, image_hover FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {

        if (!empty($product['image']) && file_exists("uploads/" . $product['image'])) {
            unlink("uploads/" . $product['image']);
        }

        if (!empty($product['image_hover']) && file_exists("uploads/" . $product['image_hover'])) {
            unlink("uploads/" . $product['image_hover']);
        }

        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }

    header("Location: manage-dresses.php");
    exit();
}



$stmt = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include "Header.php"; include "sidenav.php"; ?>

<style>
body { 
   font-family: 'Playfair Display', serif;
    background-color: #f5ece6;
    color: #3e2f2f;
    line-height: 1.6;
}
#main{
    transition: margin-left .5s;
    padding: 20px;
}
.hero {
     text-align: center;
    padding: 80px 20px;
    background: linear-gradient(to right, #f5ece6, #f0dfd4);
    border-radius: 12px;
}
.hero h1 {
    font-size: 2.5rem;
    font-weight: 500;
    color: #8c5c4a;
    letter-spacing: 1px;
}

form {
    text-align:center;
    margin-bottom:40px;
}

form input {
    padding:10px;
    margin:5px;
    border-radius:8px;
    border:1px solid #ddd;
}

button {
    padding:10px 20px;
    background:#2C2C2C;
    color:white;
    border:none;
    border-radius:20px;
    cursor:pointer;
}

button:hover {
    background:#C89B8C;
}

table {
    width:100%;
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

img {
    width:70px;
    border-radius:8px;
}

.btn-delete {
    background:#2C2C2C;
    color:white;
    padding:6px 12px;
    border-radius:15px;
    text-decoration:none;
}

.btn-delete:hover {
    background:#C89B8C;
}
</style>

<div id="main">
<section class="hero" id="hero">

    <h1>Manage Dresses</h1>
    
    </section>
</div>
   
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Dress Name" required>
        <input type="number" step="0.01" name="price" placeholder="Price (€)" required>
        <input type="file" name="image" required>
        <input type="file" name="image_hover">
        <button name="add">Add Dress</button>
    </form>

    
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php foreach($products as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= $p['price'] ?> €</td>
            <td>
                <img src="uploads/<?= $p['image'] ?>">
            </td>
            <td>
                <a class="btn-delete"
                   href="?delete=<?= $p['id'] ?>"
                   onclick="return confirm('Delete this dress?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>

<?php include "Footer.php"; ?>