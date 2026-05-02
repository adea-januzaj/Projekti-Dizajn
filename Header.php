<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bellisse</title>
</head>

<body>
    <style>
        body{
            margin: 0;
            font-family: 'Playfair Display', serif;
            background-color: #FAF7F5;
            color: #2C2C2C;
        }

        header{
            background-color: #F3E8E6;
            color: #2C2C2C;
            padding: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #E5DAD6;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        header h1{
            margin: 0;
            font-size: 30px;
            letter-spacing: 2px;
        }

        .clean-link{
            color: inherit;
            text-decoration: none;
            transition: 0.3s;
        }

        .clean-link:hover{
            color: #D4A5A5;
        }

        nav ul{
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        } 

        .menuBtn{
            font-size: 28px;
            cursor: pointer;
            color: #2C2C2C;
        }

        .menuBtn:hover{
            color: #D4A5A5;
        }

        nav ul li a{
            font-size: 15px;
            letter-spacing: 1px;
        }
    </style>

    <header>
        <div class="header-left">
            <?php
            if(!isset($hide_menu_btn)|| $hide_menu_btn !== true):
            ?>
            <span class="menuBtn" onclick="openNav()">&#9776;</span>
            <?php endif; ?>

            <h1><i><a href="home.php" class="clean-link">Bellisse</a></i></h1>
        </div>

        <nav>
            <ul> 
                <li><a href="home.php" class="clean-link">Home</a></li>
                <li><a href="#" class="clean-link">Dresses</a></li>
                <li><a href="#" class="clean-link">Collections</a></li>

                <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li><a href="admin_dashboard.php" class="clean-link" style="color: #C89B9B; font-weight: bold;">Dashboard</a></li>
                <?php endif; ?>

                <?php if(isset($_SESSION['username' ])): ?>
                    <li><a href="logout.php" class="clean-link">Logout</a></li>
                <?php else: ?>
                    <?php if(isset($page_title) && $page_title == "Login"): ?>
                        <li><a href="register.php" class="clean-link">Register</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="clean-link">Login</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>