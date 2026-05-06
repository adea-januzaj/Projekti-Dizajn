<?php
session_start();
include_once "Database.php";

if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM useri WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: manage-users.php");
    exit();
}


$users = $conn->query("SELECT * FROM useri")->fetchAll(PDO::FETCH_ASSOC);
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

th { background:#f0dfd4; }

.btn {
    background:#2C2C2C;
    color:white;
    padding:8px 14px;
    border-radius:20px;
    text-decoration:none;
}

.btn:hover { background:#C89B8C; }
</style>

<div id="main">
<section class="hero" id="hero">

    <h1>Manage Users</h1>
    
    </section>

    <div class="users-container">
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php foreach($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['username']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td>
                <a class="btn" href="?delete=<?= $u['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
<?php include "Footer.php"; ?>

