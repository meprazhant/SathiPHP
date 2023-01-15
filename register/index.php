<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | SathiPHP</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="home">

        <div>
            <?php
            require_once("../php/nav.php");
            if ($_COOKIE['name']) {
                header("Location:../");
            }
            ?>
        </div>
        <div class="login">

            <div class="logarea">
                <div class="logpic">
                    <div class="logcard">
                        <div class="logspace">
                            <div class="logimg">
                                <img src="https://cdn-icons-png.flaticon.com/512/166/166260.png" alt="log">
                            </div>

                            <h1>Join among other developer and make the community a better Place.</h1>
                            <p>Join Now to access your account and use the features of SathiPHP</p>
                            <form method="POST">
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="text" name="username" placeholder="Full Name" required>
                                <input type="password" name="password" placeholder="Password" required>
                                <div class="btn">
                                    <input type="submit" name="submit" value="Register">
                                </div>
                            </form>
                            <p>Already have an account? <a href="../login/">Login</a></p>

                            <h2>
                                <?php
                                if (isset($_POST['submit'])) {
                                    require("../php/conn.php");
                                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                                    $sql = "INSERT INTO `user` (`email`, `name`, `password`) VALUES ('$email', '$username', '$password')";
                                    $dubeml = "SELECT * FROM `user` WHERE `email` = '$email'";
                                    $emres = mysqli_query($conn, $dubeml);
                                    $emnum = mysqli_num_rows($emres);
                                    if ($emnum > 0) {
                                        echo "$email is Already in use, try different email";
                                        exit();
                                    }
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        setcookie("name", $username, time() + (86400 * 30), "/");
                                        setcookie("email", $email, time() + (86400 * 30), "/");
                                        setcookie("password", $password, time() + (86400 * 30), "/");
                                        header("Location:../");
                                    } else {
                                        echo "Error: " . mysqli_error($conn);
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