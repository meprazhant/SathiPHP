<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
</head>

<body>
    <div class="nav">
        <div class="nav-logo">
            <a href="../index.php"><img src="https://i.ibb.co/27970Ct/logho.png" alt="logo"></a>
        </div>
        <?php


        ?>
        <div class="nav-mens">
            <a href="../index.php">Home</a>
            <a href="./index.php">Explore</a>
            <a href="./index.php">Message</a>
            <a href="./index.php">Notification</a>
            <a href="./index.php">Settings</a>
        </div>
        <div class="nav-log">
            <?php
            if (isset($_COOKIE['name'])) {
                echo '<a href="./profile.php">' . $_COOKIE['name'] . '</a>';
                echo '<a href="./php/logout.php"><span class="logout">logout</span></a>';
            } else {
                echo '<a href="./login">Login</a>';
            }

            ?>

        </div>
    </div>

</body>

</html>