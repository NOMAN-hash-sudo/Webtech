<?php
include "config.php";

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

    echo $row["name"] . " | ";
    echo $row["email"] . " | ";
    echo $row["registration_no"] . " | ";
    echo $row["department"];

    echo " <a href='update.php?id=$row[id]'>Update</a>";
    echo " <a href='delete.php?id=$row[id]'>Delete</a>";

    echo "<br><br>";
}
?>

<br>
<a href="add.php">Add Student</a>