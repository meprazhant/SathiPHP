<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <?php
    $_SESSION['name'] = "Ram";
    $_SESSION['email'] = 'ram@ram.com';
    ?>

    <p>Hello <?php echo $_SESSION['name']. "Your Email is ".$_SESSION['email'] ?></p>
</body>
</html>

