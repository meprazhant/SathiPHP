<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SathiPHP</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div class="home">

        <div class="navclass">
            <?php require_once("./php/nav.php") ?>
        </div>
        <div class="recent">
            <div class="recentposts">
                <div class="rescard">
                    <form method="POST">
                        <div class="rchead">
                            <h1>Add Note Title</h1>
                            <input type="text" name="title" placeholder="Add Note Title" required>
                        </div>
                        <div class="rcbody">
                            <h1>Add Note Description</h1>
                            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Add Note Description"
                                required></textarea>
                        </div>
                        <div class="rctail">
                            <input type='submit' name='submit' value='Post'>
                            <button type="reset">Reset</button>
                        </div>
                    </form>
                </div>
                <?php
                require_once("./php/conn.php");
                $sql = "SELECT * FROM `post`";
                $result = mysqli_query($conn, $sql);
                while (
                    $row = mysqli_fetch_assoc(
                        $result
                    )
                ) {
                    $puid = $row['uid'];
                    $sql2 = "SELECT * FROM `user` WHERE `id` = $puid";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $timesplit = explode(":", $row['time']);
                    echo
                        '<div class="rc2">
                        <div class="rchead">
                            <h1>' . $row['ptit'] . '</h1>
                            <p>By ' . $row2['name'] . '</p>
                        </div>
                        <div class="rcbody">
                            <p>' . $row['pdes'] . '</p>
                        </div>
                        <div class="rctail">
                            <p>' . $row['time'] . '</p>
                        </div>
                    </div>';
                }




                ?>
            </div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            require('./php/conn.php');
            $title = $_POST['title'];
            $uid = $_COOKIE['id'];
            $desc = $_POST['desc'];
            $sql = "INSERT INTO `post` (`uid`,`ptit`, `pdes`, `time`) VALUES ($uid,'$title', '$desc', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "";
            } else {
                echo "Note Not Added";
            }
        }






        ?>
    </div>

</body>

</html>