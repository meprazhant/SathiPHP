<?php
$conn = new mysqli("localhost", "root", "", "sathiphp");

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "";
}


?>