<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Cookie</title>
</head>

<body>
    <?php
    echo "Name " . $_COOKIE['name'];
    echo "Password " . $_COOKIE['password'];
    echo "Email " . $_COOKIE['email'];
    ?>

</body>

</html>