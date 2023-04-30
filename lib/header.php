<!DOCTYPE html>
<!--Head-->
<head>
    <title>Agile Art: The home of Art</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:ital,wght@1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/nav.css">
    <!--Navbar for website-->
    <ul>
        <li><p>Agile Art</p></li>
        <li><a class="active" href="home.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i> Home</a></li>
        <li><a href="news.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News</a></li>
        <li><a href="contact.php"><i class="fa fa-address-book-o" aria-hidden="true"></i> Contact</a></li>
        <li><a href="about-us.php"><i class="fa fa-question-circle" aria-hidden="true"></i> About Us</a></li>
        <li>
            <form action="home.php" method="GET">
                <input type="text" placeholder="Search Products" name="search">
                <button type="submit"><i class="fa fa-search"></i>Search</button>
            </form>
        </li>
        <li style="float:right">
            <a href="cart.php">

            <i class="fa fa-shopping-cart"></i>
            </a>
        </li>

        <li style="float:right">
            <?php
            if (isset($_SESSION['name'])) {
                echo '<a href="Profile.php?session=' . $_SESSION['name'] . '">' . $_SESSION['name'] . '</a>';
            }
            ?>
        </li>

        <li style="float:right">
            <?php
            if (isset($_SESSION['name'])) {
                echo '<form method="post"  action="" >
                    <button type="submit" name="logout">Logout</button>
                </form>';
            }
            ?>
        </li>

        <li style="float:right"><form method="post"  action="" >

                <?php if(!isset($_SESSION['name'])){echo '<a href="signup.php "type="submit" name="logout">Register</a>';}
                   ?>
        </li>

        <li style="float:right">
            <?php
            if (!isset($_SESSION['name'])){
                echo " <a href=index.php>Login</a>";
            }
            ?>
        </li>
    </ul>
</head>
<body>