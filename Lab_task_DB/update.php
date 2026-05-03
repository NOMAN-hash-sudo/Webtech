<?php
include "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "No ID found";
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if ($_POST) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $dept = $_POST["department"];

    if ($name && $email && $dept) {
        mysqli_query($conn, "UPDATE students SET 
        name='$name', email='$email', department='$dept'
        WHERE id=$id");

        echo "Updated";
    } else {
        echo "Fill all fields";
    }
}
?>

<h2>Edit Student</h2>

<form method="post">
Name: <input name="name" value="<?php echo $row['name']; ?>"><br><br>
Email: <input name="email" value="<?php echo $row['email']; ?>"><br><br>
Dept: <input name="department" value="<?php echo $row['department']; ?>"><br><br>

<input type="submit" value="Update">
</form>

<br>
<a href="view.php">Back</a>