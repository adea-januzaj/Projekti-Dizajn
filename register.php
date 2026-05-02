<?php
session_start();
$page_title = "Register";

$usernameError = "";
$emailError = "";
$passwordError = "";
$confirmError = "";
$agreeError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm = trim($_POST["confirm"]);

    if (empty($username)) {
        $usernameError = "Please enter your username.";
    }

    if (empty($email)) {
        $emailError = "Please enter your email.";
    }

    if (empty($password)) {
        $passwordError = "Please enter your password.";
    }

    if ($password !== $confirm) {
        $confirmError = "Passwords do not match.";
    }

    if (!isset($_POST["agree"])) {
        $agreeError = "You must agree to the terms.";
    }

    if (empty($usernameError) && empty($emailError) && empty($passwordError) && empty($confirmError) && empty($agreeError)) {
        $_SESSION["username"] = $username;
        header("Location: home.php");
        exit();
    }
}
?>

<?php include_once "Header.php"; ?>

<style>
    body {
        margin: 0;
        font-family: 'Playfair Display', serif;
        background-color: #FAEDED;
        color: #2C2C2C;
    }

    .register-page {
        min-height: calc(100vh - 180px);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 60px 20px;
    }

    .register-card {
        background-color: #FFFFFF;
        width: 430px;
        padding: 50px;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .logo {
        text-align: center;
        font-size: 42px;
        letter-spacing: 4px;
        margin-bottom: 30px;
    }

    h2 {
        margin: 0;
        font-size: 28px;
    }

    label {
        display: block;
        margin-top: 15px;
        margin-bottom: 7px;
    }

    input {
        width: 100%;
        padding: 15px;
        border: 2px solid #2C2C2C;
        outline: none;
    }

    input:focus {
        border-color: #C89B8C;
    }

    .agree {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
    }

    button {
        margin-top: 25px;
        width: 100%;
        padding: 15px;
        border: none;
        background-color: #2C2C2C;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    button:hover {
        background-color: #C89B8C;
    }

    .error {
        color: #D9534F;
        font-size: 13px;
    }

    .login-link {
        text-align: center;
        margin-top: 25px;
    }

    .login-link a {
        font-weight: bold;
        text-decoration: none;
        color: #2C2C2C;
    }

    .login-link a:hover {
        color: #C89B8C;
    }
</style>

<div class="register-page">
    <div class="register-card">
        <div class="logo">BELLISSE</div>

        <h2>Create account</h2>

        <form method="POST" action="">
            <label>Username</label>
            <input type="text" name="username">
            <div class="error"><?php echo $usernameError; ?></div>

            <label>Email</label>
            <input type="email" name="email">
            <div class="error"><?php echo $emailError; ?></div>

            <label>Password</label>
            <input type="password" name="password">
            <div class="error"><?php echo $passwordError; ?></div>

            <label>Confirm Password</label>
            <input type="password" name="confirm">
            <div class="error"><?php echo $confirmError; ?></div>

            <div class="agree">
                <input type="checkbox" name="agree">
                <label>I agree to terms</label>
            </div>
            <div class="error"><?php echo $agreeError; ?></div>

            <button type="submit">REGISTER</button>

            <div class="login-link">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </form>
    </div>
</div>

<?php include_once "Footer.php"; ?>