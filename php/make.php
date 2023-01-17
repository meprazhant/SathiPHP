<?php
$name = $_COOKIE["name"];
$id = $_COOKIE["id"];
require("./php/conn.php");
$sql = "SELECT * FROM `post` WHERE `uid` = $id";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if (isset($name)) {
    echo "<div class='nav-prof'>
                <div class='prof-img'>
                  <img src='https://imgv3.fotor.com/images/blog-cover-image/10-profile-picture-ideas-to-make-you-stand-out.jpg' alt='profile'/>
                </div>
                <a href='./user' class='loggedIn'>$name</a>
                <div class='pp-count'>
                    <div class='pp-count-item'>
                        <span class='pp-count-item-num'>$num</span>
                        <span class='pp-count-item-text'>Posts</span>
                    </div>
                    <div class='pp-count-item'>
                        <span class='pp-count-item-num'>0</span>
                        <span class='pp-count-item-text'>Followers</span>
                    </div>
                    <div class='pp-count-item'>
                        <span class='pp-count-item-num'>0</span>
                        <span class='pp-count-item-text'>Following</span>
                    </div>
                </div>
            </div>";
} else {
    echo "no";
} ?>