<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SathiPHP</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div class="home">
        <div class="navclass">
            <?php require_once("./php/nav.php") ?>
        </div>
        <div class="recent">
            <h2>Home</h2>

            <?php
            $name = $_COOKIE['name'];
            if ($name) {
                require_once("./php/postStatus.php");
            }
            ?>
            <?php require_once("./php/recent.php") ?>
        </div>

    </div>

</body>

</html>