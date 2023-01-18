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

            <a href="../index.php"> <i class="fas fa-home"></i><span> Home</span></a>
            <a href="./index.php"><i class="fas fa-globe"></i><span>Explore</span></a>
            <a href="./index.php"><i class="fas fa-envelope"></i><span>Message</span></a>
            <a href="./index.php"><i class="fas fa-bell"></i><span>Notification</span></a>
            <a href="./index.php"><i class="fas fa-wrench"></i><span>Settings</span></a>
        </div>
        <div class="nav-log">
            <?php
            if (isset($_COOKIE['name'])) {
                echo '<a href="./php/logout.php"><i class="fas fa-external-link-alt"></i><span>logout</span></a>';
            } else {
                echo '<a href="./login"><i class="fas fa-user-circle"></i><span>Login</span></a>';
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