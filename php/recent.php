<div class="recentposts">
    <?php
    require_once("./php/conn.php");
    $sql = "SELECT * FROM `post` ORDER BY `id` DESC";
    $result = mysqli_query($conn, $sql);
    while (
        $row = mysqli_fetch_assoc(
            $result
        )
    ) {
        $puid = $row['uid'];
        if ($puid == $row['uid']) {
            $same = true;
        } else {
            $same = false;
        }
        $sql2 = "SELECT * FROM `user` WHERE `id` = $puid";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $date = $row['time'];
        //date format in php
        $date = date("d M Y", strtotime($date));
        //time format
        $time = date("h:i A", strtotime($date));

        $newdate = $date . " at " . $time;

        $pp = $row2['pp'];


        if (str_contains($pp, "http")) {
            $pp = $pp;
        } else {
            $pp = "./render/" . $pp;
        }

        echo
            '<div class="poststatus">
                <div class="post-img">
                    <div class="postinm">
                        <img src="' . $pp . '" alt="profile">
                    </div>
                    <div class="posthee">
                        <div class="post-conn">
                            <a href="./profile.php?uid=' . $row['uid'] . '">' . $row2['name'] . '</a>
                            <!-- <p>(' . $row2['email'] . '</p> -->
                            <p>Posted On (' . $newdate . ')</p>
                        </div>
                        <div class="postcontent">
                            <p>' . $row['pdes'] . '</p>
                        </div>
                        <div class="samebtn">
                           '

            .
            '
                        </div>
                    </div>
                </div>
            </div>
';
    }
    ?>
</div>