<?php
session_start();
include "header.php";
include "sidenav.php";
include "database.php";

$db = new Database();
$conn = $db->getConnection();

$success = "";
$error = "";


if (isset($_POST['send'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {

        try {
            $stmt = $conn->prepare("
                INSERT INTO contact_messages (name, email, message)
                VALUES (?, ?, ?)
            ");
            $stmt->execute([$name, $email, $message]);

            $success = "Message sent successfully!";
        } catch (PDOException $e) {
            $error = "Database error.";
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Bellisse</title>
    <link rel="stylesheet" href="contactus.css">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Inter:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
<div id="main">

    <section class="contact-hero">
        <h1>Let’s Talk</h1>
        <p>We’d love to hear from you — elegance starts with connection.</p>
    </section>

    <section class="contact-container">

        <div class="contact-info">
            <h2>Get in touch</h2>
            <p>
                Whether you have a question about our collections, orders, or anything else —
                our team is ready to assist you with care and style.
            </p>

            <div class="info-box">
                <span>Email</span>
                <p>support@bellisse.com</p>
            </div>

            <div class="info-box">
                <span>Phone</span>
                <p>+383 44 000 000</p>
            </div>

            <div class="info-box">
                <span>Location</span>
                <p>Prizren, Kosovo</p>
            </div>
        </div>

        <div class="contact-form">
            <form method="POST">

                <div class="input-group">
                    <input type="text" name="name" required>
                    <label>Full Name</label>
                </div>

                <div class="input-group">
                    <input type="email" name="email" required>
                    <label>Email Address</label>
                </div>

                <div class="input-group">
                    <textarea name="message" rows="5" required></textarea>
                    <label>Your Message</label>
                </div>

                <button type="submit" name="send">Send Message</button>
            </form>

           
            <?php if ($success): ?>
                <p style="color:green; text-align:center; margin-top:15px;">
                    <?= $success ?>
                </p>
            <?php endif; ?>

            <?php if ($error): ?>
                <p style="color:red; text-align:center; margin-top:15px;">
                    <?= $error ?>
                </p>
            <?php endif; ?>

        </div>

    </section>

</div>

<?php include "footer.php"; ?>
</body>
</html>