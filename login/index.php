<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SathiPHP</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="home">
        <div class="navclass">
            <?php
            require_once("../php/nav.php");
            if ($_COOKIE['name']) {
                header("Location: ../");
            }
            ?>
        </div>
        <div class="login">
            <div class="logarea">
                <div class="logpic">
                    <div class="logcard">
                        <div class="logspace">
                            <h1>Login Fast to never miss a single Commit</h1>
                            <p>Login to access your account and use the features of SathiPHP</p>
                            <form method="POST">
                                <input type="text" name="email" placeholder="Email" required>
                                <input type="password" name="password" placeholder="Password" required>
                                <div class="btn">
                                    <input type="submit" name="submit" value="Login">
                                </div>
                            </form>
                            <p>Don't have an account? <a href="../register">Register</a></p>
                            <h2>
                                <?php
                                if (isset($_POST['submit'])) {
                                    require("../php/conn.php");
                                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                                    $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
                                    $result = mysqli_query($conn, $sql);
                                    $num = mysqli_num_rows($result);
                                    if ($num > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $password = $row['password'];
                                        $id = $row['id'];
                                        setcookie("name", $name, time() + (86400 * 30), "/");
                                        setcookie("id", $id, time() + (86400 * 30), "/");
                                        header("Location: ../");
                                    } else {
                                        echo "Bad Credentials";
                                    }
                                }
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</body>

</html>