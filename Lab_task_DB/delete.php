<?php
include "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "No ID found";
    exit();
}

$sql = "DELETE FROM students WHERE id=$id";
mysqli_query($conn, $sql);

echo "Deleted";
?>