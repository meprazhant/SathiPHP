<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form class="poststatus" method="POST" enctype="multipart/form-data">
        <div class="post-img">
            <div class="postinm">
                <img src=<?php
                $id = $_COOKIE['id'];
                require_once('conn.php');
                $sql = "SELECT * FROM `user` WHERE `id` = '$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                if (str_contains($row['pp'], "http")) {
                    echo $row['pp'];
                } else {
                    echo "./render/" . $row['pp'];
                }
                ?> 
                alt="logo">
            </div>
            <div class="post-con">
                <textarea name="desc" oninput="auto_grow(this)" id="desc"
                    placeholder="Describe Your Thought"></textarea>
                <p id="limit">( 1500 out of 1500 Letters Remaining)</p>

                <div class="post-btn">
                    <a onclick="addPic();">Add +</a>
                    <input type="file" name="file" accept='.jpg, .jpeg, .png' id="picfile" onchange="displayIMG(event);">
                    <input type="submit" disabled id='sub' value="Post" name="submit" />
                </div>
                <div class="imageShow" id='imgShow'>
                    <img ondblclick="openImg(event);" src="" id="imageID" alt="">
                </div>
            </div>
        </div>

        <?php
        $hey = $_POST['submit'];

        if ($hey) {

            $desc = $_POST['desc'];
            $id = $_COOKIE['id'];
            require_once('conn.php');
            if ($_FILES['file']) {
                $fileName = $_FILES['file']['name'];
                $fileSize = $_FILES['file']['size'];
                $fileTmp = $_FILES['file']['tmp_name'];
                $validExt = array('jpg', 'jpeg', 'png');
                $fileExt = explode('.', $fileName);
                $imgext = strtolower(end($fileExt));
                $newimgname = uniqid('', true) . "." . $imgext;
                    move_uploaded_file($fileTmp, "./postImages/" . $newimgname);
                    $go = $newimgname;
                    $sql = "INSERT INTO `post`( `uid`, `pdes`, `time`,`image`) VALUES ($id,'$desc',current_timestamp(),$newimgname)";
                    $result = mysqli_query($conn, $sql);
            } else {
                $sql = "INSERT INTO `post`( `uid`, `pdes`, `time`,`image`) VALUES ($id,'$desc',current_timestamp(),null)";
                $result = mysqli_query($conn, $sql);
            }
            if ($result) {
                // refresh the page with timeout
                header("Refresh:1000");
            } else {
                echo "Error";
            }
        }
        ?>


    </form>

</body>

<script>

    function auto_grow(element) {
        element.style.height = "0px";
        element.style.height = (element.scrollHeight) + "px";
        var limit = document.getElementById("limit");
        var desc = document.getElementById("desc");
        var len = desc.value.length;
        if (len > 1500) {
            limit.innerHTML = "You have reached the limit of 1500 Letters";
            limit.style.color = "red";
            desc.value = desc.value.substring(0, 1500);

        } else {
            limit.innerHTML = "( " + (1500 - len) + " out of 1500 Letters Remaining )";
            limit.style.color = "#b5b5b5";
        }
        if (len > 0) {
            document.getElementById('sub').disabled = false;
        } else {
            document.getElementById('sub').disabled = true;
        }
    }

    function changepp() {
        var e = document.getElementById("file");
        var file = e.files[0];
        if (file) {
            if (file.type == "image/jpeg" || file.type == "image/png") {
                var reader = new FileReader()
                reader.onloadend = function () {
                    var base = document.getElementById("binary");
                    base.innerText = reader.result;
                }
                reader.readAsDataURL(file);
            } else {
                alert("Supports only jpeg and png files");
                return;
            }
        }
        else {
            alert("Please select a file");
            return;
        }
    }

    function addPic(e) {
        var picfile = document.getElementById("picfile");
        picfile.click();
        console.log(e)
    }

    function displayIMG(e) {
        var imgShow = document.getElementById("imgShow");
        var files = (e.target.files)
        var imageID = document.getElementById("imageID")
        if (!files || files.length == 0)
            return;
        const file = files[0];
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            imageID.src = reader.result;
            imgShow.style.display = "flex";
        };
    }
    function openImg(e) {
        console.log(e.target.src)
        setTimeout(() => {
            window.open(e.target.src, "_blank");
        }, 1000);
    }
    console.log("Loaded")

</script>

</html>