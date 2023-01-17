<html>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
</head>

<body>
    <div class="nav">
        <div class="nav-logo">
            <a href="../index.php"><img src="https://i.ibb.co/27970Ct/logho.png" alt="logo"></a>
        </div>
        <?php
        $name = $_COOKIE["name"];
        if ($name) {
            require_once("./php/make.php");
        } else {
            echo "";
        }
        ?>


        <div class="nav-mens">

            <a href="../index.php"> <i class="fas fa-home"></i> Home</a>
            <a href="./index.php"><i class="fas fa-globe"></i>Explore</a>
            <a href="./index.php"><i class="fas fa-envelope"></i>Message</a>
            <a href="./index.php"><i class="fas fa-bell"></i>Notification</a>
            <a href="./index.php"><i class="fas fa-wrench"></i>Settings</a>
        </div>
        <div class="nav-log">
            <?php
            if (isset($_COOKIE['name'])) {
                echo '<a href="./php/logout.php"><i class="fas fa-external-link-alt"></i>logout</a>';
            } else {
                echo '<a href="./login"><i class="fas fa-sign-in"></i>Login</a>';
            }

            ?>

        </div>
    </div>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>