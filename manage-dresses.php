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
.dresses-container {
    max-width: 1050px;
    margin: 35px auto 60px;
    padding: 0 25px;
}

form {
    background: rgba(255, 255, 255, 0.75);
    padding: 28px;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    margin-bottom: 45px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}

form input {
    width: 100%;
    padding: 14px 16px;
    border-radius: 12px;
    border: 1px solid #e1cfc6;
    background: #fffaf7;
    font-family: 'Playfair Display', serif;
    font-size: 15px;
    color: #3e2f2f;
    box-sizing: border-box;
}

form input:focus {
    outline: none;
    border-color: #C89B8C;
    box-shadow: 0 0 0 3px rgba(200,155,140,0.18);
}

form input[type="file"] {
    background: white;
    cursor: pointer;
}

form button {
    grid-column: 1 / -1;
    justify-self: center;
    min-width: 180px;
    padding: 13px 28px;
    background: #2C2C2C;
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-family: 'Playfair Display', serif;
    font-size: 15px;
    transition: 0.3s ease;
}

form button:hover {
    background: #C89B8C;
    transform: translateY(-2px);
}

table {
    width: 100%;
    background: white;
    border-collapse: collapse;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
}

th {
    background: #ead6cb;
    color: #3e2f2f;
    font-size: 16px;
    padding: 18px;
}

td {
    padding: 20px 18px;
    text-align: center;
    vertical-align: middle;
    border-bottom: 1px solid #f1e4df;
    font-size: 15px;
}

tr:last-child td {
    border-bottom: none;
}

tr:hover {
    background: #fff8f5;
}

td img {
    width: 85px;
    height: 115px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 5px 12px rgba(0,0,0,0.08);
}

.btn-delete {
    background: #2C2C2C;
    color: white;
    padding: 8px 18px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s ease;
}

.btn-delete:hover {
    background: #C89B8C;
}

@media (max-width: 768px) {
    form {
        grid-template-columns: 1fr;
    }

    .dresses-container {
        max-width: 100%;
        padding: 0 15px;
    }

    table {
        font-size: 14px;
    }

    th, td {
        padding: 12px;
    }
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
     
    <div class="dresses-container">
   
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
</div>
<?php include "Footer.php"; ?>
