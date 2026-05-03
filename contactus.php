<?php
session_start();
include "header.php";
include "sidenav.php";
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
            <form>
                <div class="input-group">
                    <input type="text" required>
                    <label>Full Name</label>
                </div>

                <div class="input-group">
                    <input type="email" required>
                    <label>Email Address</label>
                </div>

                <div class="input-group">
                    <textarea rows="5" required></textarea>
                    <label>Your Message</label>
                </div>

                <button type="submit">Send Message</button>
            </form>
        </div>

    </section>

</div>

<?php include "footer.php"; ?>
</body>
</html>