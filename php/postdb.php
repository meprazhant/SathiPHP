<?php
$hey = $_POST['submit'];
if (isset($hey)) {
    $desc = $_GET['desc'];
    $id = $_COOKIE['id'];
    // $img = file_get_contents($image);
    // $sql = "INSERT INTO 'post' ('uid','pdes','time','file_name') VALUES ('$id','$desc',current_timestamp(),'hey')";
    // require_once('./conn.php');
    // $result = mysqli_query($conn, $sql);
    // if ($result) {
    //     echo "Success";
    // } else {
    //     echo "Failed";
    // }
    echo $_GET['desc'] ?? 'Fallback value';
}
?>