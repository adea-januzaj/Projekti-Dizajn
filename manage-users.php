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
body { font-family:'Playfair Display'; background:#FAF7F5; }

.container { max-width:1100px; margin:auto; padding:40px; }

h1 { text-align:center; color:#8c5c4a; margin-bottom:30px; }

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

<div class="container">
    <h1>Manage Users</h1>

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

<?php include "Footer.php"; ?>