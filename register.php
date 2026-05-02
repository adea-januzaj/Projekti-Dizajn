<?php
session_start();

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
    } elseif (strlen($username) < 4) {
        $usernameError = "Username must be at least 4 characters.";
    }

    if (empty($email)) {
        $emailError = "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please enter a valid email.";
    }

    if (empty($password)) {
        $passwordError = "Please enter your password.";
    } elseif (strlen($password) < 8) {
        $passwordError = "Password must be at least 8 characters.";
    }

    if (empty($confirm)) {
        $confirmError = "Please confirm your password.";
    } elseif ($password !== $confirm) {
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bellisse Register</title>
    
    <style>
        body {
            margin: 0;
            font-family: 'Playfair Display', serif;
            background-color: #FAEDED;
            color: #2C2C2C;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            background-color: #FFFFFF;
            width: 430px;
            padding: 50px 55px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .logo {
            text-align: center;
            font-size: 42px;
            letter-spacing: 4px;
            margin-bottom: 30px;
            color: #2C2C2C;
        }

        h2 {
            margin: 0;
            font-size: 28px;
        }

        .subtitle {
            color: #777;
            margin: 10px 0 25px;
            font-size: 17px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            font-size: 15px;
        }

        input {
            width: 100%;
            padding: 15px;
            border: 2px solid #2C2C2C;
            font-size: 15px;
            box-sizing: border-box;
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

        .agree input {
            width: auto;
        }

        .agree label {
            margin: 0;
            font-size: 14px;
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 16px;
            border: none;
            background-color: #2C2C2C;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            letter-spacing: 1px;
        }

        button:hover {
            background-color: #C89B8C;
        }

        .error {
            color: #D9534F;
            font-size: 13px;
            margin-top: 5px;
        }

        .login-link {
            text-align: center;
            margin-top: 28px;
            font-size: 15px;
        }

        .login-link a {
            color: #2C2C2C;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            color: #C89B8C;
        }
    </style>
</head>

<body>

    <div class="register-card">
        <div class="logo">BELLISSE</div>

        <h2>Create account</h2>
        <p class="subtitle">Join Bellisse and discover your perfect dress</p>

        <form method="POST" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username">
            <div class="error"><?php echo $usernameError; ?></div>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter email">
            <div class="error"><?php echo $emailError; ?></div>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password">
            <div class="error"><?php echo $passwordError; ?></div>

            <label for="confirm">Confirm Password</label>
            <input type="password" id="confirm" name="confirm" placeholder="Confirm password">
            <div class="error"><?php echo $confirmError; ?></div>

            <div class="agree">
                <input type="checkbox" id="agree" name="agree">
                <label for="agree">I agree to Bellisse terms & conditions</label>
            </div>
            <div class="error"><?php echo $agreeError; ?></div>

            <button type="submit">REGISTER</button>

            <div class="login-link">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </form>
    </div>

</body>
</html>