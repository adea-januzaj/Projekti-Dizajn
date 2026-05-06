<?php
session_start();
include_once "database.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();



if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
    $stmt->execute([$name, $price, $id]);

    header("Location: manage-dresses.php");
    exit();
}


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
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);

    $image_hover = "";
    if (!empty($_FILES['image_hover']['name'])) {
        $image_hover = time() . "_hover_" . $_FILES['image_hover']['name'];
        move_uploaded_file($_FILES['image_hover']['tmp_name'], "uploads/" . $image_hover);
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


$editProduct = null;

if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$_GET['edit']]);
    $editProduct = $stmt->fetch(PDO::FETCH_ASSOC);
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
}

#main {
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
    color: #8c5c4a;
}

.dresses-container {
    max-width: 1050px;
    margin: 35px auto;
}

form {
    background: white;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 40px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

form input {
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #ddd;
}

form button {
    grid-column: 1 / -1;
    padding: 12px;
    background: #2C2C2C;
    color: white;
    border-radius: 20px;
    border: none;
}

form button:hover {
    background: #C89B8C;
}

table {
    width: 100%;
    background: white;
    border-radius: 15px;
    overflow: hidden;
}

th {
    background: #ead6cb;
    padding: 15px;
}

td {
    padding: 15px;
    text-align: center;
}

tr:hover {
    background: #fff8f5;
}

td img {
    width: 80px;
    border-radius: 10px;
}

.btn-delete {
    background: #2C2C2C;
    color: white;
    padding: 6px 12px;
    border-radius: 15px;
    text-decoration: none;
}

.btn-edit {
    background: #C89B8C;
    color: white;
    padding: 6px 12px;
    border-radius: 15px;
    text-decoration: none;
    margin-right: 5px;
}
</style>

<div id="main">

<section class="hero">
    <h1>Manage Dresses</h1>
</section>

<div class="dresses-container">

<form method="POST" enctype="multipart/form-data">

    <?php if ($editProduct): ?>
        <input type="hidden" name="id" value="<?= $editProduct['id'] ?>">
    <?php endif; ?>

    <input type="text" name="name" placeholder="Dress Name"
        value="<?= $editProduct ? htmlspecialchars($editProduct['name']) : '' ?>" required>

    <input type="number" step="0.01" name="price" placeholder="Price (€)"
        value="<?= $editProduct ? htmlspecialchars($editProduct['price']) : '' ?>" required>

    <?php if (!$editProduct): ?>
        <input type="file" name="image" required>
        <input type="file" name="image_hover">
    <?php endif; ?>

    <button name="<?= $editProduct ? 'update' : 'add' ?>">
        <?= $editProduct ? 'Update Dress' : 'Add Dress' ?>
    </button>

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
    <td><img src="uploads/<?= $p['image'] ?>"></td>
    <td>
        <a class="btn-edit" href="?edit=<?= $p['id'] ?>">Edit</a>
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
</div>

<?php include "Footer.php"; ?>