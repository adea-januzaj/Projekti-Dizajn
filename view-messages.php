<?php
session_start();
include_once "Database.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();


if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM contact_messages WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: view-messages.php");
    exit();
}


$stmt = $conn->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php 
 include "Header.php";
 include "sidenav.php";
  ?>

<style>
body {
    font-family: 'Playfair Display', serif;
    background-color: #f5ece6;
    color: #3e2f2f;
    line-height: 1.6;
}


.container {
    max-width: 1000px;
    margin: auto;
    padding: 40px;
}

h1 {
    text-align: center;
    color: #8c5c4a;
    margin-bottom: 40px;
}

.message-card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.top {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.name {
    font-weight: bold;
    color: #2C2C2C;
}

.email {
    color: #777;
    font-size: 14px;
}

.date {
    font-size: 13px;
    color: #aaa;
}

.message-text {
    margin-top: 10px;
    color: #444;
    line-height: 1.5;
}

.btn-delete {
    display: inline-block;
    margin-top: 15px;
    padding: 6px 14px;
    background: #2C2C2C;
    color: white;
    border-radius: 20px;
    text-decoration: none;
    font-size: 14px;
}

.btn-delete:hover {
    background: #C89B8C;
}
</style>

<div class="container">
    <h1>Client Messages</h1>

    <?php if (count($messages) === 0): ?>
        <p style="text-align:center; color:#777;">No messages yet.</p>
    <?php endif; ?>

    <?php foreach ($messages as $msg): ?>
        <div class="message-card">

            <div class="top">
                <div>
                    <div class="name"><?= htmlspecialchars($msg['name']) ?></div>
                    <div class="email"><?= htmlspecialchars($msg['email']) ?></div>
                </div>

                <div class="date">
                    <?= $msg['created_at'] ?>
                </div>
            </div>

            <div class="message-text">
                <?= nl2br(htmlspecialchars($msg['message'])) ?>
            </div>

            <a class="btn-delete" 
               href="?delete=<?= $msg['id'] ?>" 
               onclick="return confirm('Are you sure you want to delete this message?')">
               Delete
            </a>

        </div>
    <?php endforeach; ?>
</div>

<?php include "Footer.php"; ?>