<?php
// This is the navigation bar for the site
$name = $_COOKIE["name"];


echo
    '<div class="nav">
        <div class="nav-logo">
            <a href="index.php"><p>&lt;SathiPHP/&gt;</p></a>
        </div>
        <div class="nav-mens">
        <a href="index.php">Home</a>
        <a href="about.php">Explore</a>
        <a href="contact.php">Message</a>
        '
    .
    ($name ? ("<a href='./user' class='loggedIn'>$name</a> <a href='./php/logout.php'><span class='logout'>
    logout
    </span></a>") : ("<a href='./login'>Login</a>")) .
    '</div>
    </div>
    '
    ?>