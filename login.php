<?php
session_start();

$usernameError = "";
$passwordError = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username)) {
        $usernameError = "Please enter your username.";
    }

    if (empty($password)) {
        $passwordError = "Please enter your password.";
    }

    if (empty($usernameError) && empty($passwordError)) {
        // Këtu mund ta lidhësh më vonë me databazë
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
    <title>Bellisse Login</title>

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

        .login-card {
            background-color: #FFFFFF;
            width: 430px;
            padding: 55px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .logo {
            text-align: center;
            font-size: 42px;
            letter-spacing: 4px;
            margin-bottom: 35px;
            color: #2C2C2C;
        }

        .logo span {
            display: block;
            font-style: italic;
            font-size: 26px;
            letter-spacing: 1px;
            color: #C89B8C;
        }

        h2 {
            margin: 0;
            font-size: 28px;
        }

        .subtitle {
            color: #777;
            margin: 10px 0 30px;
            font-size: 17px;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 7px;
            font-size: 15px;
        }

        input {
            width: 100%;
            padding: 16px;
            border: 2px solid #2C2C2C;
            font-size: 16px;
            box-sizing: border-box;
            outline: none;
        }

        input:focus {
            border-color: #C89B8C;
        }

        button {
            margin-top: 28px;
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

        .register-link {
            text-align: center;
            margin-top: 30px;
            font-size: 15px;
        }

        .register-link a {
            color: #2C2C2C;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link a:hover {
            color: #C89B8C;
        }

        .privacy {
            text-align: center;
            margin-top: 40px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="logo">
            <span>oh</span>
            BELLISSE
        </div>

        <h2>Sign in</h2>
        <p class="subtitle">Sign in or create your Bellisse account</p>

        <form method="POST" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username">
            <div class="error"><?php echo $usernameError; ?></div>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password">
            <div class="error"><?php echo $passwordError; ?></div>

            <button type="submit">CONTINUE</button>

            <div class="register-link">
                Don’t have an account? <a href="register.php">Register</a>
            </div>

            <div class="privacy">
                By continuing, you agree to Bellisse terms & privacy policy.
            </div>
        </form>
    </div>

</body>
</html>