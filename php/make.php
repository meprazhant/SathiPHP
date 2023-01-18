<?php
$name = $_COOKIE["name"];
$id = $_COOKIE["id"];
require("./php/conn.php");
$sql = "SELECT * FROM `post` WHERE `uid` = $id";
$sql2 = "SELECT * FROM `user` WHERE `id` = $id";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result2);
$pp = $row['pp'];
if (str_contains($pp, "http")) {
    $pp;
} else {
    $pp = "./render/" . $pp;
}

$num = mysqli_num_rows($result);


if (isset($_POST['changepp'])) {
    if (!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE) {
        echo "<script>alert('No FIle Send')</script>";
        Header("refresh:0; url=./");
        exit;
    } else {
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileTmp = $_FILES['file']['tmp_name'];

        $validExt = array('jpg', 'jpeg', 'png');
        $fileExt = explode('.', $fileName);
        $imgext = strtolower(end($fileExt));
        if (in_array($imgext, $validExt) === false) {
            echo "<script>alert('Invalid FIle')</script>";
            Header("refresh:0; url=./");
            exit;
        } else if ($fileSize > 2097152) {
            echo "<script>alert('File size must be less than 2MB')</script>";
            Header("refresh:0; url=./");
            exit;
        } else {
            $newimgname = uniqid('', true) . "." . $imgext;
            move_uploaded_file($fileTmp, "./render/" . $newimgname);
            $go = $newimgname;
            $query = "UPDATE `user` SET `pp` = '$newimgname' WHERE `id` = $id";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $go = "Success";
            } else {
                $go = "Failed";
            }

        }


    }



}
if (isset($name)) {
    echo "<div class='nav-prof'>
                <div class='prof-img'>
                  <img onclick=(opentab()) src='$pp' alt='profile'/>
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
                <div class='pp-change' id='ppchange'>
                <div class='pp-card'>
                <span  class='pp-card-close' onclick='closetab()'><p>&times;</p></span>
                        <div class='pp-card-header'>
                            <h3>Change Profile Picture</h3>
                        </div>
                        <div class='pp-card-body'>
                            <img id='imgchg' src='$pp' alt=''>
                            <form  method='POST' enctype='multipart/form-data'>
                                <input type='file'   name='file' accept='.jpg, .jpeg, .png' id='file'>
                                <input type='submit'  value='Upload' name='changepp'>
                                <p>$go</p>
                            </form>
                        </div>
                   </div>
                </div>
                <script>
                    function closetab(){
                        var ppchange = document.getElementById('ppchange');
                        ppchange.style.display='none';
                    }
                    function opentab(){
                        var ppchange = document.getElementById('ppchange');
                        ppchange.style.display='flex';
                    }
                </script>
</div>";



} else {
    echo "no";
} ?>